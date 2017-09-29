<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cnpj_cpf');
            $table->string('ie');
            $table->string('endereco');
            $table->string('cep');
            $table->string('telefone');
            $table->string('celular');
            $table->boolean('status');
            $table->boolean('tipo_cliente');

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
		Schema::drop('customers');
	}

}
