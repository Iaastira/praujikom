<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisPaket;
use Session;
class JenisPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispaket = JenisPaket::orderBy('created_at','desc')->get();
        return view('backend.jenispaket.index', compact('jenispaket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('backend.jenispaket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //   $this->validate($request,[
        //     'nama_paket' => 'required|unique:nama_pakets'
        // ]);
        $jenispaket = new JenisPaket();
        //dd($jenispaket);
        $jenispaket->nama_paket = $request->nama_paket;
        $jenispaket->slug = str_slug($request->nama_paket, '-');
        //dd($jenispaket);
        $jenispaket->save();
        //dd($jenispaket);
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan<b>"
                        . $jenispaket->nama_paket."</b>"
        ]);
        return redirect()->route('jenispaket.index');
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
         $jenispaket = jenispaket::findOrFail($id);
        return view('backend.jenispaket.edit',compact('jenispaket'));
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
        //    $this->validate($request,[
        //     'nama_paket' => 'required|unique:nama_paket'
        // ]);
        $jenispaket = JenisPaket::findOrFail($id);
        $jenispaket->nama_paket = $request->nama_paket;
        $jenispaket->slug = str_slug($request->nama_paket, '-');
        $jenispaket->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit<b>"
                        . $jenispaket->nama_paket."</b>"
        ]);
        return redirect()->route('jenispaket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $jenispaket = jenispaket::findOrFail($id)->delete();
        if (!jenispaket::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "jenispaket berhasil dihapus"
        ]);
        return redirect()->route('jenispaket.index');
    }
}
