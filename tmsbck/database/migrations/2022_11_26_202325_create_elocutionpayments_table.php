<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElocutionpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elocutionpayments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('elocution_cat');
            $table->decimal('amount',8,2);
            $table->date('date');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('elocutionpayments');
    }
}
