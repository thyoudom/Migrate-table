<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class CustomerController extends Controller
{
    public function index(Request $req,$status) {
        
        
        if (!$req->id) {
            return redirect()->route('admin-customer.index', 1);
        }
        $data['data'] = Customer::where('status', 'like', '%' . $status . '%')->paginate(50);
        
        return view("admin::pages.customer.customer", $data);
    }
    public function create() {
        return view('admin::pages.customer.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'company_name_en' => 'required',
            'company_name_kh' => 'required',
            'address_en' => 'required',
            'addess_kh' => 'required',
            'phone' => 'required',
            'vat_tin' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'status' => 'required'
        ]);

        if ( $validator->passes() ) {

            $customer = Customer::create($request->post());
            return redirect()->route('admin-customer.index',1)->with('success','Customer added successfully.');
        } else {
            // return with errrors
            return redirect()->route('admin-customer.create')->withErrors($validator)->withInput();
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
            Customer::where("id", $req->id)->update($item);
            Session::flash("success",$status);
        } catch (Exception $error) {
            Session::flash('warning', 'Create unsuccess!');
        }
        return redirect()->back();
    }
    public function edit(Customer $data) {
           
        return view('admin::pages.customer.edit',['data' => $data]);
    }

    public function update(Customer $data, Request $request) {

        $validator = Validator::make($request->all(),[
            'company_name_en' => 'required',
            'company_name_kh' => 'required',
            'address_en' => 'required',
            'addess_kh' => 'required',
            'phone' => 'required',
            'vat_tin' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'status' => 'required'
        ]);
        
        if ( $validator->passes() ) {
            // Save data here
            $data->fill($request->post())->save();
            return redirect()->route('admin-customer.index',1)->with('success','Update successfully.');
        } else {
            // return with errrors
            return redirect()->route('admin-customer.create')->withErrors($validator)->withInput();
        }
    }
    
    public function destroy($id) {
        $data = Customer::find($id);
        $data->delete();
        return redirect()->route('admin-customer.index', 1)->with('success','deleted successfully.');
    }
}
