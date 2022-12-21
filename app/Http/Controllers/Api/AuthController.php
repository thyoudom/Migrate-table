<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginMemberCarRequest;
use App\Models\FcmToken;
use App\Models\MemberCar;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|min:6',
            // 'type' => 'required'
        ], [
            // 'type.required' => 'type_required',
            'phone.required' => 'phone_required',
            'password.required' => 'password_required',
            'password.min' => 'password_min.6',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        try {
            $check = Auth::attempt(['phone' => $request->phone, 'password' => $request->password, 'status' => 1, 'type' => ['member', 'garage']]);
            if (!$check) {
                return resFail('login_fail');
            }
            $user = $request->user();
            $token = $user->createToken('authToken')->accessToken;
            $dataUser = [
                'id' => $user?->id,
                'phone' => $user?->phone,
                'name' => $user?->name,
                'profile' => $user?->profile ? url('/file_manager' . $user?->profile) : null,
                'gender' => $user?->gender,
                'email' => $user?->email,
                'address' => $user?->address,
                'point_value' => $user?->point_value,
                'type' => $user?->type,
                'token' => $token,
            ];
            if (isset($user->type) && $user->type == 'member') {
                $select = ['id', 'image', 'member_id', 'brand', 'model', 'year', 'id_plate', 'amount', 'status'];
                $dataUser['memberCars'] = MemberCar::where('member_id', $user->id)->orderBy('created_at', 'asc')->select($select)->get();
            }
            return response()->json([
                'message' => true,
                'data' => $dataUser,
            ], 200);
        } catch (Exception $error) {
            return resFail('login_failed', $error);
        }
    }
    //member
    public function loginChooseCar(LoginMemberCarRequest $req)
    {
        try {
            $member_id = Auth::user()->id;
            $data = MemberCar::where('member_id', $member_id)->where('id', $req->car_id)->first();
            return response()->json([
                'message' => $data ? true : false,
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => false,
                'error' => $e->getMessage(),
                'data' => [],
            ], 202);
        }
    }
    private function passwordCorrect($reqPassword, $password)
    {
        return Hash::check($reqPassword, $password, []);
    }
    public function memberSwitchCar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|numeric',
            'password' => 'required',
        ], [
            'car_id.required' => 'car_id_required',
            'car_id.numeric' => 'invalid_format',
            'password.required' => 'password_required',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        $member = auth('api')->user();
        $memberCar = MemberCar::where('member_id', $member->id)->where('id', $request->car_id)->first();
        if (!$memberCar) {
            return resFail('car_not_found');
        } else if (!$member->phone) {
            return resFail('invalid_phone_number');
        }
        $passwordCheck = $this->passwordCorrect($request->password, $member->password);
        if (!$passwordCheck) {
            return resFail('password_incorrect');
        }
        $check = Auth::guard('web')->attempt(['phone' => $member->phone, 'password' => $request->password, 'status' => 1, 'type' => 'member']);
        if (!$check) {
            return resFail('login_fail');
        }
        $dataCar = [
            'id' => $memberCar->id,
            'brand' => $memberCar->brand,
            'model' => $memberCar->model,
            'year'  => $memberCar->year,
            'id_plate' => $memberCar->id_plate,
            'image_url' => $memberCar->image ? url('/file_manager' . $memberCar->image) : null,
            'amount' => $memberCar->amount,
            'status'    => $memberCar->status,
        ];
        return response()->json([
            'message' => true,
            'data' => $dataCar,
        ], 200);
    }
    //endMember

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users',
            'email' => 'nullable|unique:users',
            'password' => 'required',
            'name' => 'required',
        ], [
            'phone.required' => 'phone_required',
            'phone.unique' => 'phone_unique',
            'email.unique' => 'email_unique',
            'password.required' => 'password_required',
            // 'password.min' => 'password_min.6',
            'name.required' => 'username_required',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        DB::beginTransaction();
        try {

            $user = User::create([
                'phone' => $request->phone,
                'email' => $request->email ?? null,
                'password' => bcrypt($request->password),
                'name' => $request->name,
                'type' => $request->type,
                'status' => 1,
            ]);
            $token = $user->createToken('authToken')->accessToken;
            DB::commit();
            Auth::attempt(['phone' => $request->phone, 'password' => $request->password, 'status' => 1, 'type' => ['member', 'garage']]);
            return response()->json([
                'message' => true,
                'data' => [
                    'id' => $user?->id,
                    'phone' => $user->phone,
                    'name' => $user->name,
                    'profile' => $user->profile ? url('/file_manager' . $user->profile) : null,
                    'token' => $token,
                ],
            ], 200);
        } catch (Exception $error) {
            DB::rollBack();
            return $error;
            return response()->json([
                'message' => false,
            ], 202);
        }
    }

    public function fcmToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'token' => 'required|unique:fcm_tokens,token'
        ], [
            'user_id.required' => 'user_required',
            'token.unique' => 'token_unique',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        DB::beginTransaction();
        try {
            FcmToken::create([
                'user_id' => $request->user_id,
                'token'   => $request->token
            ]);
            DB::commit();
            return response()->json([
                'message' => true,
            ], 200);
        } catch (Exception $error) {
            DB::rollBack();
            return response()->json([
                'message' => false,
            ], 202);
        }
    }

    public function checkPhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ], [
            'phone.required' => 'password_required',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        $phone = User::where('phone', $request->phone)->whereIn('type', ['member', 'garage'])->select('id', 'name', 'phone')->first();
        $data = $phone ? $phone : null;
        $message = $phone ? true : false;
        $status = $phone ? 200 : 202;
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable|unique:users,email,' . $user->id,
        ], [
            'name.required' => 'password_required',
            'email.unique' => 'email_unique',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        try {
            $filename = null;
            if ($user->type == 'member' || $user->type == "garage") {
                if ($request->file('profile')) {
                    $profile = $request->file('profile');
                    $filename = '/' . time() . '.' . $request->file('profile')->getClientOriginalExtension();
                    $pathImg = public_path('file_manager');
                    $profile->move($pathImg, $filename);
                }
                $user->update([
                    'name' => $request->name ?? $user->name,
                    'email' => $request->email ?? $user->email,
                    'profile' => $filename ?? $user->profile,
                    'gender'  => $request->gender ?? $user->gender,
                    'address' => $request->address ?? $user->address
                ]);
                return response()->json([
                    'message' => true,
                    'data' => [
                        'id'    => $user->id,
                        'email' => $user->email,
                        'name' => $user->name,
                        'profile' => $user->profile ? url('/file_manager' . $user->profile) : null,
                        'gender' => $user->gender,
                        'address' => $user->address
                    ],
                ], 200);
            } else {
                return response()->json([
                    'data' => 'account_incorrect',
                    'message' => false,
                ], 202);
            }
        } catch (Exception $error) {
            return response()->json([
                'message' => false,
            ], 202);
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
        ], [
            'password.required' => 'password_required',
            'password.min' => 'password_min.6',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        try {
            $user = $request->user();
            $user->update([
                'password' => bcrypt($request->password),
            ]);
            return response()->json([
                'message' => true,
                'status' => 'change_password_success',
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message' => false,
                'status' => 'change_password_failed',
            ], $error);
        }
    }

    public function profile()
    {
        $authUser = auth()->user();
        $user = User::find($authUser->id);
        return response()->json([
            'message' => true,
            'data' => [
                'id'    => $user->id,
                'phone' => $user?->phone,
                'email' => $user->email,
                'name' => $user?->name,
                'profile' => $user?->profile ? url('/file_manager' . $user?->profile) : null,
                'gender' => $user?->gender,
                'point_value' => $user?->point_value,
                'address' => $user?->address
            ],
        ], 200);
    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|min:6',
        ], [
            'phone.required' => 'phone_required',
            'password.required' => 'password_required',
            'password.min' => 'password_min.6',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        try {
            $user = User::where('phone', $request->phone)->first();
            $user->update(['password' => bcrypt($request->password)]);
            return response()->json([
                'message' => true,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message' => false,
            ], 202);
        }
    }
    public function verifyPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
        ], [
            'password.required' => 'password_required',
            'password.min' => 'password_min.6',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        $member = $request->user();
        $check = Auth::guard('web')->attempt(['phone' => $member->phone, 'password' => $request->password, 'status' => 1, 'type' => 'member']);
        if (!$check) {
            return resFail('password_incorrect');
        }
        return response()->json([
            'message' => true,
            'error' => false,
        ], 200);
    }
    public function logOut(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ], [
            'token.required' => 'token_required',
        ]);

        if ($validator->fails()) {
            return resFail($validator->errors());
        }
        try {
            $AuthUser = $request->user();
            FcmToken::where('user_id', $AuthUser->id)->where('token', $request->token)->delete();
            $AuthUser->token()->revoke();
            return response()->json([
                'message' => true,
                'status' => 'logout_success',
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message' => false,
                'status' => 'logout_failed',
            ], $error);
        }
    }
}
