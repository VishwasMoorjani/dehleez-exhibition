<?php include('header.php'); ?>

<script type="text/javascript">
function cronberryTrigger() {

    var username = "<?=$name?>" // replace with your field id
    var mobile = "<?=$phone?>" // replace with your field id
    var email = "<?=$email?>" // replace with your field id
    var course = "<?=$service?>" // replace with your field id
    var message = "<?=$message?>" // replace with your field id
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
                "paramValue": ""
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
                "paramValue": course
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

<section class="thankssection">
    <div class="container">
        <div class="thanks">
            <h2>Thanks for Enrollment with Us</h2>
            <h2>We will contact you soon</h2>
        </div>
    </div>
</section>


<?php include('footer.php'); ?>