<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Campus extends Model
{
    use HasFactory;

    protected $table = 'Campus';

    protected $fillable = [
        'code',
        'name'
    ];
};
