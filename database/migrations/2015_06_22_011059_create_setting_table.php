<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('config');
            $table->string('value');
            $table->string('slug');
            $table->timestamps();
        });
        
          DB::table('settings')->insert(
			array(
				'config' => 'Android Key',
				'value' => '$2a$10$G9SDvR7PgK1A0D6tP1kEJuCL8',
				'slug' => 'android-key',
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' => date('Y-m-d h:i:s'),
			)
        );
        
        DB::table('settings')->insert(
			array(
				'config' => 'iOS Key',
				'value' => '$wcFO1lC49AbBtJr5yv4tPFvvyLS',
				'slug' => 'ios-key',
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' => date('Y-m-d h:i:s'),
			)
        );
        
        DB::table('settings')->insert(
			array(
				'config' => 'Windows Phone Key',
				'value' => 'wcFO1lC49AbvvyLStP1kEJuCL8',
				'slug' => 'winPhone-key',
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' => date('Y-m-d h:i:s'),
			)
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
