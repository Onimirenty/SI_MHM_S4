<?php 
    $burl= site_url();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $burl ?>/assets/css/login.css">
    <script src="<?php echo $burl ?>assets/js/logSign.js"></script>
    <title>Login & singn up</title>
</head>
<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">MHM-page</h1>
            <p class="col-lg-10 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt velit eius dolorem adipisci, eligendi praesentium atque perferendis neque doloribus nam, perspiciatis veritatis laborum. Nobis perspiciatis mollitia adipisci commodi, debitis ducimus.</p>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">
            <section class="wrapper">
                <div class="form signup">
                    <header onclick="loginSign()">Signup</header>
                    <form action="<?php echo $burl ?>LogSign/register" method="POST">
                      <input type="text" name="nom" placeholder="Full name" required />
                      <input type="email"  name="email"  placeholder="Email address" required />
                      <input type="password" name="pwd" placeholder="Password" required />
                      <input type="submit" class="btn btn-outline-light" value="Signup"/>
                    </form>
                  </div>
            
                  <div class="form login">
                    <header onclick="loginSign()" >Login</header>
                    <form action="<?php echo $burl ?>LogSign/log" method="POST">
                      <input type="email" name="email" placeholder="Email address" required />
                      <input type="password" name="pwd" placeholder="Password" required />
                      <input type="text" class="path" name="path" placeholder="Key Path" style="display: none;">
                      <div class="checkbox">
                        <input type="checkbox" id="signupCheck" name="cle" onclick="toggleMenu()"/>I am an Admin
                      </div>
                      <input type="submit" class="btn btn-outline-primary" value="Login" />
                    </form>
                  </div>
              </section>
          </div>
        </div>
      </div>
</body>
</html>