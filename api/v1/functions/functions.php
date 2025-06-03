<?php

function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'qJB0rGtIn5UB1xG03efyCp1xG03efyCp';
    $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha512', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha512', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function limits($amount,$oper){
	global $T, $con, $uid;
	$q3=mysqli_query($con,"SELECT * FROM limits WHERE id='".$oper."'");
	$r3=mysqli_fetch_array($q3);
	$dgl=floatval($r3["day"]);
	$tvl=floatval($r3["month"]);	
	$tsl=floatval($r3["year"]);	
	//dgis gamoyenebuli
	$qdu1=mysqli_query($con,"SELECT sum(amount) FROM journal WHERE uid='".$uid."' AND opertype='1' AND from_unixtime(date,'%d%m%Y')='".date("dmY",$T)."'");
	$rdu1=mysqli_fetch_array($qdu1);
	$ldgl=floatval($rdu1["amount"])/100;
	//tvis gamoyenebuli
	$qdu2=mysqli_query($con,"SELECT sum(amount) FROM journal WHERE uid='".$uid."' AND opertype='1' AND date>='".($T-60*60*24*30)."'");
	$rdu2=mysqli_fetch_array($qdu2);
	$ltvl=floatval($rdu2["amount"]/100);
	//tslis gamoyenebuli
	$qdu3=mysqli_query($con,"SELECT sum(amount) FROM journal WHERE uid='".$uid."' AND opertype='1' AND date>='".($T-60*60*24*365)."'");
	$rdu3=mysqli_fetch_array($qdu3);	
	$ltsl=floatval($rdu2["amount"]/100);		
	if(($ldgl+$amount)>$dgl){
		$msg= "daylimit";
	}elseif(($ltvl+$amount)>$tvl){
		$msg= "monthlimit";
	}elseif(($ltsl+$amount)>$tsl){
		$msg= "yearlimit";
	}else{
		$msg= "success";
	}	
	return $msg;	
}

function operation($opertype,$amount,$status,$comment,$CUR){
	// global $T, $con, $uid;
	// $q1=mysqli_query($con,"SELECT type FROM opertypes WHERE id='".$opertype."'");
	// $r1=mysqli_fetch_array($q1);
	// $q2=mysqli_query($con,"SELECT * FROM accounts WHERE uid='".$uid."' AND currency='".$CUR."' LIMIT 1");
	// $r2=mysqli_fetch_array($q2);
	// $q3=mysqli_query($con,"SELECT * FROM balance  WHERE accountfullname='".$r2["accountfullname"]."' AND uid='".$uid."' AND active='1'");
	// $r3=mysqli_fetch_array($q3);	
	// mysqli_query($con,"UPDATE balance SET active=0 WHERE accountfullname='".$r2["accountfullname"]."' AND uid='".$uid."'");
	// mysqli_query($con,"INSERT INTO journal SET opertype='".$opertype."',date='".$T."',amount='".($amount)."',description='money import from Bank Account',accountid='".$r2["id"]."',uid='".$uid."',status='1'");	
	// $operid=mysqli_insert_id($con);
	// $newbalance=$r3["balance"]+$amount;
	// if($r1["type"]=="credit"){
		// $newbalance=$r3["balance"]-$amount;		
	// }
	// mysqli_query($con,"INSERT INTO balance SET date='".$T."',balance=".$newbalance.",account='".$r3["account"]."',currency='".$r3["currency"]."',accountid='".$r3["accountid"]."',uid='".$uid."',operid='".$operid."',active=1,accountfullname='".$r3["account"].$CUR."'");
}
function binlist($bin){
		$url = 'https://lookup.binlist.net/'.$bin;
		$ch = curl_init();
		$params = array(

		);
		$header = [
			'api-key: '.$apikey,
			"Cache-Control: no-cache",
		];
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
		curl_setopt($ch, CURLOPT_TIMEOUT, 240);
		$curlresult = curl_exec($ch);
		$json=json_decode($curlresult,1);
		return $json;			
}
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
function mailhtml($text){
	$message = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Proteller mail</title>
  <style type="text/css">
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }
 a{
  color:#1899b3;
}

p, h1,h2,ul,ol,li,div{
  margin:0;
  padding:0;
}

