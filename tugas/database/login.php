<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="container mt-5">
    <div class="card w-75 mx-auto border-primary">
        <div class="row g-0 mt-3">
            <div class="col-md-5 d-flex justify-content-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4WumKcjaTQfKlBsFj2MJ6IdyN1O5K5q0aD0Gwq31HDOpLFbDZ_TdJlG5X5I5_E1fXB3Q&usqp=CAU"
                    class="img-fluid" alt="...">
            </div>
            <div class="col-md-7 p-5">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <br>
                    <form action="connect_login.php" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="col-form-label">Email: </label>
                            <input type="email" class="form-control" placeholder="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-outline-primary rounded-pill">Login</button>
                        </div>
                    </form>
                    <br>
                    <p class="text-center">tidak punya akun? <a href="register.php">registrasi akun</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>