<?php

namespace App\Http\Controllers;
use App\User;
use App\Payment;
use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function show_expenses () {
        $expenses = Expense::all();
        return view('expense' , ['expenses'=> $expenses]);
    }

    public function add_expense(Request $request) {
        $expense = new Expense;

        $expense->amount = $request->amount;
        $expense->detail = $request->expense_detail;
        $expense->save();
        return redirect(route('expenses'));
    }

    public function edit_expense($id) {
        $expense = Expense::find($id);
        return view('edit-expense' , ['expense' => $expense]);
    }

    public function update_expense(Request $request , $id) {
        $expense = Expense::find($id);
        $expense->amount = $request->amount;
        $expense->detail = $request->expense_detail;
        $expense->save();

        return redirect(route('expenses'));
    }

    public function delete($id) {
        Expense::destroy($id);
        return redirect(route('expenses'));
    } 
}
