@extends('admin::shared.layout')
@section('layout')
    <div class="form-admin">
        <div aclass="form-bg"></div>
        <form action="{{ route('admin-service.update',$data->id) }}" class="form-wrapper" method="post" enctype="multipart/form-data">
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
                    <div class="mb-3 form-row">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="service_name" id="service_name" placeholder="Enter service_name" class="form-control @error('service_name') is-invalid @enderror" value="{{ old('service_name',$data->service_name) }}">
                        @error('service_name')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    <div class="mb-3 form-row">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="service_description" id="service_description" placeholder="Enter service_description" class="form-control @error('service_description') is-invalid @enderror" value="{{ old('service_description',$data->service_description) }}">
                        @error('service_name')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                </div>
                <div class="row-2">
                    <div class="form-row">
                        <label>@lang('user.form.status.label')<span>*</span></label>
                        <select name="status">
                            <option value="1 " {!! $data->status == 1 ? 'selected' : '' !!}>@lang('active')</option>
                            <option value="2 " {!! $data->status == 2 ? 'selected' : '' !!}>@lang('user.form.status.disable')</option>
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
        </form>
    </div>
    @include('admin::file-manager.popup')
@stop


