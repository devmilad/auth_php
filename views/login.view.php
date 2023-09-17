<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
  </head>
  <body class="text-center">
    
    <main class="form-signin w-100 m-auto">
      <form method="POST">
        
        <h1 class="h3 mb-3 fw-normal">Please Log in</h1>
        <p class="alert alert-success <?= $success ?? 'd-none' ?> "><?= $success ?></p>
        <p class="alert alert-danger <?= $error ?? 'd-none' ?> "><?= $error ?></p>
        <div class="form-floating my-3">
          <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
          <label for="floatingInput">Email address</label>
          <p class="small text-danger float-start m-1 <?= $data['emailError'] ?? 'd-none' ?>"><?= $data['emailError'] ?></p>
        </div>
        <div class="form-floating my-3">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
          <p class="small text-danger float-start m-1 <?= $data['passwordError'] ?? 'd-none' ?>"><?= $data['passwordError'] ?></p>
        </div>
       
        <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
        <a href="../index.php" class="text-decoration-none"><p class="mt-5 mb-3 ">I have not a account</p></a>
      </form>
    </main>
    

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>