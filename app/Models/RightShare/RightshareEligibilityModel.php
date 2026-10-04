<?php

namespace App\Models\RightShare;

use Illuminate\Database\Eloquent\Model;

class RightshareEligibilityModel extends Model
{
    protected $table = 'rightshare_eligibility';
    protected $fillable = ['company','shholderno','boid','full_name','kitta','remaining_kitta','total_kitta','t_frac_kitta','total','actual_rights','int_rights','fraction','upper','actual_issue','occupation','type'];

    public static function insertData($data){
 
      $value=RightshareEligibilityModel::orderBy('id','asc')->get();
      // dd($value);

      if($value->count() >= 0){
        RightshareEligibilityModel::insert($data);
      }
   }
}
