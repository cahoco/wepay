<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'share_id',
        'nickname_a',
        'nickname_b',
        'birthday_a',
        'birthday_b',
        'anniversary',
        'profile_image_a',
        'profile_image_b',
    ];

    /**
     * リレーション：このプロフィールが属する共有グループ
     */
    public function share()
    {
        return $this->belongsTo(Share::class);
    }
}
