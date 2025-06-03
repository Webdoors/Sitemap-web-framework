<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//KA" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/2012/xhtml" lang="ka">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOSCH 999 ADMIN</title>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/main.js"></script>
	<link rel="icon"type="image/x-icon"href=""/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
.MN img{
	margin:auto;
}
.MN label{
font: bold 24px/24px arial;
    color: #949292;
}
.MN{
	text-align:center;
	padding:20px;
    width: 250px;
    height: auto;
    border: solid 1px #DDD;
    border-radius: 14px;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
	-ms-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
	-o-transform: translate(-50%,-50%);
}
.IN{
	text-align: center;
	width: calc(100% - 5px);
    margin: 0px 0px 10px 0px;
    height: 30px;
	border:solid 1px #DDD;
} 
.BUT{
    width: calc(100% - 1px);
    height: 36px;	
	cursor:pointer;
}

.smscode{
	position:relative;
}
.btnsms{
	position:absolute;
	right:0;
	top:0;
	height:32px;
	background:blue;
	border:none; 
	color:white;
	opacity:0.8;
	transition:0.2s;

}
.btnsms:hover{
	opacity:1;
}

#snackbar {
  visibility: hidden;
  min-width: 250px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 99999;
  left: 50%;
  transform:translateX(-50%);
  bottom: 30px;
}
#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}


</style>
	
	
</head>
<body>
<?php
//echo $_SERVER["REMOTE_ADDR"];

?>
<form class="MN">
<label><p>BOSCH 999</p> <small>სამართავი პანელი<small></label>
<br>
<br>
<input type="text" placeholder="მომხარებელი" name="username" class="IN CHECKUSER USR"/>
<input type="password" placeholder="პაროლი" name="password" class="IN CHECKUSER PAS"/>
<div class='smscode' style="display:none">
<input type="text" placeholder="sms code" name="sms"  class="IN SMS"/>
<input type='button' class='btnsms GETSMS' d='1' value='sms' />
</div>
<input type="button" value="ავტორიზაცია"  class="IN BUT "/>
</form>
<div id="snackbar" class=''>dfdfdf</div>	
</body>
</html>
