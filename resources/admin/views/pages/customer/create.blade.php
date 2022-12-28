@extends('admin::shared.layout')
@section('layout')
    <div class="form-admin">
        <div aclass="form-bg"></div>
        <form action="{{ route('admin-customer.store') }}" class="form-wrapper"  method="POST" enctype="multipart/form-data">
            <div class="form-header">
                <h3>
                    <i data-feather="arrow-left" s-click-link="{!! route('admin-customer.index') !!}"></i>
                    Back to Customer
                    <!-- {!! request('id') ? __('Customer.form.title.update', ['name' => __('Customer.name')]) : __('Customer.form.title.create', ['name' => __('Customer.name')]) !!} -->
                </h3>
            </div>
            {{ csrf_field() }}
            <div class="form-body">
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Company name')<span>* EN</span> </label>
                        <input type="text" name="company_name_en" id="company_name_en" placeholder="Enter Companyname EN" class="form-control @error('company_name_en') is-invalid @enderror" value="">
                        @error('company_name_en')
                            <span class="error">{{ $message }}</span>    
                        @enderror 
                        
                    </div>
                    <div class="form-row">
                        <label>@lang('Company name')<span>* KH</span> </label>
                        <input name="company_name_kh" placeholder="Enter Company name Kh" type="text"
                            value="{!! request('id') ? $data->company_name_kh : old('company_name_kh') !!}">
                        @error('company_name_en')
                            <span class="error">@lang("message.".$message)</span>
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Vat-Tin')<span>*</span> </label>
                        <input type="text" name=">vat_tin" id=">vat_tin" placeholder="Enter Vat-Tin" class="form-control @error('vat_tin') is-invalid @enderror" value="">
                        @error('vat_tin')
                        <span class="error">@lang("message.".$message)</span>    
                        @enderror
                    </div>
                    <div class="form-row">
                        <label>@lang('Phone')<span>* </span> </label>
                        <input type="text" name="phone" id="phone" placeholder="Enter Phone " class="form-control @error('phone') is-invalid @enderror" value="">
                        @error('phone')
                        <span class="error">@lang("message.".$message)</span>   
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Address')<span>* EN</span> </label>
                        <input type="text" name="address_en" id="address_en" placeholder="Enter Address EN " class="form-control @error('address_en') is-invalid @enderror" value="">
                        @error('address_en')
                        <span class="error">@lang("message.".$message)</span>   
                        @enderror
                    </div>
                    <div class="form-row">
                        <label>@lang('Address')<span>* KH</span> </label>
                        <input type="text" name="addess_kh" id="addess_kh" placeholder="Enter Addess KH " class="form-control @error('addess_kh') is-invalid @enderror" value="">
                        @error('addess_kh')
                        <span class="error">@lang("message.".$message)</span>    
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Email')<span></span> </label>
                        <input type="text" name="email" id="email" placeholder="Enter Email " class="form-control @error('email') is-invalid @enderror" value="">
                        @error('email')
                        <span class="error">@lang("message.".$message)</span>   
                        @enderror
                    </div>
                    <div class="form-row">
                        <label>@lang('customer.form.status.label')<span>*</span></label>
                        <select name="status" id="status">
                            <option value="1" >Active</option>
                            <option value="0" >Disable</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label>@lang('customer.form.gender.label')<span>*</span></label>
                        <select name="gender" id="gender">
                            <option value="Male" >Male</option>
                            <option value="Female" >FeMale</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-button">
                    <button type="submit" color="primary">
                        <i data-feather="save"></i>
                        <span>@lang('customer.form.button.submit')</span>
                    </button>
                    <button color="danger" type="button" s-click-link="{!! route('admin-customer.index') !!}">
                        <i data-feather="x"></i>
                        <span>@lang('customer.form.button.cancel')</span>
                    </button>
                </div>
            </div>
            <div class="form-footer"></div>
        </form>
    </div>
    @include('admin::file-manager.popup')
@stop
<!-- 
<script>
    function submitData(){
        var req=new HttpRequest();
        req.open("Get","/save-data",true);
        req.onreadystatechange=function(){
            if(req.readyState=4 && req.status==200){
                
            }
        }
    }
</script> -->
