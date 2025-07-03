<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'share_id', // ← これもfillableに追加（重要）
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

    /**
     * リレーション：ユーザーは1つの共有グループに所属
     */
    public function share()
    {
        return $this->belongsTo(Share::class);
    }

    /**
     * リレーション：ユーザーが登録した支出一覧
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * リレーション：ユーザーのプロフィール（共有グループに属するユーザーごとの情報）
     */
    public function shareProfile()
    {
        return $this->hasOne(ShareProfile::class);
    }
}
