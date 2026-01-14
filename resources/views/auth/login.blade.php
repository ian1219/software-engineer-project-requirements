<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4 col-md-4">
        <h3 class="text-center mb-4 fw-bold">Login</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-primary w-100 fw-semibold">Login</button>
        </form>

        <p class="text-center mt-3 text-muted">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Register here</a>
        </p>
    </div>
</div>

<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 300); 
        });
    }, 3000);
</script>

</body>
</html>
