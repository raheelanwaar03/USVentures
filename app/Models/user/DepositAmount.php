<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class DepositAmount extends Model
{
    // make fillable
    protected $fillable = ['user_id', 'name', 'phone', 'amount', 'status'];
}
