<?php

namespace App;
use App\User;
use App\Payment;
use App\Expense;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $guarded= [];
    public function user() {
        return $this->belongsTo(User::class);
    }

}
