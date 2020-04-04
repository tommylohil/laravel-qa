<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Answer extends Model
{
    protected $fillable = [
        'body'
    ];

    public function question() 
    {
        return $this->belongsTo(Question::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedDateAttribute() 
    {
        return $this->created_at->diffForHumans();
    }
    
    public function getBodyHtmlAttribute() 
    {
        $parseDown = new Parsedown();

        return $parseDown->text($this->body);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });
    }
}