<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\CarPark;


class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->roles == 'PETUGAS MASUK')
        {
            return view('pages.petugas.masuk.dashboard');
        }
        elseif (Auth::check() && Auth::user()->roles == 'PETUGAS KELUAR')
        {
            $items = Car::where('mall_id',Auth::user()->mall_id)->get();
            return view('pages.petugas.keluar.dashboard',[
            'items' => $items
        ]);
        }
        elseif (Auth::check() && Auth::user()->roles == 'PETUGAS RUANG')
        {
            $cars =  Car::with(['car_park'])->where('mall_id',Auth::user()->mall_id)->get();
            $parks =  CarPark::with(['mall'])->where('mall_id',Auth::user()->mall_id)->get();
            return view('pages.petugas.ruang.dashboard',[
                'cars' => $cars,
                'parks' => $parks
            ]);
        }
        elseif (Auth::check() && Auth::user()->roles == 'ADMIN')
        {
            return redirect('/admin');
        }

         return redirect('/logout');
    }
}
