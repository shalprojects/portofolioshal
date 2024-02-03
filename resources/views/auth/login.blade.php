<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #3498db; /* Ubah ke warna biru yang diinginkan */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      max-width: 600px;
      border: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .image-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .image {
      max-width: 100%;
      height: auto;
    }

    .form-container {
      flex: 1;
      padding: 20px;
      background-color: #f1c40f; /* Ubah ke warna kuning yang diinginkan */
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="row">
      <div class="col-md-6 image-container">
        <img src="/img/y.png" class="image" alt="Image">
      </div>
      <div class="col-md-6">
        <div class="form-container">
          <div class="card-body">
            <div class="text-center">
              <h3>Into Admin's World</h3>
            </div>
            @if(session()->has('loginError'))
            <div class="alert alert-danger">{{session('loginError')}}</div>
            @endif
            <form action="/login/do" method="POST">
              @csrf
              <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input type="text" name="email" id="email" class="form-control" placeholder="email">
              </div>

              <div class="form-group mt-3">
                <label for="password"><b>Password</b></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              </div>

              <button type="submit" class="btn btn-success mt-3">Login<i class="fas fa-sign-in-alt"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
