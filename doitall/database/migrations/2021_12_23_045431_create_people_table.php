<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->bigInteger('doc')->nullable();
            $table->date('date_nasc')->nullable();
            $table->tinyInteger('age')->default(0);
            $table->string('zipcode',9)->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('city',60)->nullable();
            $table->string('uf',2)->nullable();
            $table->string('address',150)->nullable();
            $table->string('nro',10)->nullable();
            $table->string('district',50)->nullable();
            $table->string('complement',30)->nullable();
            $table->string('phone',150)->nullable();
            $table->string('email',255)->nullable();
            $table->string('nacionalidade',60)->nullable();
            $table->string('natural_city',60)->nullable();
            $table->string('natural_uf',2)->nullable();
            $table->string('sexo',1)->nullable();
            $table->string('estado_civil',10)->nullable();
            $table->string('pai',50)->nullable();
            $table->string('mae',50)->nullable();
            $table->string('uid',36)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
