<?php

namespace App\Models\Taxliability;

use Illuminate\Database\Eloquent\Model;

class TaxliabilityHolderlistModel extends Model
{
    protected $table = 'taxliability_holderlist';
    protected $fillable = ['company','shholderno','full_name','issue_bonus','rounded_up_bonus_tax','remarks'];

     public static function insertData($data){
 
      $value=TaxliabilityHolderlistModel::orderBy('id','asc')->get();
      // dd($value);

      if($value->count() >= 0){
        TaxliabilityHolderlistModel::insert($data);
      }
}
}