<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('status')->default(1)->comment('0 bloqueado - 1 liberado - 2 pendente');
            $table->tinyInteger('role')->default(0)->comment('0-Cliente - 1-Funcionario - 2-Supervisor 8-Gerente 9-Administrador');
            $table->string('name',50);
            $table->string('company_id',50)->default(0);
            $table->string('email',150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->uuid('uid')->nullable();
            //
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        $this->newCad('1','Administrador','adm@doitall.com.br','123456');
        $this->newCad('2','Pedro','pivow@doitall.com.br','123456');
        $this->newCad('3','Lucas', 'lucas@doitall.com', '123456');
        $this->newCad('4','Fabio','fabio@doitall.com.br','123456');
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

    public function newCad($id, $name,$user,$pass,$company_id=1, $role=9){
        $cad = new User();
        $cad->id = $id;
        $cad->name = $name;
        $cad->email = $user;
        $cad->password = bcrypt($pass);
        $cad->role = $role;
        $cad->company_id = $company_id;
        $cad->status = 1;
        $cad->save();
    }

}
