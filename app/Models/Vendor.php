<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'vendor_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'send_to_vendor',
        'received_from_vendor'
    ];
    public function queries()
    {
        return $this->hasMany(Query::class);
    }
}
