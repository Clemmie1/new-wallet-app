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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->references('id')->on('users');
            $table->bigInteger('card_number')->unsigned()->unique();
            $table->string('card_type');
            $table->string('сard_expiration_Date');
            $table->integer('сard_cvv');
            $table->boolean('card_blocked')->default(0)->nullable();
            $table->decimal('card_balance', 10,2)->default(00.0)->unsigned()->nullable();
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
        Schema::dropIfExists('cards');
    }
};
