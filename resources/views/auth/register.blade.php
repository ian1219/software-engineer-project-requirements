<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4 col-md-4">
        <h3 class="text-center mb-4 fw-bold">Create Account</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-success w-100 fw-semibold">Register</button>
        </form>

        <p class="text-center mt-3 text-muted">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Login here</a>
        </p>
    </div>
</div>

</body>
</html>
