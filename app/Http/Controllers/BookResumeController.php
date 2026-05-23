<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

class BookResumeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CREATE RESUME PAGE
    |--------------------------------------------------------------------------
    */

    public function create(Book $book)
    {
        return view('bookresume.create', compact('book'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE RESUME
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'nullable|max:255',
            'content' => 'required'
        ]);

        // Bersihkan HTML dari Quill editor
        $cleanContent = Purifier::clean(
            $request->input('content')
        );

        // Simpan resume
        BookResume::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'title' => $request->input('title'),
            'content' => $cleanContent,
            'has_spoiler' => $request->has('has_spoiler'),
            'is_public' => true
        ]);

        return redirect()
            ->route('resume.my')
            ->with('success', '🎉 Resume berhasil dipublikasikan!');
    }

    /*
    |--------------------------------------------------------------------------
    | MY RESUMES
    |--------------------------------------------------------------------------
    */

    public function myResumes()
    {
        $resumes = BookResume::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(9);

        return view(
            'bookresume.my-resumes',
            compact('resumes')
        );
    }
}