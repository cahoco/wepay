<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'share_id',
        'user_id',
        'category_id',
        'subcategory_id',
        'amount',
        'description',
        'paid_at',
    ];

    /**
     * リレーション：この支出が属する共有グループ
     */
    public function share()
    {
        return $this->belongsTo(Share::class);
    }

    /**
     * リレーション：この支出を登録したユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * リレーション：この支出に対応するカテゴリ（例：食費）
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * リレーション：この支出に対応する小カテゴリ（例：外食・食料品など）
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
