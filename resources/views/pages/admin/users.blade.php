@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5 ">
    <div class="slug mb-5">
        <h5><a href="{{ route('admin') }}"> Home</a> &nbsp;&nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Users</strong></h5>
    </div>

    <div class="row mt-4">
        <h3>Users</h3>
        <div class="col-md-12">
            <table class="table table-striped mt-4 "id="datatable" >
                <thead>
                    <tr class="table-primary">
                        <th>
                            No
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Roles
                        </th>
                        <th>
                            Mall
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
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->roles }}</td>
                        <td>{{ $item->mall['nama_mall'] }}</td>
                        <td>
                            <button type="button" class="btn btn-info px-2 py-2 edit">
                                <i class="fa fa-pencil-alt"></i>
                            </button>
                            <form action="" method="GET" class="d-inline ">
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
                        <td colspan="6">No data found</td>
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

           const table = $('#datatable').DataTable({
                'dom': '<"top">rt<"bottom"p><"clear">',
                'oLanguage': {
                    "sSearch": "Cari User"
                },
                'ordering': false,
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
