<?php
/* if(trim($rowproduct1['brand'])=='ALTA')
	{
		$rowproduct1['brand']='CHQARA';
	}
*/
$cn=$rowproduct1['catname'];
	?>
<div class="item-inner clearfix">
<article class="product-miniature js-product-miniature" data-id-product="20" data-id-product-attribute="786" itemscope itemtype="http://schema.org/Product">
  <div class="innovatoryProduct-container item">
		  <div class="col-sm-5 col-md-4 productlist-left">
		  <div class="innovatoryProduct-image">
			
			  <a href="vprod/<?=$rowproduct1['id'] ?>" class="thumbnail product-thumbnail">
		        <?php 
				 $dr=$rowproduct['id'];
				
				
				
				   
					    $cidd=$rcat['id'];
			
				?>
				<span class="cover_image">
					<img src ="/img/products/<?=$rowproduct['picture'] ?>" data-full-size-image-url = "/img/products/<?=$rowproduct['picture'] ?>" alt="" width="auto" height="auto" />
				</span>

				 
				 
				<span class="hover_image">
					<img src = "/img/products/<?=$rowproduct['picture']?>" data-full-size-image-url = "/img/products/<?=$rowproduct['picture'] ?>" width="auto" height="auto" /> 
				</span>

				
			</a>
			
								
											<span class="innovatorySale-label">sale</span>
						</div>
			</div>
		<div class="col-sm-7 col-md-8 productlist-right">
		<div class="innovatory-product-description">
			
		  
			<h2 class="h2 innovatory-product-title" itemprop="name"><a href="vprod/<?=$rowproduct1['id'] ?>"><?=$rowproduct1['catname'] ?>-<?=$rowproduct1['brand'] ?>-<?=$rowproduct1['model'] ?></a></h2>
		  
			<div class="comments_note">
            <div class="star_content"><div class="star star_on"><i class="fa fa-star"></i></div><div class="star star_on"><i class="fa fa-star"></i></div><div class="star star_on"><i class="fa fa-star"></i></div><div class="star"><i class="fa fa-star"></i></div><div class="star"><i class="fa fa-star"></i></div></div><span class="laberCountReview pull-left">Review</span>
    </div>
		  
						  <div class="innovatory-product-price-and-shipping">
				<span itemprop="price" class="price"><?=$rowproduct1['price'] ?>.₾</span>
																		<span class="reduction_percent_display">											
						-10%											
					</span>
																					  

				  <span class="regular-price">$90.00</span>
					
							
				
				
			  </div>
					  
		  <div class="description_short">
			<p>Fusce vel tristique nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut vitae auctor turpis.</p>
		  </div>
		  
						  <div class="variant-links">
      <a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/20-784-coffee-maker.html#/2-size-m/8-color-white"
       class="color"
       title="White"
              style="background-color: #ffffff"           ><span class="sr-only">White</span></a>
      <a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/20-787-coffee-maker.html#/2-size-m/11-color-black"
       class="color"
       title="Black"
              style="background-color: #434A54"           ><span class="sr-only">Black</span></a>
      <a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/20-790-coffee-maker.html#/2-size-m/14-color-blue"
       class="color"
       title="Blue"
              style="background-color: #5D9CEC"           ><span class="sr-only">Blue</span></a>
      <a href="https://innovatorythemes.com/prestashop/INNO01/INNO1019_Revolve/IT19/en/home/20-793-coffee-maker.html#/2-size-m/18-color-pink"
       class="color"
       title="Pink"
              style="background-color: #FCCACD"           ><span class="sr-only">Pink</span></a>
    <span class="js-count count"></span>
</div>
					  
			<!-- 				<p class="available_now"></p>
			 -->
			<div class="actions clearfix">
				<div class="innovatoryCart pull-left">
											<form action="cart" method="post">
						<input type="hidden" name="token" value="b37219994338861bc35224966f2f6efd">
						<input type="hidden" value="20" name="id_product">
						<button data-button-action="add-to-cart" class="innovatoryBottom" >
							<i class="ti-shopping-cart"></i><span>Add to cart</span>
						</button>
						</form>
									</div>
				<div class="innovatoryItem pull-left">
					<a href="#" class="quick-view" data-link-action="quickview">
						<i class="ti-eye"></i><span>Quick view</span>
					</a>
				</div>
				<div class="innovatoryItem pull-left">
					<div class="innovatorywishlist product-item-wishlist"><a class="addToWishlist wishlistProd_20" title="Add to wishlist" href="#" rel="20" onclick="WishlistCart('wishlist_block_list', 'add', '20', false, 1); return false;"><i class="ti-heart"></i> <span>Add to wishlist</span></a></div>
				</div>
				
			</div>
		</div>
		</div>
  </div>
</article>
</div>      