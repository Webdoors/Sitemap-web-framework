
</main>
<footer class="main-footer">
  <div class="widgets-section">
    <div class="auto-container">
      <div class="row">
        <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
          <div class="row">
            <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
              <div class="footer-widget about-widget">
<div class="text-left text-white LOGO" style="width:275px">BOSCH 999</div>
                <div class="text">
                  <p class="FIRAGO" style="font-size:14px">ბოშის ავტონაწილების ფართო არჩევანი</p>
                </div>
                <ul class="social-icon-one social-icon-colored d-none">
                  <li>
                    <a href="https://www.facebook.com/profile.php?id=61571436826576" target="_blank">
                      <i class="fa fa-facebook text-white"></i>
                    </a>
                  </li>
                  <li>
                    <a href="http://twitter.com" target="_blank">
                      <i class="fa fa-twitter text-white"></i>
                    </a>
                  </li>
                  <li>
                    <a href="http://pinterest.com" target="_blank">
                      <i class="fa fa-pinterest text-white"></i>
                    </a>
                  </li>
                  <li>
                    <a href="http://dribbble.com" target="_blank">
                      <i class="fa fa-dribbble text-white"></i>
                    </a>
                  </li>
                </ul>
				
              </div>
            </div>
            <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
              <div class=" d-none footer-widget widget-ps-50">
                <h2 class="widget-title"><?=$W["Useful Links"]?></h2>
                <ul class="user-links">
		<?php
			$q1=mysqli_query($con,"SELECt * FROM sitemap WHERE top=1 ORDER By pos ASC");
			while($r1=mysqli_fetch_Array($q1)){ 
?>
		<li class="FIRAGO <?=$P==$r1["slug_$L"]?"current":""?>"><a href="/<?=$L?>/<?=$r1["slug_$L"]?>"><?=$r1["name_$L"]?></a></li>
<?php			
			}
		?>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
          <div class="row">
            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
              <div class="footer-widget contact-widget">
                <h2 class="widget-title"><?=$W["Contact Us"]?></h2>
                <div class="widget-content">
                  <ul class="contact-list">
                    <li>
                      <span class="icon fa fa-clock-o text-white"></span>
                      <div class="text FIRAGO"><?=$W["ყოველდღე"]?>: 09:00 - 21:00</div>
                    </li>
                    <li>
                      <span class="icon fa fa-phone text-white"></span>
                      <div class="text">
                        <a href="tel:+9950322644041">032 264 40 41</a>
                      </div>
                    </li>
                    <li>
                      <span class="icon fa fa-phone text-white"></span>
                      <div class="text">
                        <a href="tel:+995558741555">+995 555 56 47 09</a>
                      </div>
                    </li>
                    <li>
                      <span class="icon fa fa-phone text-white"></span>
                      <div class="text">
                        <a href="tel:+995558741555">032 235 58 86</a>
                      </div>
                    </li>
                    <li>
                      <span class="icon fa fa-phone text-white"></span>
                      <div class="text">
                        <a href="tel:+995558741555">+995 558 74 15 55</a>
                      </div>
                    </li>
                    <li>
                      <span class="icon  fa fa-paper-plane text-white"></span>
                      <div class="text">
                        <a href="mailto:info@bosch999.ge">info@bosch999.ge</a>
                      </div>
                    </li>
                    <li>
                      <span class="icon fa fa-globe text-white"></span>
                      <div class="text FIRAGO">ქუთაისის ქუჩა N26, თბილისი, საქართველო</div>
                    </li>
                    <li>
                      <span class="icon fa fa-globe text-white"></span>
                      <div class="text FIRAGO">ყიფიანის ქუჩა N10, თბილისი, საქართველო</div>
                    </li>


                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-column col-lg-6 col-md-6 col-sm-12 d-none">
              <div class="footer-widget widget-ps-50 instagram-widget">
                <h2 class="widget-title">Instagram Gallery</h2>
                <div class="widget-content">
                  <div class="outer insta-outer clearfix">
                    <div class="insta-feeds">
                      <figure class="image mb-0">
                        <img src="https://eventrox-react.expert-themes.com/images/main-slider/2.jpg" alt="image">
                      </figure>
                      <div class="overlay-box">
                        <a class="insta-image" href="/">
                          <span class="fa fa-link"></span>
                        </a>
                      </div>
                    </div>
                    <div class="insta-feeds">
                      <figure class="image mb-0">
                        <img src="https://eventrox-react.expert-themes.com/images/main-slider/2.jpg" alt="image">
                      </figure>
                      <div class="overlay-box">
                        <a class="insta-image" href="/">
                          <span class="fa fa-link"></span>
                        </a>
                      </div>
                    </div>
                    <div class="insta-feeds">
                      <figure class="image mb-0">
                        <img src="https://eventrox-react.expert-themes.com/images/main-slider/2.jpg" alt="image">
                      </figure>
                      <div class="overlay-box">
                        <a class="insta-image" href="/">
                          <span class="fa fa-link"></span>
                        </a>
                      </div>
                    </div>
                    <div class="insta-feeds">
                      <figure class="image mb-0">
                        <img src="https://eventrox-react.expert-themes.com/images/main-slider/2.jpg" alt="image">
                      </figure>
                      <div class="overlay-box">
                        <a class="insta-image" href="/">
                          <span class="fa fa-link"></span>
                        </a>
                      </div>
                    </div>
                    <div class="insta-feeds">
                      <figure class="image mb-0">
                        <img src="https://eventrox-react.expert-themes.com/images/main-slider/2.jpg" alt="image">
                      </figure>
                      <div class="overlay-box">
                        <a class="insta-image" href="/">
                          <span class="fa fa-link"></span>
                        </a>
                      </div>
                    </div>
                    <div class="insta-feeds">
                      <figure class="image mb-0">
                        <img  src="https://eventrox-react.expert-themes.com/images/main-slider/2.jpg" alt="image">
                      </figure>
                      <div class="overlay-box">
                        <a class="insta-image" href="/">
                          <span class="fa fa-link"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="auto-container">
      <div class="inner-container clearfix">
        <div class="copyright-text text-white">
          <p>© Copyright 2024 All Rights Reserved. Provided by <a href="https://webdoors.ge" target="_blank">Webdoors</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<style>
