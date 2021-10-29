<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    use HasFactory;
    protected $fillable=[
        'catagory_id',
        'sub_catagory_name_eng',
        'sub_catagory_name_urdu',
        'sub_catagory_slug_eng',
        'sub_catagory_slug_urdu',
    ];
    public function catagory()
    {
        return $this->belongsTo(Catagory::class,'catagory_id','id');
    }
}
