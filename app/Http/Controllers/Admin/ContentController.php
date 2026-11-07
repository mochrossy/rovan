<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/** Satu controller CRUD untuk 'posts' (news/blog) dan 'portfolios'. */
class ContentController extends Controller
{
    // field => [tipe input, wajib?]
    private function cfg(string $type): array
    {
        abort_unless(in_array($type, \App\Support\Roles::types(\App\Support\Roles::current())), 403);
        return match ($type) {
            'posts' => ['model' => Post::class, 'label' => 'News / Blog', 'fields' => [
                'title' => ['text', true], 'excerpt' => ['textarea', false], 'body' => ['textarea', true],
                'cover' => ['file', false], 'meta_title' => ['text', false],
                'meta_description' => ['text', false], 'published_at' => ['datetime-local', false],
            ]],
            'portfolios' => ['model' => Portfolio::class, 'label' => 'Portfolio', 'fields' => [
                'client' => ['text', true], 'title' => ['text', true], 'category' => ['text', true],
                'description' => ['textarea', true], 'tech' => ['text', false], 'image' => ['file', false],
                'url' => ['text', false], 'sort_order' => ['number', false],
            ]],
            default => abort(404),
        };
    }

    public function index(string $type)
    {
        $c = $this->cfg($type);
        return view('admin.index', ['type' => $type, 'c' => $c, 'items' => $c['model']::latest()->paginate(15)]);
    }

    public function create(string $type)
    {
        $c = $this->cfg($type);
        return view('admin.form', ['type' => $type, 'c' => $c, 'item' => new $c['model']]);
    }

    public function edit(string $type, int $id)
    {
        $c = $this->cfg($type);
        return view('admin.form', ['type' => $type, 'c' => $c, 'item' => $c['model']::findOrFail($id)]);
    }

    public function store(Request $r, string $type)
    {
        return $this->save($r, $type, new ($this->cfg($type)['model']));
    }

    public function update(Request $r, string $type, int $id)
    {
        return $this->save($r, $type, $this->cfg($type)['model']::findOrFail($id));
    }

    public function destroy(string $type, int $id)
    {
        $this->cfg($type)['model']::findOrFail($id)->delete();
        return redirect()->route('admin.index', $type)->with('ok', 'Dihapus');
    }

    private function save(Request $r, string $type, $item)
    {
        $c = $this->cfg($type);
        $rules = [];
        foreach ($c['fields'] as $f => [$kind, $req]) {
            $rules[$f] = ($req ? 'required' : 'nullable') . match ($kind) {
                'file' => '|image|max:2048', 'datetime-local' => '|date', 'number' => '|integer', default => '|string',
            };
        }
        $data = $r->validate($rules);

        foreach ($c['fields'] as $f => [$kind]) {
            if ($kind !== 'file') continue;
            if ($r->hasFile($f)) $data[$f] = $r->file($f)->store($type, 'public');
            else unset($data[$f]);
        }
        if ($type === 'posts' && !$item->exists) {
            $slug = Str::slug($data['title']);
            if (Post::where('slug', $slug)->exists()) $slug .= '-' . now()->timestamp;
            $data['slug'] = $slug;
        }
        if ($type === 'portfolios') {
            $data['is_published'] = $r->boolean('is_published');
            $data['sort_order'] = $data['sort_order'] ?? 0;
        }
        $item->fill($data)->save();
        return redirect()->route('admin.index', $type)->with('ok', 'Tersimpan');
    }
}
