<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statuses extends Model
{
	protected $fillable = ['id','name'];
	protected $table = 'statuses';
    public function patients()
    {
        return $this->hasMany('App\Models\Patients');
    }
	 
}
