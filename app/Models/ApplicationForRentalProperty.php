<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class ApplicationForRentalProperty extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'zone_id','allotment_no','party_id','caste','shared','nature_of_buisness','type_of_allotment','contract_duration','from_date','to_date','rent_per_month','rent_increase','rent_increase_type','increament_increase','rule_id','biling_type_id','deposite','agrement_file_upload' ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function property()
    {
        return $this->belongsTo(PropertyRegistration::class,'property_id');
    }
    public function party()
    {
        return $this->belongsTo(PartyRegistration::class,'party_id');
    }

    public static function booted()
    {
        static::created(function (ApplicationForRentalProperty $applicationforrentalproperty)
        {
            self::where('id', $applicationforrentalproperty->id)->update([
                'created_by'=> Auth::user()->id,
            ]);
        });
        static::updated(function (ApplicationForRentalProperty $applicationforrentalproperty)
        {
            self::where('id', $applicationforrentalproperty->id)->update([
                'updated_by'=> Auth::user()->id,
            ]);
        });
        static::deleted(function (ApplicationForRentalProperty $applicationforrentalproperty)
        {
            self::where('id', $applicationforrentalproperty->id)->update([
                'deleted_by'=> Auth::user()->id,
            ]);
        });
    }
}
