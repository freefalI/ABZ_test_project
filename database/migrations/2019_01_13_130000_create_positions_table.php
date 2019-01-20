<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('positions', function (Blueprint $table) {
            // $table->increments('id');
            
            // $table->string('name',100);
        //     $table->unsignedInteger('supervisor_position_id');
        //     $table->unsignedInteger('nesting_level');
            // $table->boolean('is_only');
            
            // $table->timestamps();
        //     // $table->foreign('supervisor_position_id')->references('id')->on('positions');

        // });

        Schema::create('positions', function (Blueprint $table) {
            $table->engine = 'MyIsam';

            $table->increments('id');
            $table->string('name',100);
            $table->boolean('is_only');//if there can be only one employee in this poosition
            $table->timestamps();
            
            $table->nestedSet();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
