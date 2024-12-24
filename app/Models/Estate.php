<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;


class Estate extends BaseModel
{
    use HasFactory;

    protected $fillable = ['estate_name'];

    public static function booted()
    {
        static::created(function (Estate $estate)
        {
            self::where('id', $estate->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (Estate $estate)
        {
            self::where('id', $estate->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (Estate $estate)
        {
            self::where('id', $estate->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
