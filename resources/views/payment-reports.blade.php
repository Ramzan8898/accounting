@extends('layouts.admin-home')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12">
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
                <div class="card-toolbar">
                  <ul class="nav">
                    <li class="nav-item">
                      <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Payment Type
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
                            <a href="{{url('/payment/sent')}}" class="menu-link px-3">Sent</a>
                          </div>
                          <!--end::Menu item-->
                          <!--begin::Menu item-->
                          <div class="menu-item px-3">
                            <a href="{{url('/payment/recieved')}}" class="menu-link px-3" data-kt-users-table-filter="delete_row">Recieved</a>
                          </div>

                          <div class="menu-item px-3">
                            <a href="{{url('/payment/all')}}" class="menu-link px-3" data-kt-users-table-filter="delete_row">All</a>
                          </div>

                          <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 me-1" href="{{route('month-payment-report')}}">Month</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 me-1" href="{{route('week-payment-report')}}">Week</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4" href="{{route('day-payment-report')}}">Day</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 active" id="pdfBtn">Download PDF</a>
                      </li>
                    </ul>
                  </div>
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
                      <th>User</th>
                      <th>Detail</th>
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
                        <span class="badge badge-lg badge-light-success">{{$payment->payment_type}}</span>
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
    </div>
  </div>

  {{-- PDF LAyout Start --}}
  <div id="pdf_layout">
    <div class="invoice-box ">

      <table cellpadding="0" cellspacing="0" >
       <tr class="top">
        <td colspan="2">
         <table>
          <tr>
           <td class="title">
           </td>

           <td>
            Invoice #: INV38379<br />
            Created: January 1, 2022<br />
            Due: February 1, 2022
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <tr class="information">
    <td colspan="2">
     <table>
      <tr>
       <td>
        Sparksuite, Inc.<br />
        12345 Sunny Road<br />
        Sunnyville, CA 12345
      </td>

      <td>
        Acme Corp.<br />
        John Doe<br />
        john@example.com
      </td>
    </tr>
  </table>
</td>
</tr>

<tr class="heading">
  <td>Payment Method</td>

  <td>Check #</td>
</tr>

<tr class="details">
  <td>Check</td>

  <td>1234</td>
</tr>

<tr class="heading">
  <td>Item</td>

  <td>Price</td>
</tr>

<tr class="item">
  <td>Website design</td>

  <td>$123.00</td>
</tr>

<tr class="item">
  <td>Hosting (3 months)</td>

  <td>$45.00</td>
</tr>

<tr class="item last">
  <td>Domain name (1 year)</td>

  <td>$67.00</td>
</tr>

<tr class="total">
  <td></td>

  <td>Total: $235.00</td>
</tr>
</table>
</div>
</div>
{{-- PDF LAyout End --}}
<script>
	// for expense pdf start
	const button = document.getElementById('pdfBtn');

	function generatePDF() {
		// Choose the element that your content will be rendered to.

		let element = document.getElementById('pdf_layout');
		const opt = {
      filename: 'payments-report.pdf',
      margin: 4,
    };
		// Choose the element and save the PDF for your user.
		html2pdf().set(opt).from(element).save();
    html2pdf(element, opt);
  }

  button.addEventListener('click', generatePDF);

		// for expense pdf end
  </script>
  @endsection