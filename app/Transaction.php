<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;
    public $primaryKey='id';
    protected $table='prince.transactions';
}
