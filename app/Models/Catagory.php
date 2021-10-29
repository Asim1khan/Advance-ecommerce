<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    protected $fillable=[
        'catagory_name_eng',
        'catagory_name_urdu',
        'catagory_slug_eng',
        'catagory_slug_urdu',
        'catagory_icon',
    ];



}
