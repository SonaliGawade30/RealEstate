<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;


class PartyRegistration extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['party_name','buisness_name','address','email','mobile_no','pancard_no','aadhaar_no','gst_no','upload_document' ];


    public function path() : Attribute
    {
        return new Attribute(
            get: fn ($value) => asset('storage/'. $value),
        );
    }

    public static function booted()
    {
        static::created(function (PartyRegistration $partyregistration)
        {
            self::where('id', $partyregistration->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (PartyRegistration $partyregistration)
        {
            self::where('id', $partyregistration->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (PartyRegistration $partyregistration)
        {
            self::where('id', $partyregistration->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
