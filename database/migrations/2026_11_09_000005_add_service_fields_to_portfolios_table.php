<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('portfolios', function (Blueprint $t) {
            $t->string('slug')->nullable()->unique()->after('id');
            $t->string('type')->default('client')->after('title');   // client | sample | internal
            $t->string('service_slug')->nullable()->after('type');   // slug sub-layanan di ServiceCatalog
            $t->unsignedSmallInteger('year')->nullable();
            $t->text('challenge')->nullable();   // kondisi awal (baseline)
            $t->text('solution')->nullable();
            $t->text('result')->nullable();      // hasil dibandingkan baseline
        });
    }
    public function down(): void {
        Schema::table('portfolios', function (Blueprint $t) {
            $t->dropColumn(['slug', 'type', 'service_slug', 'year', 'challenge', 'solution', 'result']);
        });
    }
};
