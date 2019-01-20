<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->engine = 'MyIsam';

            $table->string('name',100);
            $table->string('surname',100);
            $table->string('patronymic',100);
            $table->unsignedInteger('position_id');
            $table->date('hire_date');
            $table->double('salary',8,2);
            
            
            $table->increments('id');
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions');
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
        Schema::dropIfExists('employees');
    }
}
