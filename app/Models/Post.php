<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['parent_id', 'name', 'title', 'content', 'published', 'premium', 'image'];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 200);
    }

    public function getPhotoAttribute()
    {

        return Storage::url($this->image);
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
