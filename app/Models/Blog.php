<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','content','image','views'];

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug']  = Str::slug($value);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
