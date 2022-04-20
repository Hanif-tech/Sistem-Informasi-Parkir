<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarPark;
use App\Http\Controllers\Auth;


class PetugasRuangController extends Controller
{


    public function update(Request $request)
    {
            $input = $request->validate([
                'pilih_plat' => 'required|integer',
                'pilih_ruang' => 'required|integer'
            ]);

            $data = Car::find($input["pilih_plat"]);
            $park = CarPark::find($input["pilih_ruang"]);

            $data->car_parks_id = $input["pilih_ruang"];
            $park->status = 'ditempati';

            $data->save();
            $park->save();


            return redirect()->route('dashboard')->with('success', 'Berhasil menambahkan ruang parkir');

        return redirect('/logout');
    }
}
