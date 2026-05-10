<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check Email</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5 text-center">
    <div class="card p-5 shadow">
      <h3>Check Your Email</h3>
      <p class="mt-3">
        We've sent a password reset link to your email address. Please check your inbox and click the link to reset your password.
      </p>

      @if (session('status'))
        <div class="alert alert-success mt-3">
          {{ session('status') }}
        </div>
      @endif

      <a href="{{ route('login') }}" class="btn btn-primary mt-3">Back to Login</a>
    </div>
  </div>

</body>

</html>
