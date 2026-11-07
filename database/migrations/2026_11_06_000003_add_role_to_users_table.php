<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $t) {
            // admin = super admin, editor = News, portfolio = Portfolio manager
            $t->string('role')->default('editor')->after('email');
        });
        // akun pertama (pemilik) dijadikan super admin
        $first = DB::table('users')->min('id');
        if ($first) DB::table('users')->where('id', $first)->update(['role' => 'admin']);
    }
    public function down(): void {
        Schema::table('users', fn (Blueprint $t) => $t->dropColumn('role'));
    }
};
