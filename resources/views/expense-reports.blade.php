@extends('layouts.admin-home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xxl-12">
            <!--begin::Tables Widget 5-->
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Expenses</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 me-1" href="{{route('month-expense-report')}}">Month</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 me-1" href="{{route('week-expense-report')}}">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4" href="{{route('day-expense-report')}}">Day</a>
                            </li>
							<li class="nav-item">
								<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 active" id="pdfBtn">Download PDF</a>
							</li>
                        </ul>
                    </div>
                </div>
                <!--end::Header-->
                <div class="card-body py-3">
                    <div class="tab-content">
						<!--begin::Table-->		
						<table class="table align-middle " id="kt_table_customers_expense">
							<!--begin::Table head-->
							<thead class="border-bottom border-gray-200 fs-7 fw-bolder ">
						
								<!--begin::Table row-->
						
								<tr class="text-start text-muted text-uppercase gs-0">
									<th>#</th>
									<th>Amount</th>
									<th>Detail</th>
									<th>Date</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
								<tbody class="fs-6 fw-bold text-gray-600">
								<!--begin::Table row-->
									@foreach ($expenses as $expense)
									<tr>
										<td>{{$expense->id}}</td>
										<td>{{$expense->amount}}</td>
										<td>{{$expense->detail}}</td>
										<td>{{$expense->created_at}}</td>
									</tr>
									@endforeach
								</tbody>
						</table>
					</div>        
                </div>
            </div>        
        </div>
	</div>
</div>

<script>
	// for expense pdf start
	const button = document.getElementById('pdfBtn');

	function generatePDF() {
		// Choose the element that your content will be rendered to.
		let element = document.getElementById('kt_table_customers_expense');
		
		// Choose the element and save the PDF for your user.
		html2pdf().from(element).save();
	}

	button.addEventListener('click', generatePDF);

		// for expense pdf end
</script>


@endsection

