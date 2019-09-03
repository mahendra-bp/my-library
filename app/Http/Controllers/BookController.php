<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->judul = $request->get('judul');
        $book->isbn = $request->get('isbn');
        $book->pengarang = $request->get('pengarang');
        $book->tahun_terbit = $request->get('tahun_terbit');
        $book->jumlah_buku = $request->get('jumlah_buku');
        $book->deskripsi = $request->get('deskripsi');
        $book->penerbit = $request->get('penerbit');
        $book->lokasi = $request->get('lokasi');
        $cover = $request->file('cover');
        if ($cover) {
            $cover_path = $cover->store('cover', 'public');
            $book->cover = $cover_path;
        }
        $book->save();
        return redirect()
            ->route('books.create')
            ->with('status', 'Book successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->judul = $request->get('judul');
        $book->isbn = $request->get('isbn');
        $book->pengarang = $request->get('pengarang');
        $book->tahun_terbit = $request->get('tahun_terbit');
        $book->jumlah_buku = $request->get('jumlah_buku');
        $book->deskripsi = $request->get('deskripsi');
        $book->penerbit = $request->get('penerbit');
        $book->lokasi = $request->get('lokasi');
        $cover = $request->file('cover');
        if ($cover) {
            $cover_path = $cover->store('cover', 'public');
            $book->cover = $cover_path;
        }
        $book->save();
        return redirect()
            ->route('books.create')
            ->with('status', 'Book successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('status', 'Book
successfully delete');
    }
}
