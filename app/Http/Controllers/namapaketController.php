<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\namapaket;
use App\JenisPaket;
use App\File;
use Session;

class namapaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $namapaket = namapaket::orderBy('created_at','desc')->get();
        return view('backend.namapaket.index', compact('namapaket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenispaket = jenispaket::all();
        return view('backend.namapaket.create', compact('jenispaket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
            'judul' => ' required|unique:artikels',
            'deskripsi' => 'required|min:50',
            'foto' => 'required|mimes:jpeg,jpg,png,gif|max:2048',

        ]);
        $namapaket = new NamaPaket();
        $namapaket->judul = $request->judul;
        $namapaket->deskripsi = $request->deskripsi;

        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() .
                 '/assets/img/artikel/';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $upload = $file->move(
                $path,
                $filename
            );
            $artikel->foto = $filename;
        }
        $artikel->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan <b>"
                . $artikel->judul . "</b>"
        ]);
        return redirect()->route('namapaket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
