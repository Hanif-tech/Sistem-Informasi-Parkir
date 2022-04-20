@extends('layouts.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow">
              <div class="card-body">
                <h4 class="card-title">Cari Kendaraan</h4>
                <form class="forms-sample"  method="GET" action="{{route('petugas-cari')}}">

                    @csrf
                  <div class="form-group">
                    <label for="plat_nomor">Nomor Kendaraan</label>
                    <input type="text" class="form-control" id="plat_nomor" placeholder="Nomor Kendaraan" name="plat_nomor">
                  </div>
                  <button type="submit" class="btn btn-info mr-2">Cari</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow">
              <div class="card-body">
                <h4 class="card-title">Kendaraan</h4>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>
                @if (Session::get('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      {{ Session::get('success') }}
                    </div>
                  </div>
                @endif
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nomor Kendaraan</th>
                        <th>Ruang</th>
                        <th>Lantai</th>
                        <th>Jam Masuk</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($items as $item)
                      @if ($item['status'] == 'PARKING')
                      <tr>
                        <td>{{ $item->plat_nomor }}</td>
                        <td>{{ $item->car_park['nama_ruang']}}</td>
                        <td>{{ $item->car_park['lantai']}}</td>
                        <td>{{$item->jam_masuk}}</td>
                        <td>{{$item->tanggal_masuk}}</td>
                        <td><label class="badge badge-info">{{$item->status}}</label></td>
                        <td>
                            <form action="{{route('update-data',$item->id)}}" method="POST">
                                @csrf
                                <button type="submit" name="status" class="btn-action btn-info">Keluar</button>
                            </form>
                        </td>
                      </tr>
                      @endif
                      @empty

                      @endforelse
                      {{-- <tr>
                        <td>Messsy</td>
                        <td>53275532</td>
                        <td>15 May 2017</td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr>
                      <tr>
                        <td>John</td>
                        <td>53275533</td>
                        <td>14 May 2017</td>
                        <td><label class="badge badge-info">Fixed</label></td>
                      </tr>
                      <tr>
                        <td>Peter</td>
                        <td>53275534</td>
                        <td>16 May 2017</td>
                        <td><label class="badge badge-success">Completed</label></td>
                      </tr>
                      <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td>20 May 2017</td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr> --}}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
