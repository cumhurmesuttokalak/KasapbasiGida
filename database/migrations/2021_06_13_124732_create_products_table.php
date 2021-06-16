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
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->integer('price')->nullable();
            $table->text('features')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_deleted')->nullable() ->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('products');




        });
        Product::create([
            'category_id'=>1,
            'title'=>'Fıstık',
            'price'=>100



        ]);
        Product::create([
            'category_id'=>2,
            'title'=>'Sigara',
            'price'=>200



        ]);
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
}
