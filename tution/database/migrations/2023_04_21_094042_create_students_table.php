<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admission_num');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth');
            $table->integer('grade');  
            $table->text('address');
            $table->string('email');
            $table->integer('contact');
            $table->integer('whatsapp');
            $table->string('parent_name');
            $table->integer('parent_mobile');
            $table->text('image')->nullable()->default('text');
            $table->text('barcode')->nullable()->default('text');
            $table->tinyInteger('is_deleted');
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
        Schema::dropIfExists('students');
    }
}
