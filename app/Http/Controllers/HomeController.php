<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Expense;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sent = Payment::where('payment_type' , 'Sent')->pluck('amount')->toArray();
        $totalSent = array_sum($sent);
        $recieved = Payment::where('payment_type' , 'Recieved')->pluck('amount')->toArray();
        $totalRecieved = array_sum($recieved);
        $expense = Expense::pluck('amount')->toArray();
        $totalExpense = array_sum($expense);

        $users = User::all()->count();
        return view('index' , compact('totalSent' , 'totalRecieved' , 'totalExpense' , 'users'));
    }
}
