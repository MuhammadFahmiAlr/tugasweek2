<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;

class Acara24Controller extends Controller
{
    // ============================================================
    // Acara 24: Authorization - Gates, Policies, Middleware
    // ============================================================

    /**
     * Menampilkan daftar semua post
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        $user = Auth::user();
        return view('acara.acara24_posts', compact('posts', 'user'));
    }

    /**
     * Membuat post baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect('/acara24/posts')->with('success', 'Post berhasil dibuat!');
    }

    /**
     * Prosedur 1b: Menggunakan Gate dalam Controller
     * Mengedit post dengan pengecekan Gate 'edit-post'
     */
    public function edit(Post $post)
    {
        // Menggunakan Gate::denies() sesuai modul
        if (Gate::denies('edit-post', $post)) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit postingan ini.');
        }

        return view('acara.acara24_edit_post', compact('post'));
    }

    /**
     * Prosedur 1b & 2d: Update post menggunakan Gate dan Policy
     */
    public function update(Request $request, Post $post)
    {
        // Prosedur 2d: Menggunakan Policy dalam Controller
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/acara24/posts')->with('success', 'Post berhasil diupdate!');
    }

    /**
     * Menghapus post dengan pengecekan Policy
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/acara24/posts')->with('success', 'Post berhasil dihapus!');
    }
}
