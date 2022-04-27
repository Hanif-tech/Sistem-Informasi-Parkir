<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\CarPark;
use App\Models\mall;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(){
        if(Auth::check() && Auth::user()->roles == 'ADMIN')
        {
            return view('pages.admin.home');
        }
    }

    public function kendaraan(){
        $items = Car::with(['car_park','mall'])->where('status', 'PARKING')->paginate(5);
        return view('pages.admin.car',[
            'items' => $items
        ]);

    }

    public function parkir(){
        $items = CarPark::with(['mall'])->paginate(6);
        $mall = mall::all();
        return view('pages.admin.room',[
            'items' => $items,
            'malls' => $mall
        ]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $input = $request->validate([
            'plat_nomor' => 'required|string|max:10'
        ]);

        //mengambil data sesuai pencarian data
        $cari = Car::where('plat_nomor', 'like', $input)->paginate(1);

        return view('pages.admin.car', [
            'items' => $cari
        ]);
    }

    public function cari_ruang(Request $request)
    {
        // menangkap data pencarian
        $input = $request->validate([
            'nama_ruang' => 'required|string|max:10'
        ]);

        //mengambil data sesuai pencarian data
        $cari = CarPark::where('nama_ruang', 'like', $input)->paginate(1);

        return view('pages.admin.room', [
            'items' => $cari
        ]);
    }

    public function update(Request $request, $id){
        $input = $request->validate([
            'nama_ruang' => 'required|string|max:10',
            'lantai' => 'required|integer|max:5',
            // 'mall_id' => 'required|string|max:10',
        ]);

        $data = CarPark::find($id);

        $data->nama_ruang = $input['nama_ruang'];
        $data->lantai = $input['lantai'];

        $data->save();
        return redirect()->route('ruang-parkir')->with('success', 'Berhasil melakukan update data');
    }

    public function tambah_ruang(Request $request)
    {
        // menangkap data pencarian
        $input = $request->validate([
            'nama_ruang' => 'required|string|max:10',
            'lantai' => 'required|integer|max:5',
            'mall_id' => 'required|string|max:10',
        ]);

        CarPark::create($input);
        return redirect()->route('ruang-parkir');
    }

    public function remove(Request $request,$id)
    {
        $item = CarPark::find($id);

        if($item->status == 'ditempati')
        {
            return redirect()->route('ruang-parkir')->with('fail', 'Gagal menghapus data, ruang parkir sedang ditempati');
        }

        $item->delete();

        return redirect()->route('ruang-parkir')->with('success', 'Berhasil menghapus data');
    }

    public function laporan()
    {

        DB::statement("SET SQL_MODE=''"); //trik dari stackoverflow https://stackoverflow.com/questions/40917189/laravel-syntax-error-or-access-violation-1055-error

        //SELECT tanggal_masuk, biaya_parkir, count(tanggal_masuk) as jumlah_mobil, SUM(biaya_parkir) as jumlah_biaya, status FROM `cars` WHERE status like 'KELUAR' GROUP BY tanggal_masuk

        //query menghitung inap per hari
        // select tanggal_masuk, biaya_parkir, count(tanggal_masuk) as jumlah_mobil, sum(biaya_parkir) as jumlah_biaya, status, datediff(tanggal_keluar, tanggal_masuk) as Menginap from cars GROUP BY tanggal_masuk

        //custom query perhari
        $items = DB::select('select tanggal_masuk, biaya_parkir, count(tanggal_masuk) as jumlah_mobil, sum(biaya_parkir) as jumlah_biaya, status from cars GROUP BY tanggal_masuk');

        // custom query perbulan
        $bulan = DB::select('select tanggal_masuk, biaya_parkir, count(plat_nomor) as jumlah_mobil, sum(biaya_parkir) as jumlah_biaya, status from cars GROUP BY MONTH(tanggal_masuk)');

        // custom query perbulan
        $pilihanBulan = DB::select('select tanggal_masuk, biaya_parkir, count(plat_nomor) as jumlah_mobil, sum(biaya_parkir) as jumlah_biaya, status from cars where month(tanggal_masuk) = ? ',[04]);

        // $items = Car::whereBetween('tanggal_masuk', ['2022-03-08', '2022-04-26'])->get();
        return view('pages.admin.report',[
            'no'    => 1,
            // 'bulan' => $pilihanBulan
            'items' => $items
        ]);
    }

    public function detailLaporan($tanggal)
    {
        $items = Car::with(['mall'])->where('tanggal_masuk',$tanggal)->paginate(6);
        $no = 1;
        return view('pages.admin.detail-reports', [
            'items' => $items,
            'no'    => $no
        ]);
    }

    public function users()
    {
        $items = User::with(['mall'])->get();
        $malls = mall::all();
        return view("pages.admin.users",[
            'items' => $items,
            'malls' => $malls
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'string|max:20|required',
            'email' => 'email|required',
            'password' => 'required|min:8',
            'username' => 'string|required|max:10',
            'roles' => 'required',
            'mall_id' => 'required|integer'
        ]);

        $data['password'] = Hash::make($request->password);

        User::create($data);
        return redirect()->route('users');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();
        // User::truncate();
        return redirect()->route('users');
    }

    public function cariLaporan(Request $request){
        DB::statement("SET SQL_MODE=''");
        $input = $request->validate([
            'bulan' => 'integer|required'
        ]);

        $items = DB::select('select tanggal_masuk, biaya_parkir, count(plat_nomor) as jumlah_mobil, sum(biaya_parkir) as jumlah_biaya, status from cars WHERE month(tanggal_masuk) = ? Group by tanggal_masuk', [$input['bulan']]);
        return view('pages.admin.report',[
            'no'    => 1,
            'items' => $items
        ]);
    }
}
