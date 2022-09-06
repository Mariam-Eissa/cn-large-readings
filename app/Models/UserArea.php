<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserArea extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rdl_users_areas';

    public function custfilecode(){
        return $this->hasOne(CustFileCode::class,'cust_file_no','file_no');
    }

     public function user(){
        return $this->hasOne(User::class);
     }

}
