<?php
namespace App\Console\Commands;

use App\Models\ContactMessage;
use Illuminate\Console\Command;

class PruneMessages extends Command
{
    protected $signature = 'rovan:prune-messages {days=365 : Hapus pesan yang lebih lama dari N hari}';
    protected $description = 'Hapus pesan kontak lama agar data pribadi tidak menumpuk';

    public function handle(): int
    {
        $n = ContactMessage::where('created_at', '<', now()->subDays((int) $this->argument('days')))->delete();
        $this->info("{$n} pesan dihapus.");
        return self::SUCCESS;
    }
}
