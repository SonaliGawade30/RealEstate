<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class Zone extends BaseModel
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [ 'name' ];

    public static function booted()
    {
        static::created(function (Zone $zone)
        {
            self::where('id', $zone->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (Zone $zone)
        {
            self::where('id', $zone->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (Zone $zone)
        {
            self::where('id', $zone->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }

}
