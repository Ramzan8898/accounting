@extends('layouts.admin-home')
@section('content')
<div class="container ">
    <div class="row ">
        <div class="col-sm-6 card p-5 offset-sm-3 ">
            <form action="" method="POST">
                @csrf
                <div class="payment_type mb-5">
                    <label for="payment_type">Payment Type:</label>
                    <select name="payment_type" id="" class="form-control">
                        
                        <option  value="{{$payment->payment_type}}">{{$payment->payment_type}}</option>
                        
                    </select>    
                </div>
                <div class="amount mb-5">
                    <label for="amount">Amount:</label>
                    <input type="number" name="amount" class="form-control" value="{{$payment->amount}}">
                </div>
                <div class="detail mb-5">
                    <label for="detail">Detail:</label>
                    <input type="text" name="detail" class="form-control" value="{{$payment->detail}}">
                </div>
                <div class="user_id mb-5">
                    <label for="user_id">User_id:</label>
                    <select name="user_id" id="" class="form-control">
                        @foreach($users as $user)
                        <option  value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" class="btn btn-success" value="update">
            </form>
        </div>
    </div>
</div>
@endsection