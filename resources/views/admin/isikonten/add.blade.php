<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h1>{{ $title }}</h1>

                @if(isset($isikonten))
                <form action="/admin/isikonten/{{ $isikonten->id }}" method="POST">
                    @method('PUT')
                @else
                <form action="/admin/isikonten" method="POST">
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Konten</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul Konten" value="{{ isset($isikonten) ? $isikonten->judul : old('judul') }}">
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    @if(isset($isikonten) && $isikonten->gambar)
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <p>Gambar saat ini:</p>
                        <img src="{{ asset('img/'.$isikonten->gambar) }}" alt="Gambar" style="width: 100px;">
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga Barang" value="{{ isset($isikonten) ? $isikonten->harga : old('harga') }}">
                        </div>
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link">Link Konten</label>
                        <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" placeholder="Link Konten" value="{{ isset($isikonten) ? $isikonten->link : old('link') }}">
                        @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Keterangan Konten</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" placeholder="Deskripsi">{{ isset($isikonten) ? $isikonten->deskripsi : old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
