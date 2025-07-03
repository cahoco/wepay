<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'share_id',
        'name',
    ];

    /**
     * リレーション：このカテゴリが属する共有グループ（AさんとBさんのペア）
     */
    public function share()
    {
        return $this->belongsTo(Share::class);
    }

    /**
     * リレーション：このカテゴリが持つ小カテゴリ一覧
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    /**
     * リレーション：このカテゴリに属する支出一覧
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
