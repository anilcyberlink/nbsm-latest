<?php

namespace App\Models\Taxliability;

use Illuminate\Database\Eloquent\Model;

class TaxliabilityEligibilityModel extends Model
{
    protected $table = 'taxliability_eligibility';
    protected $fillable = ['company','boid','full_name','bonus_issued','rounded_up_bonus_tax','remarks'];

     public static function insertData($data){
 
      $value=TaxliabilityEligibilityModel::orderBy('id','asc')->get();
      // dd($value);

      if($value->count() >= 0){
        TaxliabilityEligibilityModel::insert($data);
      }
   }
}
