<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('tution_id');
            $table->string('month_for_pay');
            $table->date('payment_date');  
            $table->decimal('fees',8,2);
            $table->string('status');
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
        Schema::dropIfExists('students_fees');
    }
}
