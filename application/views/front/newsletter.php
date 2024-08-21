<!-- <!DOCTYPE HTML>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Dahleez</title> -->
<!--Bootstrap -->
<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"> -->
<!--Custome Style -->
<!-- <link rel="stylesheet" href="assets/css/style.css" type="text/css"> -->
<!--FontAwesome Font Style -->
<!--<script src="https://kit.fontawesome.com/c83d468820.php" crossorigin="anonymous"></script>-->
<!-- </head> -->
<!-- <body style="background: transparent;"> -->
  <div class="subscribe-form">
    <form id="signup" action="<?=base_url('home/newsletter')?>" method="post" class="d-flex">
      <div class="form-group newsletter-input">
        <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" />
      </div>
      <button type="submit" name="submit" class="newsletter-btn"><i class="fa fa-send"></i></button>
      <div id="no-spam"></div>
    </form>
  </div>
<script type="text/javascript" src="<?=base_url('assets/js/prototype.js');?>"></script> 
<script type="text/javascript" src="<?=base_url('assets/js/mailing-list.js');?>"></script>
<!-- </body>

</html> -->
