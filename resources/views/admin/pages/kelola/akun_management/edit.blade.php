<form action="{{ url('/admin/kelola/akun_management/' . $edit->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label" for="name">Nama</label>
            <input class="form-control  mb-4" placeholder="Masukan Nama" value="{{ $edit->name }}" required=""
                type="text" name="name">
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Email</label>
            <input class="form-control  mb-4" placeholder="Masukan Email" required="" value="{{ $edit->email }}"
                type="email" name="email">
        </div>
        <div class="form-group">
            <label class="form-label">Pilih Role</label>
            <select class="form-control select2" name="role" data-bs-placeholder="--Pilih--">
                <option>--Pilih--</option>
                @foreach ($user_akses as $akses)
                    <option value="{{ $akses }}" {{ $akses == $edit->akses ? 'selected' : '' }}>
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
<script src="{{ url('/assets') }}/plugins/select2/select2.full.min.js"></script>
<script src="{{ url('/assets') }}/js/select2.js"></script>
