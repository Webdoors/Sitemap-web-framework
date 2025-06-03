<?php

	 function permissions($x,$y)	{
		// $Userclass=new User($this->con);

  
		$uid=$x;

																		  
		$permissions=mysqli_query($y,"SELECT t1.*, (SELECT  GROUP_CONCAT(shortname) FROM permissionpages WHERE FIND_IN_SET(id,t1.pages) ) AS page,  
		                                        (SELECT  GROUP_CONCAT(shortname) FROM permission WHERE FIND_IN_SET(id,t1.permissions) ) AS permission,  
						                        (SELECT concat_ws(' ', firstname,lastname)  FROM admins WHERE Id=t1.adminid) AS fullname FROM permissionMeta AS t1 WHERE t1.adminid=(SELECT Id FROM admins WHERE  Id=1 AND  custom=1 )")	;															  
		$result=$permissions?mysqli_fetch_all($permissions, MYSQLI_ASSOC):[];
		return $result;
	}
	
     function getpages($Guid,$page,$pages,$con)
	{
	

         
          $permissionars=permissions($Guid,$con);

          $pages=@explode(',',$permissionars[0]['page']);

            
          if(!empty($permissionars[0]["typeName"])&&$permissionars[0]["typeName"]!='სუპერადმინი')
         {
	      
             if(!in_array($page ,$pages ) )
	        {
              return 0;
            }
            
			return 1;
           
         }
           return 1;



//$hist='history';
	}
	
	
	 function getprm($Guid,$con,$name)
	{
	
	     
           $permissionars=permissions($Guid,$con);

          $permissions=@explode(',',$permissionars[0]['permission']);



            
         if(!empty($permissionars[0]["typeName"])&&$permissionars[0]["typeName"]!='სუპერადმინი')
         {
	      
             if(!in_array($name ,$permissions ) )
	        {
              return 0;
            }
            
			return 1;
		 }
		 else
		 {
			 return 1;
		 }
        
echo $permissionars[0]["typeName"]; 


//$hist='history';
	}
	
	



?>