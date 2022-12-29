@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper">
    <div class="header">
            @include('admin::shared.header', ['header_name' => __('customer.title')])
            <div class="header-tab">
                
            </div>
            <div class="header-tab">
                <div class="header-tab-wrapper">
                    <div class="menu-row">
                        <div class="menu-item {!! Request::is('admin/customer/1') ? 'active' : '' !!}" s-click-link="{!! route('admin-customer.index', 1) !!}">
                            @lang('customer.tab.active')</div>
                        <div class="menu-item {!! Request::is('admin/customer/2') ? 'active' : '' !!}" s-click-link="{!! route('admin-customer.index', 2) !!}">
                            @lang('customer.tab.disable')</div>
                    </div>
                </div>
                <div class="header-action-button">
                    <form class="filter" action="{!! url()->current() !!}" method="GET">
                        <div class="form-row">
                            <input type="text" name="keyword" placeholder="@lang('user.filter.search')"
                                value="{!! request('keyword') !!}">
                            <i data-feather="filter"></i>
                        </div>
                        <div class="form-row">
                            <select name="role">
                                <option value="">@lang('user.filter.role')</option>
                                @foreach (config('dummy.user.role') as $key => $role)
                                    @if ($key != 'super_admin')
                                        <option value="{{ $key }}"
                                            @if ($key == request('role')) selected @endif>
                                            {{ $role }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button mat-flat-button type="submit" class="btn-create bg-success">
                            <i data-feather="search"></i>
                            <span>@lang('user.button.search')</span>
                        </button>
                    </form>
                    @can('customer-create')
                        <button class="btn-create" s-click-link="{!! route('admin-customer.create') !!}">
                            <i data-feather="plus-circle"></i>
                            <span>@lang('customer.button.create')</span>
                        </button>
                    @endcan
                    <button s-click-link="{!! url()->current() !!}">
                        <i data-feather="refresh-ccw"></i>
                        <span>@lang('customer.button.reload')</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="content-body">
            @include('admin::pages.customer.table')
        </div>
    </div>
@stop
@section('script')
    <script>

    </script>
@stop