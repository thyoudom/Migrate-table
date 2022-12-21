@extends('admin::shared.layout')
@section('layout')
    <div class="dashboard-admin">
        <div class="dashboard-bg"></div>
        <div class="dashboard-wrapper">
            <div class="dashboard-body">
                <div class="filter">
                    <h3>
                        @lang('dashboard.dashboard')
                    </h3>
                    {{-- <form id="FilterForm" action="{!! url()->current() !!}" method="GET">
                        <div class="form-row">
                            <input type="text" id="fromDate" name="from_date" value="{!! request('from_date') !!}"
                                placeholder="@lang('dashboard.filter.from_date')" autocomplete="off">
                            <i data-feather="calendar"></i>
                        </div>
                        <div class="form-row">
                            <input type="text" id="toDate" name="to_date" value="{!! request('to_date') !!}"
                                placeholder="@lang('dashboard.filter.to_date')" autocomplete="off">
                            <i data-feather="calendar"></i>
                        </div>
                        <button mat-flat-button type="submit" class="btn-create bg-success">
                            <i data-feather="search"></i>
                        </button>
                        <button type="button" s-click-link="{!! url()->current() !!}">
                            <i data-feather="refresh-ccw"></i>
                        </button>
                    </form> --}}
                </div>
                <div class="dashboard-list">
                    <div class="dashboard-row">
                        <div class="item bg-all-booking" s-click-link="">
                            <div class="item-body">
                                <div class="left">
                                    <span>All Booking</span>
                                    <h3> 0</h3>
                                </div>
                                <div class="right">
                                    <i data-feather="calendar"></i>
                                </div>
                            </div>
                            <div class="item-footer">
                                <span>Detail</span>
                                <i data-feather="arrow-right"></i>
                            </div>
                        </div>

                        <div class="item bg-pending-booking" s-click-link="">
                            <div class="item-body">
                                <div class="left">
                                    <span>Pending Booking</span>
                                    <h3> 0</h3>
                                </div>
                                <div class="right">
                                    <i data-feather="calendar"></i>
                                </div>
                            </div>
                            <div class="item-footer">
                                <span>Detail</span>
                                <i data-feather="arrow-right"></i>
                            </div>
                        </div>
                        <div class="item bg-completed-booking" s-click-link="">
                            <div class="item-body">
                                <div class="left">
                                    <span>Completed Booking</span>
                                    <h3> 0</h3>
                                </div>
                                <div class="right">
                                    <i data-feather="calendar"></i>
                                </div>
                            </div>
                            <div class="item-footer">
                                <span>Detail</span>
                                <i data-feather="arrow-right"></i>
                            </div>
                        </div>

                        <div class="item bg-cancel-booking" s-click-link="">
                            <div class="item-body">
                                <div class="left">
                                    <span>Cancel Booking</span>
                                    <h3> 0</h3>
                                </div>
                                <div class="right">
                                    <i data-feather="calendar"></i>
                                </div>
                            </div>
                            <div class="item-footer">
                                <span>Detail</span>
                                <i data-feather="arrow-right"></i>
                            </div>
                        </div>

                        <div class="item bg-customer" s-click-link="">
                            <div class="item-body">
                                <div class="left">
                                    <span>Customers</span>
                                    <h3> 0</h3>
                                </div>
                                <div class="right">
                                    <i data-feather="users"></i>
                                </div>
                            </div>
                            <div class="item-footer">
                                <span>Detail</span>
                                <i data-feather="arrow-right"></i>
                            </div>
                        </div>

                        <div class="item bg-shop" s-click-link="">
                            <div class="item-body">
                                <div class="left">
                                    <span>Shops</span>
                                    <h3> 0</h3>
                                </div>
                                <div class="right">
                                    <i data-feather="square"></i>
                                </div>
                            </div>
                            <div class="item-footer">
                                <span>Detail</span>
                                <i data-feather="arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-footer"></div>
            </div>
        </div>
    @stop
    @section('script')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(document).ready(function() {
                $("#fromDate,#toDate").datepicker({
                    changeYear: true,
                    gotoCurrent: true,
                    yearRange: "-1:+1",
                    dateFormat: "yy-mm-dd",
                });
                @if (!request('from_date') && !request('to_date'))
                    $("#toDate").datepicker('setDate', 'today');
                    $("#toDate").datepicker("option", "minDate", new Date());
                @endif
                $("#fromDate").change(function() {
                    let str = $(this).val();
                    $("#toDate").datepicker("option", "minDate", new Date(str));
                });
            });
        </script>
    @endsection