a:hover{
    color: #00acee!important;
}
.main-footer .contact-list li .icon {
    position: absolute;
    left: 0;
    top: 0;
    font-size: 23px;
    line-height: 25px;
    color: #fff;
}
.main-footer .contact-list li {
    position: relative;
    padding-left: 40px;
    margin-bottom: 25px;
}
.insta-feeds .overlay-box {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background: #fff;
    padding: 5px;
    opacity: .7;
    content: "";
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
.main-footer .contact-list li .icon {
    position: absolute;
    left: 0;
    top: 0;
    font-size: 23px;
    line-height: 25px;
    color: #fff;
}
.main-footer {
    position: relative;
    background-color: #101130;
	font-family: Poppins, sans-serif;
}
.auto-container {
    position: static;
    max-width: 1200px;
    padding: 0 15px;
    margin: 0 auto;
}
.widget-title{
	color:#FFF;
}
.text{
	color:#FFF;	
}
.image img{
	height:74px;width:74px
}
.instagram-widget .outer {
    position: relative;
    margin: 0 -5px;
    display: grid;
    grid-template-columns: auto auto auto;
    gap: 5px;
}
.insta-feeds {
    position: relative;
    overflow: hidden;
}
ul, li {
    list-style: none;
    padding: 0;
    margin: 0;
}
.user-links li a {
    position: relative;
    display: block;
    font-size: 14px;
    line-height: 30px;
    color: #fff;
    font-weight: 400;
    padding: 0 15px;
    border-left: 1px solid #f70068;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
.main-footer .footer-column .widget-title {
    position: relative;
    font-size: 24px;
    font-weight: 500;
    color: #fff;
    line-height: 30px;
    padding-bottom: 10px;
    margin-bottom: 30px;
}
.main-footer .footer-column .widget-title:before {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 1px;
    width: 40px;
    background-color: #f70068;
    content: "";
}
.main-footer .widgets-section {
    position: relative;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 120px 0 50px;
}
.main-footer .footer-bottom .copyright-text p {
    position: relative;
    line-height: 20px;
    font-size: 16px;
    color: #fff;
    font-weight: 400;
    margin-bottom: 0;
}
.main-footer .footer-bottom .copyright-text {
    position: relative;
    padding: 20px 0;
}
.auto-container {
    position: static;
    max-width: 1200px;
    padding: 0 15px;
    margin: 0 auto;
}
.main-footer .footer-bottom {
    position: relative;
    width: 100%;
    background-color: #ffffff1a;
    text-align: center;
}
.main-menu .navigation>li>ul:before {
    position: absolute;
    content: "";
    left: 0;
    top: -30px;
    width: 100%;
    height: 30px;
    display: block;
}
*, :after, :before {
    box-sizing: border-box;
}
@media only screen and (min-width: 768px) {
    .main-menu .navigation>li>ul, .main-menu .navigation>li>.mega-menu, .main-menu .navigation>li>ul>li>ul {
        display: block !important;
        visibility: hidden;
        opacity: 0;
    }
}
.main-menu .navigation>li>ul {
    position: absolute;
    left: 0;
    top: 100%;
    width: 220px;
    z-index: 100;
    display: none;
    opacity: 0;
    visibility: hidden;
    padding: 20px 0;
    background: #fff;
    -webkit-transform-origin: top;
    -moz-transform-origin: top;
    -ms-transform-origin: top;
    -o-transform-origin: top;
    transform-origin: top;
    -moz-transform: rotateX(90deg);
    -webkit-transform: rotateX(90deg);
    -ms-transform: rotateX(90deg);
    -o-transform: rotateX(90deg);
    transform: rotateX(90deg);
    border-bottom: 3px solid #00acee;
    border-radius: 0 0 6px 6px;
    -webkit-box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, .05), -2px 0px 5px 1px rgba(0, 0, 0, .05);
    -ms-box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, .05), -2px 0px 5px 1px rgba(0, 0, 0, .05);
    -o-box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, .05), -2px 0px 5px 1px rgba(0, 0, 0, .05);
    -moz-box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, .05), -2px 0px 5px 1px rgba(0, 0, 0, .05);
    box-shadow: 2px 2px 5px 1px #0000000d, -2px 0 5px 1px #0000000d;
}
.user-links li {
    position: relative;
    display: block;
    margin-bottom: 5px;
}
.user-links li a:hover {
    color: #f70068;
}
a {
    text-decoration: none;
    cursor: pointer;
    color: #00acee;
}
nav li.current>a:before,nav li.ITEM>a:before {
    position: absolute;
    left: 50%;
    bottom: 10px;
    height: 2px;
    width: 0%;
    content: "";
    -webkit-transform: scale(-1);
    -moz-transform: scale(-1);
    -ms-transform: scale(-1);
    -o-transform: scale(-1);
    transform: scale(-1);
    background: #f70068;
    background: -moz-linear-gradient(to left, rgba(247, 0, 104, 1) 0%, rgba(68, 16, 102, 1) 100%);
    background: -webkit-linear-gradient(to left, rgba(247, 0, 104, 1) 0%, rgba(68, 16, 102, 1) 100%);
    background: linear-gradient(to left, #f70068 0%, #441066 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#F70068",endColorstr="#441066",GradientType=1);
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
*, :after, :before {
    box-sizing: border-box;
}
nav li>a{
    position: relative;
    display: block;
    font-size: 16px;
    line-height: 30px;
    font-weight: 500;
    padding: 10px 0;
    color: #fefefe;
    opacity: 1;
    text-align: center;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
nav li.current>a:before,.ITEM:hover>a:before{
    left: 0;
    width: 100%;
}
</style>
<div class="">
<div class="gsb-buttons active has-shadow cta-all_time right-side vertical-menu" id="gsb-buttons-27702" data-id="27702" data-animation="ginger-btn-shockwave" style="font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif;"><div class="gsb-buttons-content"><div class="gsb-button-list icon_view ginger-menu-slide"><div class="chat-button d-none"><a href="https://web.whatsapp.com/send?phone=995558741555" data-scb="WhatsApp" target="_blank" class="scb-tooltip channel-whatsapp chat-button-link button-link-whatsapp-27702 gsb-social-channel" id="chat-button-whatsapp-27702" data-channel="whatsapp" data-tooltip-dir="left"><span class="sr-only">WhatsApp</span><span class="chat-button-icon  chat-button-whatsapp-27702"><svg viewBox="0 0 56.693 56.693" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path class="st0" d="m46.38 10.714c-4.6512-4.6565-10.836-7.222-17.427-7.2247-13.578 0-24.63 11.051-24.635 24.633-0.0019 4.342 1.1325 8.58 3.2884 12.316l-3.495 12.766 13.06-3.4257c3.5982 1.9626 7.6495 2.9971 11.773 2.9985h0.01 2e-4c13.577 0 24.629-11.052 24.635-24.635 0.0024-6.5826-2.5577-12.772-7.2088-17.428zm-17.426 37.902h-0.0083c-3.674-0.0014-7.2777-0.9886-10.422-2.8541l-0.7476-0.4437-7.7497 2.0328 2.0686-7.5558-0.4869-0.7748c-2.0496-3.26-3.1321-7.028-3.1305-10.897 0.0044-11.289 9.19-20.474 20.484-20.474 5.469 0.0017 10.61 2.1344 14.476 6.0047 3.8658 3.8703 5.9936 9.0148 5.9914 14.486-0.0046 11.29-9.1899 20.476-20.476 20.476z"></path><path class="st0" d="m40.185 33.281c-0.6155-0.3081-3.6419-1.797-4.2061-2.0026-0.5642-0.2054-0.9746-0.3081-1.3849 0.3081-0.4103 0.6161-1.59 2.0027-1.9491 2.4136-0.359 0.4106-0.7182 0.4623-1.3336 0.1539-0.6155-0.3081-2.5989-0.958-4.95-3.0551-1.83-1.6323-3.0653-3.6479-3.4245-4.2643-0.359-0.6161-0.0382-0.9492 0.27-1.2562 0.2769-0.2759 0.6156-0.7189 0.9234-1.0784 0.3077-0.3593 0.4103-0.6163 0.6155-1.0268 0.2052-0.4109 0.1027-0.7704-0.0513-1.0784-0.1539-0.3081-1.3849-3.3379-1.8978-4.5706-0.4998-1.2001-1.0072-1.0375-1.3851-1.0566-0.3585-0.0179-0.7694-0.0216-1.1797-0.0216s-1.0773 0.1541-1.6414 0.7702c-0.5642 0.6163-2.1545 2.1056-2.1545 5.1351 0 3.0299 2.2057 5.9569 2.5135 6.3676 0.3077 0.411 4.3405 6.6282 10.515 9.2945 1.4686 0.6343 2.6152 1.013 3.5091 1.2966 1.4746 0.4686 2.8165 0.4024 3.8771 0.2439 1.1827-0.1767 3.6419-1.489 4.1548-2.9267 0.513-1.438 0.513-2.6706 0.359-2.9272-0.1538-0.2567-0.5642-0.4108-1.1797-0.719z"></path></svg></span></a></div><div class="chat-button"><a href="https://m.me//561962976995320" data-scb="Facebook Messenger" target="_blank" class="scb-tooltip channel-facebook_messenger chat-button-link button-link-facebook_messenger-27702 gsb-social-channel" id="chat-button-facebook_messenger-27702" data-channel="facebook_messenger" data-tooltip-dir="left"><span class="sr-only">Facebook Messenger</span><span class="chat-button-icon  chat-button-facebook_messenger-27702"><svg xmlns="http://www.w3.org/2000/svg" height="909.333" viewBox="-21 -28 682.667 682" width="909.333"><path d="M545.602 84.63C485.242 30 405.125-.082 320-.082S154.758 30 94.398 84.63C33.523 139.727 0 213.133 0 291.332c0 58.578 18.863 114.742 54.633 162.94L27.14 626.188 201.06 561.94c37.828 13.81 77.805 20.81 118.94 20.81 85.125 0 165.242-30.086 225.602-84.715C606.477 442.938 640 369.53 640 291.332S606.477 139.727 545.602 84.63zM348.047 375.027l-70.738-55.344-169.203 66.965L301.71 194.086l71.594 57.168 154.875-60.047zm0 0"></path></svg></span></a></div><div class="chat-button d-none"><a href="viber://chat?number=+995 599 40 83 62" data-scb="Viber" target="" class="scb-tooltip channel-viber chat-button-link button-link-viber-27702 gsb-social-channel" id="chat-button-viber-27702" data-channel="viber" data-tooltip-dir="left"><span class="sr-only">Viber</span><span class="chat-button-icon  chat-button-viber-27702"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.398.002C9.473.028 5.33.344 3.014 2.467c-1.72 1.7-2.32 4.23-2.39 7.353-.06 3.1-.13 8.95 5.5 10.54v2.42s-.038.97.602 1.17c.8.25 1.24-.5 2-1.3l1.4-1.58c3.85.32 6.8-.42 7.14-.53.78-.25 5.18-.81 5.9-6.652.74-6.03-.36-9.83-2.34-11.55l-.01-.002c-.6-.55-3-2.3-8.37-2.32 0 0-.396-.025-1.038-.016zm.067 1.697c.545-.003.88.02.88.02 4.54.01 6.71 1.38 7.22 1.84 1.67 1.43 2.528 4.856 1.9 9.892-.6 4.88-4.17 5.2-4.83 5.4-.28.1-2.88.73-6.152.52 0 0-2.44 2.94-3.2 3.7-.12.13-.26.17-.35.15-.13-.03-.17-.2-.16-.4l.02-4.02c-4.77-1.32-4.49-6.302-4.44-8.902.06-2.6.55-4.732 2-6.172 1.957-1.77 5.475-2 7.1-2.02zm.36 2.6a.299.299 0 0 0-.3.299.3.3 0 0 0 .3.3 5.631 5.631 0 0 1 4.03 1.59c1.1 1.06 1.62 2.48 1.64 4.34a.3.3 0 0 0 .3.3v-.01a.3.3 0 0 0 .3-.3 6.451 6.451 0 0 0-1.81-4.76c-1.2-1.16-2.692-1.76-4.462-1.76zm-3.954.7a.955.955 0 0 0-.615.12h-.012c-.4.24-.788.54-1.148.94-.27.32-.42.64-.46.95a1.24 1.24 0 0 0 .05.541l.02.01a13.722 13.722 0 0 0 1.2 2.6 15.383 15.383 0 0 0 2.32 3.171l.03.04.04.03.06.06a15.603 15.603 0 0 0 3.18 2.33c1.32.72 2.122 1.06 2.602 1.2V17c.14.04.268.06.398.06a1.84 1.84 0 0 0 1.102-.472c.4-.35.7-.738.93-1.148v-.01c.23-.43.15-.84-.18-1.12a13.632 13.632 0 0 0-2.15-1.54c-.5-.28-1.03-.1-1.24.17l-.45.57c-.23.28-.65.24-.65.24l-.012.01c-3.12-.8-3.95-3.96-3.95-3.96s-.04-.43.25-.65l.56-.45c.27-.22.46-.74.17-1.25a13.522 13.522 0 0 0-1.54-2.15.843.843 0 0 0-.504-.3zm4.473.9a.3.3 0 0 0 .002.6 3.78 3.78 0 0 1 2.65 1.15 3.5 3.5 0 0 1 .9 2.57.3.3 0 0 0 .3.299l.01.012a.3.3 0 0 0 .3-.301c.03-1.2-.34-2.2-1.07-3s-1.75-1.25-3.05-1.34a.3.3 0 0 0-.042 0zm.5 1.62a.305.305 0 0 0-.018.611c1 .05 1.47.55 1.53 1.58a.3.3 0 0 0 .3.29h.01a.3.3 0 0 0 .29-.32c-.07-1.34-.8-2.09-2.1-2.16a.305.305 0 0 0-.012 0z"></path></svg></span></a></div><div class="chat-button"><a href="tel:+9950322228080" data-scb="Phone" target="" class="scb-tooltip channel-phone chat-button-link button-link-phone-27702 gsb-social-channel" id="chat-button-phone-27702" data-channel="phone" data-tooltip-dir="left"><span class="sr-only">Phone</span><span class="chat-button-icon  chat-button-phone-27702"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 405.333 405.333"><path d="M373.333 266.88c-25.003 0-49.493-3.904-72.704-11.563-11.328-3.904-24.192-.896-31.637 6.7l-46.016 34.752c-52.8-28.18-86.592-61.952-114.39-114.368l33.813-44.928c8.512-8.512 11.563-20.97 7.915-32.64-7.723-23.36-11.648-47.872-11.648-72.832 0-17.643-14.357-32-32-32H32C14.357 0 0 14.357 0 32c0 205.845 167.488 373.333 373.333 373.333 17.643 0 32-14.357 32-32V298.88c0-17.643-14.357-32-32-32z"></path></svg></span></a></div><div class="chat-button"><a href="https://www.instagram.com/iland.ge_store/" data-scb="instagram" target="_blank" class="scb-tooltip channel-instagram chat-button-link button-link-instagram-27702 default-insta-hover gsb-social-channel" id="chat-button-instagram-27702" data-channel="instagram" data-tooltip-dir="left"><span class="sr-only">instagram</span><span class="chat-button-icon  chat-button-instagram-27702"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.004 5.838a6.16 6.16 0 0 0-6.158 6.158 6.16 6.16 0 0 0 6.158 6.158 6.16 6.16 0 0 0 6.158-6.158 6.16 6.16 0 0 0-6.158-6.158zm0 10.155c-2.2 0-3.997-1.8-3.997-3.997S9.796 8 12.004 8 16 9.788 16 11.996s-1.788 3.997-3.997 3.997zM16.948.076C14.74-.027 9.27-.022 7.06.076c-1.942.1-3.655.56-5.036 1.94-2.307 2.31-2.012 5.42-2.012 9.98 0 4.668-.26 7.706 2.013 9.98 2.317 2.316 5.472 2.013 9.98 2.013 4.624 0 6.22.003 7.855-.63 2.223-.863 3.9-2.85 4.065-6.42a161.35 161.35 0 0 0 0-9.887c-.2-4.212-2.46-6.768-6.977-6.976zm3.495 20.372c-1.513 1.513-3.612 1.378-8.468 1.378-5 0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453 0-5.525-.567-9.504 4.978-9.788 1.274-.045 1.65-.06 4.856-.06l.045.03c5.33 0 9.5-.558 9.76 4.986.057 1.265.07 1.645.07 4.847-.001 4.942.093 6.96-1.394 8.453z"></path><circle cx="18.406" cy="5.595" r="1.439"></circle></svg></span></a></div></div><div class="gsb-trigger"><div class="gsb-trigger-button"><div class="gsb-trigger-top cooltipz--visible" data-tooltip-dir="left" data-scb="გჭირდება დახმარება?"><a role="button"  class="chat-button-link"><span class="sr-only">Contact Us</span><div class="chat-button-icon"><svg style="enable-background:new 1 -1 100 100;" version="1.1" viewBox="1 -1 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M82,9.5H20c-5.5,0-10,4.5-10,10v42c0,5.5,4.5,10,10,10h8v17l25-17h29c5.5,0,10-4.5,10-10v-42C92,14,87.5,9.5,82,9.5z   M31.8,29.5h20.4c1.7,0,3,1.3,3,3s-1.3,3-3,3H31.8c-1.6,0-3-1.3-3-3C28.8,30.9,30.1,29.5,31.8,29.5z M68.2,49.5H31.8  c-1.6,0-3-1.3-3-3c0-1.6,1.3-3,3-3h36.4c1.7,0,3,1.3,3,3S69.9,49.5,68.2,49.5z"></path></svg></div></a> </div><div class="gsb-trigger-bottom"><a role="button" class="chat-button-link" data-tooltip-dir="left"><span class="sr-only">Close</span><span class="chat-button-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 30 30" width="90" height="90"><path d="M7 4c-.256 0-.512.097-.707.293l-2 2a1 1 0 0 0 0 1.414L11.586 15l-7.293 7.293a1 1 0 0 0 0 1.414l2 2a1 1 0 0 0 1.414 0L15 18.414l7.293 7.293a1 1 0 0 0 1.414 0l2-2a1 1 0 0 0 0-1.414L18.414 15l7.293-7.293a1 1 0 0 0 0-1.414l-2-2a1 1 0 0 0-1.414 0L15 11.586 7.707 4.293C7.512 4.097 7.256 4 7 4z"></path></svg></span></a> </div></div></div></div></div>
</div>
<div id="snackbar"></div>
	</body>
</html>
<script type="text/javascript" src="https://abjari.ge/wp-content/themes/woodmart/js/libs/tooltips.min.js?ver=7.5.1" id="wd-tooltips-library-js"></script>
	<script src="/js/gritter/js/jquery.gritter.min.js"></script>
		<link href="/js/gritter/css/jquery.gritter.css" rel="stylesheet" />
<script type="text/javascript" src="/js/main.js?v=2"></script>

<script>
$(document).on("click",".gsb-trigger",function(){
	$(".gsb-buttons").toggleClass("open-buttons");
});
</script>
<style>
#gritter-notice-wrapper {
    position: fixed;
    top: 78px;
    right: 7px;
    width: 301px;
    z-index: 99999!important;
}
.gsb-buttons .gsb-button-list.menu_view {
    animation-delay: -2s;
    -webkit-animation-delay: -2s;
    bottom: 0;
    position: absolute;
    right: 8px;
    transition: .5s;
    -webkit-transition: .5s
}
.gsb-buttons .gsb-trigger .gsb-trigger-bottom a .chat-button-icon,.gsb-buttons:not(.open-form) .gsb-trigger-contact,.gsb-buttons:not(.open-wechat-popup) .gsb-trigger-wechat-popup,.gsb-buttons:not(.open-whatsapp-popup) .gsb-trigger-whatsapp-popup {
    transform: scale(.7) rotate(180deg)
}

.gsb-buttons.open-buttons .gsb-trigger .gsb-trigger-bottom a .chat-button-icon,.gsb-buttons.open-form .gsb-trigger-contact,.gsb-buttons.open-wechat-popup .gsb-trigger-wechat-popup,.gsb-buttons.open-whatsapp-popup .gsb-trigger-whatsapp-popup {
    transform: scale(1) rotate(1turn)
}

.gsb-button-list.icon_view .chat-button {
    position: absolute;
    transform: scale(.25) rotate(-180deg)
}

.gsb-button-list.icon_view .chat-button,.gsb-button-list.list_view .chat-button {
    bottom: 0;
    opacity: 0;
    pointer-events: none;
    transition: all .2s linear;
    transition-delay: 0s!important;
    visibility: hidden
}
#gsb-buttons-27702 .gsb-trigger .gsb-trigger-bottom .chat-button-link, #gsb-buttons-27702 .gsb-trigger .gsb-trigger-contact .chat-button-link, #gsb-buttons-27702 .gsb-trigger .gsb-trigger-whatsapp-popup .chat-button-link, #gsb-buttons-27702 .gsb-trigger .gsb-trigger-wechat-popup .chat-button-link {
    background: #1c5fc6;
    color: #ffffff;
}
.gsb-buttons .sr-only {
    clip: rect(0, 0, 0, 0) !important;
    border: 0 !important;
    height: 1px !important;
    margin: -1px !important;
    overflow: hidden !important;
    padding: 0 !important;
    position: absolute !important;
    width: 1px !important;
}
.gsb-buttons-content, .gsb-trigger {
    position: relative;
    z-index: 12111;
}
#gsb-buttons-27702 .gsb-trigger .gsb-trigger-top .chat-button-link {
    background: #1c5fc6;
    color: #ffffff;
}
#gsb-buttons-27702 .chat-button-link {
    border-radius: 65px;
}
#gsb-buttons-27702 .chat-button-link {
    width: 56px;
    height: 56px;
    padding: 12px;
}

