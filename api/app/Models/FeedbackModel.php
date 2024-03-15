<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    protected $fillable = ['name', 'phone', 'message'];

   protected $table = 'feedbacks';
}
