@extends('admin::shared.layout')
@section('layout')
    <div class="form-admin">
        <div aclass="form-bg"></div>
        <form action="{{ route('admin-project.update',$data->id) }}" class="form-wrapper" method="post" enctype="multipart/form-data">
        <div class="form-header">
                <h3>
                    <i data-feather="arrow-left" s-click-link="{!! route('admin-project.index',1) !!}"></i>
                    Back To Project
                    <!-- {!! request('id') ? __('Customer.form.title.update', ['name' => __('Customer.name')]) : __('Customer.form.title.create', ['name' => __('Customer.name')]) !!} -->
                </h3>
            </div>
        @csrf
            @method('put')
            <div class="form-body">
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Name')<span>* </span> </label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$data->name) }}">
                        @error('name')
                            <span class="error">{{ $message }}</span>    
                        @enderror 
                        
                    </div>
                    <div class="form-row">
                        <label>@lang('Vat-Tin')<span>* </span> </label>
                        <input name="vat_tin" placeholder="Enter Vat-Tin" type="text" value="{{ old('vat_tin',$data->vat_tin) }}">
                        @error('vat_tin')
                            <span class="error">@lang("message.".$message)</span>
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Phone')<span>*</span> </label>
                        <input type="text" name="phone" id="phone" placeholder="+855*******" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$data->phone) }}">
                        
                    </div>
                    <div class="form-row">
                        <label>@lang('customer.form.status.label')<span>*</span></label>
                        <select name="status">
                            <option value="1 " {!! $data->status == 1 ? 'selected' : '' !!}>@lang('active')</option>
                            <option value="2 " {!! $data->status == 2 ? 'selected' : '' !!}>@lang('user.form.status.disable')</option>
                        </select>
                    </div>

                </div>
                
                <div class="form-button">
                    <button type="submit" color="primary">
                        <i data-feather="save"></i>
                        <span>@lang('user.form.button.update')</span>
                    </button>
                    <button color="danger" type="button" s-click-link="{!! route('admin-project.index', 1) !!}">
                        <i data-feather="x"></i>
                        <span>@lang('project.form.button.cancel')</span>
                    </button>
                </div>
            </div>
            </div>
        </form>
    </div>
    @include('admin::file-manager.popup')
@stop


