<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #FFFFFF; }
        .login-container { max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #003087; border-radius: 5px; }
        .btn-primary { background-color: #003087; border-color: #003087; }
        .btn-primary:hover { background-color: #002766; border-color: #002766; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center" style="color: #003087;">Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="/auth/attemptLogin" method="post">
            <div class="mb-3">
                <label for="email" class="form-label" style="color: #003087;">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="color: #003087;">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>