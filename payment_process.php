<?php
//require("../contrller/pay_controller.php");
  $url = "https://api.paystack.co/transaction/initialize";
  $email = $_POST['email'];
  $amount = $_POST['amount'];

  $fields = [

    'email' => $email,
    'amount' => "$amount";
  ];

  $fields_string = http_build_query($fields);

  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088",
    "Cache-Control: no-cache",
  ));
   //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  //execute post
 $result = curl_exec($ch);

    echo $result;

    $insert = insert_payment_ctr($email,$amount){
        if($insert){
            echo"success";
        }
        else{
            echo"failed";
        }
    }
  ?>