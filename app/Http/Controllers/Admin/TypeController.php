<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class TypeController extends Controller
{
    public function index() {

        $type = Type::orderBy('id','DESC')->paginate(50);

        return view('admin::pages.type.type',['type' => $type]);
    }
    public function create() {
        return view('admin::pages.type.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {

            $type = Type::create($request->post());
            return redirect()->route('admin-type.index')->with('success','Type added successfully.');


        } else {
            // return with errrors
            return redirect()->route('admin-type.create')->withErrors($validator)->withInput();
        }
    }
    public function edit(Type $type) {   
        return view('admin::pages.type.edit',['data' => $type]);
    }

    public function update(Type $type, Request $request) {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {
            // Save data here
            $type->fill($request->post())->save();
            return redirect()->route('admin-type.index')->with('success','Update successfully.');
        } else {
            // return with errrors
            return redirect()->route('admin-type.create')->withErrors($validator)->withInput();
        }
    }
    public function onUpdateStatus(Request $req)
    {
        $status = true;
        $item = [
            "status" => $req->status,
        ];
        try {
            $status = $req->status == 1 ? "Disable successful!" : "Enable successful!";
            User::where("id", $req->id)->update($item);
            Session::flash("success", $status);
        } catch (Exception $error) {
            Session::flash('warning', 'Create unsuccess!');
        }
        return redirect()->back();
    }
    public function destroy($id) {
        $type = Type::find($id);
        $type->delete();        
        return redirect()->route('admin-type.index')->with('success','Type deleted successfully.');
    }
    
   
}
