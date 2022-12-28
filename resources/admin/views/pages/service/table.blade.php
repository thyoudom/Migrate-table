<div class="table">
    @if ($data->count() > 0)
        <div class="table-wrapper">
            <div class="table-header">
                <div class="row table-row-5">
                    <span>@lang('table.field.no')</span>
                </div>
                <div class="row table-row-30 text-left">
                    <span>Service Name</span>
                </div>
                <div class="row table-row-50">
                    <span>@lang('Description')</span>
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
                        <div class="row table-row-30 text left bold">
                            <span><td>{{$item['service_name']}}</td></span>
                        </div>
                        <div class="row table-row-50 bold">
                            <span><td>{{$item['service_description']}}</td></span>
                        </div>
                        <div class="row table-row-10">
                            @canany(['user-update', 'user-delete'])
                                <div class="dropdown">
                                    <i data-feather="more-vertical" class="action-btn" id="dropdownMenuButton"
                                        data-mdb-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @can('user-update')
                                            <!-- <li>
                                                <a class="dropdown-item" s-click-link="{!! route('admin-service.edit', $item->id) !!}">
                                                    <i data-feather="edit"></i>

                                                    <span>@lang('table.option.edit')</span>
                                                </a>
                                            </li> -->
                                           
                                            @if ($item->status == 2)
                                                    <li>
                                                        <a class="dropdown-item enable-btn" onclick="$onConfirmMessage(
                                                                    '{!! route('admin-service.status', ['id' => $item->id, 'status' => 1]) !!}',
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
                                                                    '{!! route('admin-service.status', ['id' => $item->id, 'status' => 2]) !!}',
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
                
            </div>
        </div>
    @else
    
    @endif
</div>
