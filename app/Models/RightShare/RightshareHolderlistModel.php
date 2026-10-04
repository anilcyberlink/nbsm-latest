<?php

namespace App\Models\RightShare;

use Illuminate\Database\Eloquent\Model;

class RightshareHolderlistModel extends Model
{
      protected $table = 'rightshare_holderlist';
    protected $fillable = ['company','shholderno','fname','lname','full_name','total_kitta','tfrackitta','total','actual_rights','int_rights','fraction','upper','actual_issue','occupation','type'];

    public static function insertData($data){
 
      $value=RightshareHolderlistModel::orderBy('id','asc')->get();
      // dd($value);

      if($value->count() >= 0){
        RightshareHolderlistModel::insert($data);
      }
   }
}
