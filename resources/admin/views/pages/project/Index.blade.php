@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper">
    <div class="header">
            @include('admin::shared.header', ['header_name' => __('Project Page')])

            <div class="header-tab">
                <div class="header-tab-wrapper">
                    <div class="menu-row">
                        <div class="menu-item {!! Request::is('admin/project/1') ? 'active' : '' !!}" s-click-link="{!! route('admin-project.index', 1) !!}">
                            @lang('user.tab.active')</div>
                        <div class="menu-item {!! Request::is('admin/project/2') ? 'active' : '' !!}" s-click-link="{!! route('admin-project.index', 2) !!}">
                            @lang('user.tab.disable')</div>
                    </div>
                </div>
                <div class="header-action-button">
                    <form class="filter" action="{!! url()->current() !!}" method="GET">
                        <div class="form-row">
                            <input type="text" name="keyword" placeholder="@lang('user.filter.search')"
                                value="{!! request('keyword') !!}">
                            <i data-feather="filter"></i>
                        </div>
                        
                        <button mat-flat-button type="submit" class="btn-create bg-success">
                            <i data-feather="search"></i>
                            <span>@lang('user.button.search')</span>
                        </button>
                    </form>
                    @can('user-create')
                        <button class="btn-create" s-click-link="{!! route('admin-project.create') !!}">
                            <i data-feather="plus-circle"></i>
                            <span>@lang('user.button.create')</span>
                        </button>
                    @endcan
                    <button s-click-link="{!! url()->current() !!}">
                        <i data-feather="refresh-ccw"></i>
                        <span>@lang('user.button.reload')</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="content-body">
        @include('admin::pages.project.table')
        </div>
    </div>
@stop
@section('script')
    <script>

    </script>
@stop