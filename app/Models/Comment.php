<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body',
        'news_id'
    ];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function news() {
        return $this->belongsTo(News::class);
    }
}
