<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Gbrock\Table\Traits\Sortable;

class Messages extends Eloquent
{
    use Sortable;
    
    protected $sortable = ['created_at'];
    protected $fillable = ['message'];
}
