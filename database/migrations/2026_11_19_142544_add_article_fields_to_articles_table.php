<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('body');
            $table->string('image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn(['title', 'slug', 'body', 'image']);
        });
    }
};