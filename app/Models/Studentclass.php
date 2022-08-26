<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    use HasFactory;
    protected $table = 'studentclasses';
    protected $primaryKey = 'id';
    protected $fillable = [ 'class_name'];
}
