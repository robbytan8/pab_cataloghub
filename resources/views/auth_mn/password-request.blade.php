<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    body {
      background: #f4f6f9;
    }

    .wrapper {
      min-height: 100vh;
    }

    .card-reset {
      width: 100%;
      max-width: 520px;
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
    <div class="row justify-content-center align-items-center wrapper">
      <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg card-reset">
          <div class="text-center mb-4">
            <h1 class="title">Forgot Password</h1>
            <p class="text-muted mb-0">Enter your email to receive a password reset link</p>
          </div>

          <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                  class="form-control @error('email') is-invalid @enderror" placeholder="Enter your registered email"
                  required autofocus maxlength="255">
              </div>
              @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
          </form>

          <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Back to Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
