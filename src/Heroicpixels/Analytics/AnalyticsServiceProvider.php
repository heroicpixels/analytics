<?php 

/**
 *	Copyright 2015 - Dave Hodgins
 */

namespace Heroicpixels\Analytics;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AnalyticsServiceProvider extends ServiceProvider {

	protected $defer = false;

	public function boot() {
		$this->package('heroicpixels/analytics');
		App::after(function($request, $response){
			$ip = sprintf('%u', ip2long($request->server('REMOTE_ADDR')));
			$uri = str_replace(str_replace('/index.php', '', $request->server('SCRIPT_NAME')), '', $request->server('REQUEST_URI'));
			Analytic::insert(array(
				'ip' 			=> $ip, 
				'uri' 			=> $uri, 
				'user_agent'	=> $request->server('HTTP_USER_AGENT'),
				'method'		=> $request->server('REQUEST_METHOD')
			));
		});
	}
	
	public function register() {
		
	}

}
