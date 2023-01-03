<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocated_slots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('slot_id')->unsigned()->nullable();
            $table->foreign('slot_id')->references('id')->on('time_slots')->onUpdate('cascade')->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->bigInteger('create_by')->unsigned()->nullable();
            $table->foreign('create_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('edit_attempt')->nullable();
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
        Schema::dropIfExists('allocated_slots');
    }
};
