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
    Schema::create('blogs', function (Blueprint $table) {
        $table->id();
        $table->string('title');                  // <--- Make sure this is here!
        $table->string('category');               // <--- Make sure this is here!
        $table->text('short_description');        // <--- Make sure this is here!
        $table->longText('content');              // <--- Make sure this is here!
        $table->string('image')->nullable();      // <--- Make sure this is here!
        $table->date('published_date');           // <--- Make sure this is here!
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
