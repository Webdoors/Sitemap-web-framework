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
function price($code){
	include("/home/intelect/public_html/new/db_open.php"); 
	$q1=mysqli_query($con,"SELECT price,priceusd,saleprice,sale FROM products WHERE code='".$code."'");
	$r1=mysqli_fetch_array($q1);
	$uid=isset($_SESSION['UID'])?$_SESSION['UID']:(isset($_SESSION['apiuid'])?$_SESSION['apiuid']:"");
	$q2=mysqli_query($con,"SELECT status FROM users WHERE id='".$uid."'");
	$r2=mysqli_fetch_array($q2);
	$r2=$r2==null?["status"=>""]:$r2;
	if($r2["status"]!="0"&&$r2["status"]!=""){
		$q3=mysqli_query($con,"SELECT nameen FROM status WHERE id='".$r2["status"]."'");
		$r3=mysqli_fetch_array($q3);
		$q4=mysqli_query($con,"SELECT `".$r3["nameen"]."` FROM statussale WHERE code='".$code."' ORDER BY id DESC LIMIT 1");
		$r4=mysqli_fetch_array($q4);	
		if(mysqli_num_rows($q4)>0){
			$price=$r1["price"];
			$coef=(100-floatval(mb_substr($r4[$r3["nameen"]], 0, -1)))/100;
			$sprice=$r1["price"]*$coef;
			if($r1["sprice"]<$sprice&&$r1["sale"]==1){
				$sprice=$r1["sprice"];
			}
			$arr=["price"=>round($r1["price"],2),"sprice"=>round($sprice,2),"sale"=>"1"];			
		}else{
			$arr=["price"=>round($r1["price"],2),"sprice"=>round($r1["sprice"],2),"sale"=>$r1["sale"]];			
		}
	}else{
		$arr=["price"=>round($r1["price"],2),"sprice"=>round($r1["sprice"],2),"sale"=>$r1["sale"]];
	}
	
	include("/home/intelect/public_html/new/db_close.php");
	return $arr;
}
?>