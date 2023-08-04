<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function show_month_expense() {
        $expenses = Expense::whereMonth('created_at' ,  Carbon::now()->month);

       return view('expense-reports' , compact( 'expenses'));
    }
}
