<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'message', 'company' , 'image' , 'order' , 'position'
    ];
}
