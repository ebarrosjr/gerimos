<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if(session()->get('success')){
			echo session()->get('success');
		}else{
			echo '<h1>Principal</h1>';
		}
	}
}
