<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('portfolios', function (Blueprint $t) {
            $t->id();
            $t->string('client');
            $t->string('title');
            $t->string('category');
            $t->text('description');
            $t->string('tech')->nullable();
            $t->string('image')->nullable();
            $t->string('url')->nullable();
            $t->unsignedInteger('sort_order')->default(0);
            $t->boolean('is_published')->default(true);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('portfolios'); }
};
