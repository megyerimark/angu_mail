<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotactModel extends Model
{
    use HasFactory;
    public $fillable = ['name', 'email', 'subject', 'message', 'phone'];
}
