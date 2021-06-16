<?php

use App\Models\Menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('link')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->boolean('is_deleted')->nullable() ->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('category_id')->references('id')->on('categories');


        });
        Menu::create([
            'title'=>'İcecekler',
            'product_id'=>1,
            'category_id'=>1

        ]);
        Menu::create([
            'title'=>'Yemekler',
            'product_id'=>1,
            'category_id'=>1

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
