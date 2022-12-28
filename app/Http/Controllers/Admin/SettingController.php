<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
class SettingController extends Controller
{
    public function index() {

        $setting = Setting::orderBy('id','DESC')->paginate(50);

        return view('admin::pages.setting.Index',['setting' => $setting]);
    }
    public function create() {
        return view('admin::pages.setting.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'company_name_kh' => 'required',
            'company_name_en' => 'required',
            'address_kh' => 'required',
            'address_en' => 'required',
            'phone' => 'required'
        ]);

        if ( $validator->passes() ) {
            $setting = Setting::create($request->post());
            return redirect()->route('admin-setting.index')->with('success','successfully.');
        } else {
            // return with errrors
            return redirect()->route('admin-setting.create')->withErrors($validator)->withInput();
        }
    }
    public function edit(Setting $setting) {
        return view('admin::pages.setting.edit',['setting' => $setting]);
    }

    public function update(Setting $setting, Request $request) {

        $validator = Validator::make($request->all(),[
            'company_name_kh' => 'required',
            'company_name_en' => 'required',
            'address_kh' => 'required',
            'address_en' => 'required',
            'phone' => 'required'
        ]);

        if ( $validator->passes() ) {
            // Save data here
            $setting->fill($request->post())->save();
            return redirect()->route('admin-setting.index')->with('success','Update successfully.');
        } else {
            // return with errrors
            return redirect()->route('admin-setting.create')->withErrors($validator)->withInput();
        }
    }
    
    public function destroy($id) {
        $setting = Setting::find($id);
        $setting->delete();        
        return redirect()->route('admin-setting.index')->with('success','deleted successfully.');
    }
    
}
