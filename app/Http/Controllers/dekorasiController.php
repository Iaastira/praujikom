<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dekorasi;
use Session;
Use File;

class dekorasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $dekorasi = dekorasi::orderBy('created_at','desc')->get();
        return view('backend.dekorasi.index', compact('dekorasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dekorasi = dekorasi::all();
        return view('backend.dekorasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dekorasi = new dekorasi();
        $dekorasi->judul = $request->judul;
        $dekorasi->deskripsi = $request->deskripsi;

        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() .
                 '/assets/img/dekorasi/';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $upload = $file->move(
                $path,
                $filename
            );
            $dekorasi->foto = $filename;
        }
        $dekorasi->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan <b>"
                . $dekorasi->judul . "</b>"
        ]);
        return redirect()->route('dekorasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $dekorasi = dekorasi::findOrFail($id);
        return view('backend.dekorasi.show',compact('dekorasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $dekorasi = dekorasi::findOrFail($id);
        return view('backend.dekorasi.edit', compact('dekorasi'));

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

        $dekorasi = dekorasi::findOrFail($id);
        $dekorasi->judul = $request->judul;
        $dekorasi->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() .
                 '/assets/img/dekorasi/';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $upload = $file->move(
                $path,
                $filename
            );
            // hapus foto lama, jika ada
            if ($dekorasi->foto) {
                $old_foto = $dekorasi->foto;
                $filepath = public_path() .
                    '/assets/img//' .
                    $dekorasi->foto;
                try {
                    File::delete($filepath);
                }    catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            $dekorasi->foto = $filename;
        }
        $dekorasi->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit <b>"
                . $dekorasi->judul . "</b>"
        ]);
        return redirect()->route('dekorasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dekorasi = dekorasi::findOrFail($id);
        if ($dekorasi->foto) {
            $old_foto = $dekorasi->foto;
            $filepath = public_path()
               . '/assets/img/dekorasi/' . $dekorasi->foto;
            try {
                File::delete($filepath);
            }   catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }
        $dekorasi->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menghapus <b>"
                . $dekorasi->judul . "</b>"
        ]);
        return redirect()->route('dekorasi.index');
    }
}
