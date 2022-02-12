<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'estimated_achievement_day',
        'estimated_achievement_hour',
        'description',
        'category_id',
        'delete_flg',
    ];

    // Userモデルへのリレーション作成
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // Categoryモデルへのリレーション作成
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    // ChildStepモデルへのリレーション作成
    public function childSteps()
    {
        return $this->hasMany('App\Models\ChildStep');
    }
    // Challengeモデルへのリレーション作成
    public function challenges()
    {
        return $this->hasMany('App\Models\Challenge');
    }
}
