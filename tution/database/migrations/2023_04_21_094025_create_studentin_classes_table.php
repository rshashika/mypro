<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentinClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentin_classes', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('class');
            $table->enum('fees_type', ['FREE_CARD', 'HALF_CARD','CHARGE'])->nullable();
            $table->date('join_date');  
            $table->integer('added');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentin_classes');
    }
}