h1,h2{
  font-weight: normal;
  background:transparent !important;
  border:none !important;
}

@media only screen and (max-width:480px)

{

table[class="MainContainer"], td[class="cell"]
	{
		width: 100% !important;
		height:auto !important;
	}
td[class="specbundle"]
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:15px !important;
	}
td[class="specbundle2"]
	{
		width:80% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:10px !important;
		padding-left:10% !important;
		padding-right:10% !important;
	}

td[class="spechide"]
	{
		display:none !important;
	}
	    img[class="banner"]
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class="left_pad"]
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}

}

@media only screen and (max-width:540px)

{

table[class="MainContainer"], td[class="cell"]
	{
		width: 100% !important;
		height:auto !important;
	}
td[class="specbundle"]
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:15px !important;
	}
td[class="specbundle2"]
	{
		width:80% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:10px !important;
		padding-left:10% !important;
		padding-right:10% !important;
	}

td[class="spechide"]
	{
		display:none !important;
	}
	    img[class="banner"]
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class="left_pad"]
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}

}

.contentEditable h2.big,.contentEditable h1.big{
  font-size: 26px !important;
}

 .contentEditable h2.bigger,.contentEditable h1.bigger{
  font-size: 37px !important;
}

td,table{
  vertical-align: top;
}
td.middle{
  vertical-align: middle;
}

a.link1{
  font-size:13px;
  color:#1899b3;
  line-height: 24px;
  text-decoration:none;
}
a{
  text-decoration: none;
}

.link2{
color:#ffffff;
border-top:10px solid #1899b3;
border-bottom:10px solid #1899b3;
border-left:18px solid #1899b3;
border-right:18px solid #1899b3;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
background:#1899b3;
}

.link3{
color:#555555;
border:1px solid #cccccc;
padding:10px 18px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
background:#ffffff;
}

.link4{
color:#27A1E5;
line-height: 24px;
}

h2,h1{
line-height: 20px;
}
p{
  font-size: 14px;
  line-height: 21px;
  color:#626984;
}

.contentEditable li{

}

.appart p{

}
.bgItem{
background: #ffffff;
}
.bgBody{
background: #ffffff;
}

img {
  outline:none;
  text-decoration:none;
  -ms-interpolation-mode: bicubic;
  width: auto;
  max-width: 100%;
  clear: both;
  display: block;
  float: none;
}

</style>


<script type="colorScheme" class="swatch active">
{
    "name":"proteller",
    "bgBody":"ffffff",
    "link":"27A1E5",
    "color":"626984",
    "bgItem":"ffffff",
    "title":"1899b3"
}
</script>


</head>
<body paddingwidth="0" paddingheight="0" bgcolor="#d1d3d4"  style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="font-family:helvetica, sans-serif;" class="MainContainer">
      <!-- =============== START HEADER =============== -->
  <tbody>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="20">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="movableContentContainer">
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="15"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="60"><img src="https://proteller.ge/wallet/img/pro.png" alt="Logo" title="Logo" width="60" height="60" data-max-width="100"></td>
      <td width="10" valign="top">&nbsp;</td>
      <td valign="middle" style="vertical-align: middle;">
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" style="text-align: left;font-weight: light; color:#555555;font-size:26;line-height: 39px;font-family: Helvetica Neue;">
                              <h1 class="big"><a target="_blank" href="https://proteller.ge/wallet" style="color:#444444">Proteller</a></h1>
                            </div>
                          </div>
                        </td>
    </tr>
  </tbody>
</table>
</td>
      <td valign="top" width="90" class="spechide">&nbsp;</td>
      <td valign="middle" style="vertical-align: middle;" width="150">
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" style="text-align: right;">
                              <a target="_blank" href="https://proteller.ge/wallet" class="link1" >გახსენი ბრაუზერში</a>
                            </div>
                          </div>
                        </td>
    </tr>
  </tbody>
</table></td>
    </tr>
    <tr>
       <td height="15"></td>
    </tr>
    <tr>
       <td ><hr style="height:1px;background:#1899b3;border:none;"></td>
     </tr>
  </tbody>
