<?php
 if(isset($_SESSION['GuserID'])){
		//$Helpers->setsession(APPNAME,EXPIRY-time());
	    $id=(int)$_POST["a"]??0;
		$permissions=mysqli_query($con,"SELECT t1.* FROM permission AS t1 ORDER BY t1.id desc");
        $pages=mysqli_query($con,"SELECT t1.* FROM  permissionpages AS t1 ");
        $admins=mysqli_query($con,"SELECT t1.* FROM admins AS t1 WHERE t1.Id='$id' ORDER BY t1.Id ASC");
		//echo "SELECT t1.* FROM admins AS t1 WHERE t1.Id='$id' ORDER BY t1.Id ASC";
        $permeta=mysqli_query($con,"SELECT t1.* FROM permissionMeta AS t1 WHERE t1.adminid='$id' ");
		//echo "SELECT t1.* FROM permissionMeta AS t1 WHERE t1.adminid='$id' ";
	
		$result=true;
		
		//echo "(SELECT id FROM users WHERE id='$id'";
        if($result) 
		{ 
			
	        $admin=mysqli_fetch_assoc($admins);
	        $meta=mysqli_fetch_assoc($permeta);
			
			$ppages=$meta['pages']??"";
	     	$pper=$meta['permissions']??"";
	    	$ppagesarr=explode(",",$ppages);
		    $pperarr=explode(",",$pper);
			
          ?>
		  <div class='prheader py-2 justify-content-between row' >
			          <div class='col-md-6 '>
							   <h5><?=$admin["name"] ?> </h5>
							</div>
					 <div class='col-md-6 '>
                        <div class="btn btn-danger permclose float-right">
							&times;
						 </div>
					</div>	
			   </div>
			   <div class='prbody' >
		           		<div class="additems card-body" t='permissionMeta' d="<?=$meta["id"]??'' ?>" >
						<div class="d-flex">
							
							<div class="col-12 pr-0 row">
							    <div class='col-md-6'>
								   <span class="border-0 ">გვერდები</span>
							     <div class="dropdown show mt-2">
											
											<div class=" w-100" aria-labelledby="dropdownMenuButton">
											<?php
				                            foreach($pages AS $page)
					                         {
				                            ?>
												<div class=" align-items-center d-flex" href="#">
													<input type="checkbox" <?=in_array($page['id'], $ppagesarr)?"checked":"" ?> class="form-control mr-2 addinput" name="pages2" d='<?=$page['id'] ?>' /> 
													<label for="page1">
														<?=$page['name'] ?>
													</label>
												</div>
											<?php
											 }
											 
											 ?>
											 
											
											</div>
								  </div>
								</div>
								 <div class='col-md-6 '>
								   <span class="border-0 ">permissions</span>
								  	     <div class="dropdown show mt-2">
											
											<div class=" w-100" aria-labelledby="dropdownMenuButton">
											<?php
				                            foreach($permissions AS $permission)
					                         {
				                            ?>
												<div class=" align-items-center d-flex" href="#">
													<input type="checkbox"  <?=in_array($permission['id'], $pperarr)?"checked":"" ?> class="form-control mr-2 addinput" name="permissions2" d='<?=$permission['id'] ?>' /> 
													<label for="permission">
														<?=$permission['name'] ?>
													</label>
												</div>
											<?php
											 }
											 
											 ?>
											 
											
											</div>
								      </div>  
								   
								 </div> 
							</div>
						</div>
						<input type='hidden'  class='form-control addinp UPTS'  value='<?=$meta["pages"]??"" ?>' name='pages' pname='pages2' />
						<input type='hidden'  class='form-control addinp UPTS'  tp='int' name='uid' value='<?=$meta["id"] ?></'/>
						<input type='hidden'  class='form-control addinp UPTS'  value='<?=$meta["pages"]??"" ?>' name='permissions' pname='permissions2' />
						<input type='hidden'  class='form-control  UPTS' tp='int'   name='warehouseid'  />
						<input type='hidden'  class='form-control  UPTS' tp='int'    name='amountid'  />
                     <div class="col-12 mt-3 px-0">
						 <div class="btn btn-outline-success" data-submit>
							 დამატება
						 </div>
					 </div>
					</div>
						</div>
		  
		  <?php
			
		}
 }
		?>
		