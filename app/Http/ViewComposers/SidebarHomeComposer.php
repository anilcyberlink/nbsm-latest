<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Posts\PostModel;
use App\Models\Settings\SettingModel;

class SidebarHomeComposer{

	public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){
			
		// $view->with('message_from_chairman', PostModel::where(['post_type'=>4,'id'=>7])
		//     ->where('status',1)
		// 	->first());

			
	
	}
	
}