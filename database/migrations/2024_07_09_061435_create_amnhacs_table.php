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
        Schema::create('amnhacs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten', 50);
            $table->integer('id_nhacsi')->unsigned();
            $table->foreign('id_nhacsi')->references('id')
                ->on('nhacsis')
//                ->onDelete('cascade')
                ->onDelete('set null');
            $table->text('mota', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amnhacs');
    }
};
