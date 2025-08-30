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
        Schema::create('topiks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_topik', 255);
            $table->enum('tipe_topik', ['Topic', 'Geographic', 'Name', 'Temporal', 'Genre', 'Occupation'])->default('Topic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topiks');
    }
};
