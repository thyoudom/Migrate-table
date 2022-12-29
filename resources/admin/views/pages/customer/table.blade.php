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
                @foreach($data as $index => $item)
                    <div class="column">
                        <div class="row table-row-5">
                        <span>{!! $data->currentPage() * $data->perPage() - $data->perPage() + ($index + 1) !!}</span>
                        </div>
                        <div class="row table-row-15 text left bold">
                            <span><td>{{$item['company_name_en']}}</td></span>
                        </div>
                        <div class="row table-row-15 text left bold">
                            <span><td>{{$item['company_name_kh']}}</td></span>
                        </div>
                        <div class="row table-row-10 ">
                            <span><td>{{$item['vat_tin']}}</td></span>
                        </div>
                        <div class="row table-row-15">
                            <span><td>{{$item['phone']}}</td></span>
                        </div>
                        <div class="row table-row-15">
                            <span><td>{{$item['email']}}</td></span>
                        </div>
                        <div class="row table-row-10">
                            <span><td>{{$item['gender']}}</td></span>
                        </div>
                        
                        <div class="row table-row-10">
                            @canany(['user-update', 'user-delete'])
                                <div class="dropdown">
                                    <i data-feather="more-vertical" class="action-btn" id="dropdownMenuButton"
                                        data-mdb-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @can('user-update')
                                            <li>
                                                <a class="dropdown-item" s-click-link="{!! route('admin-customer.edit', $item->id) !!}">
                                                    <i data-feather="edit"></i>

                                                    <span>@lang('table.option.edit')</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" s-click-link="{!! route('admin-customer.destroy', $item->id) !!}">
                                                    <i data-feather="delete"></i>
                                                    <span>@lang('table.option.delete')</span>
                                                </a>
                                            </li>
                                            @if ($item->status == 2)
                                                <span>Active</span>
                                                    <li>
                                                        <a class="dropdown-item enable-btn" onclick="$onConfirmMessage(
                                                                    '{!! route('admin-customer.status', ['id' => $item->id, 'status' => 1]) !!}',
                                                                    '@lang('dialog.msg.enable', ['name' => $item->name])',
                                                                    {
                                                                        confirm: '@lang('dialog.button.enable')',
                                                                        cancel: '@lang('dialog.button.cancel')'
                                                                    },
                                                                );">
                                                            <i data-feather="rotate-ccw"></i>
                                                            <span>@lang('table.option.enable')</span>
                                                        </a>
                                                    </li>
                                                    
                                                @else
                                                    <li>
                                                        <a class="dropdown-item disable-btn" onclick="$onConfirmMessage(
                                                                    '{!! route('admin-customer.status', ['id' => $item->id, 'status' => 2]) !!}',
                                                                    '@lang('dialog.msg.disable', ['name' => $item->name])',
                                                                    {
                                                                        confirm: '@lang('dialog.button.disable')',
                                                                        cancel: '@lang('dialog.button.cancel')'
                                                                    }
                                                                );">
                                                            <i data-feather="x-circle"></i>
                                                            <span>@lang('table.option.disable')</span>
                                                        </a>
                                                    </li>
                                            @endif
                                        @endcan
                                    </ul>
                                </div>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="table-footer">
                @include('admin::components.pagination', ['paginate' => $data])
            </div>
        </div>
    @else
    @component('admin::components.empty', [
            'name' => __('Empty'),
            'msg' => __(''),
            'permission' => 'customer-create',
            'url' => route('admin-customer.create'),
            'button' => __('Create'),
            ])
        @endcomponent
    @endif
</div>
