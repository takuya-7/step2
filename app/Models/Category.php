<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'delete_flg',
    ];

    // Stepモデルへのリレーション作成
    public function steps()
    {
        return $this->hasMany('App\Models\Step');
    }
}
