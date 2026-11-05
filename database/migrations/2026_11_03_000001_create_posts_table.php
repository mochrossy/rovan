<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('posts', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('slug')->unique();
            $t->text('excerpt')->nullable();
            $t->longText('body');
            $t->string('cover')->nullable();
            $t->string('meta_title')->nullable();
            $t->string('meta_description', 300)->nullable();
            $t->timestamp('published_at')->nullable()->index(); // null = draft
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('posts'); }
};
