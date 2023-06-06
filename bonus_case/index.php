<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../../../bonus_case/assets/images/Logo-MUW.png" rel="icon" type="image/png">
    <link rel="stylesheet" href="./assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-item-center">
            <div class="col-md-4 p-5 bg-white" style="margin-top: 10%; box-shadow: 0px 5px 10px gray; border-radius: 10px;">
                <form action="./controller/auth/login.php" method="post">
                    <div class="text-center mb-5">
                        <h1>Login</h1>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" name="username" placeholder="Input Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="submit text-center">
                        <button type="submit" class="btn btn-primary btn-outline-success text-white">Login</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="#" class="form-text">Lupa Password ?</a>
                    <p class="form-text">Silahkan kelik <a href="#">Di Sini</a> untuk melakukan Resgistrasi</p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>