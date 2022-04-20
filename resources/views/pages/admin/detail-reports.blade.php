@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5 ">
    <div class="slug mb-3">
        <h5><a href="{{ route('admin') }}"> Home</a> &nbsp;&nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{ route('laporan') }}"> Laporan</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Detail Laporan</strong></h5>
    </div>

    <div class="row">
        <div class="col--md-12">
            <table class="table table-hover mt-4 "id="datatable" >
                <thead>
                    <tr class="table-primary">
                        <th>
                            No
                        </th>
                        <th>
                            Nomor Kendaraan
                        </th>
                        <th>
                            Mall
                        </th>
                        <th>
                            Masuk
                        </th>
                        <th>
                            Keluar
                        </th>
                        <th>
                            Biaya
                        </th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    @forelse ($items as $item)
                    <tr class="table-hover">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->plat_nomor }}</td>
                        <td>{{ $item->mall['nama_mall'] }}</td>
                        <td>{{ $item->jam_masuk }}</td>
                        <td>{{ $item->tanggal_keluar != null ? $item->tanggal_keluar : 'N/A' }}</td>
                        <td>{{ $item->biaya_parkir }}</td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="6">No data found</td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
              <div class="pages  d-flex justify-content-end mt-2">
                {{-- {{ $items->links() }} --}}
                <a href="{{ route('laporan') }}" class="btn btn-primary rounded">
                    Kembali
                </a>
            </div>
        </div>
    </div>

      {{-- <div class="pages  d-flex justify-content-end mt-2">
          {{ $items->links() }}
      </div> --}}
</div>
@endsection

{{-- @push('addon-script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // mengambil data dari tabel dan dikirim ke modal jquery
        $(document).ready(function() {

            $('#datatable').DataTable({
                'dom': '<"top"f>rt<"bottom"p><"clear">',
                'oLanguage': {
                    "sSearch": "Cari Tanggal / Bulan / Tahun"
                },
                'ordering': false,
                // 'dom': '<fp<t>>'
                // 'dom': 'fp'
            });

        } );
    </script>
@endpush --}}
