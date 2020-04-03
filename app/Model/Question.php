<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Parsedown;

class Question extends Model
{
    protected $fillable = [
        'title', 'body'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value) 
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute() 
    {
        return route("questions.show", $this->slug);
    }

    public function getCreatedDateAttribute() 
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
    
    public function getBodyHtmlAttribute() 
    {
        $parseDown = new Parsedown();

        return $parseDown->text($this->body);
    }
}
