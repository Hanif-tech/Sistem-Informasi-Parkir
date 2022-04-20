<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PetugasKeluarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Car::where('mall_id',Auth::user()->mall_id)->get();
        return view('pages.petugas.keluar.dashboard',[
            'items' => $items
        ]);
    }
    public function update($id)
    {
        $item = Car::with(['car_park'])->find($id);

        //set expire time
        $expiredTime = Carbon::createFromTime(23, 00, 00);

        //ser time now
        $item->jam_keluar = Carbon::now();
        $item->tanggal_keluar = Carbon::now();

        //kondisi jika menginap maka membayar 100rb
        if ($item->tanggal_keluar > $expiredTime) {
            $tanggal_keluar = Carbon::createFromDate($item->tanggal_keluar);
            $tanggal_masuk = Carbon::createFromDate($item->tanggal_masuk);
            $selisihWaktu = $tanggal_keluar->diffInDays($tanggal_masuk);

            $item->status = 'MENGINAP';
            $item->biaya_parkir = 100000 * $selisihWaktu;
        }else{
            $item->status = 'KELUAR';
            $item->biaya_parkir = 10000;
        }

        //parks
        if ($item->car_parks_id != null) {
            # code...
            $item->car_park->status = 'belum';
            $item->car_park->save();
        }


        $item->car_parks_id = null;

        $item->save();
        return redirect()->route('dashboard')->with('success', 'Kendaraan dengan nomor '.$item->plat_nomor.' berhasil keluar');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $input = $request->validate([
            'plat_nomor' => 'required|string|max:10'
        ]);

        //mengambil data sesuai pencarian data
        $cari = Car::where('plat_nomor', 'like', $input)->get();

        return view('pages.petugas.keluar.dashboard', [
            'items' => $cari
        ]);
    }
}
