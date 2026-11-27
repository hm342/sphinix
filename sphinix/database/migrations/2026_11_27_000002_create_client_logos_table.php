<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_logos', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 120);
            $table->string('subtitle', 120)->nullable()->default('Client Partner');
            $table->string('logo_path')->nullable();
            $table->string('industry', 120)->nullable();
            $table->string('website_url')->nullable();
            $table->string('case_study_slug', 120)->nullable()->index();
            $table->unsignedTinyInteger('carousel_row')->default(1)->index();
            $table->boolean('show_in_marquee')->default(true)->index();
            $table->boolean('show_in_directory')->default(true)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_logos');
    }
};
