   <?php
        ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 if(isset($_POST['a']))
 {       $a=mysqli_real_escape_string($con,$_POST['a']);
	   if($a!='')
	   {
	   
         $uslist=mysqli_query($con, "SELECT * FROM id WHERE name like '%$a%' OR personal_id like '%$a%' OR lastname like '%$a%' OR company_name like '%$a%'  OR company_id like '%$a%' "); 
			   while($ruslist=mysqli_fetch_assoc($uslist))
			   {
			?>
		     <div class='plist' d="<?=$ruslist['id'] ?>" pp="<?=$ruslist['personal_id'] ?>" n="<?=$ruslist['name'] .' '. $ruslist['lastname'] ?>"  >
			   <?=$ruslist['name'] ?>  <?=$ruslist['lastname'] ?>  (<?=$ruslist['personal_id'] ?>)  (<?=$ruslist['mobile_phone'] ?>)
			
			  </div>
			   
			<?php
			   }
	   }
 }
			   ?>