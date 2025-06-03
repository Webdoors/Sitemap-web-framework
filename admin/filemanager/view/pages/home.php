<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
$uploaddir2=$uploaddir;
$folder=isset($_GET["folder"])?$_GET["folder"]:"";
$key=isset($_GET["key"])?$_GET["key"]:"";
$target=isset($_GET["target"])?$_GET["target"]:"";
if($folder==''){
	$folder=isset($_COOKIE['lastfolder'])?$_COOKIE['lastfolder']:'';
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-2">
		<div class="w-100 HEADER1">
		<a href='?folder=<?=$uploaddir?>&target=<?=isset($target)?$target:""?>'  style='font-size:12px;color:#000;'><img src='img/ico/folder.png' style='width:20px'/>Home</a>
<?php

// var_dump($_GET);
if($key!=""){
	$matches = searchInDirectory($uploaddir, $key);
}
if($folder!=""){
	$uploaddir2=$folder;
}
function listDirectories($dir, $level = 0) {
	global $target; 
    // Create a new DirectoryIterator object
    $iterator = new DirectoryIterator($dir);
    echo "<ul level='$level' style='".($level>0?"display:none":"")."' >";
    // echo "<ul level='$level' style='".($level!=0?"display:none":"")."'>";

    foreach ($iterator as $fileinfo) {
        // Check if the current item is a directory, excluding '.' and '..'
        if ($fileinfo->isDir() && !$fileinfo->isDot()) {
            // Print the directory path within list tags
            echo "<li><a href='?folder=".$dir."/".$fileinfo->getFilename()."&target=$target' style='font-size:12px;color:#000;'><img src='img/ico/folder.png' style='width:20px'/>" . htmlspecialchars($fileinfo->getFilename()) . "</a><span class='OPENER CP'>+</span></li>";

            // Recursively list directories
            listDirectories($fileinfo->getPathname(), $level + 1);
        }
    }
    
    echo "</ul>";
}

// Replace 'your_directory_path' with the path of your directory
listDirectories($uploaddir);
?>
		</div>
		</div>
		<div class="col-10 ps-3" style="padding-top:72px">
		<div class="row mb-2 HEADER2">

			<div class="col-2 px-0">
			<?php
if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'filemanager') !== false) {
?>
				<a href="<?=htmlspecialchars($_SERVER['HTTP_REFERER'])?>" class="btn btn-outline-warning CP"><i class="fa fa-angle-left"></i></a>
<?php
}
?>
				<label for="UPL"><a class="btn btn-outline-success CP"><i class="fa fa-upload"></i></a></label>
				<input class="d-none UPL" multiple id="UPL" d='<?=$uploaddir2?>' type="file"/>
			</div>
			<div class="col-2 pe-0">
				<input class="form-control NEWFOLDER" placeholder="New folder name"/>
			</div>
			<div class="col-2">
				<a class="btn btn-outline-warning CP ADDFOLDER" d="<?=$uploaddir2?>"><img src='img/ico/folder.png' style='width:30px'/></a>
			</div>
		
			<div class="col-6 pe-0">
					<form class="w-75 d-inline-block">
					<input type="hidden" name="folder" value="<?=$uploaddir?>"/>
					<input type="hidden" name="target" value="<?=$target?>"/>
					<input style="width:60%;vertical-align:middle;" name="key" value="<?=$key?>" type="search" class="form-control d-inline-block" placeholder="Search"/>
					<button type="submit" class="d-inline-block btn btn-outline-success CP px-1"><i class='fa fa-search'></i></button>
					<a href="?folder=<?=$folder?>&target=<?=$target?>" class="d-inline-block btn btn-outline-danger px-1 CP"><i class='fa fa-refresh'></i></a>
<div class="dropdown d-inline">
<button class="btn btn-outline-primary px-1 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><a class="dropdown-item CP GETMOVE" >Move Selected</a></li>
<li><a class="dropdown-item CP DELSEL" >Delete selected</a></li>
<li><a class="dropdown-item CP SELECTALL" >Select All</a></li>
</ul>
</div>					
					</form>				
					<a  style="position:fixed;right:20px;top:16px;"><i style="cursor:pointer" class="fa fa-close FACLOSE"></i></a>
			</div>
		</div>
