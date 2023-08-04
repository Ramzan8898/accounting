@extends('layouts.admin-home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 card p-5 offset-sm-3">
            <form action="" method="POST">
                @csrf
               
                <div class="amount mb-5">
                    <label for="amount">Amount:</label>
                    <input type="number" name="amount" class="form-control" value="{{$expense->amount}}">
                </div>
                <div class="detail mb-5">
                    <label for="detail">Detail:</label>
                    <input type="text" name="expense_detail" class="form-control" value="{{$expense->detail}}">
                </div>
                
                <input type="submit" class="btn btn-success" value="update">
            </form>
        </div>
    </div>
</div>
@endsection