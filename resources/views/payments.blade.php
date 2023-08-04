@extends('layouts.admin-home')
@section('content')
<div class="container">
      <div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
          <!--begin::Modal content-->
          <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
              <!--begin::Modal title-->
              <h2 class="fw-bolder">Add a Payment Record</h2>
              <!--end::Modal title-->
              <!--begin::Close-->
              <div id="kt_modal_add_payment_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                <span class="svg-icon svg-icon-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                  </svg>
                </span>
                <!--end::Svg Icon-->
              </div>
              <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
              <!--begin::Form-->
              <form id="kt_modal_add_payment_form" class="form" action="" method="POST">
                @csrf

                <!--begin::Input group-->
                <div class="fv-row mb-7">
                  <!--begin::Label-->
                  <label class="required fs-6 fw-bold form-label mb-2">Status</label>
                  <!--end::Label-->
                  <!--begin::Input-->
                  <select class="form-select form-select-solid fw-bolder" name="status" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                    <option></option>
                    <option value="Sent">SENT</option>
                    <option value="Recieved">RECIEVED</option>

                  </select>
                  <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                  <!--begin::Label-->
                  <label class="required fs-6 fw-bold form-label mb-2">Amount</label>
                  <!--end::Label-->
                  <!--begin::Input-->
                  <input type="text" class="form-control form-control-solid" name="amount" value="" />
                  <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-15">
                  <!--begin::Label-->
                  <label class="fs-6 fw-bold form-label mb-2">
                    <span class="required">Additional Information</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Information such as description of invoice or product purchased."></i>
                  </label>
                  <!--end::Label-->
                  <!--begin::Input-->
                  <textarea class="form-control form-control-solid rounded-3" name="additional_info"></textarea>
                  <!--end::Input-->
                </div>
                <!--end::Input group-->
                <div class="user_id mb-5">
                  <label for="user_id">User_id:</label>
                  <select name="user_id" id="" class="form-control">
                      @foreach($users as $user)
                      <option  value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                  </select>
              </div>
                <!--begin::Actions-->
                <div class="text-center">
                  <button type="reset" id="kt_modal_add_payment_cancel" class="btn btn-light me-3">Discard</button>
                  <button type="submit" id="kt_modal_add_payment_submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                  </button>
                </div>
                <!--end::Actions-->
              </form>
              <!--end::Form-->
            </div>
            <!--end::Modal body-->
          </div>
          <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
      </div>

      
      <div class="row">
        <div class="col-sm-12">
      												<!--begin::Card-->
                              <div class="card pt-4 mb-6 mb-xl-9 ">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                  <!--begin::Card title-->
                                  <div class="card-title">
                                    <h2>Payment Records</h2>
                                  </div>
                                  <!--end::Card title-->
                                  <!--begin::Card toolbar-->
                                  <div class="card-toolbar">
                                    <!--begin::Filter-->
                                    <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon svg-icon-3">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                      </svg>
                                    </span>
                                    <!--end::Svg Icon-->Add payment</button>
                                    <!--end::Filter-->
                                  </div>
                                  <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                  <!--begin::Table-->
                                  <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                    <!--begin::Table head-->
                                    <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                      <!--begin::Table row-->
                                      <tr class="text-start text-muted text-uppercase gs-0">
                                        <th>#</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>User_id</th>
                                        <th>Detail</th>
                                        <th class="text-center">Actions</th>
                                      </tr>
                                      <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fs-6 fw-bold text-gray-600">
                                      <!--begin::Table row-->
                                      @foreach ($payments as $payment)
                                      <tr>
                                        <!--begin::Invoice=-->
                                        <td>
                                          {{$payment->id}}
                                        </td>
                                        <!--end::Invoice=-->
                                        <!--begin::Status=-->
                                        <td>
                                          <span class="badge badge-lg badge-light-success">{{$payment->status}}</span>
                                        </td>
                                        <!--end::Status=-->
                                        <!--begin::Amount=-->
                                        <td>{{$payment->amount}}</td>
                                        <!--end::Amount=-->
                                        <!--begin::Date=-->
                                        <td>{{$payment->updated_at}}</td>
                                        <!--end::Date=-->
                                        
                                        <td>{{$payment->user->name}}</td>                                            
                                        

                                        <td>{{$payment->detail}}</td>
                                        <!--begin::Action=-->
                                        <td class="text-center">
                                          <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
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
                                              <a href="#" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                              <a href="{{url('/edit-payment' ,$payment->id)}}" class="menu-link px-3" data-kt-customer-table-filter="edit_row" >Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                              <a href="{{url('/delete' ,$payment->id)}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                          </div>
                                          <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                      </tr>
                                      @endforeach
                
                                      <!--end::Table row-->
                         </tbody>
                                    <!--end::Table body-->
                                  </table>
                                  <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                              </div>
                              <!--end::Card-->
        </div>
      </div>

</div>
@endsection