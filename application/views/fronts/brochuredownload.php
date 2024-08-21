<?php include('header.php'); ?>

<script type="text/javascript">
function cronberryTrigger() {
    var username = "<?=$name?>" // replace with your field id
    var mobile = "<?=$mobile?>" // replace with your field id
    var data = JSON.stringify({
        "projectKey": "VW50aXRsZSBQcm9qZWN0MTY0NjIyNTMzMDkzNg==",
        "audienceId": "cr_" + Date.now(),
        "name": username,
        "email": "",
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
                "paramValue": ""
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

<?php
$test = "+91".$mobile;
$apiEndpoint = 'https://backend.api-wa.co/campaign/gdigital%20media%20solutions/api';

// Replace these values with your actual data
$apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjY0ZjU3MjQ2MGU0ZGE0MGI0NjAyYTBmNyIsIm5hbWUiOiJHREkiLCJhcHBOYW1lIjoiQWlTZW5zeSIsImNsaWVudElkIjoiNjRmNTcyNDYwZTRkYTQwYjQ2MDJhMGYyIiwiYWN0aXZlUGxhbiI6Ik5PTkUiLCJpYXQiOjE2OTM4MDcxNzR9.gk8qqbtVUkhhI8Wt8Fy_b52Q47THSHlCufFgSokBeB4';
$campaignName = 'downloadbrochures0';
$destination = "$test";
$userName = $name;
$source = 'Website'; // Optional
$mediaUrl = "https://www.digital-shiksha.com/<?=base_url('assets/front/images/Brochure.pdf');?>";
$mediaFilename = 'Brochure.pdf';
// Prepare the request body
$requestBody = [
'apiKey' => $apiKey,
'campaignName' => $campaignName,
'destination' => $destination,
'userName' => $userName,
'source' => $source,
'media' => [
'url' => $mediaUrl,
'filename' => $mediaFilename,
],
];

// Convert the array to JSON
$jsonRequestBody = json_encode($requestBody);

// Set up the cURL request
$ch = curl_init($apiEndpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonRequestBody);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
// echo 'Curl error: ' . curl_error($ch);
} else {
// Decode and print the response
$decodedResponse = json_decode($response, true);
// print_r($decodedResponse);
}

// Close cURL resource
curl_close($ch);

?>

<section class="pt-5 pb-1">
    <div class="container">
        <div class="thanks">
            <h2>Thanks for your Request</h2>
            <h2>We sent you Brochure on Whatsapp</h2>

            <a href="<?=base_url('assets/front/images/Brochure.pdf');?>" target="_blank"> 
                <button type="submit" name="submit" class="btn brochurebtn btn-block">Download Brochure</button>
            </a>

        </div>
    </div>
</section>


<?php include('footer.php'); ?>