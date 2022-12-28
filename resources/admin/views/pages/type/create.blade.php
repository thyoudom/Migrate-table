@extends('admin::shared.layout')
@section('layout')
<div class="form-admin">
        <div aclass="form-bg"></div>
        <form action="{{ route('admin-type.store') }}" class="form-wrapper"  method="POST" enctype="multipart/form-data">
            <div class="form-header">
                <h3>
                    <i data-feather="arrow-left" s-click-link="{!! route('admin-type.index') !!}"></i>
                    Back to Type
                    <!-- {!! request('id') ? __('Customer.form.title.update', ['name' => __('Customer.name')]) : __('Customer.form.title.create', ['name' => __('Customer.name')]) !!} -->
                </h3>
            </div>
            {{ csrf_field() }}
            <div class="form-body">
                <div class="row-2">
                    <div class="form-row">
                        <label for="name" class="form-label">Name <span>*</span></label></label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror 
                    </div>
                    <div class="form-row">
                        <label for="status" class="form-label">Status <span>*</span></label></label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="">
                            <option value="1" >Active</option>
                            <option value="0" >Disable</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-button">
                    <button type="submit" color="primary">
                        <i data-feather="save"></i>
                        <span>@lang('type.form.button.submit')</span>
                    </button>
                    <button color="danger" type="button" s-click-link="{!! route('admin-type.index') !!}">
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


