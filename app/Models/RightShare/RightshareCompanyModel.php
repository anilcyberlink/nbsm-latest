<?php

namespace App\Models\RightShare;

use Illuminate\Database\Eloquent\Model;

class RightshareCompanyModel extends Model
{
    protected $table = 'rightshare_company';
    protected $fillable = ['company','status'];
}
