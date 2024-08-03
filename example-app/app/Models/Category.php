<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_name',
    ];

    // добавление новой функции для объединения таблиц категории и пользователи по id номеру
    // public function user(){
    //     return $this->hasOne(User::class, 'id', 'user_id');
    // }
}
