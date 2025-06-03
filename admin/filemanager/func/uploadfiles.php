<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
	$a=$_POST["a"];
	$im="b";
	$C=count($_FILES[$im]["name"]);
	$ma=",";
	// var_dump($_FILES);
	for($i=0;$i<$C;$i++){
		if($i==$C-1){
			$ma="";
		}

		if($C==1){
			$TYPE=$_FILES[$im]["type"][0];
			$NAME=$_FILES[$im]["name"][0];
			$TMPNAME=$_FILES[$im]["tmp_name"][0];
		}else{
			$TYPE=$_FILES[$im]["type"][$i];
			$NAME=$_FILES[$im]["name"][$i];
			$TMPNAME=$_FILES[$im]["tmp_name"][$i];
		}
		$fname=$NAME;
		$allowedExts = array("jpg","JPEG","JPG","GIF","gif","pjpeg","jpeg", "gif", "png", "PNG", "xlsx", "XLSX", "xls", "XLS", "DOCX", "docx", "DOC", "doc", "csv", "CSV", "pdf", "PDF", "pptx", "PPTX","rar","RAR","zip","ZIP","GZ","gz","mp3","MP3","MP4","mp4","M4A","m4a","wav","WAV","txt","TXT","webp","WEBP");
		$ext = explode(".", $NAME);
		$ext = end($ext);
		if ((($TYPE == "image/gif")
				|| ($TYPE == "image/jpeg")
				|| ($TYPE == "image/JPEG")
				|| ($TYPE == "image/JPG")
				|| ($TYPE == "image/GIF")
				|| ($TYPE == "image/jpg")
				|| ($TYPE == "image/PNG")
				|| ($TYPE == "image/png")
				|| ($TYPE == "image/webp")
				|| ($TYPE == "audio/mpeg")
				|| ($TYPE == "audio/mp4")
				|| ($TYPE == "video/mp4")
				|| ($TYPE == "audio/wav")
				|| ($TYPE == "text/plain")
				|| ($TYPE == "image/pjpeg")
				||($TYPE == "application/pdf")
				||($TYPE == "application/msword")
				|| ($TYPE == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
				|| ($TYPE == "application/vnd.ms-excel")
				|| ($TYPE == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
				|| ($TYPE == "application/vnd.ms-powerpoint")
				|| ($TYPE == "application/vnd.openxmlformats-officedocument.presentationml.presentation")
				|| ($TYPE == "application/x-rar-compressed, application/octet-stream")
				|| ($TYPE == "application/zip, application/octet-stream")
				|| ($TYPE == "application/tar+gzip")
				|| ($TYPE == "application/gzip")				
				)
				&& in_array($ext, $allowedExts))
		{

			if ($_FILES[$im]["error"][$i] > 0){
echo $_FILES[$im]["error"][$i];
			}else{
				$kfold=$a;
				$code="(copy".rand(999999,9999999999).")";
				 // echo $kfold . $NAME;
				if(file_exists($kfold . $NAME)){
					$far=explode(".",$NAME);
					array_pop($far);
					$fl=$kfold .implode(".",$far).$code.".".end(explode(".",$NAME));
					$NAME=implode(".",$far).$code.".".end(explode(".",$NAME));
					move_uploaded_file($TMPNAME,$fl);
echo 	$fl;				
				}
				else{
					$fl="../".$kfold ."/". $NAME;						
					move_uploaded_file($TMPNAME,$fl);
					echo 	$fl;
				}
			
			}

		}else{
			echo $TYPE;
		}
	
	}	

?>