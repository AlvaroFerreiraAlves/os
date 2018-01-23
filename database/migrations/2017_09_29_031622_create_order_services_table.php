<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderServicesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_services', function(Blueprint $table) {
            $table->increments('id');
            $table->string('equipamento');
            $table->string('n_serie');
            $table->string('p_info');
            $table->string('p_const');
            $table->string('s_exec');
            $table->date('dt_prox_manut');
            $table->float('valor_total');
            $table->float('valor_desconto');
            $table->boolean('status');
            $table->integer('id_tipo_ordem_servico')->unsigned();
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_empresa')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->integer('tecnico');

            $table->foreign('id_tipo_ordem_servico')
                ->references('id')->on('type_order_services')
                ->onDelete('cascade');

            $table->foreign('id_cliente')
                ->references('id')->on('customers')
                ->onDelete('cascade');

            $table->foreign('id_empresa')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->foreign('id_usuario')
                ->references('id')->on('users')
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
		Schema::drop('order_services');
	}

}
