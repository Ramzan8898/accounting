@extends('layouts.admin-home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3 card">
            <div class="card  border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h2 font-semibold  d-block mb-2">Users</span>
                            <span class="h1 font-bold text-center mb-0">{{$users}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                <i class="fa fa-users fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   

        </div>

        <div class="col-sm-3 card offset-sm-1">
            <div class="card  border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h2 font-semibold  d-block mb-2">Sent Payments</span>
                            <span class="h1 font-bold text-center mb-0">{{$totalSent}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                <i class="fa fa-wallet fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   

        </div>

        <div class="col-sm-4 card offset-sm-1">
            <div class="card  border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h2 font-semibold  d-block mb-2">Recieved Payments</span>

                            <span class="h1 font-bold text-center mb-0">{{$totalRecieved}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                <i class="fa fa-wallet fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   

        </div>


        <div class="col-sm-3 card mt-5">
            <div class="card  border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h2 font-semibold  d-block mb-2">Expense</span>
                            <span class="h1 font-bold text-center mb-0">{{$totalExpense}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                <i class="fa fa-credit-card fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   

        </div>
    </div>
    
</div>
@endsection