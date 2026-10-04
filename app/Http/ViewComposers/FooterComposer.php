<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;

class FooterComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){

		$view->with('footer', PostTypeModel::where(['is_footer_menu'=>'1'])
			->orderBy('ordering','asc')
			->get());

		$view->with('service',PostTypeModel::where(['id'=>'16'])->first());

		$view->with('services',PostModel::where(['post_type'=>'16','post_parent'=>'0'])->get());

		$view->with('industry',PostTypeModel::where(['id'=>'15'])->first());

		$view->with('industries',PostModel::where(['post_type'=>'15','post_parent'=>'0'])->take(6)->get());

		$view->with('quick_links',PostModel::where(['post_category'=>'2'])
				->get());

        $view->with('settings',SettingModel::where(['id'=>'1'])
            ->first());
		}
}
