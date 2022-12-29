<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index(Request $req,$status) {
        
        
        if (!$req->id) {
            return redirect()->route('admin-service.index', 1);
        }
        $data['data'] = Service::where('status', 'like', '%' . $status . '%')->orderBy('id','DESC')->paginate(50);
        
        return view("admin::pages.service.Index", $data);
    }
    public function create() {
        return view('admin::pages.service.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'service_name' => 'required',
            'service_description' => 'required',
        ]);

        if ( $validator->passes() ) {

            $data = Service::create($request->post());
            return redirect()->route('admin-service.index', 1)->with('success','Added successfully.');


        } else {
            // return with errrors
            return redirect()->route('admin-service.create')->withErrors($validator)->withInput();
        }
    }
    public function onUpdateStatus(Request $req)
    {
        $status = true;
        $item = [
            "status" => $req->status,
        ];
        try {
            $status = $req->status == 2 ? "Disable successful!" : "Enable successful!";
            Service::where("id", $req->id)->update($item);
            Session::flash("success",$status);
        } catch (Exception $error) {
            Session::flash('warning', 'Create unsuccess!');
        }
        return redirect()->back();
    }
    public function edit(Service $data) {
           
        return view('admin::pages.service.edit',['data' => $data]);
    }

    public function update(Service $data, Request $request) {

        $validator = Validator::make($request->all(),[
            'service_name' => 'required',
            'service_description' => 'required',
        ]);

        if ( $validator->passes() ) {
            // Save data here
            $data->fill($request->post())->save();
            return redirect()->route('admin-service.index',1)->with('success','Update successfully.');
        } else {
            // return with errrors
            return redirect()->route('admin-create')->withErrors($validator)->withInput();
        }
    }
    public function destroy($id) {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('admin-service.index', 1)->with('success','deleted successfully.');
    }
}
