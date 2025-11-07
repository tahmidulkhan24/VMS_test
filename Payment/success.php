<?php
$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("cholo68f8cb9a7f0fd");
$store_passwd=urlencode("cholo68f8cb9a7f0fd@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

    //gethering the info
    $transaction_id = $tran_id;
    $amount = $amount;

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Success</title>
<link rel="icon" type="image/png" href="../img/icon4.png">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        display: flex;
        height : 100vh;
        justify-content: center;
        align-items: center;
        margin: 0;
    }
    .popup {
        background-color: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        text-align: center;
        width: 300px;
    }
    .popup h2 {
        color: green;
        margin-bottom: 20px;
    }
    .popup p {
        margin: 10px 0;
        font-size: 16px;
    }
    .popup button {
        background-color: #468a3fff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 20px;
    }
    .popup button:hover {
        background-color: #274022ff;
        border-radius: 20px;
    }
</style>
</head>
<body>

<div class="popup">
    <h2>Payment Successful!</h2>
    <p><strong>Transaction ID:</strong> <?php echo htmlspecialchars($transaction_id); ?></p>
    <p><strong>Amount:</strong> <?php echo htmlspecialchars($amount)." "; ?>BDT</p>
    <p><strong>Status:</strong> <?php echo htmlspecialchars($status); ?></p>
    <button onclick="window.location.href='../my_booking.php'">Go to Home</button>
</div>

</body>
</html>

<?php

} else {

	echo "Failed to connect with SSLCOMMERZ";
}
?>