@extends('admin::shared.layout')
@section('layout')
    <div class="form-admin">
        <div aclass="form-bg"></div>
        <form action="{{ route('admin-customer.update',$data->id) }}" class="form-wrapper" method="post" enctype="multipart/form-data">
        <div class="form-header">
                <h3>
                    <i data-feather="arrow-left" s-click-link="{!! route('admin-service.index',1) !!}"></i>
                    Back to Type
                    <!-- {!! request('id') ? __('Customer.form.title.update', ['name' => __('Customer.name')]) : __('Customer.form.title.create', ['name' => __('Customer.name')]) !!} -->
                </h3>
            </div>
        @csrf
            @method('put')
            <div class="form-body">
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Company name')<span>* EN</span> </label>
                        <input type="text" name="company_name_en" id="company_name_en" placeholder="Enter Companyname EN" class="form-control @error('company_name_en') is-invalid @enderror" value="{{ old('company_name_en',$data->company_name_en) }}">
                        @error('company_name_en')
                            <span class="error">{{ $message }}</span>    
                        @enderror 
                        
                    </div>
                    <div class="form-row">
                        <label>@lang('Company name')<span>* KH</span> </label>
                        <input name="company_name_kh" placeholder="Enter Company name Kh" type="text" class="form-control @error('company_name_kh') is-invalid @enderror" value="{{ old('company_name_kh',$data->company_name_kh) }}">
                        @error('company_name_en')
                            <span class="error">@lang("message.".$message)</span>
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Vat-Tin')<span>*</span> </label>
                        <input type="text" name="vat_tin" id="vat_tin" placeholder="Enter Vat-Tin" class="form-control @error('vat_tin') is-invalid @enderror" value="{{ old('vat_tin',$data->vat_tin) }}">
                        
                    </div>
                    <div class="form-row">
                        <label>@lang('Phone')<span>* </span> </label>
                        <input type="text" name="phone" id="phone" placeholder="Enter Phone " class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$data->phone) }}">
                        @error('phone')
                        <span class="error">@lang("message.".$message)</span>   
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Address')<span>* EN</span> </label>
                        <input type="text" name="address_en" id="address_en" placeholder="Enter Address EN " class="form-control @error('address_en') is-invalid @enderror" value="{{ old('address_en',$data->address_en) }}">
                        @error('address_en')
                        <span class="error">@lang("message.".$message)</span>   
                        @enderror
                    </div>
                    <div class="form-row">
                        <label>@lang('Address')<span>* KH</span> </label>
                        <input type="text" name="addess_kh" id="addess_kh" placeholder="Enter Addess KH " class="form-control @error('addess_kh') is-invalid @enderror" value="{{ old('addess_kh',$data->addess_kh) }}">
                        @error('addess_kh')
                        <span class="error">@lang("message.".$message)</span>    
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Email')<span></span> </label>
                        <input type="text" name="email" id="email" placeholder="Enter Email " class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$data->email) }}">
                        @error('email')
                        <span class="error">@lang("message.".$message)</span>   
                        @enderror
                    </div>
                    <div class="form-row">
                        <label>@lang('customer.form.status.label')<span>*</span></label>
                        <select name="status">
                            <option value="1 " {!! $data->status == 1 ? 'selected' : '' !!}>@lang('active')</option>
                            <option value="2 " {!! $data->status == 2 ? 'selected' : '' !!}>@lang('user.form.status.disable')</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label>@lang('customer.form.gender.label')<span>*</span></label>
                        <select name="gender" id="gender">
                            <option value="Male"{!! $data->gender =="Male" ? 'selected' : '' !!}>Male</option>
                            <option value="Female"{!! $data->gender =="FeMale" ? 'selected' : '' !!}>FeMale</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-button">
                    <button type="submit" color="primary">
                        <i data-feather="save"></i>
                        <span>@lang('customer.form.button.update')</span>
                    </button>
                    <button color="danger" type="button" s-click-link="{!! route('admin-customer.index',1) !!}">
                        <i data-feather="x"></i>
                        <span>@lang('customer.form.button.cancel')</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @include('admin::file-manager.popup')
@stop


