<div class="table">
    @if ($setting->count() > 0)
        <div class="table-wrapper">
            <div class="table-header" style="background-color: gainsboro">
                <div class="row table-row-5">
                    <span>@lang('table.field.no')</span>
                </div>
                <div class="row table-row-15 text-left">
                    <span>Company Name in EN</span>
                </div>
                <div class="row table-row-15 text-left">
                    <span>Company Name in KH</span>
                </div>
                <div class="row table-row-25 ">
                    <span>Address In KH</span>
                </div>
                <div class="row table-row-22 ">
                    <span>Address In En</span>
                </div>
                <div class="row table-row-10 ">
                    <span>@lang('table.field.phone')</span>
                </div>
                <div class="row table-row-10">
                    <span>@lang('table.field.action')</span>
                </div>
                
            </div>
            <div class="table-body">
                @foreach ($setting as $item)
                    <div class="column">
                        <div class="row table-row-5">
                        
                        <span><td>{{$item['id']}}</td></span>
                        </div>
                        <div class="row table-row-15 text left bold">
                            <span><td>{{$item['company_name_kh']}}</td></span>
                        </div>
                        <div class="row table-row-15 text left">
                            <span><td>{{$item['company_name_en']}}</td></span>
                        </div>
                        <div class="row table-row-25 text-left">
                            <span><td>{{$item['address_kh']}}</td></span>
                        </div>
                        <div class="row table-row-25 text-left">
                            <span><td>{{$item['address_en']}}</td></span>
                        </div>
                        <div class="row table-row-10">
                            <span><td>{{$item['phone']}}</td></span>
                        </div>
                        <div class="row table-row-10">
                        @canany(['setting-update', 'setting-delete'])
                                <div class="dropdown">
                                    <i data-feather="more-vertical" class="action-btn" id="dropdownMenuButton"
                                        data-mdb-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @can('setting-update')
                                            <li>
                                                <a class="dropdown-item" s-click-link="{!! route('admin-setting.edit', $item->id) !!}">
                                                    <i data-feather="edit"></i>

                                                    <span>@lang('table.option.edit')</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" s-click-link="{!! route('admin-setting.destroy', $item->id) !!}">
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
