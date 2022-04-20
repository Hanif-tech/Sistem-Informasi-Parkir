@extends('layouts.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow-sm">
              <div class="card-body">
                <h4 class="card-title">Kendaraan Masuk</h4>
                <p class="card-description">
                  example : K 710 NY
                </p>
                <form class="forms-sample"  method="POST" action="{{route('create-data')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
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
                    @if (Session::get('fail'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                            {{ Session::get('fail') }}
                            </div>
                        </div>
                        @endif
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Nomor Kendaraan</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Nomor Kendaraan" name="plat_nomor">
                  </div>
                  <button type="submit" class="btn btn-info mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      {{-- <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Kendaraan</h4>
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
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @forelse ($items as $item)
                      <tr>
                        <td>{{ $item->plat_nomor }}</td>
                        <td>{{ $item->car_park['nama_ruang']}}</td>
                        <td>{{ $item->car_park['lantai']}}</td>
                        <td>{{$item->jam_masuk}}</td>
                        <td>{{$item->tanggal_masuk}}</td>
                        <td><label class="badge badge-info">{{$item->status}}</label></td>
                      </tr>
                      @empty

                      @endforelse --}}
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
      </div> --}}
    </div>
  </div>
@endsection
