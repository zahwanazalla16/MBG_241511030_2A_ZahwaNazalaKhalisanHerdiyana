<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'MBG System' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
      background-color: #FFFFFF;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      background-color: #002766 !important;
      color: white;
    }
    .navbar-brand {
      color: white !important;
      font-weight: 500;
    }
    .sidebar {
      background-color: #002766;
      border-right: 1px solid #fff;
      height: 100vh;
      position: fixed;
      width: 220px;
      top: 0;
      left: 0;
      z-index: 1000;
      padding-top: 70px;
      overflow-y: auto;
    }
    .sidebar .nav-link {
      color: #fff;
      padding: 10px 15px;
      margin: 6px 8px;
      border: 1px solid #fff;
      border-radius: 5px;
      font-size: 0.9rem;
      font-weight: 400;
      display: block;
    }
    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: #003087;
      color: #fff;
    }
    .content {
      margin-left: 220px;
      padding: 20px;
    }
    .content h3 {
      margin-top: 1.5rem;
      margin-bottom: 1rem;
    }
    .card {
      border-radius: 8px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      transition: box-shadow 0.2s;
    }
    .card:hover {
      box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    }
    .card-body {
      padding: 20px;
    }
    .card-icon {
      font-size: 1.2rem;
      margin-bottom: 10px;
      display: block;
      text-align: center;
      font-weight: 600;
    }
    .btn-outline-success:hover {
      background-color: #28A745 !important;
      color: #fff !important;
      border-color: #28A745 !important;
    }
    .btn-outline-warning:hover {
      background-color: #FD7E14 !important;
      color: #fff !important;
      border-color: #FD7E14 !important;
    }
    .btn-primary {
      background-color: #FFFFFF !important;
      border-color: #002766 !important;
      color: #002766 !important;
      border-radius: 5px;
      font-weight: 500;
      cursor: pointer;
    }
    .btn-primary:hover {
      background-color: #002766 !important;
      color: #fff !important;
    }
    .alert {
      border-radius: 5px;
      border: none;
    }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">MBG System</a>
        <div class="navbar-nav ms-auto">
            <span class="navbar-text me-3"><?= $user_name ?? 'User' ?></span>
            <a class="nav-link text-white" href="/auth/logout">Logout</a>
        </div>
    </div>
    </nav>

    <div class="sidebar">
    <ul class="nav flex-column">
        <?php foreach ($menu as $item): ?>
        <li class="nav-item">
            <a class="nav-link <?= ($active ?? '') === $item['key'] ? 'active' : '' ?>" href="<?= $item['url'] ?>">
            <?= $item['label'] ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    </div>
    
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <?php if (session()->getFlashdata('success')): ?>
        <div id="toastSuccess" class="toast align-items-center text-bg-success border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body">
            <?= session()->getFlashdata('success') ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div id="toastError" class="toast align-items-center text-bg-danger border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body">
            <?= session()->getFlashdata('error') ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
        </div>
    <?php endif; ?>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastSuccess = document.getElementById('toastSuccess');
        var toastError = document.getElementById('toastError');
        if (toastSuccess) new bootstrap.Toast(toastSuccess).show();
        if (toastError) new bootstrap.Toast(toastError).show();
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
