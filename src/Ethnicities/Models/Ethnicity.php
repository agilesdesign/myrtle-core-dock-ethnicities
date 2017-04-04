<?php

namespace Myrtle\Core\Ethnicities\Models;

use Illuminate\Database\Eloquent\Model;

class Ethnicity extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;
}
