<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    // Disable timestamps
    public $timestamps = false;

    // Set a table name in database
    protected $table = 'element';
}
