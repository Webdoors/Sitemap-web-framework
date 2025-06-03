<html lang="en"><script src="chrome-extension://cbllkmdbdpmfbodkeljlikmgfjpobbdi/contentPageRuntimeScript.js"></script><head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/svg+xml" href="../images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventrox - Digital Events React Template</title>
  <script type="module" crossorigin="" src="/assets/index-qJgVKlqy.js"></script>
  <link rel="stylesheet" crossorigin="" href="/assets/index-lkWSfATe.css">
<link rel="shortcut icon" href="../images/favicon.ico" data-react-helmet="true">
		<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>
</head>
<body page="home">
<header>
	<nav class="NAV px-5 py-2">
		<div class="text-center text-white LOGO" style="width:300px">Wize.Rentals</div>
		<div>Home</div>
		<div>About</div>
		<div>Services</div>
		<div>Gallary</div>
		<div>Blog</div>
		<div>Contact</div>
		<div><div class="btn btn-success">Order Now</div></div>
	</nav>
</header>
<main>
<div class="swiper">
	<img class="w-100" src="https://eventrox-react.expert-themes.com/images/main-slider/2.jpg"/>
</div>	
</main>
<footer>

</footer>
</body>
</html>
<style>
.LOGO{
	font-size:40px;
	font-weight:900;
}
.NAV{
align-items: center;
	height:70px;
	position:fixed;
	color:#fff;
display: flex;
    width: 100%;
    justify-content: space-between;
	font-family:Poppins,sans-serif;
	fontweight:700;
}
.swiper{
	height:500px;
	width:100%;
}
.SCROLLED{
	background-color: #101130;
	transition: background-color 0.5s ease;
}
</style>
<script>
$(window).on('scroll', function() {
	if($("body").attr("page")=="home"){
		if ($(this).scrollTop() > 0) {
			$('.NAV').addClass('SCROLLED');
		} else {
			$('.NAV').removeClass('SCROLLED');
		}
    }
});
</script>