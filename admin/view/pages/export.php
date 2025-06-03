<?php
	if($from==""||$to==""){
		$from=date("Y-m-d",strtotime("-29 days"));
		$to=date("Y-m-d");
	}
	
	// $q1=mysqli_query($con,"SELECT * FROM orders");
	// while($r1=mysqli_fetch_array($q1)){
		// //mysqli_query($con,"UPDATE orders SET udate='".strtotime($r1["date"])."' WHERE id='".$r1["id"]."'");
	// }

?>
<br> 
<div class="col-md-12"><a href="func/ereserved.php" class="btn btn-default">Reserved</a></div>
<div class="col-md-12 LIN"></div>
<div class="col-md-12"><a href="func/epreorder.php" class="btn btn-default">Preordered</a></div>
<div class="col-md-12 LIN"></div>
<div class="col-md-12">
			<div class="col-md-4 NOP" >
			   <div class='row'>
				<div class="col-sm-8 pl-2 NOP">
					
					  <select class='form-control strr' name='strr'>
					    <?php 
						   $q2=mysqli_query($con,'SELECT * FROM stores ORDER BY id DESC');
						   while($r2=mysqli_fetch_assoc($q2))
						   {
							   ?>
							   <option value="<?=$r2['id'] ?>"><?=$r2['name']?> </option>
							   <?php
						   }
						   ?>
					  </select>
					
				</div>
				
				<div class='col-md-4 NOP'>
                  <a class="btn btn-default STORR">STORE</a>
                </div>
				
				</div>
			</div>
			
</div>

<div class="col-md-12 LIN"></div>
<div class="col-md-12">
			<div class="col-md-4 NOP" id="TWO">
				<div class="col-sm-12 pl-2 NOP">
					<div class="row">
						<div class="col-md-6">
							<input id="in1" class="form-control A10 in1 SS" name="v1" type="text" autofocuss="" value="<?=$from?>" placeholder="თარიღიდან" data-value="<?=$from?>">
						</div>
						<div class="col-md-6">
							<input id="in2" class="form-control A11 in2 SS" name="v2" type="text" autofocuss="" value="<?=$to?>" placeholder="თარიღამდე" data-value="<?=$to?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5 NOP" >
			    <div class="col-md-6 NOP" >
					  <select class='form-control exstore' name='exstore'>
					    <option value="">საწყობი</option>
					    <?php 
						   $q2=mysqli_query($con,'SELECT * FROM stores ORDER BY id DESC');
						   while($r2=mysqli_fetch_assoc($q2))
						   {
							   ?>
							   <option value="<?=$r2['id'] ?>"><?=$r2['name']?> </option>
							   <?php
						   }
						   ?>
					  </select>
              </div>
			      <div class="col-md-6 NOP" >
					  <select class='form-control exmtd' name='exmtd'>
					     <option value="">გადახდის მეთოდი </option>
					    <?php 
						   $q2=mysqli_query($con,'SELECT * FROM methods ORDER BY id DESC');
						   while($r2=mysqli_fetch_assoc($q2))
						   {
							   ?>
							   <option value="<?=$r2['id'] ?>"><?=$r2['name']?> </option>
							   <?php
						   }
						   ?>
					  </select>
              </div>
			  
           </div>
			<div class="col-md-3 NOP" >
			
             <a  class="btn btn-default EXPORD">EXPORT ORDERS</a>
           </div>
</div>
<div class="col-md-12 LIN"></div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
	if($("#TWO").length>0){ 
	
		var start = moment().subtract(29, 'days');
		var end = moment();
		// $('.in1').val(start.format('YYYY-MM-DD'));
		// $('.in2').val(end.format('YYYY-MM-DD'));
		$('#TWO').daterangepicker(
			{
				separator : ' to ',
				autoApply: true,
				startDate: start,
				endDate: end,
				ranges: {
				   'Today': [moment(), moment()],
				   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				   'This Month': [moment().startOf('month'), moment().endOf('month')],
				   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				}
			}, function(start, end, label) {
				$('.in1').val(start.format('YYYY-MM-DD'));
				$('.in2').val(end.format('YYYY-MM-DD'));

			}
		);

	}
</script>