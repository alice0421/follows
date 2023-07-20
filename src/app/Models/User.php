<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dailies()
    {
        return $this->hasMany(Daily::class);
    }

    // 自分を (繋ぎ先) フォローしているユーザー（フォロワー） (繋ぎ元) をリレーション
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followee_user_id', 'follower_user_id');
    }

    // 自分 (繋ぎ元) がフォローしているユーザー (繋ぎ先) をリレーション
    public function followings()
    {
        // belongsToMany(リレーションしたいテーブルのモデル, 中間テーブル名, 繋ぎ元, 繋ぎ先)
        return $this->belongsToMany(User::class, 'follows', 'follower_user_id', 'followee_user_id');
    }
}
