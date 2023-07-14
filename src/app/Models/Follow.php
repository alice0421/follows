<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'follower_user_id',
        'followee_user_id',
    ];

    // 自分 (繋ぎ元) がフォローしているユーザー (繋ぎ先) をリレーション
    public function followings()
    {
        // belongsToMany(リレーションしたいテーブルのモデル, 中間テーブル名, 繋ぎ元, 繋ぎ先)
        return $this->belongsToMany(User::class, 'follows', 'follower_user_id', 'followee_user_id');
    }

    public function followers()
    {
        // 自分を (繋ぎ先) フォローしているユーザー（フォロワー） (繋ぎ元) をリレーション
        return $this->belongsToMany(User::class, 'follows', 'followee_user_id', 'follower_user_id')->withTimestamps();
    }
}
