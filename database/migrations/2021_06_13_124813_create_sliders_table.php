<?php

use App\Models\Slider;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('images')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->boolean('is_deleted')->nullable() ->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('category_id')->references('id')->on('categories');


        });
        Slider::create([
            'product_id'=>1,
            'category_id'=>1,
        ]);

        Slider::create([
            'product_id'=>1,
            'category_id'=>1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
