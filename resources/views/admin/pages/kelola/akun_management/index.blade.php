@extends('index')
@section('title', 'Akun Management')
@section('content')
    <div class="col-lg-12">
        <div class="page-header">
            <div>
                <h1 class="page-title">{{ $title }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
                </ol>
            </div>
            <div class="ms-auto pageheader-btn">
                <a class="modal-effect btn btn-primary mb-3" data-bs-effect="effect-scale" data-bs-toggle="modal"
                    href="#modaldemo8">
                    <span>
                        <i class="fe fe-plus"></i>
                    </span> Tambah Akun
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Basic Datatable</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">No.</th>
                                <th class="wd-15p border-bottom-0">Nama</th>
                                <th class="wd-15p border-bottom-0">Email</th>
                                <th class="wd-20p border-bottom-0">Role</th>
                                <th class="wd-25p border-bottom-0 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        @if ($data->akses == 1)
                                            <span class="badge rounded-pill bg-success me-1 mb-1 mt-1">Admin
                                            </span>
                                        @elseif ($data->akses == 2)
                                            <span class="badge rounded-pill bg-primary me-1 mb-1 mt-1">Management
                                            </span>
                                        @elseif ($data->akses == 3)
                                            <span class="badge rounded-pill bg-warning me-1 mb-1 mt-1">User
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn br-7 btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modaldemo8Edit" onclick="editModal('{{ $data['id'] }}')">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form id="deleteForm{{ $data['id'] }}"
                                            action="{{ url('/admin/kelola/akun_management/' . $data['id']) }}"
                                            style="display: inline;" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger deleteBtn"
                                                onclick="confirmDelete({{ $data['id'] }})">
                                                <i class="ti ti-trash"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Akun Management</h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ url('/admin/kelola/akun_management') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama</label>
                            <input class="form-control  mb-4" placeholder="Masukan Nama" required="" type="text"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Email</label>
                            <input class="form-control  mb-4" placeholder="Masukan Email" required="" type="email"
                                name="email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pilih Role</label>
                            <select class="form-control select2" name="role" data-bs-placeholder="--Pilih--">
                                <option>--Pilih--</option>
                                @foreach ($user_akses as $akses)
                                    <option value="{{ $akses }}">
                                        @if ($akses == 1)
                                            Admin
                                        @elseif ($akses == 2)
                                            Management
                                        @elseif ($akses == 3)
                                            User
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modaldemo8Edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Akun Management</h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div id="modal-content-edit">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function editModal(id) {
            $.ajax({
                url: '/admin/kelola/akun_management/' + id + '/edit',
                type: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    $("#modal-content-edit").html(response)
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
@endsection
