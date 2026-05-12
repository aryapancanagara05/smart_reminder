<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $now    = Carbon::now();

        // Query dasar — hanya milik user yang login
        $query = Jadwal::where('user_id', $userId);

        // === FILTER TAB ===
        $tab = $request->get('tab');
        if ($tab === 'upcoming') {
            // Akan datang: status 'akan datang' DAN due_date belum lewat
            $query->where('status', 'akan datang')->where('due_date', '>=', $now);

        } elseif ($tab === 'selesai') {
            $query->where('status', 'selesai');

        } elseif ($tab === 'terlewat') {
            // Terlewat: status 'akan datang' TAPI due_date sudah lewat
            $query->where('status', 'akan datang')->where('due_date', '<', $now);
        }
        // Tidak ada tab = tampilkan semua

        // === FILTER PRIORITAS ===
        if ($request->get('prioritas')) {
            $query->where('tingkat_kepentingan', $request->get('prioritas'));
        }

        // === SEARCH ===
        if ($request->get('cari')) {
            $query->where('judul_kegiatan', 'like', '%' . $request->get('cari') . '%');
        }

        $jadwal = $query->orderBy('due_date', 'asc')->get();

        // === HITUNG STATS (selalu dari semua data, tanpa filter tab) ===
        $semua    = Jadwal::where('user_id', $userId)->get();
        $total    = $semua->count();
        $selesai  = $semua->where('status', 'selesai')->count();
        $upcoming = $semua->where('status', 'akan datang')
                          ->filter(fn($j) => $j->due_date && $j->due_date >= $now)->count();
        $terlewat = $semua->where('status', 'akan datang')
                          ->filter(fn($j) => $j->due_date && $j->due_date < $now)->count();

        // === DATA TERLEWAT untuk card sidebar kanan ===
        $jadwalTerlewat = Jadwal::where('user_id', $userId)
                                ->where('status', 'akan datang')
                                ->where('due_date', '<', $now)
                                ->orderBy('due_date', 'asc')
                                ->get();

        return view('dashboard', compact(
            'jadwal',
            'jadwalTerlewat',
            'total',
            'selesai',
            'upcoming',
            'terlewat'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_kegiatan'      => 'required|string|max:255',
            'catatan'             => 'nullable|string',
            'waktu'               => 'required|integer|min:1',
            'satuan_waktu'        => 'required|in:menit,jam,hari',
            'tingkat_kepentingan' => 'required|in:tidak penting,penting,sangat penting',
        ]);

        // Hitung due_date dari waktu + satuan
        // Cast ke (int) wajib — Carbon::add() tidak menerima string
        $waktu   = (int) $request->waktu;
        $map     = ['menit' => 'minutes', 'jam' => 'hours', 'hari' => 'days'];
        $dueDate = Carbon::now()->add($map[$request->satuan_waktu], $waktu);

        Jadwal::create([
            'user_id'             => Auth::id(),
            'judul_kegiatan'      => $request->judul_kegiatan,
            'catatan'             => $request->catatan,
            'waktu'               => $request->waktu,
            'satuan_waktu'        => $request->satuan_waktu,
            'tingkat_kepentingan' => $request->tingkat_kepentingan,
            'status'              => 'akan datang',
            'due_date'            => $dueDate,
        ]);

        return redirect()->route('dashboard')->with('status', 'Pengingat berhasil ditambahkan!');
    }

    public function updateStatus(Jadwal $jadwal)
    {
        abort_if($jadwal->user_id !== Auth::id(), 403);

        $jadwal->update([
            'status' => $jadwal->status === 'selesai' ? 'akan datang' : 'selesai',
        ]);

        return back()->with('status', 'Status pengingat diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        abort_if($jadwal->user_id !== Auth::id(), 403);
        $jadwal->delete();

        return back()->with('status', 'Pengingat berhasil dihapus.');
    }

    public function destroyDone()
    {
        $count = Jadwal::where('user_id', Auth::id())
                       ->where('status', 'selesai')
                       ->delete();

        return back()->with('status', "$count pengingat selesai berhasil dihapus.");
    }
}