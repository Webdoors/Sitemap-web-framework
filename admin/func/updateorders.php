<?php

if(isset($_SESSION['GuserID'])){
	$T=time();
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	if($r12["orderedit"]==1){
		if($a=="status"){
			if($r12["orderstatuschange"]==1){
				$q1=mysqli_query($con,"SELECT id FROM orders WHERE ".$a."='".$b."' AND id='".$c."'");
				if(mysqli_num_rows($q1)<1){
					$q2=mysqli_query($con,"SELECT t1.*,t2.name as'sname' FROM orders as t1 LEFT JOIN status as t2 ON(t1.status=t2.id) WHERE  t1.id='".$c."'");
					$r2=mysqli_fetch_array($q2);
					  $ord=mysqli_query($con, "SELECT * FROM orders WHERE id='$c'");
					  $rord=mysqli_fetch_assoc($ord);
					  $q41=mysqli_query($con,"SELECT * FROM stores WHERE id='".$rord["place"]."'");
					  $r41=mysqli_fetch_array($q41);
					  $sp=mysqli_query($con, "SELECT * FROM special WHERE ITEM='" . $rord['itemname'] . "'");
					  $rsp=mysqli_fetch_assoc($sp);
					  $qst=mysqli_query($con, "SELECT * FROM qbystore WHERE itemid='". $rsp['id'] ."' AND storeid='" . $rord['place'] . " '");
					  $rqst=mysqli_fetch_assoc($qst);
					    echo 1;
					  $dasruleba=0;
					  $gasagzavni=0;
					  $misatani=0;
					  $gaitans=0;
					  $dasruleba1=0;
					  $gasagzavni1=0;
					  $misatani1=0;
					  $gaitans1=0;
					  	
					  if($rord['status']==7)
					  {$dasruleba1=$rord['status'];}
					  if($rord['status']==10)
					  {$gaitans1=$rord['status'];}
				       if($rord['status']==5)
					  {$gasagzavni1=$rord['status'];}
				       if($rord['status']==4)
					  {$misatani1=$rord['status'];}
					  if($b==7)
					  {$dasruleba=$b;}
				  
				      if($b==10)
					  {$gaitans=$b;}
				     
    				  if($b==5)
					  {$gasagzavni=$b;}
					  
					  if($b==4)
					  {$misatani=$b;}
			
					if($dasruleba1==0 AND $gaitans1==0 AND $misatani1==0 AND $gasagzavni1==0)
					{	
					if($dasruleba!=0||$gaitans!=0||$misatani!=0||$gasagzavni!=0)
					{ 
					   if($rqst['quantity']>0)
					   {
						   $shqst=$rqst['quantity']-1;
						   mysqli_query($con, "UPDATE qbystore set itemid='". $rsp['id'] ."', storeid='". $rord['place'] ."', quantity='$shqst' WHERE id='". $rqst['id'] ."' ");
						   mysqli_query($con,"INSERT INTO journal SET com='".$a.": ".$r3['name']." \n\r OLD - ".$a.": ".$r2['sname']." ".$rord['itemname']." | ".$r41["name"]."',date='".$T."',opertype='2',uid='".$_SESSION['GuserID']."',orderid='".$c."'");
						   
						   $pprice=mysqli_query($con, "SELECT *  FROM  productprices WHERE name='". $rord['itemname'] ."' AND price='".$r2['takeprice']."' AND sold < quantity AND quantity > 0 LIMIT 1 ");
			               $rprice=mysqli_fetch_assoc($pprice);
		                    if($rprice['sold']<$rprice['quantity'])
			                {
			                 mysqli_query($con, "UPDATE  productprices SET sold='". ++$rprice['sold'] . "' WHERE id='".$rprice['id']."' ");
			               
						   }
						   
						   echo 1;				  
					  }
					  
					}
				   }
					if($dasruleba==0 AND $gaitans==0 AND $misatani==0 AND $gasagzavni==0)
					{
						if($dasruleba1==7||$gaitans1==10||$gasagzavni1==5||$misatani1['status']==4)
						{
							 $shqst=$rqst['quantity']+1;
						   mysqli_query($con, "UPDATE qbystore set itemid='". $rsp['id'] ."', storeid='". $rord['place'] ."', quantity='$shqst' WHERE id='". $rqst['id'] ."' ");
							mysqli_query($con,"INSERT INTO journal SET com='".$a.": ".$r3['name']." \n\r OLD - ".$a.": ".$r2['sname']." ".$rord['itemname']." | ".$r41["name"]."',date='".$T."',opertype='12',uid='".$_SESSION['GuserID']."',orderid='".$c."'");
						
						   $pprice=mysqli_query($con, "SELECT *  FROM  productprices WHERE name='". $r2['itemname'] ."' AND price='".$r2['takeprice']."' AND sold > 0 ORDER BY id DESC LIMIT 1 ");
			               $rprice=mysqli_fetch_assoc($pprice);
		                    if($rprice['sold']>0)
			                {
			                 mysqli_query($con, "UPDATE  productprices SET sold='". --$rprice['sold'] . "' WHERE id='". $rprice['id'] ."'  ");
			               
						   }
						      echo 1;
						   
						}
					}
					$q3=mysqli_query($con,"SELECT name FROM status WHERE  id='".$b."'");
					$r3=mysqli_fetch_array($q3);
					mysqli_query($con,"UPDATE orders SET ".$a."='".$b."' WHERE id='".$c."'");
					mysqli_query($con,"INSERT INTO journal SET com='".$a.": ".$r3['name']." \n\r OLD - ".$a.": ".$r2['sname']."',date='".$T."',opertype='8',uid='".$_SESSION['GuserID']."',orderid='".$c."'");
					echo 1;	
				}				
			}
		}
		
		elseif($a=="takeprice"){
			$q1=mysqli_query($con,"SELECT id FROM orders WHERE ".$a."='".$b."' AND id='".$c."'");
			if(mysqli_num_rows($q1)<1){
				$q2=mysqli_query($con,"SELECT * FROM orders WHERE  id='".$c."'");
				$r2=mysqli_fetch_array($q2);
				mysqli_query($con,"UPDATE orders SET ".$a."='".$b."',profit=".round((($r2["price"]-floatval($b))/1.18),2)." WHERE id='".$c."'");
				mysqli_query($con,"INSERT INTO journal SET  com='".$a.": ".$b." OLD - ".$a.": ".$r2[$a]."',date='".$T."',opertype='8',uid='".$_SESSION['GuserID']."',orderid='".$c."'");
				echo 1;	
			}			
		}else{
			if($a=="deliverydate"){
				$b=strtotime($b);
			}
			$q1=mysqli_query($con,"SELECT id FROM orders WHERE ".$a."='".$b."' AND id='".$c."'");
			$r1=mysqli_fetch_array($q1);
			if(mysqli_num_rows($q1)<1){
				$q2=mysqli_query($con,"SELECT * FROM orders WHERE  id='".$c."'");
				$r2=mysqli_fetch_array($q2);
				mysqli_query($con,"UPDATE orders SET ".$a."='".$b."' WHERE id='".$c."'");
				mysqli_query($con,"INSERT INTO journal SET  com='".$a.": ".$b." OLD - ".$a.": ".$r2[$a]."',date='".$T."',opertype='8',uid='".$_SESSION['GuserID']."',orderid='".$c."'");
				echo 1;					
			}		
		}
		if($a=="date"){
			mysqli_query($con,"UPDATE orders SET ".$a."='".strtotime($b)."' WHERE id='".$c."'");
		}

	}
}
?>