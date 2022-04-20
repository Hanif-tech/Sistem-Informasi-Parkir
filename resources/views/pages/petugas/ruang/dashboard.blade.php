@extends('layouts.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h4 class="card-title">Tentukan Ruang Kendaraan</h4>
                    <form class="forms-sample"  method="POST" action="{{route('pilih-ruang')}}">
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
                                <label for="pilih_plat">Nomor Kendaraan</label>
                                {{-- <input type="text" class="form-control" id="exampleInputName1" placeholder="Nomor Kendaraan" name="plat_nomor"> --}}
                                <select class="form-select form-select-sm" name="pilih_plat" aria-label=".form-select-sm example">
                                    <option value="">Pilih nomor kendaraan</option>
                                    @foreach ($cars as $car)
                                    @if ($car->car_parks_id == null && $car->status == 'PARKING')
                                    <option value="{{$car->id}}">{{$car->plat_nomor}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pilih_ruang">Ruang</label>
                                <select class="form-select form-select-sm" name="pilih_ruang" aria-label=".form-select-sm example">
                                    <option value="">Pilih ruang</option>
                                    @foreach ($parks as $park)
                                    @if ($park->status == 'belum')
                                    <option value="{{$park->id}}">{{$park->nama_ruang}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        <button type="submit" class="btn btn-info mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        <div class="row">
            <h2>Lantai 1</h2>
        </div>
      <div class="row mt-3">
          @foreach ($parks as $park)
          @if ($park->lantai == 1)
            @if ($park->status == 'ditempati')
                <div class="col-md-2">
                    <div class="card d-flex align-items-center shadow card-floor bg-red" id="card">
                        <div class="card-body d-flex align-items-center">
                            <h4 class="card-title text-center">{{ $park->nama_ruang }}</h4>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-md-2">
                    <div class="card d-flex align-items-center shadow card-floor bg-green" id="card">
                        <div class="card-body d-flex align-items-center">
                            <h4 class="card-title text-center">{{ $park->nama_ruang }}</h4>
                        </div>
                    </div>
            </div>
            @endif
          @endif
          @endforeach
        </div>
        <div class="row mt-5">
            <h2>Lantai 2</h2>
        </div>
        <div class="row mt-3">
          @foreach ($parks as $park)
          @if ($park->lantai == 2)
          @if ($park->status == 'ditempati')
            <div class="col-md-2">
                    <div class="card d-flex align-items-center shadow card-floor bg-red" id="card">
                        <div class="card-body d-flex align-items-center">
                            <h4 class="card-title text-center">{{ $park->nama_ruang }}</h4>
                        </div>
                    </div>
            </div>
            @else
            <div class="col-md-2">
                    <div class="card d-flex align-items-center shadow card-floor bg-green" id="card">
                        <div class="card-body d-flex align-items-center">
                            <h4 class="card-title text-center">{{ $park->nama_ruang }}</h4>
                        </div>
                    </div>
            </div>
            @endif
          @endif
          @endforeach
        </div>
        {{-- <div class="col-md-2">
            <a href="">
            <div class="card d-flex align-items-center shadow card-floor bg-green">
                <div class="card-body d-flex align-items-center">
                  <h4 class="card-title text-center">A1</h4>
                </div>
              </div>
            </a>
        </div>
        <div class="col-md-2">
            <a href="">
            <div class="card d-flex align-items-center shadow card-floor bg-red">
                <div class="card-body d-flex align-items-center">
                  <h4 class="card-title text-center">A2</h4>
                </div>
              </div>
            </a>
        </div> --}}
  </div>
@endsection

@push('addon-script')
<script>
    const cards = document.querySelectorAll('.card');

    // cards.forEach(card => {
    //     card.addEventListener('click',function () {
    //         // if (card.hasClass('click')) {
    //         //     card.classList.remove();
    //         // }
    //         card.classList.toggle('click');


    //     });

    // });
// window.onclick = (e) => {
//     if(!e.target.matches('.card')){
//         cards.forEach(card => {
//             if (card.classList.contains('click')) {
//                 card.classList.remove('click');
//             }
//         })
//     }
// }
</script>
@endpush
