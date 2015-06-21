<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class RegIds extends Eloquent
{
    protected $fillable = ['system','email','phoneId'];
}
