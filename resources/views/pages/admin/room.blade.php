@extends('layouts.admin')

@push('prepend-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="container mt-5 pt-5 ">
    <div class="slug mb-3">
        <h5><a href="{{ route('admin') }}"> Home</a> &nbsp;&nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Ruang Parkir</strong></h5>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
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
        </div>
    </div>
    <div class="content d-flex justify-content-center">
        <div class="search-car order-2 ms-3 ">
            <div class="card card-bg shadow">
                <div class="card-body d-flex flex-column">
                    <div class="card-title mb-4">
                        <h4>Tambah Ruang</h4>
                    </div>
                    <form action="{{ route('tambah-ruang') }}" method="get">
                        <div class="form-group mb-3 d-flex ">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Tambah Ruang" aria-label="Tambah Ruang" name="nama_ruang">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Lantai" aria-label="Lantai" name="lantai">
                        </div>
                        <div class="form-group">
                            <select class="form-select form-select-sm" name="mall_id" aria-label=".form-select-sm example">
                                <option value="">Pilih Mall..</option>
                                @foreach ($malls as $mall)
                                    <option value="{{ $mall->id }}">{{ $mall->nama_mall }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="btn-submit d-flex justify-content-end">
                            <a href="{{ route('admin') }}" class="btn btn-secondary px-4 py-2 ">Kembali</a>
                            <button type="submit" class="btn btn-primary px-4 py-2 ms-2">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="tab d-flex flex-column">

            {{-- Tabel --}}
            <table data-ordering="false" id="datatable" class="table table-striped mt-4 " >
                <thead>
                    <tr class="table-info">
                        <th>
                            No
                        </th>
                        <th>
                            Mall
                        </th>
                        <th>
                            Ruang
                        </th>
                        <th>
                            Lantai
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                <tr class="table-default">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->mall['nama_mall'] }}</td>
                    <td>{{ $item->nama_ruang }}</td>
                    <td>{{ $item->lantai }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info px-2 py-2 edit" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <form action="{{ route('hapus-ruang', $item->id) }}" method="GET" class="d-inline ">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger px-2 py-2">
                            <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="4">No data found</td>
                </tr>
                @endforelse
                </tbody>
            </table>

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Ruang Parkir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/update-ruang" method="POST" id="editForm">
                    @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Ruang</label>
                        <input type="text" name="nama_ruang" id="fruang" class="form-control" placeholder="Ruang">
                    </div>
                    <div class="form-group">
                        <label for="">Lantai</label>
                        <input type="text" name="lantai" id="flantai" class="form-control" placeholder="Lantai">
                    </div>
                    {{-- <div class="form-group">
                        <select class="form-select form-select-sm" name="mall_id" aria-label=".form-select-sm example">
                            <option value=""></option>
                            @foreach ($malls as $mall)
                                <option value="{{ $mall->id }}">{{ $mall->nama_mall }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-3 py-2" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary px-3 py-2">Update Data</button>
                </div>
            </form>

            </div>
            </div>
        </div>
          <div class="pages  d-flex justify-content-end mt-2">
              {{ $items->links() }}
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('prepend-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endpush

@push('addon-script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // mengambil data dari tabel dan dikirim ke modal jquery
        $(document).ready(function() {

            const table = $('#datatable').DataTable({
                'dom': '<"top">rt<"bottom"><"clear">',
                'oLanguage': {
                    "sSearch": "Cari Ruang",
                'ordering': false,
                }
                // 'dom': '<fp<t>>'
                // 'dom': 'fp'
            });

            // start edit record
            table.on('click', '.edit', function(){

                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }

                const data = table.row($tr).data();
                console.log(data);

                $('#fruang').val(data[2]);
                $('#flantai').val(data[3]);

                $('#editForm').attr('action', '/admin/update-ruang/'+data[0]);
                $('#editModal').modal('show')
            })
        } );
    </script>
@endpush
