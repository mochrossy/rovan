<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/** Manajemen pengguna dashboard. Hanya untuk Super admin. */
class UserController extends Controller
{
    private function guard(): void { abort_unless(Roles::isAdmin(), 403); }

    public function index()
    {
        $this->guard();
        return view('admin.users.index', ['users' => User::orderBy('name')->get()]);
    }

    public function create()
    {
        $this->guard();
        return view('admin.users.create');
    }

    public function store(Request $r)
    {
        $this->guard();
        $d = $r->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:' . implode(',', array_keys(Roles::LABELS)),
            'password' => 'required|string|min:10',
        ]);
        User::forceCreate([
            'name' => $d['name'], 'email' => $d['email'],
            'role' => $d['role'], 'password' => Hash::make($d['password']),
        ]);
        return redirect()->route('admin.users')->with('ok', 'Pengguna dibuat');
    }

    public function destroy(int $id)
    {
        $this->guard();
        abort_if($id === auth()->id(), 403, 'Tidak bisa menghapus akun sendiri.');
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('ok', 'Pengguna dihapus');
    }
}
