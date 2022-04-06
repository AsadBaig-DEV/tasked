<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
    <section class="vh-100" style="background-color: #B20600;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-8">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://images.unsplash.com/photo-1508385082359-f38ae991e8f2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%; width: 100%;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                  <form action="login.php" method="POST" class="needs-validation">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-atom fa-3x me-1" style="color: #FF5F00;"></i>
                      <span class="h1 fw-bold mb-0">AsadBaig</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login into your account</h5>
                    <?php if(isset($_GET['error'])) { ?>
                      <div class="alert alert-danger" role="alert"> <?php echo $_GET['error']; ?></div>
                    <?php } ?>
                    <div class="form-outline mb-4">
                      <input type="text" id="username" name="username" class="form-control form-control-lg"/>
                      <label class="form-label" for="username">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg"/>
                      <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-md btn-block" type="submit">Login</button>
                      <a class="btn btn-primary btn-md btn-block" type="button" href="signup.php">Signup</a>
                    </div>

                   </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- <script src="script.js" async defer></script>
     JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>