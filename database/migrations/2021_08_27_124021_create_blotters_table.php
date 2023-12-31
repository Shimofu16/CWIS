<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlottersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blotters', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('barangay_id');

            $table->string('case_number', 32);
            $table->string('complainant_name', 32);
            $table->string('complained_resident', 32)->nullable();
            $table->string('blotters_info', 32);
            $table->string('case_type', 32);
            $table->date('date_of_incident');
            $table->dateTime('settled_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->text('agreement')->nullable();

            $table->string('bcp1', 32)->nullable();
            $table->string('bcp1_note', 32)->nullable();
            $table->dateTime('bcp1_date')->nullable();

            $table->string('bcp2', 32)->nullable();
            $table->string('bcp2_note', 32)->nullable();
            $table->dateTime('bcp2_date')->nullable();

            $table->string('bcp3', 32)->nullable();
            $table->string('bcp3_note', 32)->nullable();
            $table->dateTime('bcp3_date')->nullable();

            $table->string('lbp1', 32)->nullable();
            $table->string('lbp1_note', 32)->nullable();
            $table->dateTime('lbp1_date')->nullable();

            $table->string('lbp2', 32)->nullable();
            $table->string('lbp2_note', 32)->nullable();
            $table->dateTime('lbp2_date')->nullable();

            $table->string('lbp3', 32)->nullable();
            $table->string('lbp3_note', 32)->nullable();
            $table->dateTime('lbp3_date')->nullable();

            // $table->unsignedBigInteger('barangay_id');
            // $table->foreign('barangay_id')->references('id')->on('barangays')->onDelete('cascade');
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
        Schema::dropIfExists('blotters');
    }
}
