<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 col-4">
        <div class="card">
            <center>
            <div class="card-header bg-primary text-white">
                <b>LOGIN</b>
            </div>
            </center>
            <div class="card-body">
                <form action="" method="POST">
                    <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error') ?>
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">
                            Username
                        </label>
                        <input type="text" name="username" class="form-control" value="<?php echo session()->getFlashdata('username')?>" id="InputUsername" placeholder="Masukan Username">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">
                            Password
                        </label>
                        <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Masukan Password">
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="login" class="btn btn-primary" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>