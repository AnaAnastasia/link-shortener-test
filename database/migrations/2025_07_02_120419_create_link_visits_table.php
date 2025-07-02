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
        Schema::create('link_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('short_link_id');
            $table->ipAddress('ip_address');
            $table->timestamp('visited_at')->useCurrent();

            $table->foreign('short_link_id')->references('id')->on('short_links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_visits');
    }
};