</table>
	  </div>

      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td style="border: 1px solid #EEEEEE; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="40">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height="25"></td></tr>
                      <tr>
                        <td>
                          <div style="display:none" class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" style="text-align: center;">
                              <h2 style="font-size: 20px;color:#1899b3;">სათაური</h2>
                              <br>
                              <p>ტექსტი რასაც მეილი შეიცავს ტექსტი რასაც მეილი შეიცავს ტექსტი რასაც მეილი შეიცავს ტექსტი რასაც მეილი შეიცავს ტექსტი რასაც მეილი შეიცავს ტექსტი რასაც მეილი შეიცავს ტექსტი რასაც მეილი შეიცავს </p>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr><td height="24"></td></tr>
                    </table></td>
      <td valign="top" width="40">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>



      </div>
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>

      <td class="specbundle"><div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" style="text-align: center;">
                              <strong><h2 style="font-size: 20px;color: #1899b3;">Proteller</h2></strong>
                              <br>

'.$text.'
      <br>
                            </div>
                          </div></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>

  </tbody>
</table>
      </div>
      <br>
      <br>
        <tr><td colspan="3"><hr style="height:1px;background:#1899b3;border:none;"></td></tr>
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
</table>
</td>
    </tr>
  </tbody>
</table>
      </div>
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" class="specbundle"><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height="15"></td></tr>
                      <tr>
                        <td>
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" style="text-align: left;  letter-spacing: 2px;">
                            <strong><h2 style="font-size:16px;color:#1899b3;">საკონტაქტო მონაცემები</h2></strong>
                              <br>

                              <p>ტელ:<a href="tel:0322 353 363"> 322 353 363</a>

                              </p><br>
                          <p>ელ.ფოსტა: <a href="mailto:contact@proteller.ge">contact@proteller.ge</a>
                                </p>
                              <br>
                              <a target="_blank" href="https://proteller.ge/" class="link4" style="color:#27A1E5;" >სრულად ნახვა</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table></td>
      <td width="20" class="spechide">&nbsp;</td>
      <td class="specbundle" valign="top" width="142" align="center"><div class="contentEditableContainer contentImageEditable">
                      <div class="contentEditable">
                        <img src="https://proteller.ge/wallet/img/side3.png" alt="side image" width="142" height="142" data-default="placeholder" border="0">
                      </div>
                    </div></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
      </div>
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="specbundle" valign="top" width="142" align="center"><div class="contentEditableContainer contentImageEditable">
                      <div class="contentEditable">
                        <img src="https://proteller.ge/wallet/img/side2.png" alt="side image" width="142" height="142" data-default="placeholder" border="0">
                      </div>
                    </div></td>
      <td width="20" valign="top" class="spechide"></td>
      <td class="specbundle"><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height="15"></td></tr>
                      <tr>
                        <td>
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" style="text-align: left;  letter-spacing: 2px;">
                              <strong><h2 style="font-size:16px;color:#1899b3 ;">დახმარება</h2></strong>
                              <br>
                              <p>ელ.ფოსტა:<a href="mailto:cs@proteller.ge" target="_top">cs@proteller.ge</a></p>
                              <br>
                              <a target="_blank" href="https://proteller.ge/ka/47/fltr-redirect-1" class="link4" style="color:#27A1E5;" >სრულად ნახვა</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table></td>
    </tr>
  </tbody>
</table></td>
    </tr>
    <tr><td height="40" colspan="3"></td></tr>
                <tr><td colspan="3"><hr style="height:1px;background:#1899b3;border:none;"></td></tr>
  </tbody>
</table>
      </div>
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="48"></td>
    </tr>
    <tr>

</td>
    </tr>
  </tbody>
