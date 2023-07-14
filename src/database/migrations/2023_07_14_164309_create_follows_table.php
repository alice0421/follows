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
        Schema::create('follows', function (Blueprint $table) {
            // フォローしている人 (自分)
            $table->foreignId('follower_user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            // フォローされている人
            $table->foreignId('followee_user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['follower_user_id', 'followee_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
};
