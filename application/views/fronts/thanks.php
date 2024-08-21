<?php

// print_r($_POST);
// die();
if (isset($_REQUEST['submit'])) {
  $mail_message = "<b><h2><b>Digital Shiksha</b> Website Request for Call</h2></b>";
  $mail_message .="<br/>Name - ".$_REQUEST['name'];
  $mail_message .="<br/>Email - ".$_REQUEST['email'];
  $mail_message .="<br/>Mobile - ".$_REQUEST['phone'];
  $mail_message .="<br/>City - ".$_REQUEST['city'];
  $mail_message .="<br/>Message - ".$_REQUEST['message'];

  require_once('class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); // enable SMTP
  //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "mail.gdigitalindia.com";
  $mail->Port = 465; // or 587
  $mail->IsHTML(true);
  $mail->Username = "clients@gdigitalindia.com";
  $mail->Password = "Clients@123??";
  $mail->SetFrom("clients@gdigitalindia.com");
  $mail->Subject = "Digital Shiksha Website Request for Call";
  $mail->Body = $mail_message;
  // print_r($mail);die;
  $mail->AddAddress("info@gdigitalindia.com");
  $mail->AddAddress("gdigitalindialeads@gmail.com");
  $mail->AddAddress("hr.gdigitalindia@gmail.com");

  // print_r($mail);die;

  if (!$mail->Send()) {
    echo "Mailer Error:" . $mail->ErrorInfo;
  }
}
?>

<?php include('header.php'); ?>

<script type="text/javascript">
function cronberryTrigger() {
    var username = "<?=$_REQUEST['name']?>" // replace with your field id
    var mobile = "<?=$_REQUEST['phone']?>" // replace with your field id
    var email = "<?=$_REQUEST['email']?>" // replace with your field id
    var city = "<?=$_REQUEST['city']?>" // replace with your field id
    var message = "<?=$_REQUEST['message']?>" // replace with your field id
    var data = JSON.stringify({
        "projectKey": "VW50aXRsZSBQcm9qZWN0MTY0NjIyNTMzMDkzNg==",
        "audienceId": "cr_" + Date.now(),
        "name": username,
        "email": email,
        "mobile": mobile,
        "ios_fcm_token": "",
        "web_fcm_token": "",
        "android_fcm_token": "",
        "profile_path": "",
        "active": "",
        "audience_id": "",
        "paramList": [{
                "paramKey": "agentnumber",
                "paramValue": ""
            },
            {
                "paramKey": "recording",
                "paramValue": ""
            },
            {
                "paramKey": "datetime",
                "paramValue": ""
            },
            {
                "paramKey": "uniqueid",
                "paramValue": ""
            },
            {
                "paramKey": "city",
                "paramValue": city
            },
            {
                "paramKey": "patient_age",
                "paramValue": ""
            },
            {
                "paramKey": "query",
                "paramValue": ""
            },
            {
                "paramKey": "treatment_type",
                "paramValue": ""
            },
            {
                "paramKey": "relation",
                "paramValue": ""
            },
            {
                "paramKey": "already_using_machine",
                "paramValue": ""
            },
            {
                "paramKey": "form_name",
                "paramValue": ""
            },
            {
                "paramKey": "yourmessage",
                "paramValue": message
            },
            {
                "paramKey": "company_name",
                "paramValue": ""
            },
            {
                "paramKey": "websitename",
                "paramValue": "digital-shiksha.com"
            },
            {
                "paramKey": "ip_address",
                "paramValue": ""
            },
            {
                "paramKey": "page",
                "paramValue": ""
            },
            {
                "paramKey": "date",
                "paramValue": ""
            },
            {
                "paramKey": "qualification",
                "paramValue": ""
            },
            {
                "paramKey": "product_sold",
                "paramValue": ""
            },
            {
                "paramKey": "ivr_number",
                "paramValue": ""
            },
            {
                "paramKey": "flats",
                "paramValue": ""
            },
            {
                "paramKey": "1_bhk_flats",
                "paramValue": ""
            },
            {
                "paramKey": "2_bhk_flats",
                "paramValue": ""
            },
            {
                "paramKey": "3_bhk_flats",
                "paramValue": ""
            },
            {
                "paramKey": "interested_for_flats",
                "paramValue": true
            },
            {
                "paramKey": "requirement",
                "paramValue": ""
            },
            {
                "paramKey": "address",
                "paramValue": ""
            },
            {
                "paramKey": "file_name",
                "paramValue": ""
            }
        ]
    });
    console.table(data);
    var xhr = new XMLHttpRequest();
    xhr.addEventListener("readystatechange", function() {
        if (this.readyState === 4) {
            console.log(this.responseText);
        }
    });
    xhr.open("POST", "https://register.cronberry.com/api/campaign/register-audience-data");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(data);
}
cronberryTrigger();
</script>

<section class="pt-5 pb-1">
    <div class="container">
        <div class="thanks">
            <h2>Thanks for contact Us</h2>
            <h2>We will contact you soon</h2>
        </div>
    </div>
</section>


<?php include('footer.php'); ?>