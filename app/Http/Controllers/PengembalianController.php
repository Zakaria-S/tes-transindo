<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengembalianRequest;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::with('peminjaman')->whereRelation('peminjaman', 'user_id', Auth::id())->get();
        return view('pengembalian')->with('pengembalians', $pengembalians);
    }

    public function kembalikanMobil(PengembalianRequest $request)
    {
        $peminjaman = Peminjaman::find($request->peminjaman_id);
        if (Auth::id() !== $peminjaman->user_id) {
            return redirect()->back()->withErrors(['peminjaman' => 'Tidak bisa mengembalikan peminjaman yang bukan milik Anda']);
        }

        $tanggal_mulai = Carbon::parse($peminjaman->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($peminjaman->tanggal_selesai);
        $durasi = $tanggal_selesai->diffInDays($tanggal_mulai);

        $pengembalian = Pengembalian::create([
            'peminjaman_id' => $request->peminjaman_id,
            'biaya' => $peminjaman->mobil->tarif * $durasi
        ]);

        $peminjaman->update(['selesai', true]);
        $peminjaman->mobil->update(['ketersediaan' => 'Tersedia']);
        $peminjaman->mobil->save();
    }
}
