<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;


class Religion extends BaseModel
{
    use HasFactory;

    protected $table = 'religion_master';
    protected $fillable = ['name'];

    public static function booted()
    {
        static::created(function (Religion $religion)
        {
            self::where('id', $religion->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (Religion $religion)
        {
            self::where('id', $religion->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (Religion $religion)
        {
            self::where('id', $religion->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
