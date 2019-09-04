<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;







class BookController extends Controller
{

    public function __construct()
    {
        // OTORISASI GATE
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-books')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->level == 'user') {
            return view('errors.403');
        }

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
        if (Auth::user()->level == 'user') {
            return view('errors.403');
        }
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
        $validation = \Validator::make($request->all(), [
            "judul" => "required|min:4|max:100",
            "isbn" => "required|min:5|max:20|",
            "pengarang" => "required",
            "tahun_terbit" => "required|digits:4|integer",
            "jumlah_buku" => "required|int",
            "deskripsi" => "",
            "penerbit" => "required",
            "lokasi" => "required",
            "cover" => "required"
        ])->validate();

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
        if (Auth::user()->level == 'user') {
            return view('errors.403');
        }
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
        if (Auth::user()->level == 'user') {
            return view('errors.403');
        }
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

        $validation = \Validator::make($request->all(), [
            "judul" => "required|min:4|max:100",
            "isbn" => "required|min:5|max:20|",
            "pengarang" => "required",
            "tahun_terbit" => "required|digits:4|integer",
            "jumlah_buku" => "required|int",
            "deskripsi" => "",
            "penerbit" => "required",
            "lokasi" => "required",
            "cover" => "required"
        ])->validate();

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
