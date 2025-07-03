<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
    ];

    /**
     * リレーション：この小カテゴリが属する大カテゴリ
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * リレーション：この小カテゴリに紐づく支出一覧
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
