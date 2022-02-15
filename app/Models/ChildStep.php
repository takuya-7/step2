<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'title',
        'estimated_achievement_day',
        'estimated_achievement_hour',
        'description',
        'step_id',
        'delete_flg',
    ];

    // Stepモデルへのリレーション作成
    public function step()
    {
        return $this->belongsTo('App\Models\Step');
    }
}
