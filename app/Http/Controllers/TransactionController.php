<?php

namespace App\Http\Controllers;

use App\Book;
use App\Member;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // if (Auth::user()->level == 'user') {
        //     $transactions = Transaction::where('anggota_id', Auth::user()->member->id)
        //         ->get();
        // } else {
        //     $transactions = Transaction::get();
        // }
        $transactions = Transaction::get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = Transaction::orderBy('id', 'DESC')->get();

        $lastId = $getRow->first();
        $kode = "TR0000" . ($lastId->id + 1);
        $books = Book::where('jumlah_buku', '>', 0)->get();
        $members = Member::get();
        // return view('transactions.create',  ['kode' => $kode], ['books' => $books], ['members' => $members]);
        // return view('transactions.create',  compact('kode', 'books', 'members'));
        return view('transactions.create',  ['kode' => $kode, 'members' => $members, 'books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $transaction = Transaction::create([
            'kode_transaksi' => $request->get('kode_transaksi'),
            'tgl_pinjam' => $request->get('tgl_pinjam'),
            'tgl_kembali' => $request->get('tgl_kembali'),
            'buku_id' => $request->get('buku_id'),
            'anggota_id' => $request->get('anggota_id'),
            'ket' => $request->get('ket'),
            'status' => 'pinjam'
        ]);

        $transaction->books->where('id', $transaction->buku_id)->update([
            'jumlah_buku' => ($transaction->books->jumlah_buku - 1)
        ]);


        return redirect()
            ->route('transactions.create')
            ->with('status', 'Transaction successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = \App\Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'status' => 'kembali'
        ]);

        $transaction->books->where('id', $transaction->buku_id)->update([
            'jumlah_buku' => ($transaction->books->jumlah_buku + 1)
        ]);
        return redirect()->route('transactions.index')->with('status', 'Trasaction 
successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('status', 'Trasaction
successfully delete');
    }
}
