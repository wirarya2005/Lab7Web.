<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Sign In</h1>
                        <!-- Flash message -->
                        <?php if(session()->getFlashdata('flash_msg')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('flash_msg') ?></div>
                        <?php endif; ?>
                        <!-- Login form -->
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="InputForEmail" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="InputForPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="InputForPassword">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>