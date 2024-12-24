<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForRentDocument extends BaseModel
{
    use HasFactory;

    protected $fillable = [ 'application_for_rent_id', 'path' ];

    public function applicationforRent()
    {
        return $this->belongsTo(ApplicationForRent::class);
    }

    protected function path() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => 'storage/'.$value
        );
    } 
}
