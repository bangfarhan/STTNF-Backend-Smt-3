<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $fillable = ['nama', 'nim', 'email','jurusan'];

    public static function updateData($id,$data){
        DB::table('students')
          ->where('id', $id)
          ->update($data);
      }
      public static function deleteData($id){
        DB::table('students')->where('id', '=', $id)->delete();
      }
}