<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>DinnerMatch</title>
    <meta name="viewport" content="width=device-width, initial-sacle=1,user-scalable=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    </script>
  </head>
  <body>
    <header>
        <div id="wrapper">
          <!-- Sidebar -->
          <div id="sidebar-wrapper">
              <ul class="sidebar-nav">
                  <li class="sidebar-brand">
                      <a href="#"></a>
                  </li>
                  <li>
                      <a href="#">Dashboard</a>
                  </li>
                  <li>
                      <a href="#">Shortcuts</a>
                  </li>
                  <li>
                      <a href="#">Overview</a>
                  </li>
                  <li>
                      <a href="#">Events</a>
                  </li>
                  <li>
                      <a href="#">About</a>
                  </li>
                  <li>
                      <a href="#">Services</a>
                  </li>
                  <li>
                      <a href="#">Contact</a>
                  </li>
              </ul>
          </div>
          <!-- /#sidebar-wrapper -->

          <!-- Page Content -->
          <div class="container-fluid" id="page-content-wrapper">
            <div class="row">
              <div class="col-md-10">
                <div id="menu-toggle">
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
                </div>
              </div>
              <div class="col-md-2">
                <div id="login-nav">
                  <span class="login-nav-class profile-text"><a href="#"><i class="fas fa-user"></i></a></span>
                  <span class="login-nav-class notification-text"><a href="#"><i class="fas fa-comments"></i></a></span>
                  <span class="login-nav-class login-text"><a href="#"><i class="fas fa-sign-in-alt"></i></a></span>
                  <span class="login-nav-class register-text"><a href="#">Register?</a></span>
                  <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                      <button class="btn btn-success" type="submit">Login</button>
                    </div>
                    <input id="usernameLogin" type="text" class="form-control" placeholder="Username">
                    <input id="passwordLogin" type="password" class="form-control" placeholder="Password">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /#page-content-wrapper -->

        </div>
    </header>
    <div class="container-fluid">
        <div class="col-md-2">
          LEFT SIDE
        </div>
        <div class="row justify-content-center">
        <div class="col-md-8 col-sm-8 col-xs-8 center-col-spacing">
          <div class="col-md-12">
            <div class="card text-center">
              <div class="card-header">
                Upcoming Event!
              </div>
            <div class="card-body">
              <h5 class="card-title">Mimozas Födelsedags AW</h5>
              <p class="card-text">Vi tänkte gå till Yaki-Da's AW, dricka billig öl och äta gratis pizza!</p>
              <a href="#" class="btn btn-info">Visit event</a>
            </div>
            <div class="card-footer text-muted">
              Om 2 dagar
            </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-5 center-col-spacing">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Recent Dinners</h5>
                  <p class="card-text">Visit the events of your last dinners and rate the restaurants now!</p>
                  <a href="#" class="btn btn-info">Visit event</a>
                </div>
              </div>
            </div>
              <div class="col-sm-5 center-col-spacing">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Recent Dinners</h5>
                    <p class="card-text">Visit the events of your last dinners and rate the restaurants now!</p>
                    <a href="#" class="btn btn-info">Visit event</a>
                  </div>
                </div>
              </div>
            </div>
          <div class="row justify-content-center">
            <div class="col-md-10 center-col-spacing">
              <div class="card-deck">
                <div class="card">
                  <img class="card-img-top" src="images/pexels-photo-708587.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">DinnerMatch Recommendations</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/pexels-photo-262896.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">DinnerMatch Recommendations</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/pexels-photo-428355.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">DinnerMatch Recommendations</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-2">
              RIGHT SIDE
            </div>
      </div>
    </div>
      <footer class="text-center" id="footer">&copy; DinnerMatch 2018</footer>
  </body>
</html>
