<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CatalogHub Login</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    body {
      background: #f4f6f9;
    }

    .login-wrapper {
      min-height: 100vh;
    }

    .login-card {
      width: 100%;
      max-width: 560px;
      border: none;
      border-radius: 20px;
      padding: 40px;
    }

    .input-group-text {
      border-radius: 12px 0 0 12px;
      padding: 0 18px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center login-wrapper">
      <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg login-card">
          <div class="text-center">
            <h1 class="login-title">Login</h1>
          </div>
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                  class="form-control @error('email') is-invalid @enderror" placeholder="Input email" maxlength="255"
                  required autofocus>
              </div>
              @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                  placeholder="Input password" required>
              </div>
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="text-end mb-4">
              <a href="{{ route('password.request') }}" class="text-decoration-none fw-semibold">
                Forgot Password?
              </a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
