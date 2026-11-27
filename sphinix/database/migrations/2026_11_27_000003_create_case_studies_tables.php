<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table): void {
            $table->id();
            $table->string('slug', 120)->unique();
            $table->string('name', 160);
            $table->string('categories', 255)->default('iot');
            $table->string('industry', 160);
            $table->string('services_delivered', 255)->nullable();
            $table->text('description');
            $table->text('summary');
            $table->string('cover_image')->nullable();
            $table->string('client_logo_path')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_poster_path')->nullable();
            $table->boolean('has_dot_mark')->default(false);
            $table->boolean('is_published')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });

        Schema::create('case_study_slides', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('case_study_id')->constrained('case_studies')->cascadeOnDelete();
            $table->string('image_path');
            $table->string('caption', 200)->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_study_slides');
        Schema::dropIfExists('case_studies');
    }
};
