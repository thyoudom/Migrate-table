@extends('admin::shared.layout')
@section('layout')
    <div class="form-admin">
        <div aclass="form-bg"></div>
        <form action="{{ route('admin-setting.update',$setting->id) }}" class="form-wrapper" method="post" enctype="multipart/form-data">
        <div class="form-header">
                <h3>
                    <i data-feather="arrow-left" s-click-link="{!! route('admin-setting.index') !!}"></i>
                    Back to Type
                    <!-- {!! request('id') ? __('Customer.form.title.update', ['name' => __('Customer.name')]) : __('Customer.form.title.create', ['name' => __('Customer.name')]) !!} -->
                </h3>
            </div>
        @csrf
            @method('put')
            <div class="form-body">
            <div class="row-2">
                    <div class="form-row">
                        <label for="name" class="form-label">Conpany Name EN <span>*</span></label></label>
                        <input type="text" name="company_name_kh" id="company_name_kh" placeholder="Enter Conpany Name Khmer" class="form-control @error('company_name_kh') is-invalid @enderror" value="{{ old('company_name_kh',$setting->company_name_kh) }}">
                        @error('company_name_kh')
                            <span class="error">@lang("message.".$message)</span>  
                        @enderror 
                    </div>
                    <div class="form-row">
                        <label for="name" class="form-label">Conpany Name EN <span>*</span></label></label>
                        <input type="text" name="company_name_en" id="company_name_en" placeholder="Enter Conpany Name EN" class="form-control @error('company_name_en') is-invalid @enderror" value="{{ old('company_name_en',$setting->company_name_en) }}">
                        @error('company_name_en')
                            <span class="error">@lang("message.".$message)</span>  
                        @enderror 
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label for="name" class="form-label">Address Kh <span>*</span></label></label>
                        <input type="text" name="address_kh" id="address_kh" placeholder="Enter Address Khmer" class="form-control @error('address_kh') is-invalid @enderror" value="{{ old('address_kh',$setting->address_kh) }}">
                        @error('address_kh')
                            <span class="error">@lang("message.".$message)</span>  
                        @enderror 
                    </div>
                    <div class="form-row">
                        <label for="name" class="form-label">Address EN <span>*</span></label></label>
                        <input type="text" name="address_en" id="address_en" placeholder="Enter Address EN" class="form-control @error('address_en') is-invalid @enderror" value="{{ old('address_en',$setting->address_en) }}">
                        @error('address_en')
                            <span class="error">@lang("message.".$message)</span>  
                        @enderror 
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label for="name" class="form-label">Phone Number <span>*</span></label></label>
                        <input type="text" name="phone" id="phone" placeholder="Enter Phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$setting->phone) }}">
                        @error('phone')
                            <span class="error">@lang("message.".$message)</span>  
                        @enderror 
                    </div>
                    
                    <div class="form-button" style="border:1px 0 0 1px;">
                        <button type="submit" color="primary">
                            <i data-feather="save"></i>
                            <span>@lang('user.form.button.submit')</span>
                        </button>
                        <button color="danger" type="button" s-click-link="{!! route('admin-setting.index') !!}">
                            <i data-feather="x"></i>
                            <span>@lang('user.form.button.cancel')</span>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @include('admin::file-manager.popup')
@stop


