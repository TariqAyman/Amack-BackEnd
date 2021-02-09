@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('content')
    <!-- start table -->
    <section id="multilingual-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Countries</h4>
                        <div class="dt-action-buttons text-right">
                            <div class="dt-buttons flex-wrap d-inline-flex">
                                <div class="">
                                    <button class="btn buttons-collection dropdown-toggle btn-outline-secondary mr-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-share font-small-4 mr-50">
                                                <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                <polyline points="16 6 12 2 8 6"></polyline>
                                                <line x1="12" y1="2" x2="12" y2="15"></line>
                                            </svg>
                                            Export
                                        </span>
                                    </button>
                                </div>
                                @if(Auth::user()->can('roles.create'))
                                    <a class="btn create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" href="{{ route('role.create')}}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-plus mr-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add New Role
                                    </span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable">
                        <table id="datatable" class="datatables-basic table ">
                            <thead>
                            <tr>
                                <th class="min-width-100">@lang('app.name')</th>
                                <th class="min-width-150">@lang('app.users_with_this_role')</th>
                                <th class="text-center">@lang('app.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($roles->count() > 0)
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->users->count() }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('role.edit', $role->id) }}" class="item-edit" title="@lang('app.edit_role')" data-toggle="tooltip" data-placement="top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit font-medium-4">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                            </a>
                                            @if(!($roles->count() == 1))
                                                <button class="btn btn-sm btn-danger item-delete ml-lg-1" id="deleteButton"
                                                        data-id="{{ $role->id }}"
                                                        title="@lang('app.delete_role')"
                                                        data-toggle="tooltip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-x-circle font-medium-4">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                                    </svg>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end table -->
@stop

