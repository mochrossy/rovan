<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Support\Roles;

/** Kotak masuk pesan dari form kontak. Hanya Super admin. */
class MessageController extends Controller
{
    private function guard(): void { abort_unless(Roles::isAdmin(), 403); }

    public function index()
    {
        $this->guard();
        return view('admin.messages.index', ['items' => ContactMessage::latest()->paginate(20)]);
    }

    public function show(int $id)
    {
        $this->guard();
        $m = ContactMessage::findOrFail($id);
        if (!$m->read_at) $m->update(['read_at' => now()]);
        return view('admin.messages.show', compact('m'));
    }

    public function destroy(int $id)
    {
        $this->guard();
        ContactMessage::findOrFail($id)->delete();
        return redirect()->route('admin.messages')->with('ok', 'Pesan dihapus');
    }
}
