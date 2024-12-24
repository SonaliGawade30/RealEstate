<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class PropertyUnit extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'property_reg_id ','unit_no','area','floor','type_of_use_id','estate_id','lease_rent','document' ];

    public function propertyRegistration()
    {
        return $this->belongsTo(PropertyRegistration::class);
    }
    public function typeofuse()
    {
        return $this->belongsTo(TypeOfUse::class, 'type_of_use_id');
    }
    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }

    public static function booted()
    {
        static::created(function (PropertyUnit $propertyunit)
        {
            self::where('id', $propertyunit->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (PropertyUnit $propertyunit)
        {
            self::where('id', $propertyunit->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (PropertyUnit $propertyunit)
        {
            self::where('id', $propertyunit->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
