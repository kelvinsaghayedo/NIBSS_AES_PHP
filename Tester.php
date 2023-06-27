<?php  
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$key="replaceWithYourKEY";
$iv="replaceWithYourIV";

include_once('AES_CLASS.php');

$data['PaymentReference']="2300104003420992";
$data['assessmentId']= "1687282905";
$data['Amount'] = "200";
$data['BankCode']= "33";
$data['Ref'] = "221122";
$data['TransactionDate'] = "2020-15-01";
$data= json_encode($data, true);

$inputData=$data;
  
$inputText = $data;
$inputKey = $key;
$blockSize = 128;
$aes = new AES($inputText, $inputKey, $iv, $blockSize);
$enc = $aes->encrypt();
$enc=bin2hex(base64_decode($enc));

echo "Encrypted: ".$enc; 


//Now lets decrypt the encoded;
 
$cyph=base64_encode(hex2bin($enc));
$aes->setData($cyph);
$dec=$aes->decrypt(); 
echo  "<br><br>Decrypted: ".$dec;  
?> 
