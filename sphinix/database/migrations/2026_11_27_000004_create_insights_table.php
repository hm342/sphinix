<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('insights', function (Blueprint $table): void {
            $table->id();
            $table->string('slug', 160)->unique();
            $table->string('title', 200);
            $table->string('category', 60)->default('strategy')->index();
            $table->string('category_label', 80)->default('Strategy & Systems');
            $table->text('excerpt');
            $table->longText('body')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('cover_alt', 255)->nullable();
            $table->string('author_name', 120)->default('Sphinix Marketing Team');
            $table->string('read_time', 60)->default('4 min read');
            $table->date('published_at')->nullable()->index();
            $table->string('cta_label', 100)->nullable();
            $table->string('external_url')->nullable();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('show_on_home')->default(true)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insights');
    }
};
