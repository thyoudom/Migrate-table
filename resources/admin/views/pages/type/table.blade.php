<div class="table">
    @if ($type->count() > 0)
        <div class="table-wrapper">
            <div class="table-header">
                <div class="row table-row-5">
                    <span>@lang('table.field.no')</span>
                </div>
                <div class="row table-row-30 text-left">
                    <span>@lang('table.field.name')</span>
                </div>
                <div class="row table-row-30 ">
                    <span>@lang('table.field.status')</span>
                </div>
                <div class="row table-row-25">
                    <span>@lang('table.field.action')</span>
                </div>
                
                
            </div>
            <div class="table-body">
            @foreach ($type as $index => $item)
                    <div class="column">
                        <div class="row table-row-5">
                        
                        <span>{!! $type->currentPage() * $type->perPage() - $type->perPage() + ($index + 1) !!}</span>
                        </div>
                        <div class="row table-row-30 text left bold">
                            <span><td>{{$item['name']}}</td></span>
                        </div>
                        <div class="row table-row-30">
                            @if ($item->status == 1)
                                <span class="bold">Active</span>
                                @else
                                <span class="bold">Desable</span>                
                            @endif
                        </div>
                        <div class="row table-row-25">
                        @canany(['type-update', 'type-delete'])
                                <div class="dropdown">
                                    <i data-feather="more-vertical" class="action-btn" id="dropdownMenuButton"
                                        data-mdb-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @can('type-update')
                                            <li>
                                                <a class="dropdown-item" s-click-link="{!! route('admin-type.edit', $item->id) !!}">
                                                    <i data-feather="edit"></i>

                                                    <span>@lang('table.option.edit')</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" s-click-link="{!! route('admin-type.destroy', $item->id) !!}">
                                                    <i data-feather="delete"></i>
                                                    <span>@lang('table.option.delete')</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            @endcan
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="table-footer">
                @include('admin::components.pagination', ['paginate' => $type])
            </div>
        </div>
    @else
      
    @endif
</div>
