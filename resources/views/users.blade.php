@extends('layouts.admin-home')
@section('content')



<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Toolbar-->
  <div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <h1 class="p-5">Users List</h1>
    <!--end::Container-->
  </div>
  <!--end::Toolbar-->

  
  <!--begin::Post-->
  <div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
      <!--begin::Card-->
      <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-0">
          <!--begin::Table-->
          <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
            <!--begin::Table head-->
            <thead>
              <!--begin::Table row-->
              <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="w-10px pe-2">
                  <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                  </div>
                </th>
                <th class="min-w-125px">User</th>
                <th class="min-w-125px">Role</th>
                <th class="min-w-125px">Created at</th>
                <th class="text-end min-w-100px">Actions</th>
              </tr>
              <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">
              @foreach ($users as $user)
              <!--begin::Table row-->
              <tr>
                <!--begin::Checkbox-->
                <td>
                  <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1" />
                  </div>
                </td>
                <!--end::Checkbox-->
                <!--begin::User=-->
                <td class="d-flex align-items-center">

                  <!--begin::User details-->
                  <div class="d-flex flex-column">
                    <a href="../../demo13/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</a>
                    <span>{{$user->email}}</span>
                  </div>
                  <!--begin::User details-->
                </td>
                <!--end::User=-->
                <!--begin::Role=-->
                <td>{{$user->role}}</td>
                <!--end::Role=-->
                <!--begin::Last login=-->
                <td>
                  <div class="badge badge-light fw-bolder">{{$user->created_at}}</div>
                </td>
                <!--end::Last login=-->

                <!--begin::Joined-->
                {{-- <{{$user->created_at}}</td> --}}
                <!--begin::Joined-->
                <!--begin::Action=-->
                <td class="text-end">
                  <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                  <span class="svg-icon svg-icon-5 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                    </svg>
                  </span>
                  <!--end::Svg Icon--></a>
                  <!--begin::Menu-->
                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3">Edit</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                    </div>
                    @endforeach
                    <!--end::Menu item-->
                  </div>
                  <!--end::Menu-->
                </td>
                <!--end::Action=-->
              </tr>
            </tbody>
            <!--end::Table body-->
          </table>
          <!--end::Table-->
        </div>
        <!--end::Card body-->
      </div>
      <!--end::Card-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Post-->
</div>
@endsection