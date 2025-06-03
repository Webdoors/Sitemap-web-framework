<?php 


 $pp=$p2;
	if($p2=='scat')
	{
		$pp=$p3;
	}
	 
	  $ppp=$pp;
	  $ppp=str_replace("%20", " ", $ppp) ;
      $ppp=mysqli_real_escape_string($con, $ppp);
	   $cat=mysqli_query($con,"SELECT * FROM categories WHERE name='$ppp'");
	$rcat=mysqli_fetch_assoc($cat);

	
    if($rcat['priority']==0)
	{
	$numprod=mysqli_query($con, "SELECT * FROM products WHERE catname='$ppp'");
	}
	
	if($pp==$p2)
	{
   
	
	if($rcat['priority']==1)
	{
		    $cidd=$rcat['id'];
			$numprod=mysqli_query($con, "SELECT * FROM products WHERE catname  IN (SELECT name FROM categories WHERE pid='$cidd' OR id='$cidd')");
			
	} 
	
	}
	if($pp==$p3)
	{
    

	
	if($rcat['priority']==1)
	{
		    $cidd=$rcat['id'];
			$numprod=mysqli_query($con, "SELECT * FROM products WHERE catname  IN (SELECT name FROM categories WHERE  id='$cidd')");
			
	} 
	}
	
	$np=mysqli_num_rows($numprod);
	$nmbcontent=21;
	if($pp==$p2)
	{
	if(isset($p3)&&isset($p4))
	{
		$nmbpage=intval($p4) ;
	}
	if(!isset($p3)||!isset($p4))
	{
		$nmbpage=1;
	}
	}
	if($pp==$p3)
	{
	if(isset($p4)&&isset($p5))
	{
		$nmbpage=intval($p5) ;
	}
	if(!isset($p4)||!isset($p5))
	{
		$nmbpage=1;
	}
	}
	$start_from=($nmbpage-1)*$nmbcontent;
    if(mysqli_num_rows($cat)==1)
	{
	if($rcat['priority']==0)
	  {
   $product=mysqli_query($con, "SELECT * FROM products WHERE catname='$ppp' LIMIT $start_from, $nmbcontent ") ;
   $product1=mysqli_query($con, "SELECT * FROM products WHERE catname='$ppp' LIMIT $start_from, $nmbcontent") ;
	  }
		
	  if($pp==$p2)	
	  {	  
    
	   if($rcat['priority']==1)
	  { $cidd=$rcat['id'];
   $product=mysqli_query($con, "SELECT * FROM products WHERE catname IN (SELECT name FROM categories WHERE pid='$cidd' OR id='$cidd') LIMIT $start_from, $nmbcontent ") ;
   $product1=mysqli_query($con, "SELECT * FROM products WHERE catname IN (SELECT name FROM categories WHERE pid='$cidd' OR id='$cidd') LIMIT $start_from, $nmbcontent ") ;
	  }
	  }
	  if($pp==$p3)
	  {
		
	   if($rcat['priority']==1)
	  { $cidd=$rcat['id'];
      $product=mysqli_query($con, "SELECT * FROM products WHERE catname IN (SELECT name FROM categories WHERE id='$cidd' ) LIMIT $start_from, $nmbcontent ") ;
      $product1=mysqli_query($con, "SELECT * FROM products WHERE catname IN (SELECT name FROM categories WHERE id='$cidd' ) LIMIT $start_from, $nmbcontent ") ;
	  } 
	  }
 
?>

<section id="wrapper">
    
      
<aside id="notifications">
  <div class="container">
    
    
    
      </div>
</aside>
    
    
        <div class="container">
      <div class="row">
          
            <div id="left-column" class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                              <div id="search_filters_wrapper" class="hidden-sm-down">
  <div id="search_filter_controls" class="hidden-md-up">
      <span id="_mobile_search_filters_clear_all"></span>
      <button class="btn btn-secondary ok">
        <i class="material-icons">&#xE876;</i>
        OK
      </button>
  </div>
    <div id="search_filters">

    <section class="facet clearfix filter-by">
    
      <h4 class="text-uppercase h6 hidden-sm-down">Filter By</h4>
    

    
      <div id="_desktop_search_filters_clear_all" class="hidden-sm-down clear-all-wrapper">
        <button data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts" class="bor-btn js-search-filters-clear-all">
          <i class="material-icons">&#xE14C;</i>
          Clear all
        </button>
      </div>
    
    </section>

                                      <section class="facet clearfix">
          <h1 class="h6 facet-title hidden-sm-down">Brand</h1>
                                                                                                                                                      <div class="title hidden-md-up" data-target="#facet_61207" data-toggle="collapse">
            <h1 class="h6 facet-title">Brand</h1>
            <span class="pull-xs-right">
              <span class="navbar-toggler collapse-icons">
                <i class="material-icons add">&#xE313;</i>
                <i class="material-icons remove">&#xE316;</i>
              </span>
            </span>
          </div>

          
            
              <ul id="facet_61207" class="collapse">
                                                      <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Amongst+Kitchen"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Amongst+Kitchen"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Amongst Kitchen
                                                      
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Bazzar"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Bazzar"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Bazzar
                                                      <span class="magnitude">(2)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Bento+Brand"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Bento+Brand"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Bento Brand
                                                      <span class="magnitude">(4)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Best+Choice"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Best+Choice"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Best Choice
                                                      <span class="magnitude">(7)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Coffee+Shop"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Brand-Coffee+Shop"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Coffee Shop
                                                      <span class="magnitude">(7)</span>
                                                  </a>
                      </label>
                    </li>
                                                </ul>
            

                  </section>
                                  <section class="facet clearfix">
          <h1 class="h6 facet-title hidden-sm-down">Price</h1>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="title hidden-md-up" data-target="#facet_99073" data-toggle="collapse">
            <h1 class="h6 facet-title">Price</h1>
            <span class="pull-xs-right">
              <span class="navbar-toggler collapse-icons">
                <i class="material-icons add">&#xE313;</i>
                <i class="material-icons remove">&#xE316;</i>
              </span>
            </span>
          </div>

          
            
              <ul id="facet_99073" class="collapse">
                                                      <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-44-46"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-44-46"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $44.00 - $46.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-55-57"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-55-57"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $55.00 - $57.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-59-61"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-59-61"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $59.00 - $61.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-79-82"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-79-82"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $79.00 - $82.00
                                                      <span class="magnitude">(2)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-92-94"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-92-94"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $92.00 - $94.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-104-108"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-104-108"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $104.00 - $108.00
                                                      <span class="magnitude">(2)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-111-112"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-111-112"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $111.00 - $112.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-115-117"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-115-117"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $115.00 - $117.00
                                                      <span class="magnitude">(2)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-124-125"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-124-125"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $124.00 - $125.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-134-136"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-134-136"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $134.00 - $136.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-139-141"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-139-141"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $139.00 - $141.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-161-163"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-161-163"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $161.00 - $163.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-170-171"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-170-171"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $170.00 - $171.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-189-190"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-189-190"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $189.00 - $190.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-199-200"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-199-200"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $199.00 - $200.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-215-217"
                              type="radio"
                              name="filter Price"
                                                          >
                            <span  class="ps-shown-by-js" ></span>
                          </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Price-%24-215-217"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          $215.00 - $217.00
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                </ul>
            

                  </section>
                        <section class="facet clearfix">
          <h1 class="h6 facet-title hidden-sm-down">Size</h1>
                                                                                                                                <div class="title hidden-md-up" data-target="#facet_3867" data-toggle="collapse">
            <h1 class="h6 facet-title">Size</h1>
            <span class="pull-xs-right">
              <span class="navbar-toggler collapse-icons">
                <i class="material-icons add">&#xE313;</i>
                <i class="material-icons remove">&#xE316;</i>
              </span>
            </span>
          </div>

          
            
              <ul id="facet_3867" class="collapse">
                                                      <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Size-S"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Size-S"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          S
                                                      <span class="magnitude">(12)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Size-M"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Size-M"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          M
                                                      <span class="magnitude">(15)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Size-L"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Size-L"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          L
                                                      <span class="magnitude">(16)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Size-XL"
                              type="checkbox"
                                                          >
                                                          <span  class="ps-shown-by-js" ><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                                                      </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Size-XL"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          XL
                                                      <span class="magnitude">(14)</span>
                                                  </a>
                      </label>
                    </li>
                                                </ul>
            

                  </section>
                        <section class="facet clearfix">
          <h1 class="h6 facet-title hidden-sm-down">Color</h1>
                                                                                                                                                                                                  <div class="title hidden-md-up" data-target="#facet_46774" data-toggle="collapse">
            <h1 class="h6 facet-title">Color</h1>
            <span class="pull-xs-right">
              <span class="navbar-toggler collapse-icons">
                <i class="material-icons add">&#xE313;</i>
                <i class="material-icons remove">&#xE316;</i>
              </span>
            </span>
          </div>

          
            
              <ul id="facet_46774" class="collapse">
                                                      <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Grey"
                              type="checkbox"
                                                          >
                                                          <span class="color" style="background-color:#AAB2BD"></span>
                                                        </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Grey"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Grey
                                                      <span class="magnitude">(5)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-White"
                              type="checkbox"
                                                          >
                                                          <span class="color" style="background-color:#ffffff"></span>
                                                        </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-White"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          White
                                                      <span class="magnitude">(16)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Red"
                              type="checkbox"
                                                          >
                                                          <span class="color" style="background-color:#E84C3D"></span>
                                                        </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Red"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Red
                                                      <span class="magnitude">(10)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Black"
                              type="checkbox"
                                                          >
                                                          <span class="color" style="background-color:#434A54"></span>
                                                        </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Black"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Black
                                                      <span class="magnitude">(19)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Blue"
                              type="checkbox"
                                                          >
                                                          <span class="color" style="background-color:#5D9CEC"></span>
                                                        </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Blue"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Blue
                                                      <span class="magnitude">(10)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Green"
                              type="checkbox"
                                                          >
                                                          <span class="color" style="background-color:#A0D468"></span>
                                                        </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Green"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Green
                                                      <span class="magnitude">(1)</span>
                                                  </a>
                      </label>
                    </li>
                                                                        <li>
                      <label class="facet-label">
                                                  <span class="custom-checkbox">
                            <input
                              data-search-url="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Pink"
                              type="checkbox"
                                                          >
                                                          <span class="color" style="background-color:#FCCACD"></span>
                                                        </span>
                        
                        <a
                          href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?q=Color-Pink"
                          class="_gray-darker search-link js-search-link"
                          rel="nofollow"
                        >
                          Pink
                                                      <span class="magnitude">(11)</span>
                                                  </a>
                      </label>
                    </li>
                                                </ul>
            

                  </section>
            </div>

</div>
	<div id="itleftbanners_2" class="block hidden-md-down">
		<ul class="banner-col">
												<li class="itleftbanners_2-container">
						<a href="#" title="Left Banner 1">
							<img src="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/modules/itleftbanners_2/images/left-banner-1.jpg" alt="Left Banner 1" width="auto" height="auto"/>
						</a>
					</li>
									</ul>
	</div>

<div class="it-special-products product-column-style" data-items="1" data-speed="1000" data-autoplay="0" data-time="3000"	data-arrow="1" data-pagination="0" data-move="1" data-pausehover="0"	data-md="1" data-sm="1" data-xs="1" data-xxs="1">
<div class="itProductList itcolumn">
	<div class="title_block"><h3>Special Products</span></h3></div>		<div class="block-content">
		<div class="itProductFilter row">
			<div class="special-item owl-carousel">
											<div class="item-product">
					
					<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="43" data-id-product-attribute="631"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/43-631-travel-tea-ceramic.html#/2-size-m/18-color-pink" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/227-cart_default/travel-tea-ceramic.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/227-large_default/travel-tea-ceramic.jpg" width="auto" height="auto" ></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/43-631-travel-tea-ceramic.html#/2-size-m/18-color-pink">Shrinking from toil</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$135.01</span><span class="reduction_percent_display">-15%</span><span class="regular-price">$158.84</span></div></div></div></div></div></div></div>
												
					<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="42" data-id-product-attribute="645"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/42-645-willy-wardrobe.html#/1-size-s/8-color-white" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/232-cart_default/willy-wardrobe.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/232-large_default/willy-wardrobe.jpg" width="auto" height="auto" ></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/42-645-willy-wardrobe.html#/1-size-s/8-color-white">Reprehenderit Voluptate</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$116.38</span><span class="reduction_percent_display">-5%</span><span class="regular-price">$122.50</span></div></div></div></div></div></div></div>
												
					<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="47" data-id-product-attribute="583"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/47-583-slotted-spoon-stainless-silver.html#/1-size-s/10-color-red/27-various_versions-opposed" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/205-cart_default/slotted-spoon-stainless-silver.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/205-large_default/slotted-spoon-stainless-silver.jpg" width="auto" height="auto" ></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/47-583-slotted-spoon-stainless-silver.html#/1-size-s/10-color-red/27-various_versions-opposed">Publishing Soft</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$140.22</span><span class="reduction_percent_display">-10%</span><span class="regular-price">$155.80</span></div></div></div></div></div></div></div>
								</div>
															<div class="item-product">
					
					<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="45" data-id-product-attribute="611"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/45-611-two-tier-fruit-basket.html#/3-size-l/8-color-white" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/216-cart_default/two-tier-fruit-basket.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/216-large_default/two-tier-fruit-basket.jpg" width="auto" height="auto" ></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/45-611-two-tier-fruit-basket.html#/3-size-l/8-color-white">Predefined Bag</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$105.38</span><span class="reduction_percent_display">-5%</span><span class="regular-price">$110.93</span></div></div></div></div></div></div></div>
												
					<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="41" data-id-product-attribute="657"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/41-657-kaira-wood-shoe.html#/2-size-m/8-color-white" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/237-cart_default/kaira-wood-shoe.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/237-large_default/kaira-wood-shoe.jpg" width="auto" height="auto" ></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/41-657-kaira-wood-shoe.html#/2-size-m/8-color-white">Nunc facilisis</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$93.15</span><span class="reduction_percent_display">-15%</span><span class="regular-price">$109.59</span></div></div></div></div></div></div></div>
												
					<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="48" data-id-product-attribute="567"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/48-567-seven-seas-knife-set.html#/1-size-s/8-color-white" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/200-cart_default/seven-seas-knife-set.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/200-large_default/seven-seas-knife-set.jpg" width="auto" height="auto" ></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/48-567-seven-seas-knife-set.html#/1-size-s/8-color-white">Letraset Sheets</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$107.10</span><span class="reduction_percent_display">-15%</span><span class="regular-price">$126.00</span></div></div></div></div></div></div></div>
								</div>
										</div>
		</div>
	</div>
</div>
</div><div class="innovatoryTestimonial product-column-style"><div class="title_block"><h3>Customer Love</h3> </div><div class="innovatoryTestimonialOwl owl-carousel"><div class="item-inner"><div class="item text-center"><div class="innovatoryAuthor"><i class="fa fa-quote-left"></i><span>Innovatory Themes</span>  <span class="innovatoryOffice">Wed Censtoriya</span></div><div class="innovatoryComment">Make a type specimen book. It has survived not only five centuries, but also the leap into eIt was make a... </div></div></div><div class="item-inner"><div class="item text-center"><div class="innovatoryAuthor"><i class="fa fa-quote-left"></i><span>Innovatory Themes</span>  <span class="innovatoryOffice">Wed Censtoriya</span></div><div class="innovatoryComment">Make a type specimen book. It has survived not only five centuries, but also the leap into eIt was make a... </div></div></div><div class="item-inner"><div class="item text-center"><div class="innovatoryAuthor"><i class="fa fa-quote-left"></i><span>Innovatory Themes</span>  <span class="innovatoryOffice">Wed Censtoriya</span></div><div class="innovatoryComment">Make a type specimen book. It has survived not only five centuries, but also the leap into eIt was make a... </div></div></div></div>
</div><div id="itleftbanners" class="block hidden-md-down"><ul class="banner-col"><li class="itleftbanners-container"><a href="#" title="Left Banner 1"><img src="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/modules/itleftbanners/images/left-banner-1.jpg" alt="Left Banner 1" width="auto" height="auto"/></a></li></ul></div><div class="it_new_product product-column-style" data-items="1" data-speed="1000" data-autoplay="0"	data-time="300"	data-arrow="1" data-pagination="0" data-move="1" data-pausehover="0"	data-lg="1" data-md="1" data-sm="1" data-xs="1"	data-xxs="1">
	<div class="itProductList itcolumn">
		<div class="title_block"><h3>Best Products</h3></div>				<div class="block-content">
			<div class="itProductFilter row">
				<div class="newSlide owl-carousel">
														<div class="item-inner ajax_block_product  wow fadeInUp animated">
											<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="49" data-id-product-attribute="560"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/49-560-kitchen-tools-by-living.html#/2-size-m/11-color-black" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/195-cart_default/kitchen-tools-by-living.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/195-large_default/kitchen-tools-by-living.jpg" width="auto" height="auto"></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/49-560-kitchen-tools-by-living.html#/2-size-m/11-color-black">Printing Lorem</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$116.00</span></div></div></div></div></div></div></div>
																				<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="48" data-id-product-attribute="567"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/48-567-seven-seas-knife-set.html#/1-size-s/8-color-white" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/200-cart_default/seven-seas-knife-set.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/200-large_default/seven-seas-knife-set.jpg" width="auto" height="auto"></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/48-567-seven-seas-knife-set.html#/1-size-s/8-color-white">Letraset Sheets</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$107.10</span><span class="reduction_percent_display">-15%</span><span class="regular-price">$126.00</span></div></div></div></div></div></div></div>
																				<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="47" data-id-product-attribute="583"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/47-583-slotted-spoon-stainless-silver.html#/1-size-s/10-color-red/27-various_versions-opposed" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/205-cart_default/slotted-spoon-stainless-silver.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/205-large_default/slotted-spoon-stainless-silver.jpg" width="auto" height="auto"></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/47-583-slotted-spoon-stainless-silver.html#/1-size-s/10-color-red/27-various_versions-opposed">Publishing Soft</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$140.22</span><span class="reduction_percent_display">-10%</span><span class="regular-price">$155.80</span></div></div></div></div></div></div></div>
																				<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="46" data-id-product-attribute="607"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/46-607-kitchen-egg-separator.html#/1-size-s/11-color-black" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/212-cart_default/kitchen-egg-separator.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/212-large_default/kitchen-egg-separator.jpg" width="auto" height="auto"></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/46-607-kitchen-egg-separator.html#/1-size-s/11-color-black">Standard Chunk</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$124.99</span></div></div></div></div></div></div></div>
										</div>
																			<div class="item-inner ajax_block_product  wow fadeInUp animated">
											<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="45" data-id-product-attribute="611"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/45-611-two-tier-fruit-basket.html#/3-size-l/8-color-white" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/216-cart_default/two-tier-fruit-basket.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/216-large_default/two-tier-fruit-basket.jpg" width="auto" height="auto"></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/45-611-two-tier-fruit-basket.html#/3-size-l/8-color-white">Predefined Bag</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$105.38</span><span class="reduction_percent_display">-5%</span><span class="regular-price">$110.93</span></div></div></div></div></div></div></div>
																				<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="44" data-id-product-attribute="619"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/44-619-chequered-set.html#/1-size-s/8-color-white" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/222-cart_default/chequered-set.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/222-large_default/chequered-set.jpg" width="auto" height="auto"></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/44-619-chequered-set.html#/1-size-s/8-color-white">Accumsan Fusce</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$111.50</span></div></div></div></div></div></div></div>
																				<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="43" data-id-product-attribute="631"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/43-631-travel-tea-ceramic.html#/2-size-m/18-color-pink" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/227-cart_default/travel-tea-ceramic.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/227-large_default/travel-tea-ceramic.jpg" width="auto" height="auto"></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/43-631-travel-tea-ceramic.html#/2-size-m/18-color-pink">Shrinking from toil</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$135.01</span><span class="reduction_percent_display">-15%</span><span class="regular-price">$158.84</span></div></div></div></div></div></div></div>
																				<div class="item"><div class="innovatoryProductsList product-miniature js-product-miniature" data-id-product="42" data-id-product-attribute="645"><div class="innovatory-thumbnail-container"><div class="row no-margin"><div class="pull-left product_img"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/42-645-willy-wardrobe.html#/1-size-s/8-color-white" class="thumbnail product-thumbnail"><img width="auto" height="auto" src = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/232-cart_default/willy-wardrobe.jpg" alt = "" data-full-size-image-url = "https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/232-large_default/willy-wardrobe.jpg" width="auto" height="auto"></a></div><div class="innovatoryMedia-body"><div class="innovatory-product-description"><h2 class="h2 productName" itemprop="name"><a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/42-645-willy-wardrobe.html#/1-size-s/8-color-white">Reprehenderit Voluptate</a></h2><div class="innovatory-product-price-and-shipping"><span itemprop="price" class="price">$116.38</span><span class="reduction_percent_display">-5%</span><span class="regular-price">$122.50</span></div></div></div></div></div></div></div>
										</div>
													</div>
			</div>
					</div>
	</div>
</div><!-- Static Block module -->
			
			<div class="product-column-style sale-sec">
			<div class="title_block">
			<h3>Big Sale</h3>
			</div>
			<div class="big-sale-wrap text-center">
			<h3 class="text-uppercase">BIg <span>50%</span></h3>
			<h4 class="text-uppercase">OFFER</h4>
			<p class="text-uppercase">Only Accessories Fashion</p>
			</div>
			</div>
		
	<!-- /Static block module -->
                          </div>
          
          
  <div id="content-wrapper" class="left-column col-xs-12 col-md-9">
  	    	<div class="innovatoryBreadcrumb">
    	
      	
<nav data-depth="3" class="breadcrumb">
  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
          
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/">
            <span itemprop="name"><?=$rcat['name'] ?>></span>
          </a>
          <meta itemprop="position" content="1">
        </li>
      
          
        
      
      </ol>
</nav>    	
    	</div>
  	    

  <section id="main">



    
  <div class="block-category card card-block">
  <h1 class="h1">T-Shirts</h1>
      <div class="category-cover">
      <img src="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/c/4-category_default/t-shirts.jpg" alt="">
    </div>
      
              <div id="category-description" class="text-muted"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p></div>
          </div>




    <section id="products" class="active_grid">

      
        <div id="">

          

            <div id="js-product-list-top" class="products-selection row">
  <div class="col-lg-5 total-products">
    <ul class="innovatoryGridList">
      <li id="grid" class="pull-left"><a rel="nofollow" href="javascript:void(0)" title="Grid"></a></li>

      <li id="list" class="pull-left"><a rel="nofollow" href="javascript:void(0)" title="List"></a></li>

    </ul>
	
          <p>There are <?=$np ?> products.</p>
      </div>
  <div class="col-lg-7">

      
        <div class="products-sort-order dropdown pull-right">
  <a class="select-title" rel="nofollow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Relevance    <i class="material-icons pull-xs-right">&#xE5C5;</i>
  </a>
  <div class="dropdown-menu">
          <a
        rel="nofollow"
        href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?order=product.position.asc"
        class="select-list current js-search-link"
      >
        Relevance
      </a>
          <a
        rel="nofollow"
        href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?order=product.name.asc"
        class="select-list js-search-link"
      >
        Name, A to Z
      </a>
          <a
        rel="nofollow"
        href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?order=product.name.desc"
        class="select-list js-search-link"
      >
        Name, Z to A
      </a>
          <a
        rel="nofollow"
        href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?order=product.price.asc"
        class="select-list js-search-link"
      >
        Price, low to high
      </a>
          <a
        rel="nofollow"
        href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/4-t-shirts?order=product.price.desc"
        class="select-list js-search-link"
      >
        Price, high to low
      </a>
      </div>
</div>
<span class=" hidden-sm-down sort-by pull-right">Sort by:</span>      
    
              <div class="col-sm-3 col-xs-4 hidden-md-up filter-button">
          <button id="search_filter_toggler" class="btn btn-secondary">
            Filter
          </button>
        </div>
            <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
<div class="col-sm-12 hidden-md-up text-xs-center showing">
    Showing 1-12 of 19 item(s)
  </div> 
</div>

          

        </div>



        

          <div id="" class="hidden-sm-down">

            <section id="js-active-search-filters" class="hide">
  
    <h6 class="h6 active-filter-title">Active filters</h6>
  

  </section>


          </div>

        



        <div id="">

          

            <div id="js-product-list">
<div  class="innovatoryProductGrid innovatoryProducts">
  <div class="row">
          
        
   <?php
       
	   while($rowproduct=mysqli_fetch_assoc($product))
	   {
	   
           include("view/inc/product.php");

	   }
?>   
        
      
          
        
   
          
        
     
          
        

 
          
 
          
 
      </div>
</div>
<div  class="innovatoryProductList innovatoryProducts">
  <div class="row no-margin">
          
<!-------------------------------------------->
<!-------------------------------------------->
<!-------------------------------------------->

<?php
       
	 while($rowproduct1=mysqli_fetch_assoc($product1))
	 {

         include("view/inc/product1.php");
	 }
	   ?>       
  

    
      </div>
</div>
  
    
<nav class="pagination">

<div class="row">

  <div class="col-md-4">

    

      Showing 1-12 of 19 item(s)

    

  </div>



  <div class="col-md-8">

  <div class="innovatoryPagination">

    

      <ul class="page-list clearfix text-xs-center">

	    <?php
		   
			  if($rcat['priority']==0)
			  {
				  $pgnm=mysqli_query($con, "SELECT * FROM products WHERE catname='$ppp' ");
				   
				   
			  }
			  
			if($pp==$p2)
			{
				if($rcat['priority']==1 )
				{
					$cidd=$rcat['id'];
		            $pgnm=mysqli_query($con, "SELECT * FROM products WHERE catname  IN (SELECT name FROM categories WHERE pid='$cidd' OR id='$cidd')");
				}
				
			}
			  
			  if($pp==$p3)
			{
				if($rcat['priority']==1 )
				{
					$cidd=$rcat['id'];
		            $pgnm=mysqli_query($con, "SELECT * FROM products WHERE catname  IN (SELECT name FROM categories WHERE  id='$cidd')");
				}
				
			}
			  
			  
			  $total_rec=mysqli_num_rows($pgnm);
				   $total_pg=ceil($total_rec/$nmbcontent);
			  
			  if($total_rec>21)
				  
				  {			  
			  
			  
			   if($pp==$p2)
			   {
		?>
        <script>
		  // alert("<?=$ppp ?>");
		</script>
		<?php
		    
			       if($total_pg>6&&$nmbpage>6)
			  {
				  ?>
				  
				  <li  class="current" >

          
			  
              <a rel="nofollow" href="category/<?=$ppp ?>/pg/1" >
			   1
              </a>
			 
              
			 </li>
			  <li class="current">
			  <a rel="nofollow" href="javascript:void(0)" >
			     ...
              </a>
			  </li>
				  <?php
			  }
				
		
		 for($i = max(1, $nmbpage - 5); $i <= min($nmbpage + 5, $total_pg); $i++)
          {
			 
		 ?>
		
          <li  class="current" >

          
			  <?php 
			     if($nmbpage==$i)
				 {
			  ?>		 
              <a rel="nofollow" href="category/<?=$ppp ?>/pg/<?=$i ?>" class="disabled">
			    
               <?php
			     } 
				 else
				 {
				?>
			
				<a rel="nofollow" href="category/<?=$ppp ?>/pg/<?=$i ?>" >
				<?php
				 }
				 ?>
			   <?=$i ?>
              </a>
			 
              
			 </li>
			     <li >
            <?php 
		  }
		  
		  if($nmbpage<$total_pg)
			  {
				  
				   if($total_pg>6&&$nmbpage<($total_pg-5))
				   { ?>
			   
			         <li  class="current">
                      <a rel="next" href="javascript:void(0)" class="next">
					     ...
					  </a>
					  </li>
			   
			     <li  class="current" >			  
              <a rel="nofollow" href="category/<?=$ppp ?>/pg/<?=$total_pg ?>" >
			     <?=$total_pg ?>
              </a>
			 
              
			 </li>
			 
			    
			 
			 
				 <?php
				 } 
					  
                  ?>
				  <li >

            
              <a rel="next" href="category/<?=$ppp ?>/pg/<?=($nmbpage+1) ?>" class="next">

                
                  <i class="material-icons">&#xE315;</i>

                
              </a>

            
          </li>
				  
				  <?php
					  
			  }	   
		  if($nmbpage==$total_pg)
			  {
				  ?>
				  	    <li >

            
              <a rel="next" href="javascript:void(0)" class="next">

                
                  <i class="material-icons">&#xE315;</i>

                
              </a>

            
                   </li>
				  
				  <?php
				  
			  }	  
		
			   }
			 
			   if($pp==$p3)
			   {
				 
		    
			       if($total_pg>6&&$nmbpage>6)
			  {
				  ?>
				  
				  <li  class="current" >

          
			  
              <a rel="nofollow" href="category/scat/<?=$ppp ?>/pg/1" >
			   1
              </a>
			 
              
			 </li>
			  <li class="current">
			  <a rel="nofollow" href="javascript:void(0)" >
			     ...
              </a>
			  </li>
				  <?php
			  }
				
		
		 for($i = max(1, $nmbpage - 5); $i <= min($nmbpage + 5, $total_pg); $i++)
          {
			 
		 ?>
		
          <li  class="current" >

          
			  <?php 
			     if($nmbpage==$i)
				 {
			  ?>		 
              <a rel="nofollow" href="category/scat/<?=$ppp ?>/pg/<?=$i ?>" class="disabled">
			    
               <?php
			     } 
				 else
				 {
				?>
			
				<a rel="nofollow" href="category/scat/<?=$ppp ?>/pg/<?=$i ?>" >
				<?php
				 }
				 ?>
			   <?=$i ?>
              </a>
			 
              
			 </li>
			     <li >
            <?php 
		  }
		  
		  if($nmbpage<$total_pg)
			  {
				  
				   if($total_pg>6&&$nmbpage<($total_pg-5))
				   { ?>
			   
			         <li  class="current">
                      <a rel="next" href="javascript:void(0)" class="next">
					     ...
					  </a>
					  </li>
			   
			     <li  class="current" >			  
              <a rel="nofollow" href="category/scat/<?=$ppp ?>/pg/<?=$total_pg ?>" >
			     <?=$total_pg ?>
              </a>
			 
              
			 </li>
			 
			    
			 
			 
				 <?php
				 } 
					  
                  ?>
				  <li >

            
              <a rel="next" href="category/scat/<?=$ppp ?>/pg/<?=($nmbpage+1) ?>" class="next">

                
                  <i class="material-icons">&#xE315;</i>

                
              </a>

            
          </li>
				  
				  <?php
					  
			  }	   
			
		  if($nmbpage==$total_pg)
			  {
				  ?>
				  	    <li >

            
              <a rel="next" href="javascript:void(0)" class="next">

                
                  <i class="material-icons">&#xE315;</i>

                
              </a>

            
                   </li>
				  
				  <?php
				  
			  }	  
				  } 
				  }
				  
				  
				  ?>
        
      </ul>

    

  </div>

  </div>



</div>

</nav>

  

  <div class="hidden-md-up text-xs-right up">
    <a href="#header" class="btn btn-secondary">
      Back to top
      <i class="material-icons">&#xE316;</i>
    </a>
  </div>
</div>

          

        </div>



        <div id="js-product-list-bottom">

          

            <div id="js-product-list-bottom"></div>

          

        </div>



      
    </section>
	




  </section>


  </div>

          
      </div>
    </div>		
  </section>
  	<?php
	
	
	 }
   else
   {   $p2=str_replace("%20", " ", $p2) ;
    $p2=mysqli_real_escape_string($con, $p2);
	   echo "<h2 align='center'>404 გვერდი არ მოიძებნა </h2>" . $ppp;
   }
	
	?>