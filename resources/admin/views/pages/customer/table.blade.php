<div class="table">
    @if ($data->count() > 0)
        <div class="table-wrapper">
            <div class="table-header">
                <div class="row table-row-5">
                    <span>@lang('table.field.no')</span>
                </div>
                <div class="row table-row-15 text-left">
                    <span>Name in EN</span>
                </div>
                <div class="row table-row-15 text-left">
                    <span>Name in KH</span>
                </div>
                <div class="row table-row-10">
                    <span>Vit-In</span>
                </div>
                <div class="row table-row-15">
                    <span>@lang('table.field.phone')</span>
                </div>
                <div class="row table-row-15">
                    <span>@lang('table.field.email')</span>
                </div>
                <div class="row table-row-10">
                    <span>@lang('table.field.gender')</span>
                </div>
                <div class="row table-row-10">
                    <span>@lang('table.field.action')</span>
                </div>
                
            </div>
            <div class="table-body">
                @foreach($data as $row)
                    <div class="column">
                        <div class="row table-row-5">
                        
                        <span><td>{{$row['id']}}</td></span>
                        </div>
                        <div class="row table-row-15 text left bold">
                            <span><td>{{$row['company_name_en']}}</td></span>
                        </div>
                        <div class="row table-row-15 text left bold">
                            <span><td>{{$row['company_name_kh']}}</td></span>
                        </div>
                        <div class="row table-row-10 ">
                            <span><td>{{$row['vat_tin']}}</td></span>
                        </div>
                        <div class="row table-row-15">
                            <span><td>{{$row['phone']}}</td></span>
                        </div>
                        <div class="row table-row-15">
                            <span><td>{{$row['email']}}</td></span>
                        </div>
                        <div class="row table-row-10">
                            <span><td>{{$row['gender']}}</td></span>
                        </div>
                        
                        <div class="row table-row-10">
                        @canany(['user-update', 'user-delete'])
                                <div class="dropdown">
                                    <i data-feather="more-horizontal" class="action-btn" id="dropdownMenuButton"
                                        data-mdb-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        
                                    </ul>
                                </div>
                            @endcan
                        </div>
                    </div>
                @endforeach
                
                
            </div>
            <div class="table-footer">
                
            </div>
        </div>
    @else
        <!-- @component('admin::components.empty', [
            'name' => __('user.empty.title'),
            'msg' => __('user.empty.description'),
            'permission' => 'user-create',
            'url' => route('admin-user-create'),
            'button' => __('user.button.create'),
            ])
        @endcomponent -->
    @endif
</div>
