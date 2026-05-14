<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Tampilkan daftar post.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        
        // Ambil data post, bisa difilter berdasarkan role
        $query = Post::with('studyClub');
        
        // Jika user adalah coach, tampilkan post dari club yang dia pegang
        if ($user && $user->hasRole('coach')) {
            $query->whereHas('studyClub', function ($q) use ($user) {
                $q->where('coach_id', $user->id);
            });
        }

        $posts = $query->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $posts
        ]);
    }

    /**
     * Simpan data post baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'study_club_id' => 'required|exists:study_clubs,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->title) . '-' . uniqid();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Post berhasil dibuat',
            'data' => $post
        ], 201);
    }

    /**
     * Tampilkan detail post.
     */
    public function show($id)
    {
        $post = Post::with('studyClub')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $post
        ]);
    }

    /**
     * Update data post.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'study_club_id' => 'sometimes|required|exists:study_clubs,id',
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->except('image');

        if ($request->has('title') && $request->title !== $post->title) {
            $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        }

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Post berhasil diperbarui',
            'data' => $post
        ]);
    }

    /**
     * Hapus post.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Post berhasil dihapus'
        ]);
    }
}
