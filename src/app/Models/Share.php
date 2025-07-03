<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Share extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
    ];

    /**
     * モデル作成時に uuid を自動生成
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($share) {
            if (empty($share->uuid)) {
                $share->uuid = Str::uuid()->toString();
            }
        });
    }

    /**
     * リレーション：この共有グループに属するユーザーたち
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * リレーション：この共有グループ内の支出一覧
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * リレーション：この共有グループ内のプロフィール情報（ユーザーごとのニックネーム・画像など）
     */
    public function shareProfiles()
    {
        return $this->hasMany(ShareProfile::class);
    }

    /**
     * リレーション：このグループが持つカテゴリ一覧（自分たちで管理できるもの）
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * リレーション：このグループが持つサブカテゴリ一覧
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function memo()
    {
        return $this->hasOne(Memo::class);
    }
}
