<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategoriDetailResource;
use App\Http\Resources\KategoriResource;
use App\Models\Berkas;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\SatuanKerja;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  function dashboard()
  {

    return view('pages.dashboard');
  }

  // // // // Admin // // // //
  // Kategori
  function kategoriRutin()
  {
    $rutin = Berkas::where('kategori_id', 1)->get();
    return view('pages.kategori.rutin', compact('rutin'));
  }

  function kategoriNonRutin()
  {
    $nonRutin = Berkas::where('kategori_id', 2)->get();
    // dd($nonRutin);
    return view('pages.kategori.non-rutin', compact('nonRutin'));
  }


  // Berkas
  function berkasPelaporan()
  {
    $berkas = Berkas::where('status', 'Diproses')->get();
    return view('pages.berkas.pelaporan', compact('berkas'));
  }

  function detailBerkasPelaporan($id)
  {
    $berkas = Berkas::findOrFail($id);
    $laporan = Laporan::where('berkas_id', $id)->first();
    return view('pages.berkas.detail-pelaporan', compact('berkas', 'laporan'));
  }

  function updateStatusBerkas(Request $request, $id)
  {
    // dd($request->all());
    $berkas = Berkas::findOrFail($id);
    $berkas->update([
      $berkas->status = $request->status,
    ]);
    $laporan = Laporan::create([
      'tanggapan' => $request->tanggapan,
      'user_id' => auth()->user()->id,
      'berkas_id' => $id,
    ]);

    return redirect()->route('berkas.pelaporan', compact('laporan'))->with('success', 'Berhasil update data');
  }

  function editBerkasPelaporan($id)
  {
    $kategori = Kategori::all();
    $berkas = Berkas::findOrFail($id);
    return view('pages.berkas.edit-pelaporan', compact('berkas', 'kategori'));
  }

  function updateBerkasPelaporan(Request $request, $id)
  {
    $berkas = Berkas::findOrFail($id);
    $berkas->update([
      'kode_berkas' => $request->kode_berkas,
      'judul' => $request->judul,
      'lokasi' => $request->lokasi,
      'pemimpin_lapangan' => $request->pemimpin_lapangan,
      'kategori_id' => $request->kategori_id,
      'tanggal_laporan' => $request->tanggal_laporan,
    ]);
    return redirect()->route('berkas.pelaporan')->with('success', 'Berhasil update data');
  }

  function deleteBerkasPelaporan($id)
  {
    $berkas = Berkas::findOrFail($id);
    $berkas->delete();
    return redirect()->route('berkas.pelaporan')->with('success', 'Berhasil hapus data');
  }

  // Laporan
  function laporanKinerja()
  {
    $user = User::with('berkas')->where('role_id', 2)->get();
    return view('pages.laporan.kinerja', compact('user'));
  }

  function laporanBerkas()
  {
    $laporan = Laporan::all();
    $berkas = Berkas::all();
    return view('pages.laporan.berkas', compact('laporan', 'berkas'));
  }



  // // // // Operator // // // //
  function masukkanLaporan()
  {
    $kategori = Kategori::all();
    return view('pages.operator.masukkan-laporan', compact('kategori'));
  }

  function masukkanLaporanPost(Request $request)
  {
    // dd($request->all());
    $validationData = $request->validate(
      [
        'kode_berkas' => 'required|string|min:5|max:255',
        'judul' => 'required|string|min:5|max:255',
        'lokasi' => 'required|string|min:5|max:255',
        'pemimpin_lapangan' => 'required|string|min:5|max:255',
        'tanggal_laporan' => 'required|date',
        'keterangan' => 'required|string|min:10|max:255',
        'file' => 'required|file|mimes:pdf,jpeg,jpg,zip|max:2048',
        'kategori_id' => 'required',
      ],
      [
        'kode_berkas.required' => 'Kode Berkas tidak boleh kosong',
        'kode_berkas.min' => 'Kode Berkas minimal 5 karakter',
        'judul.required' => 'Judul tidak boleh kosong',
        'judul.min' => 'Judul minimal 5 karakter',
        'lokasi.required' => 'Lokasi tidak boleh kosong',
        'lokasi.min' => 'Lokasi minimal 5 karakter',
        'pemimpin_lapangan.required' => 'Pemimpin Lapangan tidak boleh kosong',
        'pemimpin_lapangan.min' => 'Pemimpin Lapangan minimal 5 karakter',
        'tanggal_laporan.required' => 'Tanggal Laporan tidak boleh kosong',
        'tanggal_laporan.date' => 'Tanggal Laporan harus berupa tanggal',
        'keterangan.required' => 'Keterangan tidak boleh kosong',
        'keterangan.min' => 'Keterangan minimal 10 karakter',
        'file.required' => 'File tidak boleh kosong',
        'file.mimes' => 'File harus berupa file pdf, jpeg, jpg, zip',
        'file.max' => 'File maksimal  2 MB',
        'kategori_id.required' => 'Kategori tidak boleh kosong',
      ]
    );
    $validationData['user_id'] = auth()->user()->id;
    if ($request->hasFile('file')) {
      $validationData['file'] = $request->file->getClientOriginalName();
      $request->file->storeAs('public/berkas', $validationData['file']);
    } else {
      $validated = 'nodatafound';
    }
    $berkas = Berkas::create($validationData);
    return redirect()->route('daftar.laporan', compact('berkas'))->with('success', 'Berhasil menambahkan berkas laporan');
  }

  function daftarLaporan()
  {
    $berkas = Berkas::where('user_id', auth()->user()->id)->get();
    return view('pages.operator.daftar-laporan', compact('berkas'));
  }

  function kinerjaSatuan()
  {
    return view('pages.operator.kinerja-satuan');
  }
}
