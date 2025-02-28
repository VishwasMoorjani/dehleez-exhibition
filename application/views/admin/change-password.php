<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/admin/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?=base_url('assets/admin/img/favicon.png'); ?>">
  <title>
    SignIn
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?=base_url('assets/admin/css/nucleo-icons.css'); ?>" rel="stylesheet" />
  <link href="<?=base_url('assets/admin/css/nucleo-svg.css'); ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?=base_url('assets/admin/css/material-dashboard.css?v=3.0.4'); ?>" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Change Password</h4>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="post">
                  <div class="input-group input-group-outline m-2 m-2">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?=set_value('email'); ?>">
                    <?=form_error('email', '<p class="help-block">', '</p>'); ?>
                  </div>
                  <div class="input-group input-group-outline m-2">
                    <label class="form-label">Current Password</label>
                    <input type="password" name="password" class="form-control" value="<?=set_value('password'); ?>">
                    <?=form_error('password', '<p class="help-block">', '</p>'); ?>
                  </div>
                  <div class="input-group input-group-outline m-2">
                    <label class="form-label">New Password</label>
                    <input type="password" name="newpass" class="form-control" value="">
                    <?=form_error('newpass', '<p class="help-block">', '</p>'); ?>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="loginSubmit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <?php
                  if (!empty($success_msg)) {
                    echo '<p class="status-msg success">' . $success_msg . '</p>';
                  } elseif (!empty($error_msg)) {
                    echo '<p class="status-msg error">' . $error_msg . '</p>';
                  }
                  ?>
                  <p class="mt-4 text-sm text-center">
                  Already have an account?
                    <a href="login" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="<?=base_url('assets/admin/js/core/popper.min.js'); ?>"></script>
  <script src="<?=base_url('assets/admin/js/core/bootstrap.min.js'); ?>"></script>
  <script src="<?=base_url('assets/admin/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
  <script src="<?=base_url('assets/admin/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url('assets/admin/js/material-dashboard.min.js?v=3.0.4'); ?>"></script>
</body>

</html>