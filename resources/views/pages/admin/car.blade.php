@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5 ">
    <div class="slug mb-3">
        <h5><a href="{{ route('admin') }}"> Home</a> &nbsp;&nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Kendaraan</strong></h5>
    </div>
    <div class="search-car">
        <div class="card card-bg shadow-sm p-2">
            <div class="card-body d-flex flex-column">
                <div class="card-title">
                    <h4>Cari Kendaraan</h4>
                </div>
                <form action="{{ route('cari-kendaraan') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari kendaraan" aria-label="Cari kendaraan" name="plat_nomor" aria-describedby="basic-addon1">
                    </div>
                    <div class="btn-submit d-flex justify-content-end">
                        <a href="{{ route('kendaraan') }}" class="btn btn-secondary px-4 py-2 ">Refresh</a>
                        <button type="submit" class="btn btn-primary px-4 py-2 ms-2">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-striped mt-4 " >
        <thead>
            <tr class="table-info">
                <th>
                    Nomor Kendaraan
                </th>
                <th>
                    Ruang
                </th>
                <th>
                    Lantai
                </th>
                <th>
                    Mall
                </th>
                <th>
                    Jam Masuk
                </th>
                <th>
                    Tanggal masuk
                </th>
                <th>
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="table-default">
                    <td>{{ $item->plat_nomor }}</td>
                    <td>{{ $item->car_park['nama_ruang'] }}</td>
                    <td>{{ $item->car_park['lantai'] }}</td>
                    <td>{{ $item->mall->nama_mall }}</td>
                    <td>{{ $item->jam_masuk }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @empty
            <tr class="text-center">
                <td colspan="7">No data found</td>
            </tr>
            @endforelse
        </tbody>
      </table>
      <div class="pages  d-flex justify-content-end mt-2">
          {{ $items->links() }}
      </div>
</div>
@endsection
