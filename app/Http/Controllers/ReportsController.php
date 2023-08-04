<?php

namespace App\Http\Controllers;
use App\User;
use App\Payment;
use App\Expense;
use Carbon\Carbon;
use DB;
use PDF;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //expense reeports start
    public function show_expense_report() {
        $expenses = Expense::all();
        return view('expense-reports' , compact('expenses'));
    }

    public function show_month_expense() {
        $expenses = Expense::whereMonth('created_at', date('m'))->get();
       return view('expense-reports' , compact( 'expenses'));
    }

    public function show_week_expense() {
        $date = Carbon::today()->subDays(7);
        $expenses = Expense::where('created_at','>=',$date)->get();
       return view('expense-reports' , compact( 'expenses'));
    }

    public function show_day_expense() {
        $expenses = Expense::whereDate('created_at', Carbon::today())->get();
       return view('expense-reports' , compact( 'expenses'));
    }

    //payments reports start
    public function show_payment_report($status) {
        
            
        if($status == 'sent'){
            $payments = Payment::with('user')->where('status' , 'sent')->get();
        }elseif($status == 'recieved'){
            $payments = Payment::with('user')->where('status' , 'recieved')->get();

        }elseif($status == 'all'){
            $payments = Payment::all();
        }
        return view('payment-reports' , compact('payments'));
        }


    public function show_month_payment() {
        $payments = Payment::whereMonth('created_at', date('m'))->get();
       return view('payment-reports' , compact( 'payments'));
    }

    public function show_week_payment() {
        $date = Carbon::today()->subDays(7);
        $payments = Payment::where('created_at','>=',$date)->get();
       return view('payment-reports' , compact( 'payments'));
    }

    public function show_day_payment() {
        $payments = Payment::whereDate('created_at', Carbon::today())->get();
       return view('payment-reports' , compact( 'payments'));
    }
}
