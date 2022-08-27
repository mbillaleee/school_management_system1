<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $table = 'marks';
    protected $primaryKey = 'id';
    protected $fillable = [ 'student_id', 'class_id', 'subject_id', 'mark' ];
}