<?php
function searchInDirectory($dir, $key) {
    $result = [];

    if (!file_exists($dir) || !is_dir($dir)) {
        echo "The specified directory '$dir' does not exist.\n";
        return $result;
    }

    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($items as $item) {
      if (stripos(basename($item), $key) !== false) {
            $result[] = $item->getPathname();
        }
    }

    return $result;
}
function getCurrentUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    return str_replace("/filemanager","",$protocol . $host . $path);
}
function getDomainUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    return str_replace("/filemanager","",$protocol . $host );
}
function h_filesize($bytes, $decimals = 2) {
$sz = 'BKMGTP';
$factor = floor((strlen($bytes) - 1) / 3);
return sprintf("%.{$decimals}f", floatval($bytes) / pow(1024, $factor)) . @$sz[$factor];
}
function listFilesAndDirectories($dir) {
	global $target;  
    $iterator = new DirectoryIterator($dir);
	
	$foundFiles = [];


    foreach ($iterator as $file) 
    {
		

       if ($file->isDot())
       {
          continue;
       }
    
		$fileName = $file->getFilename();
		$pieces    = explode('.', $fileName);
		$filetype  = pathinfo( $file, PATHINFO_EXTENSION );

		$foundFiles[] = array( 
		  "isDot" => $file->isDot(),
		  "isDir" => $file->isDir(),
		  "fileName" => $fileName,
		  "filetype" => $filetype 
		);       
       
    }
	if (is_array($foundFiles)) {
			asort( $foundFiles );
	} else {
		
	}	
	
    $count = 0;
    echo '<div class="row">';
    foreach ($foundFiles as $fileinfo) {
		
		$url=str_replace("../../",getDomainUrl()."/admin/",$dir."/".$fileinfo["fileName"]);
		$url=str_replace("../",getDomainUrl()."/admin/",$url);


        if (!$fileinfo["isDot"]) {
            if ($count % 3 == 0 && $count > 0) {
                echo '</div><div class="row">'; // Close the current row and start a new one every 4 files
            }
			$filesize='';
			try{
				list($width, $height, $type, $attr) = @getimagesize($dir.'/'.$fileinfo["fileName"]);
				$filesize=filesize($dir.'/'.$fileinfo["fileName"]);
			}catch(Exception $e){
				
			}
            // Create a card for each file or directory
            echo '<div class="col-sm-4 px-1">';
            echo '<div class="card mb-2" style="min-height:120px">';
            echo '<div class="card-body">';
           
			if($fileinfo["isDir"]){
				  echo '<h6 class="card-title" style="font-size: 13px"><a href="?folder='.$dir.'/'.$fileinfo["fileName"].'&target='.$target.'" >'.htmlspecialchars($fileinfo["fileName"]).'</a></h6>';
			}else{
				  echo '<h6 title="'.$dir.'/'.htmlspecialchars($fileinfo["fileName"]).'" class="card-title" style="font-size: 12px">'.htmlspecialchars($fileinfo["fileName"]).'</h6>';				
			}

            echo '<div class="row">';
            echo '<div class="col-5">';
			echo '<img src="' . ($fileinfo["isDir"] ? 'img/ico/folder.png' : $dir."/".$fileinfo["fileName"]) . '" style="max-width:120px;max-height:120px"/>';
			echo'</div>';
			echo '<div class="col-7"><i title="Copy Link" class="fas fa-link CP COPYLINK text-primary me-2" url="'.$url.'" ></i><i title="Use it" class="fas fa-hand-point-up me-2 text-warning CP USEIT" target="'.$target.'" url="'.$url.'"></i><i title="Rename" class="fas fa-edit me-2 CP RENAME" file="'.$dir.'/'.htmlspecialchars($fileinfo["fileName"]).'" d="'.$dir.'/'.htmlspecialchars($fileinfo["fileName"]).'"></i><i title="Delete" class="fas fa-trash text-danger me-2 CP DEL" d="'.$dir."/".$fileinfo["fileName"].'"></i><input class="SELECTINP" file="'.$dir."/".$fileinfo["fileName"].'"  type="checkbox"/><i title="'.$width.'px/'.$height.'px, '.h_filesize($filesize).'" class="fa fa-info-circle INFO"></i></div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $count++;
        }
    }

    echo '</div>'; // Close the last row
}

