<?php

  function sitemap($pgname,$tablename,$pid,$domain,$con,$type)
  {
	  $T=time();
	    $tb=mysqli_query($con,"SELECT * FROM $tablename WHERE id='$pid' ");
	    $rtb=mysqli_fetch_assoc($tb);
		$langs=mysqli_query($con,"SELECT * FROM languages WHERE active='1' ");
		if(mysqli_num_rows($langs)>0)
		{
		while($rlangs=mysqli_fetch_assoc($langs))
		{
			
		if($type==1)
		{		
         // echo $tablename;	 
	    if($tablename=="products")
			{
				$clink="";
				$ct=mysqli_query($con,"SELECT id, slug FROM categories WHERE id='".$rtb['category']."' ");
	          //  echo "SELECT id, slug FROM categories WHERE id='".$rtb['category']."' ";
				if(mysqli_num_rows($ct)>0)
				{
				$rct=mysqli_fetch_assoc($ct);
				$clink="/".$rct['id']."-".$rct['slug'];
				}
				$link=$domain."/".$rlangs["shortname"].$clink."/".$pid."-".$rtb["slug"];
				//echo $link;
			}
			else
			{
				$link=$domain."/".$rlangs["shortname"]."/".$pid."-".$rtb["slug"];
			}
		
		}
		else
		{
			$link=$domain."/".$rlangs["shortname"]."/".$pgname."/".$rtb["slug"]."/".$pid;
		}
		$map=mysqli_query($con,"SELECT * FROM sitemap WHERE pid='$pid' AND pagename='$pgname' AND tablename='$tablename' AND  ln='".$rlangs["shortname"]."' ");
         if(mysqli_num_rows($map)==0)
	    {
		 mysqli_query($con,"INSERT INTO sitemap SET pagename='$pgname', pid='$pid', tablename='$tablename', name='$link', ln='".$rlangs["shortname"]."', date='$T' ");
		 //echo "INSERT INTO sitemap SET pagename='$pagename', pid='$pid',  name='$link' ";
		}
		else
		{
			mysqli_query($con,"UPDATE sitemap SET  name='$link',  date='$T' WHERE  pid='$pid' AND pagename='$pgname' AND tablename='$tablename' AND  ln='".$rlangs["shortname"]."'  ");
		}
		}
		
	}
  }

?>