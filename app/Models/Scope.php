<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    protected $fillable = ['name', 'description'];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
