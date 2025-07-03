<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = ['share_id', 'content'];

    public function share()
    {
        return $this->belongsTo(Share::class);
    }
}
