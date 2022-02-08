<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'step_id',
        'delete_flg',
    ];

    // Userモデルへのリレーション作成
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // Stepモデルへのリレーション作成
    public function step()
    {
        return $this->belongsTo('App\Models\Step');
    }
}
