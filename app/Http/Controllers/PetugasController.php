<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->roles == 'PETUGAS MASUK' && Auth::user()->mall_id == 1){
            $items = Car::all();
            return view('pages.petugas.masuk.tp_dashboard',[
            'items' => $items
        ]);
        }

        return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {

        $data = $request->all();
        $data['car_parks_id'] = 1;
        $data['mall_id'] = 1;
        $data['jam_masuk'] = date('H:i');
        $data['tanggal_masuk'] = date('Y-m-d');
        $data['status'] = 'PARKING';

        Car::create($data);
        return redirect()->route('masuk-parkir-tp.show',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check() && Auth::user()->roles == 'PETUGAS MASUK' && Auth::user()->mall_id == 1){
            $items = Car::with(['car_park','mall'])->where('mall_id',$id)->get();
            return view('pages.tp_kendaraan',[
            'items' => $items
        ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
