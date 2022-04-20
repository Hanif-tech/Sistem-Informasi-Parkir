<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;



class PetugasMasukController extends Controller
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
        return view('pages.petugas.masuk.dashboard');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->roles == 'PETUGAS MASUK')
        {
        $cars = Car::where('mall_id', Auth::user()->mall_id)->get();
        $input = $request->validate([
            'plat_nomor' => 'required|string|max:10'
        ]);
        $input['mall_id'] = Auth::user()->mall_id;
        $input['jam_masuk'] = date('H:i');
        $input['tanggal_masuk'] = date('Y-m-d');
        $input['status'] = 'PARKING';


        foreach($cars as $car){
            if($car->plat_nomor == $input['plat_nomor'] && $car->status == 'PARKING' || $car->plat_nomor == $input['plat_nomor'] && $car->status == 'MENGINAP')
            {
                return redirect()->route('dashboard')->with('fail', 'Nomor Kendaraan sudah ada');
            }
        }
        Car::create($input);
        return redirect()->route('dashboard')->with('success', 'Berhasil menambahkan data');

        }

        return redirect('/logout');
    }
}
