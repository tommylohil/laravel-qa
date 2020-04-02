<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str as PsyStr;

class Question extends Model
{
    protected $fillable = [
        'title', 'body'
    ];

    public function user() {
        return $this->belongTo(User::class);
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = PsyStr::slug($value);
    }
}
