<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::now()->lt($this->expire_date) ? 'active' : 'expired'
        );
    }

    public function scopeActive($query)
    {
        return $query->where('status','active');
    }

}
