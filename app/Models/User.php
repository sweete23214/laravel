<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'password', 'role_id'];
    protected $hidden = ['password'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // Связь с ролью
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}