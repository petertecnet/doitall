<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('user_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
        
        $this->newCad('Desenvolvimento de sistema web','4500.00','Desenvolvimento','Sistema', 'Peter Tecnet', 'Sistema web', '1', '1', 'Desenvolvimento de sistema web para gerenciamento de tarefas rotineiras de uma empresa.');
   
        $this->newCad('Desenvolvimento web site','2500.00','Desenvolvimento','Website', 'Peter Tecnet', 'Web site', '1', '1', 'Desenvolvimento de sistema web para gerenciamento de tarefas rotineiras de uma empresa.');
   
        $this->newCad('Desenvolvimento de Aplicativo','1000.00','Desenvolvimento','Mobile', 'Peter Tecnet', 'Aplicativo mobile', '1', '1', 'Desenvolvimento de sistema web para gerenciamento de tarefas rotineiras de uma empresa.');
   
        $this->newCad('Desenvolvimento de Loja Virtual','3500.00','Desenvolvimento','Sistema', 'Peter Tecnet', 'E-commerce', '1', '1', 'Desenvolvimento de sistema web para gerenciamento de tarefas rotineiras de uma empresa.');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }

    
    public function newCad($name, $price,$category,$type,$brand, $model, $user_id, $company_id, $description){
        $cad = new Product();
        $cad->name = $name;
        $cad->price = $price;
        $cad->category = $category;
        $cad->type = $type;
        $cad->brand = $brand;
        $cad->model = $model;
        $cad->user_id = $user_id;
        $cad->company_id = $company_id;
        $cad->description = $description;
        $cad->save();
    }
}
