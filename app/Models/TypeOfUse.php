<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class TypeOfUse extends BaseModel
{
    use HasFactory, SoftDeletes;
   
    protected $table = 'type_of_use';
    protected $fillable = [ 'type_of_use' ];

    public static function booted()
    {
        static::created(function (TypeOfUse $typeofuse)
        {
            self::where('id', $typeofuse->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (TypeOfUse $typeofuse)
        {
            self::where('id', $typeofuse->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (TypeOfUse $typeofuse)
        {
            self::where('id', $typeofuse->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