</table>


      </div>
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="185" class="spechide">&nbsp;</td>
      <td class="specbundle2"><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr>
                        <td width="40">
                          <div class="contentEditableContainer contentFacebookEditable">
                            <div class="contentEditable" style="text-align: center;color:#AAAAAA;">
                              <a href="https://www.facebook.com/ProtellerGeorgia/">
                              <img src="https://proteller.ge/wallet/img/facebook.png" alt="facebook" width="40" height="40" data-max-width="40" data-customIcon="true" border="0" ></a>
                            </div>
                          </div>
                        </td>
                        <td width="10"></td>
                        <td width="40">
                          <div class="contentEditableContainer contentTwitterEditable">
                            <div class="contentEditable" style="text-align: center;color:#AAAAAA;">
                              <a href="https://twitter.com/proteller">
                              <img src="https://proteller.ge/wallet/img/twitter.png" alt="twitter" width="40" height="40" data-max-width="40" data-customIcon="true" border="0"></a>
                            </div>
                          </div>
                        </td>
                        <td width="10"></td>
                        <td width="40">
                          <div class="contentEditableContainer contentImageEditable">
                            <div class="contentEditable" style="text-align: center;color:#AAAAAA;">
                              <a href="https://www.linkedin.com/company/18927985">
                              <img src="https://proteller.ge/wallet/img/blue.png" alt="Linkedin" width="40" height="40" data-max-width="40" border="0">
                              </a>
                            </div>
                          </div>
                        </td>
                        <td width="10"></td>

                      </tr>
                    </table></td>
      <td valign="top" width="185" class="spechide">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    <tr>
    	<td height="40"></td>
    </tr>
  </tbody>
</table>

      </div>
      </td>
    </tr>
  </tbody>
</table>
</td>
      <td valign="top" width="20">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
  </body>
  </html>
';
	return 	$message;
}
function geotoeng($word){
	$alpha = array("ა"=>'a',"ბ"=>'b','c',"დ"=>'d',"ე"=>'e',"ფ"=>'f',"გ"=>'g',"ჰ"=>'h',"ი"=>'i','j',"კ"=>'k',"ლ"=>'l',"მ"=>'m',"ნ"=>'n',"ო"=>'o',"პ"=>'p',"ქ"=>'q',"რ"=>'r',"ს"=>'s',"თ"=>'t',"უ"=>'u',"ვ"=>'v','w','x',"ყ"=>'y',"ზ"=>'z',"ჟ"=>"zh","ტ"=>"t","ხ"=>"kh","შ"=>"sh","ღ"=>"gh","ჯ"=>"j","ძ"=>"dz","წ"=>"ts","ჭ"=>"ch","ჩ"=>"ch","a"=>"a","b"=>"b","c"=>"c","d"=>"d","e"=>"e","f"=>"f","g"=>"g","h"=>"h","i"=>"i","j"=>"j","k"=>"k","l"=>"l","m"=>"m","n"=>"n","o"=>"o","p"=>"p","q"=>"q","r"=>"r","s"=>"s","t"=>"t","u"=>"u","v"=>"v","w"=>"w","x"=>"x","y"=>"y","z"=>"z","&"=>"&","$"=>"$","@"=>"@","*"=>"*");	
	$word = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);
	foreach($word as $key=>$value){
		if(array_key_exists($value,$alpha)){
			$newF[$key]=$alpha[$value];
		}
	}
	$newW=implode("",$newF);
	return $newW;	
}
function iban($iban){
	$len=strlen($iban);
	$start=100000000;
	$str=substr($start,0,-$len);
	$end=$str.$iban;
	return $end;
}
function sendverify($email,$con,$uid){
	$pre=time()."|".$email."|".time();
	$token=encrypt_decrypt("encrypt",$pre);	
	// file_put_contents('reg',$pre,FILE_APPEND);
	mysqli_query($con,"INSERT INTO verifications SET token='".$token."',email='".$email."',date='".time()."',uid='".$uid."'");
	$to = $email;
	$subject = "Email Verification";


	$text='	<p>მოგესალმებით  '.$firstname.' თქვენ წარმატებით გაიარეთ რეგისტრაცია. პროცესის დასასრულებლად გთხოვთ მიყევით ბმულს <a href="https://proteller.ge/wallet/?page=verify&tokencode='.$token.'"> 
<div style="margin:auto;"class="">
	<input style="cursor: pointer;
	background-color: #3fb1c7;
	border: none;
	color: white;
	padding:0.9375vw 2.5vw;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	text-transform: uppercase;
	font-size: 15px;
	-webkit-border-radius: 5px 5px 5px 5px;
	border-radius: 5px 5px 5px 5px;
	margin: 30px 10px;
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-ms-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;"type="button"  value="გადასვლა"></a></p>';
	$message=mailhtml($text);
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <info@proteller.ge>' . "\r\n";
	//$headers .= 'Cc: myboss@example.com' . "\r\n";

	mail($to,$subject,$message,$headers);	
}
?>