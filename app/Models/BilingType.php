<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class BilingType extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'type' ];

    public static function booted()
    {
        static::created(function (BilingType $bilingtype)
        {
            self::where('id', $bilingtype->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (BilingType $bilingtype)
        {
            self::where('id', $bilingtype->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (BilingType $bilingtype)
        {
            self::where('id', $bilingtype->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
