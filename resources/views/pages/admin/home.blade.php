@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5 container-admin">
    <h2>Selamat Datang Admin!</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bg shadow">
                <div class="card-body">
                    <div class="card-sub-title">
                        Main menu
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('kendaraan') }}"
                            {{-- target="_blank" --}}
                            >
                                <div class="card   rounded">
                                    <div class="card-body text-center ">
                                        <div class="card-title">
                                            <h4>Kendaraan</h4>
                                        </div>
                                        <img width="82" src="{{ url('frontend/asset/img/car.png') }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('ruang-parkir') }}"
                            {{-- target="_blank" --}}
                            >
                                <div class="card   rounded">
                                    <div class="card-body text-center ">
                                        <div class="card-title">
                                            <h4>Ruang Parkir</h4>
                                        </div>
                                        <img width="82" src="{{ url('frontend/asset/img/parking-car.png') }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('laporan') }}"
                             {{-- target="_blank" --}}
                             >
                                <div class="card   rounded">
                                    <div class="card-body text-center ">
                                        <div class="card-title">
                                            <h4>Laporan</h4>
                                        </div>
                                        <img width="82" src="{{ url('frontend/asset/img/medical-report.png') }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('users') }}"
                            {{-- target="_blank" --}}
                            >
                                <div class="card   rounded">
                                    <div class="card-body text-center ">
                                        <div class="card-title">
                                            <h4>Users</h4>
                                        </div>
                                        <img width="82" src="{{ url('frontend/asset/img/personal-id.png') }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
