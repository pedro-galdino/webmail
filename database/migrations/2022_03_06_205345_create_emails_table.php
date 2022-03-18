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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('sender')->nullable();
            $table->string('recipient')->nullable();
            $table->string('subject');
            $table->text('body');
            $table->string('sender_guarded');
            $table->boolean('sender_readed')->default(0);
            $table->boolean('recipient_readed')->default(0);
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
        Schema::dropIfExists('emails');
    }
};
