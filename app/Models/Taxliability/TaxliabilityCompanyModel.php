<?php

namespace App\Models\Taxliability;

use Illuminate\Database\Eloquent\Model;

class TaxliabilityCompanyModel extends Model
{
     protected $table = 'taxliability_company';
    protected $fillable = ['company','status'];
}
