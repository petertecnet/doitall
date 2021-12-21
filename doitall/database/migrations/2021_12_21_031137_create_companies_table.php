<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('cnpj')->nullable();
            $table->string('address')->nullable();
            $table->string('city',60)->nullable();
            $table->string('uf',2)->nullable();
            $table->string('email')->nullable();
            $table->string('phone',60)->nullable();
            $table->timestamps();
        });
        
        $this->newCad('Empresa Teste','1','123456');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }

    
    public function newCad($name,$user_id,$cnpj){
        $cad = new Company();
        $cad->name = $name;
        $cad->user_id = $user_id;
        $cad->cnpj = $cnpj;
        $cad->save();
    }
}
