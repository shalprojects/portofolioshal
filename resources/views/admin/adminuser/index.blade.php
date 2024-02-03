<div class="row">
    <div class="col-md-12">
        <h1>{{ $title }}</h1>
        <div class="card">
            <div class="card-body">
                <a href="/admin/adminuser/create" class="btn btn-primary md-3"><i class="fas fa-plus"></i>Tambah</a>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Admin</th> 
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/admin/adminuser/{{ $item->id }}/edit" class="btn btn-success mx-2">Edit</a>
                                    
                                    <form action="/admin/adminuser/{{ $item->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
