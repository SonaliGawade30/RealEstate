<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class ApplicationForRent extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'zone_id','property_reg_id','unit_no','party_reg_id','reason_of_use','from_datetime','to_datetime','remark','deposit','rent','discount','net_payable','cgst','sgst','actual_amount','application_status' ];
    
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function property()
    {
        return $this->belongsTo(PropertyRegistration::class,'property_reg_id');
    }
    public function party()
    {
        return $this->belongsTo(PartyRegistration::class,'party_reg_id');
    }
    public function document()
    {
        return $this->hasOne(ApplicationForRentDocument::class);
    }

    public static function booted()
    {
        static::created(function (ApplicationForRent $applicationforrent)
        {
            self::where('id', $applicationforrent->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (ApplicationForRent $applicationforrent)
        {
            self::where('id', $applicationforrent->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (ApplicationForRent $applicationforrent)
        {
            self::where('id', $applicationforrent->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
