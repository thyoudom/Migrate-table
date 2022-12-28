@extends('admin::shared.layout')
@section('layout')
    <div class="form-admin">
        <div aclass="form-bg"></div>
        <form action="{{ route('admin-type.update',$data->id) }}" class="form-wrapper" method="post" enctype="multipart/form-data">
        <div class="form-header">
                <h3>
                    <i data-feather="arrow-left" s-click-link="{!! route('admin-type.index') !!}"></i>
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
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$data->name) }}">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3 form-row">
                        <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status',$data->status) }}">
                            <option value="1 " {!! $data->status == 1 ? 'selected' : '' !!}>@lang('active')</option>
                            <option value="2 " {!! $data->status == 2 ? 'selected' : '' !!}>@lang('user.form.status.disable')</option>
                            </select>
                        @error('status')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror      
                    </div>
                
                </div>
                <div class="form-button">
                    <button type="submit" color="primary">
                        <i data-feather="save"></i>
                        <span>@lang('type.form.button.submit')</span>
                    </button>
                    <button color="danger" type="button" s-click-link="{!! route('admin-type.index') !!}">
                        <i data-feather="x"></i>
                        <span>@lang('type.form.button.cancel')</span>
                    </button>
                </div>
            </div>

        </form>
    </div>
    @include('admin::file-manager.popup')
@stop