// Replace 'your_directory_path' with the path of your directory
if($key!=""){
	$count=0;
	echo '<div class="row">';
    foreach ($matches as $match) {
		 $url=str_replace("../../",getDomainUrl()."/",$match);
		 $url=str_replace("../",getDomainUrl()."/",$url);
		 $fname=explode("/",$match);
		 $fname=end($fname);
		if ($count % 3 == 0 && $count > 0) {
			echo '</div><div class="row">'; // Close the current row and start a new one every 4 files
		}
		$filesize='';
		try{
			list($width, $height, $type, $attr) = @getimagesize($dir.'/'.$fileinfo["fileName"]);
			if((isset($fileinfo["fileName"])?$fileinfo["fileName"]:"")!=""){
				$filesize=filesize($dir.'/'.$fileinfo["fileName"]);
			}
		}catch(Exception $e){
			
		}
		// Create a card for each file or directory
		echo '<div class="col-sm-4 px-1">';
		echo '<div class="card mb-2" style="height:150px">';
		echo '<div class="card-body">';
	   
		if(is_dir($match)){
			  echo '<h6 class="card-title" style="font-size: 12px"><a href="?folder='.$match.'&target='.$target.'">'.htmlspecialchars($match).'</a></h6>';
		}else{
			  echo '<h6 title="'.htmlspecialchars($match).'" class="card-title" title="'.str_replace("../../","",htmlspecialchars($match)).'" style="font-size: 10px">'.str_replace("../../","",htmlspecialchars($fname)).'</h6>';				
		}

            echo '<div class="row">';
            echo '<div class="col-5">';
		echo '<img src="' . (is_dir($match) ? 'img/ico/folder.png' : $match ), '" style="max-width:120px;max-height:120px"/>';
			echo'</div>';
			echo '<div class="col-7"><i title="Copy Link" class="fas fa-link CP COPYLINK text-primary me-2" url="'. $url.'"></i><i title="Use it" class="fas fa-hand-point-up me-2 text-warning CP USEIT" target="'.$target.'" url="'. $url.'"></i><i title="Rename" class="fas fa-edit me-2 CP RENAME" file="'.htmlspecialchars($match).'" d="'.htmlspecialchars($match).'"></i><i title="Delete" class="fas fa-trash text-danger me-2 CP DEL" d="'.$match.'"></i><input class="SELECTINP" file="'.htmlspecialchars($match).'"  type="checkbox"/><i title="'.$width.'px/'.$height.'px, '.h_filesize($filesize).'" class="fa fa-info-circle INFO"></i></div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

		$count++;		
        // echo $match . "\n";
    }
}else{
	listFilesAndDirectories($uploaddir2);	
}

?>
		</div>
	</div>
</div>
<style>
.INFO{
	position: absolute;
    right: 29px;
    bottom: 35px;
	color:blue;	
}
.COPYLINK{
    position: absolute;
    right: 19px;
    bottom: 10px;	
}
.RENAME{
    position: absolute;
    right: -1px;
    bottom: 36px;	
}
.USEIT{
	position: absolute;
    right: 24px;
    bottom: 60px;	
}
.SELECTINP{
	position: absolute;
    right: 9px;
    bottom: 60px;
}
.DEL.fa-trash{
	position: absolute;
    right: 0px;
    bottom: 10px;	
}
li,ul{
	list-style: none;
}
.CP{
	cursor:pointer;
}
ol, ul {
    padding-left: 0.7rem;
}
.HEADER2{
	position: fixed;
    top: 0px;
    padding: 10px;
    z-index: 999;
    background: #fff;
    border-bottom: solid 1px #dbdbdb;
	width: calc(84%);
    left: 18%;
}
.HEADER1{
	position: fixed;
    top: 0px;
    padding: 10px;
    z-index: 999;
    background: #fff;
    border-right: solid 1px #dbdbdb;
	width: 16% !important;
    overflow-y: auto;
    height: 100%;
}
.FACLOSE{
    top: 17px;
}
</style>
<script>
	$(document).on("click",".OPENER",function(){
		if($(this).html()=="+"){
			$(this).parent().next().show();
			if($(this).parent().next().length>0){
				$(this).html("-");		
			}else{
				$(this).html("");	
			}
		
		}else{
			$(this).parent().next().hide();
			$(this).html("+");					
		}

	});
function setCookie(name, value, days, path = '/') {
	let expires = "";
	if (days) {
		let date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "expires=" + date.toUTCString() + "; ";
	}
	document.cookie = `${name}=${encodeURIComponent(value)}; ${expires}path=${path};`;
}

function getCookie(name) {
	let nameEQ = name + "=";
	let cookies = document.cookie.split(';');
	for(let i = 0; i < cookies.length; i++) {
		let cookie = cookies[i];
		while (cookie.charAt(0) === ' ') cookie = cookie.substring(1);
		if (cookie.indexOf(nameEQ) === 0) return decodeURIComponent(cookie.substring(nameEQ.length));
	}
	return null;
}
setCookie('lastfolder','<?=$folder?>');
</script>