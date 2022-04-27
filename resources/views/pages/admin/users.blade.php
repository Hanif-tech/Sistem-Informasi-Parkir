@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5 ">
    <div class="slug mb-5">
        <h5><a href="{{ route('admin') }}"> Home</a> &nbsp;&nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Users</strong></h5>
    </div>

    <div class="row mt-4">
        <div class="users d-flex">
            <h3 class="me-3 h3 align-items-center">Users</h3>
                <button type="button" class="btn btn-info px-3 py-2 edit" data-bs-toggle="modal" data-bs-target="#editModal">
                    <i class="fa-solid fa-plus"></i>
                </button>
        </div>
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

                            <form action="{{ route('user-delete', $item->id) }}" method="GET" class="d-inline ">
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
      {{-- modal --}}
      <div class="modal fade " id="editModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('register-user') }}" method="POST" id="editForm">
                @csrf

            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" id="fname" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" id="flantai" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" id="fusername" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="fpassword" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Password Confirm</label>
                    <input type="password" name="password_confirmation" id="fpassword-confirmation" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Roles</label>
                    <input type="text" name="roles" id="froles" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="mall_id">Mall</label>
                    <select name="mall_id" id="mall_id" class="form-select">
                        <option value="">Pilih mall..</option>
                        @foreach ($malls as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_mall }}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary px-3 py-2" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary px-3 py-2">Tambah User</button>
            </div>
        </form>

        </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // mengambil data dari tabel dan dikirim ke modal jquery
        $(document).ready(function() {
            document.getElementById('editForm').reset();
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
        //     table.on('click', '.edit', function(){

        //     $tr = $(this).closest('tr');
        //     if($($tr).hasClass('child')){
        //         $tr = $tr.prev('.parent');
        //     }

        //     const data = table.row($tr).data();
        //     console.log(data);

        //     $('#fruang').val(data[2]);
        //     $('#flantai').val(data[3]);

        //     $('#editForm').attr('action', '/admin/update-ruang/'+data[0]);
        //     $('#editModal').modal('show')
        //     })

        // }
        );
    </script>
@endpush
