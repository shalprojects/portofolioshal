<div class="row">
    <div class="col-md-6">
    <h1>{{ $title }}</h1>
        <div class="card">
            <div class="card-body">
                @isset($user)
                <form action="/admin/adminuser/{{ $user->id }}" method="POST">
                    @method('PUT')
                @else
                <form action="/admin/adminuser" method="POST">
                    @endisset
                    @csrf
                    <div class="form-group">
                        <label for=""><b>Nama Admin</b></label>
                        <input type="text" name="name" placeholder="nama admin" value="{{ isset($user) ? $user->name : old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""><b>Email</b></label>
                        <input type="email" name="email" placeholder="Email" value="{{ isset($user) ? $user->email : old('email') }}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""><b>Password</b></label>
                        <input type="password" name="password" placeholder="*****"  class="form-control @error('password') is-invalid @enderror">
                        @error('password')
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
