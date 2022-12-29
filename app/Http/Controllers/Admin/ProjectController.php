<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class ProjectController extends Controller
{
    public function index(Request $req,$status) {
        if (!$req->id) {
            return redirect()->route('admin-project.index', 1);
        }
        $data['data'] = Project::where('status', 'like', '%' . $status . '%')->orderBy('id','DESC')->paginate(50);
        
        return view("admin::pages.project.Index", $data);
    }
    public function create() {
        return view('admin::pages.project.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'vat_tin' => 'required',
            'phone' => 'required',
        ]);

        if ( $validator->passes() ) {

            $data = Project::create($request->post());
            return redirect()->route('admin-project.index', 1)->with('success','Added successfully.');


        } else {
            // return with errrors
            return redirect()->route('admin-project.create')->withErrors($validator)->withInput();
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
            Project::where("id", $req->id)->update($item);
            Session::flash("success",$status);
        } catch (Exception $error) {
            Session::flash('warning', 'Create unsuccess!');
        }
        return redirect()->back();
    }
    public function edit(Project $data) {
           
        return view('admin::pages.project.edit',['data' => $data]);
    }
    public function update(Project $data, Request $request) {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'vat_tin' => 'required',
            'phone' => 'required',
        ]);
        
        if ( $validator->passes() ) {
            // Save data here
            $data->fill($request->post())->save();
            return redirect()->route('admin-project.index',1)->with('success','Update successfully.');
        } else {
            // return with errrors
            return redirect()->route('admin-project.create')->withErrors($validator)->withInput();
        }
    }
    
    public function destroy($id) {
        $data = Project::find($id);
        $data->delete();
        return redirect()->route('admin-project.index', 1)->with('success','deleted successfully.');
    }
}
