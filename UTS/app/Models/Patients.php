<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patients extends Model
{
	protected $fillable = ['id','name','phone','address','statuses_id','in_date_at','out_date_at'];
	protected $table = 'patients';

	public function statuses()
	{
	   return $this->belongsTo('App\Models\Statuses');
	}

}
