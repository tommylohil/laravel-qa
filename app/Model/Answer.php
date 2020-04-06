<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Answer extends Model
{
    protected $fillable = [
        'body',
        'user_id',
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

    public function getStatusAttribute() 
    {
        return $this->id === $this->question->best_answer_id ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute() 
    {
        return $this->isBest();
    }

    public function isBest() 
    {
        return $this->id === $this->question->best_answer_id;
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

        static::deleted(function ($answer) {
            $answer->question->decrement('answers_count');
        });
    }

    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }
}
