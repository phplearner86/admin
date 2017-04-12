<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

	protected $fillable = ['title', 'body', 'category_id', 'published', 'published_at']; 
    protected $dates = ['published_at'];
	
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAttribute()
    {
        return $this->published_at->diffForHumans();
    }

    public function scopePublished($query)
    {
        return $query->where('published', true)->where('published_at', '<=', Carbon::now());
    }

    public function isDraft()
    {
        return $this->published == false;
    }

    public function isPublished()
    {
        return $this->published == true && $this->published_at <= Carbon::now();
    }

    public function waitPublishing()
    {
        return $this->published == true && $this->published_at > Carbon::now();
    }

    public function scopeDraft($query)
    {
        return $query->where('published', false);
    }

    public function scopeForPublishing($query)
    {
        return $query->where('published', true)->where('published_at', '<=', Carbon::now());
    }
}
