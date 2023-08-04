<?php

namespace App\Http\Controllers;
use App\User;
use App\Payment;
use App\Expense;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show_payments () {
        $payments = Payment::all();
        $users = User::all();
        return view('payments' , ['payments' => $payments , 'users'=>$users]);
    }

    public function create_payment (Request $request) {
        $payment = new Payment;
        $payment->payment_type = $request->status;
        $payment->amount  = $request->amount;
        $payment->detail = $request->additional_info;
        $payment->user_id = $request->user_id;
        $payment->save();

        return redirect(route('payments'));

    }

    public function edit_payment($id) {
        $payment = Payment::find($id);
        $users = User::all();
        return view('edit-payment' , ['payment' => $payment , 'users' =>$users]); 
    }

    public function update(Request $request , $id) {
        $payment = Payment::find($id);
        $payment->payment_type = $request->payment_type;
        $payment->amount  = $request->amount;
        $payment->detail = $request->detail;
        $payment->user_id = $request->user_id;
        $payment->save(); 
        return redirect(route('payments'));
    }

    public function delete($id) {
        Payment::destroy($id);
        return redirect(route('payments'));
    }

    public function sent() {
        $sent = Payment::with('user')->where('payment_type' , 'sent')->get();
    }
}