@extends('admin::shared.layout')
@section('layout')
    <div class="form-admin">
        <div aclass="form-bg"></div>
        <form id="form" class="form-wrapper" action="{!! route('admin-service.store', request('id')) !!}" method="POST" enctype="multipart/form-data">
            <div class="form-header">
                <h3>
                    <i data-feather="arrow-left" s-click-link="{!! route('admin-service.index', 1) !!}"></i>
                    {!! request('id') ? __('service.form.title.update', ['name' => __('service.name')]) : __('Go Back', ['service' => __('service.name')]) !!}
                </h3>
            </div>
            {{ csrf_field() }}
            <div class="form-body">
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Service Name')<span>*</span> </label>
                        <input type="text" name="service_name" value="{!! request('id') ? $data->service_name : old('service_name') !!}"
                            placeholder="@lang('service type')">
                    </div>
                    <div class="form-row">
                        <label>@lang('Service Description')</label>
                        <input name="service_description" placeholder="@lang('service description')" type="text"
                            value="{!! request('id') ? $data->service_description : old('service_description') !!}">
                        @error('phone')
                            <span class="error">@lang("message.".$message)</span>
                        @enderror
                    </div>
                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('Status')<span>*</span></label>
                        <select name="status">
                            <option value="1" {!! (request('id') && $data->status == 1) || old('status') == 1 ? 'selected' : '' !!}>@lang('user.form.status.active')</option>
                            <option value="2" {!! (request('id') && $data->status == 2) || old('status') == 2 ? 'selected' : '' !!}>@lang('user.form.status.disable')</option>
                        </select>
                    </div>
                
                    <div class="form-button">
                        <button type="submit" color="primary">
                            <i data-feather="save"></i>
                            <span>@lang('submit')</span>
                        </button>
                        <button color="danger" type="button" s-click-link="{!! route('admin-service.index', 1) !!}">
                            <i data-feather="x"></i>
                            <span>@lang('user.form.button.cancel')</span>
                        </button>
                    </div>
                </div>
                
            </div>
            <div class="form-footer"></div>
        </form>
    </div>
    @include('admin::file-manager.popup')
@stop


