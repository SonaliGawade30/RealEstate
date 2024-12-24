<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class Rule extends BaseModel
{
    use HasFactory,SoftDeletes;


    protected $fillable = [ 'rule_name' ];

    public static function booted()
    {
        static::created(function (Rule $rule)
        {
            self::where('id', $rule->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (Rule $rule)
        {
            self::where('id', $rule->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (Rule $rule)
        {
            self::where('id', $rule->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
