<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        // Thêm '_token' vào đây
        'remember_token',
    ];
}
