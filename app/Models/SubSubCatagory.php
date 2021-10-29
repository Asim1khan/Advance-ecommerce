<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCatagory extends Model
{
    use HasFactory;
    protected $fillable=[
         'catagory_id',
         'subcatagory_id',
         'subsubcatagory_name_eng',
         'subsubcatagory_name_urdu',
         'subsubcatagory_slug_eng',
         'subsubcatagory_slug_urdu',
    ];
    public function catagory()
    {

        return $this->belongsTo(Catagory::class,'catagory_id','id');
    }
    public function subcatagory()
    {
        return $this->belongsTo(SubCatagory::class,'subcatagory_id','id');
    }
}
