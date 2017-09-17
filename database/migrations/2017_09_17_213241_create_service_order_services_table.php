<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOrderServicesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_order_services', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ordem_servico')->unsigned();
            $table->integer('id_servico')->unsigned();

            $table->foreign('id_ordem_servico')
                ->references('id')->on('order_services')
                ->onDelete('cascade');

            $table->foreign('id_servico')
                ->references('id')->on('services')
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
		Schema::drop('service_order_services');
	}

}
