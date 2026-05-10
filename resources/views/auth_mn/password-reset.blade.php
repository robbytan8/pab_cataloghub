<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>

  <!-- Bootstrap -->
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

    .reset-card {
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
    <div class="row justify-content-center align-items-center wrapper">

      <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg reset-card">
          <div class="text-center mb-5">
            <h1 class="title">Reset Password</h1>
            <p class="subtitle mb-0">
              Enter a new password for your account
            </p>
          </div>

          @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
          @endif

          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-4">
              <label class="form-label">New Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                  placeholder="Enter new password" required>
              </div>
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-4">
              <label class="form-label">Confirm Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-shield-alt"></i></span>
                <input type="password" name="password_confirmation" class="form-control"
                  placeholder="Confirm new password" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Save New Password</button>
          </form>

          <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
              Back to Login
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
