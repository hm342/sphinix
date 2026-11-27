<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table): void {
            $table->id();
            $table->string('slug', 80)->unique();
            $table->string('num', 10)->default('01');
            $table->string('nav_title', 80);
            $table->string('nav_desc', 160);
            $table->string('nav_icon', 60)->default('campaign');
            $table->string('eyebrow', 120);
            $table->string('dot_color', 20)->default('#E85D2A');
            $table->string('title', 140);
            $table->string('card_title', 80);
            $table->text('short_desc');
            $table->text('full_desc');
            $table->json('chips')->nullable();
            $table->json('features')->nullable();
            $table->string('tools', 255)->nullable();
            $table->string('cta_card', 80)->default('Explore service');
            $table->string('cta_detail', 80)->default('Explore Service');
            $table->string('route_name', 80)->default('services.index');
            $table->string('anchor', 80)->nullable();
            $table->string('detail_route', 80)->nullable();
            $table->string('image_path')->nullable();
            $table->string('alt', 255)->nullable();
            $table->string('accordion_alt', 255)->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
