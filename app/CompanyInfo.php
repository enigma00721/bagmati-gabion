<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{

	protected $table = 'company_infos';
    protected $fillable = ['aboutus','message','mobile','telephone','location','mail','fb_link','tw_link','projects','partners','clients'];
    
}
