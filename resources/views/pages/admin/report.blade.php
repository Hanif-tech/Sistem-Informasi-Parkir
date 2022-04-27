@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5 ">
    <div class="slug mb-3">
        <h5><a href="{{ route('admin') }}"> Home</a> &nbsp;&nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Laporan</strong></h5>
    </div>

    <div class="row">
        <div class="col--md-12">
            <div class="row mt-3">
                <div class="col-md-3 d-flex ">
                    <form action="{{ route('cari-laporan') }}" method="get" class="d-flex align-items-center">
                        @csrf
                            <select class="form-select" name="bulan">
                                <option selected>Pilih bulan...</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                              </select>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
                {{-- <div class="col-md-2 ">
                    <form action="">
                        <div class="form-group">
                            <input type="date" name="tgl2" class="form-control">
                        </div>
                    </form>
                </div> --}}

            </div>
            <table class="table table-hover mt-4 "id="datatable" >
                <thead>
                    <tr class="table-primary">
                        <th>
                            No
                        </th>
                        <th>
                            Tanggal
                        </th>
                        <th>
                            Jumlah Mobil
                        </th>
                        <th>
                            Biaya
                        </th>
                        <th>
                            Jumlah (Rp)
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    @forelse ($items as $item)
                    @if ($item->status == 'KELUAR' || $item->status == 'MENGINAP')
                    <tr class="table-hover">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->jumlah_mobil }}</td>
                        <td>{{ $item->biaya_parkir }}</td>
                        <td>{{ $item->jumlah_biaya }}</td>
                        <td>
                            <a href="{{ route('detail-laporan', $item->tanggal_masuk) }}" class="btn btn-primary py-2 px-3 text-center">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @empty
                    <tr class="text-center">
                        <td colspan="7">No data found</td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
              <div class="pages  d-flex justify-content-end mt-2">
                {{-- {{ $items->links() }} --}}
            </div>
        </div>
    </div>

      {{-- <div class="pages  d-flex justify-content-end mt-2">
          {{ $items->links() }}
      </div> --}}
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // mengambil data dari tabel dan dikirim ke modal jquery
        $(document).ready(function() {

            $('#datatable').DataTable({
                'dom': '<"top">rt<"bottom"p><"clear">',
                'oLanguage': {
                    "sSearch": "Cari Tanggal / Bulan / Tahun"
                },
                'ordering': false,
                // 'dom': '<fp<t>>'
                // 'dom': 'fp'
            });

        } );
    </script>
@endpush