.gsb-buttons.has-shadow .gsb-button-list .chat-button a, .gsb-buttons.has-shadow .gsb-trigger-button .chat-button a, .gsb-buttons.has-shadow .gsb-trigger-button a {
    box-shadow: 0 0 12px rgba(0, 0, 0, .2);
    -webkit-box-shadow: 0 0 12px rgba(0, 0, 0, .2);
}
.gsb-buttons .chat-button-link {
    border-radius: 50%;
    color: #fff;
    display: block;
    height: 54px;
    padding: 10px;
    text-align: center;
    width: 54px;
}
.gsb-buttons-content svg{
	width:30px;
}
#gsb-buttons-27702 .gsb-trigger .gsb-trigger-top .chat-button-link {
    background: #1c5fc6;
    color: #ffffff;
}
.gsb-buttons {
    bottom: 25px;
    right: 25px;
    position: fixed;
    z-index: 999999;
}
.gsb-trigger .gsb-trigger-top .chat-button-link {
    background: #1c5fc6;
    color: #ffffff;
}
#gsb-buttons-27702 .chat-button-link {
    width: 56px;
    height: 56px;
    padding: 12px;
}
.chat-button-icon.channel-instagram, .gsb-social-channel.channel-instagram {
    background: #fed975;
    background: -webkit-gradient(left bottom, right top, color-stop(0, #fed975), color-stop(26%, #fa7e1e), color-stop(50%, #d62977), color-stop(75%, #962fbf), color-stop(100%, #4f5ad5));
    background: linear-gradient(45deg, #fed975, #fa7e1e 26%, #d62977 50%, #962fbf 75%, #4f5ad5);
}
#gsb-buttons-27702 .channel-viber {
    background: #774D99;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-viber svg {
    fill: #ffffff;
    color: #ffffff;
}
#gsb-buttons-27702 .gsb-trigger .gsb-trigger-top .chat-button-link svg {
    fill: #ffffff;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-phone {
    background: #00bb70;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-phone svg {
    fill: #ffffff;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-whatsapp:hover, #gsb-buttons-27702 .list-channel a:hover .channel-whatsapp {
    background: #4dc247;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-whatsapp {
    background: #4dc247;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-facebook_messenger:hover, #gsb-buttons-27702 .list-channel a:hover .channel-facebook_messenger {
    background: #0075FF;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-facebook_messenger {
    background: #0075FF;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-facebook_messenger svg {
    fill: #ffffff;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-facebook_messenger {
    background: #0075FF;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-instagram svg {
    fill: #ffffff;
    color: #ffffff;
}
#gsb-buttons-27702 .chat-button-icon {
    width: 32px;
    height: 32px;
}
.gsb-buttons .chat-button-icon {
    border-radius: 50%;
    display: block;
    height: 34px;
    text-align: center;
    width: 34px;
}
#gsb-buttons-27702 .channel-whatsapp:hover svg, #gsb-buttons-27702 .list-channel a:hover .channel-whatsapp svg {
    fill: #ffffff;
    color: #ffffff;
}
#gsb-buttons-27702 .channel-whatsapp svg {
    fill: #ffffff;
    color: #ffffff;
}
.gsb-buttons .chat-button-link svg {
    fill: #fff;
}
svg:not(:root) {
    overflow: hidden;
}
.gsb-buttons svg {
    display: inline-block;
    height: 100%;
    vertical-align: top;
    width: 100%;
}
.gsb-buttons .chat-button, .gsb-buttons.single .gsb-trigger-contact, .gsb-buttons.single .gsb-trigger-wechat-popup, .gsb-buttons.single .gsb-trigger-whatsapp-popup {
    border-radius: 50%;
    height: 62px;
    padding: 4px;
    width: 62px;
}
#gsb-buttons-27702 .gsb-trigger {
    width: 64px;
    height: 64px;
}
.gsb-trigger {
    border-radius: 50%;
    height: 62px;
    padding: 4px;
    width: 62px;
}
.gsb-buttons-content, .gsb-trigger {
    position: relative;
    z-index: 12111;
}
#gsb-buttons-27702 .gsb-trigger .gsb-trigger-bottom {
    width: 56px;
    height: 56px;
}
.gsb-trigger .gsb-trigger-bottom, .gsb-trigger .gsb-trigger-contact, .gsb-trigger .gsb-trigger-wechat-popup, .gsb-trigger .gsb-trigger-whatsapp-popup {
    left: 0;
    position: absolute;
    top: 0;
    transition: .25s linear;
}
#gsb-buttons-27702 .gsb-trigger .gsb-trigger-top {
    width: 56px;
    height: 56px;
}
[data-scb][class*=cooltipz], [data-scb][data-tooltip-dir] {
    cursor: var(--cooltipz-cursor, pointer);
    position: relative;
}
.gsb-trigger .gsb-trigger-top {
    left: 0;
    opacity: 1;
    position: absolute;
    top: 0;
    visibility: visible;
    z-index: 101;
}
#gsb-buttons-27702.open-buttons .gsb-button-list.icon_view .chat-button:nth-child(5) {
    -webkit-transform: translateY(-64px) scale(1);
    transform: translateY(-64px) scale(1);
}
#gsb-buttons-27702 .gsb-button-list.icon_view .chat-button:nth-child(5) {
    -webkit-transform: translateY(0px) scale(1);
    transform: translateY(0px) scale(1);
    transition-delay: 0.375s;
}
.gsb-trigger {
    border-radius: 50%;
    height: 62px;
    padding: 4px;
    width: 62px;
}   
#gsb-buttons-27702 .gsb-trigger .gsb-trigger-top .chat-button-link:hover {
    background: #1c5fc6;
    color: #ffffff;
}
#gsb-buttons-27702 .gsb-trigger .gsb-trigger-top .chat-button-link {
    background: #1c5fc6;
    color: #ffffff;
}
#gsb-buttons-27702 .chat-button-link {
    border-radius: 65px;
}
#gsb-buttons-27702 .chat-button-link {
    width: 56px;
    height: 56px;
    padding: 12px;
}
.gsb-buttons.has-shadow .gsb-button-list .chat-button a:hover, .gsb-buttons.has-shadow .gsb-trigger-button .chat-button a:hover, .gsb-buttons.has-shadow .gsb-trigger-button a:hover {
    box-shadow: 0 0 12px rgba(0, 0, 0, .3);
    -webkit-box-shadow: 0 0 12px rgba(0, 0, 0, .3);
}
.gsb-buttons.has-shadow .gsb-button-list .chat-button a, .gsb-buttons.has-shadow .gsb-trigger-button .chat-button a, .gsb-buttons.has-shadow .gsb-trigger-button a {
    box-shadow: 0 0 12px rgba(0, 0, 0, .2);
    -webkit-box-shadow: 0 0 12px rgba(0, 0, 0, .2);
}
.gsb-buttons .chat-button-link {
    border-radius: 50%;
    color: #fff;
    display: block;
    height: 54px;
    padding: 10px;
    text-align: center;
    width: 54px;
}
#gsb-buttons-27702 .gsb-trigger-button {
    width: 56px;
    height: 56px;
}
.gsb-trigger-button {
    display: block;
    position: relative;
}
.gsb-buttons.open-buttons .gsb-trigger .gsb-trigger-top, .gsb-buttons.open-form .gsb-trigger .gsb-trigger-top, .gsb-buttons.open-wechat-popup .gsb-trigger .gsb-trigger-top, .gsb-buttons.open-whatsapp-popup .gsb-trigger .gsb-trigger-top, .gsb-buttons:not(.open-form) .gsb-trigger-contact, .gsb-buttons:not(.open-wechat-popup) .gsb-trigger-wechat-popup, .gsb-buttons:not(.open-whatsapp-popup) .gsb-trigger-whatsapp-popup, .gsb-trigger .gsb-trigger-bottom {
    opacity: 0;
    pointer-events: none;
    visibility: hidden;
    z-index: 100;
}
.gsb-buttons.open-buttons .gsb-trigger .gsb-trigger-bottom {
    opacity: 1;
    pointer-events: auto;
    visibility: visible;
    z-index: 101;
}
#gsb-buttons-27702 .gsb-button-list.icon_view .chat-button:nth-child(1) {
    -webkit-transform: translateY(0px) scale(1);
    transform: translateY(0px) scale(1);
    transition-delay: 0.075s;
}
#gsb-buttons-27702 .chat-button, #gsb-buttons-27702 .gsb-trigger-contact, #gsb-buttons-27702 .gsb-trigger-whatsapp-popup, #gsb-buttons-27702 .gsb-trigger-wechat-popup {
    width: 64px;
    height: 64px;
}
.gsb-button-list:not(.corner_circle_view) .chat-button {
    transition-delay: 0s !important;
}
.gsb-button-list.icon_view .chat-button, .gsb-button-list.list_view .chat-button {
    bottom: 0;
    opacity: 0;
    pointer-events: none;
    transition: all .2s linear;
    transition-delay: 0s !important;
    visibility: hidden;
}
.gsb-button-list.icon_view .chat-button {
    position: absolute;
    transform: scale(.25) rotate(-180deg);
}
.gsb-buttons.open-buttons .gsb-button-list .chat-button {
    opacity: 1;
    pointer-events: auto;
    visibility: visible;
}
.gsb-buttons.open-buttons .gsb-button-list .chat-button {
    opacity: 1;
    pointer-events: auto;
    visibility: visible;
}
.gsb-button-list.icon_view .chat-button {
    position: absolute;
    transform: scale(.25) rotate(-180deg);
}
#gsb-buttons-27702.open-buttons .gsb-button-list.icon_view .chat-button:nth-child(1) {
    -webkit-transform: translateY(-320px) scale(1);
    transform: translateY(-320px) scale(1);
}
#gsb-buttons-27702.open-buttons .gsb-button-list.icon_view .chat-button:nth-child(2) {
    -webkit-transform: translateY(-192px) scale(1);
    transform: translateY(-192px) scale(1);
}
#gsb-buttons-27702.open-buttons .gsb-button-list.icon_view .chat-button:nth-child(3) {
    -webkit-transform: translateY(-192px) scale(1);
    transform: translateY(-192px) scale(1);
}
#gsb-buttons-27702.open-buttons .gsb-button-list.icon_view .chat-button:nth-child(4) {
    -webkit-transform: translateY(-128px) scale(1);
    transform: translateY(-128px) scale(1);
}
</style>