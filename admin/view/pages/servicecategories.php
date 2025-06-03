
<div class='container'>
<div class="row">
  <h3>service categories</h3>
</div>
<div class='row'>
<table class='table table-hover'>
      
  <tr>
		<td>Id</td>
		
		<td>name</td>
		<td>number of services</td>
		<td>number of merchants</td>
		<td>details</td>
		<td>delete</td>
		
		
			
	</tr>	

<?php
   $ser=mysqli_query($con,"SELECT t1.* , (SELECT count(id) FROM services WHERE serviceid=t1.id) AS sumc FROM servicecategories AS t1 ");
   while($rser=mysqli_fetch_assoc($ser))
   {

?>

      
    <tr>
		<td><?=$rser['id'] ?></td>
		<td> <?=$rser['name'] ?></td>
		<td><?=$rser['sumc'] ?></td>
		<td> 12</td>
		<td><a href='?page=services&d=<?=$rser['id'] ?>'>details</a></td>
		<td><i class='fa fa-trash DGA' n='services' d='<?=$rser['id'] ?>'>&nbsp;</i></td>
		
			
	</tr>	

   
<?php
   }
?>
</table>
</div>
<div class='row itmcontainer' t='servicecategories' conf='1'>
   <div class='col-md-9'>
      <input type='text ' placeholder='servicename' class='form-control UPTS' ln='' name='name' >
   </div>
   <div class='col-md-3'>
   <div class='btn btn-default pull-right ADDITEMS' t='servicecategories' pos='1' >+ add service category</div>
   </div>
</div>
</div>

