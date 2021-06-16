<?php

use App\Models\Sub_menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('link')->nullable();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->boolean('is_deleted')->nullable() ->default(0);
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('category_id')->references('id')->on('categories');


        });
        Sub_menu::create([
            'title'=>'Sıcak icecekler',
            'menu_id'=>1,
            'product_id'=>1,
            'category_id'=>1

        ]);
        Sub_menu::create([
            'title'=>'Soguk icecekler',
            'menu_id'=>2,
            'product_id'=>2,
            'category_id'=>2

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_menus');
    }
}
