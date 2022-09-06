<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustFileCode extends Model
{
    use HasFactory;

    protected $table = 'rdl_cust_file_codes';

    public function userarea()
    {
        return $this->hasOne(UserArea::class,'file_no','cust_file_no');
    }


}
