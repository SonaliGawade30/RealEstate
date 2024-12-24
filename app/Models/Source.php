<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class Source extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable = [ 'name' ];

    public static function booted()
    {
        static::created(function (Source $source)
        {
            self::where('id', $source->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (Source $source)
        {
            self::where('id', $source->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (Source $source)
        {
            self::where('id', $source->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
