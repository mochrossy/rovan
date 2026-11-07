<?php
namespace App\Http\Controllers;

use App\Mail\NewContactMessage;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $r)
    {
        $back = route('contact') . '#form';

        // Honeypot: kolom "website" tersembunyi, hanya diisi bot. Pura-pura berhasil.
        if (filled($r->input('website'))) {
            return redirect($back)->with('sent', true);
        }

        $d = $r->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'service' => 'nullable|string|max:100',
            'message' => 'required|string|min:10|max:3000',
            'consent' => 'accepted',
        ]);

        $msg = ContactMessage::create([
            'name' => $d['name'], 'email' => $d['email'], 'phone' => $d['phone'] ?? null,
            'service' => $d['service'] ?? null, 'message' => $d['message'], 'ip' => $r->ip(),
        ]);

        // Notifikasi email ke pengelola. Jika email belum dikonfigurasi, form tetap berhasil.
        try {
            if ($to = config('rovan.notify_email')) {
                Mail::to($to)->send(new NewContactMessage($msg));
            }
        } catch (\Throwable $e) {
            report($e);
        }

        // Notifikasi email ke tim. Kegagalan email tidak boleh menggagalkan form.
        try {
            $body = "Nama: {$d['name']}\nEmail: {$d['email']}\nTelepon: " . ($d['phone'] ?? '-')
                . "\nLayanan: " . ($d['service'] ?? '-') . "\n\n{$d['message']}";
            Mail::raw($body, function ($m) use ($d) {
                $m->to(config('rovan.notify_email'))
                  ->replyTo($d['email'], $d['name'])
                  ->subject('Pesan baru dari website: ' . $d['name']);
            });
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect($back)->with('sent', true);
    }
}
