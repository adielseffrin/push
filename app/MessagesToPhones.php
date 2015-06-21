<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class MessagesToPhones extends Eloquent
{
    protected $fillable = ['idRegister', 'idMessage'];
}
