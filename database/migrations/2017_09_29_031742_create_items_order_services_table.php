<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsOrderServicesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items_order_services', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_item')->unsigned();
            $table->integer('id_ordem_servico')->unsigned();
            $table->float('valor');
            $table->float('desconto');
         ;


            $table->foreign('id_item')
                ->references('id')->on('items')
                ->onDelete('cascade');


            $table->foreign('id_ordem_servico')
                ->references('id')->on('order_services')
                ->onDelete('cascade');



            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items_order_services');
	}

}
