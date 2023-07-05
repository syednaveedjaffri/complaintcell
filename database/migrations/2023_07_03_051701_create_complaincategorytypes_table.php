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
        Schema::create('complaincategorytypes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaincategory_id')->constrained()->cascadeOnDelete();
            $table->string('complain_category_type');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaincategorytypes');
    }
};
