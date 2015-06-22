<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesToPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_to_phones', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('idRegister')->unsigned();
            $table->integer('idMessage')->unsigned();
            $table->timestamps();
            
            $table->foreign('idRegister')->references('id')->on('reg_ids');
			$table->foreign('idMessage')->references('id')->on('messages');
        });
       
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		
        Schema::drop('messages_to_phones', function (Blueprint $table) {
			$table->dropForeign('messages_to_phones_idRegister_foreign');
			$table->dropForeign('messages_to_phones_idMessage_foreign');
		});
    }
}
