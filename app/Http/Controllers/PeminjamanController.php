<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeminjamanRequest;
use App\Models\Mobil;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::where('user_id', Auth::id())->get();
        return view('peminjaman')->with('peminjamans', $peminjamans);
    }

    public function formPeminjaman($id)
    {
        $mobil = Mobil::find($id);
        if (!$mobil) {
            return redirect()->back()->withErrors(['mobilId' => 'Tidak Ada Mobil dengan ID ' . $id]);
        }
        return view('form-peminjaman')->with('mobil', $mobil);
    }

    public function buatPeminjaman(PeminjamanRequest $request, $id)
    {
        $request->validated();
        $mobil = Mobil::find($id);

        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai);

        if (
            $mobil->ketersediaan === 'Tidak Tersedia'
        ) {
            $prevPeminjaman = Peminjaman::where('mobil_id', $mobil->id)->where('selesai', false)->latest()->first();
            $prev_tanggal_selesai = Carbon::parse($prevPeminjaman->tanggal_selesai);
            if ($tanggal_mulai->lte($prev_tanggal_selesai)) {
                return redirect()->back()->withErrors(['tanggal_mulai' => 'Mobil tidak tersedia pada tanggal yang Anda pilih']);
            }
        }

        if ($tanggal_mulai->gte($tanggal_selesai)) {
            return redirect()->back()->withErrors(['tanggal_selesai' => 'Tanggal selesai minimal sehari setelah tanggal mulai']);
        }

        $peminjaman = Peminjaman::create([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'mobil_id' => $mobil->id,
            'user_id' => Auth::id()
        ]);

        $mobil->update(['ketersediaan' => 'Tidak Tersedia']);
        $mobil->save();

        return redirect()->back()->with('success', 'Berhasil meminjam mobil');
    }
}
