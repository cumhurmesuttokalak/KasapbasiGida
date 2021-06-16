<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->boolean('is_deleted')->nullable() ->default(0);
            $table->timestamps();



        });

        Category::create([
            'title'=>'Birinci'

        ]);
        Category::create([
            'title'=>'İkinci'

        ]);
        Category::create([
            'title'=>'İkinci'

        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
