<?php 

/**
 *	Copyright 2015 - Dave Hodgins
 */
 
namespace Heroicpixels\Analytics;

use Illuminate\Support\Facades\Config;

class Analytic extends \Illuminate\Database\Eloquent\Model {

	public function getConnection() {
        return static::resolveConnection(
			'analytics'
		);
    }

}
