<?php
$a=mysqli_real_escape_string($con,$_POST["a"]);
$b=mysqli_real_escape_string($con,$_POST["b"]);
	$url = 'http://54.76.15.49/pythonW/';
	$ch = curl_init();
	$q1=mysqli_query($con,"SELECT productname,price,period,participation,
	paydate,name,lastname,pid,docnum,birthdate,tel,
	gender,family,hometel,city,legaladdress,realaddress,
	job,position,jobaddress,jobtel,sallary,othersource,otherincome,membername,membertel,
	collegue,colleguetel,date,sallerywhere,experience,doctype,email,promocode,saqspero,dargi,jstree,eco FROM forms WHERE id='".$b."'");

        $numResults = mysqli_num_rows($q1);
		
        if ($numResults > 0)
        {
			

            $data = array();
			$data[] = array("bank"=>$a);
            while ($row = mysqli_fetch_assoc($q1))
            {

				    $data[] = $row;
				

            }
			// var_dump($data);
        $r1 = $data;
		$json=json_encode($r1);
        // echo $json;	
		}
	$params = array(
		"json"=>$json
	);	
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);


	curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
    $curlresult = curl_exec($ch); 

?>