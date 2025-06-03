<div class=container>
   <div class="row">
      <div class="col-md-12">
	     <?php $usname=mysqli_query($con, "SELECT * FROM admins WHERE Id='".$_SESSION['GuserID']."'");
               $rsname=mysqli_fetch_array($usname);		 ?>
	     <input class='form-control'  type="text" placeholder="<?=$rsname['user']?>" style="width:100%; margin:10px 0px; height:50px;" disabled />
		 
	     <input class='form-control np'  type="password" placeholder="ახალი პაროლი" style="width:100%; margin:10px 0px; height:50px;" id="np"  />
		   
	     <input class='form-control rnp' type="password" placeholder="გაიმეორეთ პაროლი" style="width:100%; margin:10px 0px; height:50px;" id="rnp"  />
		
		 <button class="btn btn-default SNP" style="width:100%; margin:10px 0px; height:50px;" id="SNP" >პაროლის შეცვლა</button>
		 

	  </div>
   </div>
</div>