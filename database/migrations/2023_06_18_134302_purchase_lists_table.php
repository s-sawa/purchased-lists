<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchased_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id'); //追加:user_id
            $table->string('item_name');
            $table->string('item_maker');
            $table->integer('item_value');
            $table->integer('want_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
