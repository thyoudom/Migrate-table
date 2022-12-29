@extends('admin::shared.layout')
@section('layout')
    <div class="form-admin">
        <div aclass="form-bg"></div>
        <form action="{{ route('admin-project.store') }}" class="form-wrapper"  method="POST" enctype="multipart/form-data">
            <div class="form-header">
                <h3>
                    <i data-feather="arrow-left" s-click-link="{!! route('admin-project.index',1) !!}"></i>
                    Back to Project
                    <!-- {!! request('id') ? __('Customer.form.title.update', ['name' => __('Customer.name')]) : __('Customer.form.title.create', ['name' => __('Customer.name')]) !!} -->
                </h3>
            </div>
            {{ csrf_field() }}
            <div class="form-body">
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Name')<span>* </span> </label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="">
                        @error('name')
                            <span class="error">{{ $message }}</span>    
                        @enderror 
                        
                    </div>
                    <div class="form-row">
                        <label>@lang('Vat-Tin')<span>* </span> </label>
                        <input name="vat_tin" placeholder="Enter Vat-Tin" type="text"
                            value="">
                        @error('vat_tin')
                            <span class="error">@lang("message.".$message)</span>
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Phone')<span>*</span> </label>
                        <input type="text" name="phone" id="phone" placeholder="+855*******" class="form-control @error('phone') is-invalid @enderror" value="">
                        
                    </div>
                    <div class="form-row">
                        <label>@lang('customer.form.status.label')<span>*</span></label>
                        <select name="status" id="status">
                            <option value="1" >Active</option>
                            <option value="0" >Disable</option>
                        </select>
                    </div>

                </div>
                
                <div class="form-button">
                    <button type="submit" color="primary">
                        <i data-feather="save"></i>
                        <span>@lang('user.form.button.submit')</span>
                    </button>
                    <button color="danger" type="button" s-click-link="{!! route('admin-project.index', 1) !!}">
                        <i data-feather="x"></i>
                        <span>@lang('user.form.button.cancel')</span>
                    </button>
                </div>
            </div>
            <div class="form-footer"></div>
        </form>
    </div>
    @include('admin::file-manager.popup')
@stop
