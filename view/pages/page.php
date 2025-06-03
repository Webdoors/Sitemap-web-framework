<?php

$q1=mysqli_query($con,"SELECT * FROM `sitemap` WHERE slug_$L='$p2'");
$r1=mysqli_fetch_array($q1);
?>
<section class="contact in w-75 mx-auto my-5 pt-5">
    <div class="section-title w-100 px-2 mt-5">
       <h1 ><?=$rs["title_".$L]?></h1>	
	   	       <h2 class="d-none"><?=$sitemap["keywords_".$L]?></h2>
       <h3 class="d-none"><?=$sitemap["description_".$L]?></h3>   
    </div>
    <div class="w-100 mt-4" style="overflow: hidden;word-wrap: break-word;">
     <?=$r1["text_".$L] ?>

    </div>
</section>