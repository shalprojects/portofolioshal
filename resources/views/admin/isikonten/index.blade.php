<style>
    .table img {
        max-width: 100%;
        height: auto;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-primary">
                Welcome to Admin's World, {{ auth()->user()->name }} 🌻
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h1>{{ $title }}</h1>

                <a href="{{ route('isikonten.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Link</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($isikonten as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                @if ($item->gambar)
                                    <img src="{{ asset('img/'.$item->gambar) }}" alt="Gambar" style="width: 100px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ $item->link }}" class="btn btn-primary">Beli Sekarang</a>
                            </td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/admin/isikonten/{{ $item->id }}/edit" class="btn btn-success mx-2">Edit</a>
                                    <form action="/admin/isikonten/{{ $item->id }}" method="POST" style="display: inline-block;">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
