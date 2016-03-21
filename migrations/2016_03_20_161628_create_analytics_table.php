<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyticsTable extends Migration {

	/**
	 * Run the migrations.
	 * php artisan migrate --force --database=YOUR_DATABASE_CONNECTION_NAME --package=heroicpixels/analytics
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('analytics', function($t) {
			$t->increments('id');
			$t->integer('ip');
			$t->string('uri', 255);
			$t->string('method', 10);
			$t->string('user_agent', 255);
			$t->timestamp('created_at')->default(new Illuminate\Database\Query\Expression('CURRENT_TIMESTAMP'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('analytics');
	}

}
