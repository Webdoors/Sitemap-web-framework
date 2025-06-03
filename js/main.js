var cart=getCookie("cart");
if(cart[0]=="{"){
		setCookie("cart","[]",7);
}
var lang=getCookie("lang");
if(lang==""){
	setCookie("lang","ka");
	lang=getCookie("lang");
}
var lang=$("body").attr("lang");	
	$(function(){
		$(document).on("scroll",function(){
			var t=-1;
			if(document.querySelector(".BANN")!=null){
				t=document.querySelector(".BANN").offsetHeight;
			}
			if($(document).scrollTop()>t){
				$(".SEARCH2").addClass("SEAFIX");
			}else{
				$(".SEARCH2").removeClass("SEAFIX");
			}
		});	
	});
$(".srcklc").click(function(){
  $(".src-drop").slideToggle();
  $(".src-val").focus();
});

//update quantity of item keyup
$(document).on("keyup",".sugg",function(){
	var val=$(this).val();
		var params = {
				val:val,
				
			}
			func("suggestion",params);
	
});


$(document).on("click", ".NEWPASS", function (e) {
		if ($(".PASSWORD").val().length > 5) {
			if ($(".PASSWORD").val() == $(".REPASSWORD").val()) {
				var params={
				a:$(".PASSWORD").val(),
				b:$(".OLDPASSWORD").val(),
				
			    }
				if($(".INP[vs='0']").length<1){
				
				func("newpassword", params);
				}
				else
				{
					snack("გთხოვთ სწორად შეავსეთ მონაცემები!");
				}
			} else {
				snack("პაროლები არ ემთხვევა ერთმანეთს");
			}

		} else {
			snack("სწორად შეავსეთ პაროლი, მინიმუმ 6 სიმბოლო");
		}
	});



$(document).on("change keyup",".lpt",function(){

		if($(this).val()!='22')
		{
			$(".SHIPPINGMETHOD").addClass("d-none");
		}
		else
		{
			$(".SHIPPINGMETHOD").removeClass("d-none");
		}
		
		var params={
				a:'users',
				b:$(this).attr("d"),
				c:$(this).val(),
				d:''
			}
		func("updatetable",params,function(){
				snack("შენახულია","show");					
			});
		
	// wr();
	
});

$(document).on("click",".SEMO",function(){
	$(".CIRCLEBOX").toggleClass("HAUTO");
	if($(".CIRCLEBOX").hasClass("HAUTO")){
		var el = $('.CIRCLEBOX'),
			curHeight = el.height(),
			autoHeight = el.css('height', 'auto').height();
		el.height(curHeight).animate({height: autoHeight},200,'linear');		
	}else{
		var el = $('.CIRCLEBOX');
		el.animate({height: "260px"}, 200,'linear');		
	}
	
});
//update quantity of item keyup
$(document).on("keyup",".RAO2",function(){
	if($(this).val()<1||isNaN($(this).val())){
		$(this).val(1);
	}
	var proid=$(this).attr("d");
	var cart=JSON.parse(getCookie("cart"));
	cart[proid]["quantity"]=$(this).val();
	cart=JSON.stringify(cart);
	setCookie("cart",cart,7);
	countCART();
});
// count cart and total
function countCART(){
	var total=0;
	var cou=0;
	var cart=JSON.parse(getCookie("cart"));
	for (var key in cart) {
		cou+=Number(cart[key]["quantity"]);
		total+=Number(cart[key]["quantity"])*Number(cart[key]["price"]);
		try{
			$(".SUBTOT[d='"+key+"']").html(Number(cart[key]["quantity"])*Number(cart[key]["price"]));
		} catch (e) {
			
		}
	}
	$(".trao").html(cou);
	$(".tsum").html(total);
	$(".val").html(cou);
	return {"total":total,"cou":cou};
}
	$(document).on("change keyup",".UPT",function(){

			var params={
				a:$(this).attr("t"),
				b:$(this).attr("n"),
				c:$(this).val(),
				d:$(this).attr("d")
			}
			func("updatetable",params,function(){
				snack("შენახულია","show");					
			});

	});
$(document).on("click",".GIT",function(e) {
	var params={
		a:$(this).attr("d"),
	}
	func("getitems",params,function(R){
		var d1=$.dialog({
			title:"",
			columnClass:"medium",
			content:R
		});		
	});
});
if($(window).width()<=1024){
	if($(".BGIM").length>0){
		window.scrollTo(0,700);
	}
};

$(function(){
	// $('a').tooltip({title: "", placement: "right",animation:true});
	// $('.P').tooltip({title: "", placement: "bottom",animation:true});
	// $('p').tooltip({title: "", placement: "bottom",animation:true});
	// $('.tit').tooltip({title: "", placement: "bottom",animation:true});
	// $('img').tooltip({title: "", placement: "bottom",animation:true});
	// $('.TTIP').tooltip({title: "", placement: "top",animation:true});
});
$(document).on("change",".GROPRO",function(){
	location.href=$("option:selected").attr("slug");
});

$(document).on("click",".GETSMS",function(){
	if($(".sms").val()!=""){
		func("getsms",{a:$(".A5").val()});	
		snack("Sms კოდი გადმოგზავნილია");
	}else{
		snack("მიუთითეთ ტელეფონის ნომერი");
	}

});
	// shablonis washlia dashboard,shablonebshic
$(document).on("click",".SIN3",function(){
		$(".INP").each(function(){
			validateInput($(this).attr("name"),this);
		});	
	if($(".A1").val()==$(".A2").val()){
		if($(".INP[vs='0']").length<1){
			var params = {
				pass: $(".A1").val(),
				token: $(".TOKEN").val(),
			};
			func("changepassword",params);
		}else{
			snack("სწორად შეავსეთ მონაცემები");
		}
	}else{
		snack("passwords do not match");
	}
});
	$(document).on("click",".TAB",function(){
		$(".TAB").removeClass("ACTTAB");
		$(".TAB[d='"+$(this).attr("d")+"'").addClass("ACTTAB");
		$(".CONT").addClass("d-none");
		$(".CONT[d='"+$(this).attr("d")+"'").removeClass("d-none");
	});
	$(document).on("click",".DOWN",function(){

		// $(".LEV"+$(this).attr("d")).removeClass("IB");
		// $(this).parent().parent().find(".LEV"+$(this).attr("d")).removeClass("IB");
		$(this).parent().find(".LEV"+$(this).attr("d")).addClass("IB");
		$(this).removeClass("DOWN");
		$(this).addClass("UP");
		$(this).removeClass("fa-angle-down");
		$(this).addClass("fa-angle-up");
	});
	$(document).on("click",".UP",function(){
		$(this).parent().find(".LEV"+$(this).attr("d")).removeClass("IB");
		$(this).removeClass("UP");
		$(this).addClass("DOWN");
		$(this).removeClass("fa-angle-up");
		$(this).addClass("fa-angle-down");
	});
	$(document).on("click",".REC",function(){
		var params={
			user:$(".INP").val(),
		}
		func("recovery",params);			
	});
	$(document).on("click",".MACH",function(){
		var params={
			from:$(this).attr("from"),
			to:$(this).attr("to")
		}
		func("getitems",params);
		var from=parseInt($(this).attr("from"))+parseInt($(this).attr("to"));
		$(this).attr("from",from);
		var k=$(".ACP");
		$(".ACP").removeClass("ACP");
		k.parent().next().find(".PG").addClass("ACP");
	});
	$(document).on("click",".RATI2 .rating i",function(){

		if($(this).hasClass("BEF")){
			$(".RATI2 .BEF").removeClass("BEF");
			$(this).css({"color":"#FFF"});	
			$(this).prev().addClass("BEF");			
		}else{
			$(this).nextAll().css({"color":"#FFF"});
			$(this).prevAll().css({"color":"#ffb14b"});
			$(this).css({"color":"#ffb14b"});
			$(".RATI2 .BEF").removeClass("BEF");
			$(this).addClass("BEF");			
		}
	});
	$(document).on("click",".RATI1",function(){
		if($(".rating").attr("d")!=""){
			var d1=$.dialog({
				title:"",
				columnClass:"medium",
				content:'<div class="container-fluid text-center RATI2 star-product"><h3>რევიუ</h3>'+$(".rating").clone()[0].outerHTML+
				'<br><textarea class="form-control mt-3" placeholder="Write review"></textarea>'+
				'<button class="btn btn-primary SENDREV mb-1">Send</button></div>'
			});
			setTimeout(function(){
				$(".RATI2 .BEF").removeClass("BEF");
				$(".RATI2 .fa-star").css({"color":"#FFF"});
			},500);
			$(document).on("click",".SENDREV",function(){
				var params={
					a:$(".RATI2 .BEF").attr("d"),
					b:$(".rating").attr("pid"),
					c:$(".RATI2 textarea").val()
				}
				func("review",params);
				$(this).html("Successfully send!");
				setTimeout(function(){d1.close();location.reload();},2000);
			});
		}else{
			location.href="/signin/?backurl="+location.href;
		}
	});
	$(document).on("change",".SRB",function(){
		var url = new URL($(this).attr("d"));
		url.searchParams.set("sort",$(this).val());
		$( this ).attr("d",url);
		var key=$( this ).attr("key");
		window.location.href=$( this ).attr("d")+"&key="+key;
	});
	$(document).on("click",".FILTER",function(){
		location.href=$(this).attr("url")+"?from="+$(".FROM").val()+"&to="+$(".TO").val()+"&key="+$(".KEY").val();
	});		
	$(document).on("click",".CLEAN",function(){
		location.href=$(this).attr("url");
	});	
	$(document).on("click",".SEARCH",function(){
		$(".search-form").addClass("open");
		setTimeout(function() { $(".SERKEY").focus();}, 1000);	
	});	
	$(document).on("keyup",".LET",function(){
		$(this).val($(this).val().replace(/[^\u10D0-\u10F0\A-Za-z]/g, ""));
	});
	$(document).on("click",".CLOSE",function(){
		$(this).parent().parent().removeClass("IB");
		$(".CATS2").hide(); 
		$(".MENU").addClass("HIDESM");
		$(".change").removeClass("change");
	});
	$(document).click(function(e) 
	{
		var container1 = $(".CATS2");
		var container2 = $(".CATE");
		if (!container1.is(e.target) && container1.has(e.target).length === 0&&!container2.is(e.target) && container2.has(e.target).length === 0) 
		{
			container1.removeClass("IB");
		}
	});
	$(document).on("click",".CATE",function(e) {
		var t=-1;
		if(document.querySelector(".BANN")!=null){
			t=document.querySelector(".BANN").offsetHeight;
		}
		if($(document).scrollTop()>10){
			var t=0;
			if(document.querySelector("#index > main > header")!=null){
				t=document.querySelector("#index > main > header").offsetTop;
			}
			if(!$(".CATS2").hasClass("IB")){
				$('html, body').animate({
				scrollTop: t
				}, 800, function(){

				});				
			}
			$(".CATS2").addClass("CATS3");					
		}else{
			$(".CATS2").removeClass("CATS3");		
		}
		$(".CATS2").toggleClass("IB");
	});
	$(document).on("click",".IXI1",function(){
		$(".search-form").removeClass("open");
	});	
	$(document).on("click",".SER1",function(){
		location.href="/products/?key="+$(".SERKEY").val();
	});	
	$(document).on("keyup",".SERKEY",function(e){
		if(e.which==13){
			$(".SER1").trigger("click");			
		}
	});	
	$(document).on("keyup",".NUM",function(){
		$(this).val($(this).val().replace(/[^\d.]/g, ""));
	});
	$(document).on("click",".sup",function(){
		var params={
			
		}
		$(".INP").each(function(){
			validateInput($(this).attr("name"),this);
			params[$(this).attr("name")]=$(this).val();
		});	
		if($(".INP[vs='0']").length<1){
					func("register",params);
		}else{
			snack("სწორად შეავსეთ მონაცემები");
		}		
	});
	$(document).on("click",".sin",function(){
		var params={
			
		}
		$(".INP").each(function(){
			params[$(this).attr("name")]=$(this).val();
		});	
		if($(".INP[vs='0']").length<1){
					func("login",params);
		}else{
			snack("სწორად შეავსეთ მონაცემები");
		}		
	});
	$(document).on("keyup",".NUM2",function(e){
		if(e.which==8&&$(this).val()==0){
			$(this).val("");
		}
		$(this).val($(this).val().replace(/[^\d.]/g, ""));
		if($(this).val().length>1&&$(this).val().indexOf(".")<0&&$(this).val().indexOf("0")==0){
			$(this).val($(this).val().substr(1));
		}
		if($(this).val().length==1&&$(this).val().indexOf("0")==0){
			$(this).val($(this).val()+".");
		}
		if($(this).val().indexOf(".")>0){
			if($(this).val().split(".")[1].length>2){
				$(this).val($(this).val().slice(0, -1));
			}
		}
		$(this).val($(this).val().replace("..","."));
		$(this).val($(this).val().replace("...","."));
	});
	$(document).on("keyup",".NUM",function(){
		$(this).val($(this).val().replace(/[^\d.]/g, ""));
	});
	$(document).on("keyup",".LET",function(){
		$(this).val($(this).val().replace(/[^\u10D0-\u10F0\A-Za-z]/g, ""));
	});
	$(document).on("keyup",".LATIN",function(){
		$(this).val($(this).val().replace(/[^\A-Za-z]/g, ""));
	});

	$(document).on("keyup",".INP",function(){
        validateInput($(this).attr("name"),this);
    });
function validateInput(funcName,field) {
	var re="";
	var el=$(field);
	switch(funcName) {
		case "name":
		case "lastname":
			re = /(?!=.*[^\u10D0-\u10F0\A-Za-z])(?=.*[^\s])/;
		break;
		case "companyname":
			re = /([^\s])/;
		break;
		case "email":
			re = /^(?=.*[^\u10D0-\u10F0])(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		break;
		case "password":
			re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/;
		break;
		case "retype":
			re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/;
		break;
		case "birthday":
		break;
		case "gender":
		break;
		case "personalid":
			re = /(?!=.*[a-z])(?=.*[0-9])(?=.{11,11})/;
			el.attr("maxlength",11);
		break;
		case "cid":
		case "tel":

			re = /(?!=.*[a-z])(?=.*[0-9])(?=.{9,})/;
			el.attr("maxlength",9);

		break;
	  // case "tel2":
		// if($(".PCOD2").val()=="995"){
		// 	re = /(?!=.*[a-z])(?=.*[0-9])(?=.{9,})/;
		// 	el.attr("maxlength",9);
		// }else{
		// 	re = /(?!=.*[a-z])(?=.*[0-9])(?=.{11,})/;
		// 	el.attr("maxlength",11);
		// }
		// break;
	  default:
	}
	// console.log(re);
	try{
		if(funcName=="department"||funcName=="office"||funcName=="position"||funcName=="gender"){
			if(el.val()!=""){
				el.attr("vs",1);
				el.css({"border-color":"var(--txth)"});
			}else{
				el.attr("vs",0);
				el.css({"border-color":"#de1507"});
			}
		}
		if(re.test(el.val())){
			el.attr("vs",1);
			el.css({"border-color":"var(--txth)"});
		}else{
			el.attr("vs",0);
			el.css({"border-color":"#de1507"});
		}
		if(funcName=="retype"){
			if(el.val()==el.prev().val()||el.val()==el.parent().prev().find(".INP").val()){
				el.attr("vs",1);
				el.css({"border-color":"var(--txth)"});
			}else{
				el.attr("vs",0);
				el.css({"border-color":"#de1507"});
			}
		}

		return re.test(el.val());
	}catch(e){
		if(funcName=="birthday"){
			if(el.val()!=""){
				el.attr("vs",1);
				el.css({"border-color":"var(--txth)"});
			}else{
				el.attr("vs",0);
				el.css({"border-color":"#de1507"});
			}
		}
	}

}
function snack(a="",b="show") {

$("#snackbar").html(a);
  $("#snackbar").attr("class",b);

  setTimeout(function(){ $("#snackbar").attr("class","");}, 3000);
}
function CART(){
	var cart=[];
	var tsum=0;
	var trao=0;
	$(".ITEM2").each(function(){	
		var info={
			pid:$(this).find(".RAO2").attr("d"),
			quantity:Number($(this).find(".RAO2").val()),
			price:$(this).find(".RAO2").attr("price"),
			option:$(this).find(".RAO2").attr("oid")				
		};	
		cart.push(info);
		trao=trao+Number($(this).find(".RAO2").val());
		
		tsum=tsum+	parseFloat($(this).find(".RAO2").val())*parseFloat($(this).find(".RAO2").attr("p"));
	   
		
	});
	$(".CR1").html(trao);
	$(".TRAO").html(trao);
	$(".SUM").html(tsum.toFixed(2));
	$(".TSUM").html((tsum+Number($(".SHIP").html())));	
	$(".cart-number-circle").html(trao);	
	cart=JSON.stringify(cart);
	setCookie("cart",cart,7);

}
$(function(){
	
	$(document).on("keyup paste",".RAO2",function(){
		if($(this).val()==""){
			$(this).val(1);
		}
		CART();
	});
	$(document).on("click",".ADDORD",function(){
		if($(this).attr("uid")!=""){
			if($(".METHOD").val()!=""){
				var params={
					country:$(".INF[d='country']").val(),
					city:$(".INF[d='city']").val(),
					shippingaddress1:$(".INF[d='shippingaddress1']").val(),
					shippingaddress2:$(".INF[d='shippingaddress2']").val(),
					zip:$(".INF[d='zip']").val(),
					method:$(".METHOD").val(),
				}
				if($(".METHOD").val()=="1"){
					var d1=$.dialog({
						title:"",
						columnClass:"small",
						content:"<div class='w-100 text-center'>იტვირთება...</div>",
						closeIcon: false,
						lazyOpen: true,
					});		
					d1.open();
					if(parseFloat($(".TSUM").html().replace(/,/g, ''))<=5000){
						func("tbcpaynew",params,function(R){
							try {
								var obj=JSON.parse(R);							   
								params["paymentid"]=obj.payid;
								func("addorder",params,function(R){
									 location.href="/"+$("body").attr("lang")+"/profile";
								});
								 location.href=obj.link;
								//alert(R); 
							} catch (e) {
								return false;
							}
						});	
					}else{
						snack("ბარათით გადახდისლიმიტია 5000₾");
						d1.close();
					}					

				}else if($(".METHOD").val()=="9"){
					var d1=$.dialog({
						title:"",
						columnClass:"small",
						content:"<div class='w-100 text-center'>იტვირთება...</div>",
						closeIcon: false,
					});	
					func("tbcganvadeba",params,function(R){
						 var k=R;
						func("addorder",params,function(R){
							location.href=k;
							// location.href=$("body").attr("lang")+"/profile";
						});
					});
				}else{
					var d1=$.dialog({
						title:"",
						columnClass:"small",
						content:"<div class='w-100 text-center'>იტვირთება...</div>",
						closeIcon: false,
						lazyOpen: true,
					});		
					d1.open();
					func("addorder",params,function(R){
						 location.href="/"+$("body").attr("lang")+"/profile";
					});					
				}
			}else{
				snack("აირჩიეთ მეთოდი");
			}			
		}else{
			snack("გაიარეთ ავტორიზაცია");
			setTimeout(function(){location.href="/"+$("body").attr("lang")+"/signin/?backurl="+location.href;},1500);
		}

	});
	$(document).on("click",".js-dropdown",function(){
		$(this).toggleClass("open");
	});
	$(document).on("click",".DELCART",function(){
		var item=this;
		$(item).parent().parent().remove();
		CART();	
		// try{
			// cart=JSON.parse(getCookie("cart"));		
		// } catch (e) {
			// cart=[];
		// }
		// $.confirm({
			// title: '',
			// content: 'ნამდვილად გსურთ პროდუქტის წაშლა ?',
			// buttons: {
				// "დიახ": function () {
					
					
				// },
				// "არა": function () {
					
				// }
			// }
		// });	
	});
	$(document).on("click",".MINU",function(){
		// $(".RAO").val(Number($(".RAO").val())-1);
		d=$(this).attr("d");
		if(Number($(this).next().val())<1){
			$(this).next().val(1);
		}
		try{
			$(this).next().val(Number($(this).next().val())-1);
			if(Number($(this).next().val())<1){
				$(this).next().val(1);
			}		
			CART();			
		}catch(e){}
	});
	$(document).on("click",".PLIU2",function(){
		$(this).prev().val(Number($(this).prev().val())+1);
	});
	$(document).on("click",".PLIU",function(){
		// $(".RAO").val(Number($(".RAO").val())+1);
		d=$(this).attr("d");
		try{
			$(this).prev().val(Number($(this).prev().val())+1);	
			CART();	 
		}catch(e){}		
	});
	$(document).on("click",".TOCHECK",function(){
		if($(this).attr("uid")!=""){
			
		}else{
			location.href="signin?backurl="+location.href;
		}
	});
	$(document).on("click",".ADDCART",function(){
		if($(".SELCON.SELECTED").length>0){
			if(Number($(".TOTAL").html())>499.99){
				var v=Number($(".cart-number-circle").html());

				var pro=this;
				var rao=1;
				if($(pro).attr("n")=="1"){
					rao=1;
				}else{
					rao=Number($(".RAO").val());
				}
				$(".cart-number-circle").html(v+rao);
				$(".CR1").html(Number($(".CR1").html())+rao);	
				try{
					cart=JSON.parse(getCookie("cart"));		
				} catch (e) {
					cart=[];
				}
		var product=findincart($(pro).attr("d"),$(pro).attr("oid"));
		console.log(product);
		var nopid=1;
		if(product!=""&&nopid==0){
			var rao=Number(findincart($(pro).attr("d"),$(pro).attr("oid")).quantity)+rao;
			console.log(rao);
			if(isNaN(rao)){
				rao=1;
			}
			// var info={
				// pid:$(pro).attr("d"),
				// quantity:rao,
				// price:product.price,
				// option:product.option	,			
				// color:product.color,				
				// size:product.size,				
				// complect:product.complect				
			// };

			for(var item in cart) {
				if(cart[item].pid==$(pro).attr("d")&&cart[item].option==$(pro).attr("oid")){
					cart[item].quantity=rao;
				}
			}		
			 // console.log(cart);
			cart=JSON.stringify(cart);
			setCookie("cart",cart,7);		
		}else{
			var info={
				pid:$(pro).attr("d"),
				quantity:$("#select-result").html(),
				dates:$(".DATES").val(),
				price:$(pro).attr("price"),
				option:$(".SELCON.SELECTED").attr("d")				
			};
			cart.push(info);
			cart=JSON.stringify(cart);
			setCookie("cart",cart,7);
			 console.log(cart);	
		}

							

				
				var unique_id = $.gritter.add({
					title: '<a style="color:#fff" href="/'+$("body").attr("lang")+'/cart">'+$(".DATES").val()+"</a>",
					text: '<a style="color:#fff" href="/'+$("body").attr("lang")+'/cart">ფასი: '+$(this).attr("price")+"₾</a>",
					image: $(pro).attr("thumb"),
					fade_in_speed: 100, // how fast notifications fade in (string or int)
					fade_out_speed: 100, // how fast the notices fade out
					time: 3000,
					class_name: 'my-sticky-class'
				});			
			}else{
				snack("მინიმალური შეკვეთა 500₾");
			}			
		}else{
			snack("აირჩიეთ კონსრუქცია");
		}	



	});
function findincart(pid="",oid=""){ 
	var k="";
	try{
		cart=JSON.parse(getCookie("cart"));		
	} catch (e) {
		cart=[];
	}
	
	for(var item in cart) {
		if(cart[item].pid==pid&&cart[item].option==oid){			
			k=cart[item];
		}
	}
	return k;
}
	$(document).on("click",".REG",function(){
		if(
			$(".R1").val()!="" &&
			$(".R2").val()!="" &&
			$(".R3").val() &&
			$(".R3").val().indexOf("@")>=0 &&
			$(".R3").val().indexOf(".")>=0 &&
			$(".R4").val()!="" &&
			$(".R5").val()!=""
		){
			var params = {
				firstname: $(".R1").val(), 
				lastname:$(".R2").val(),
				email: $(".R3").val(), 
				password:$(".R4").val(),
				birthdate:$(".R5").val(),
				smscode:$(".SMSCODE").val(),
			};
			func("register",params);			
		}else{
			$.alert({
				title: 'Alert!',
				content: "Please fill out the form correctly",
			});
		}

	});
	$(document).on("click",".ATC",function(){
		var params = {
			productid: $(this).attr("d"), 
			quantity:$(".qty").val()
		};		
		func("addtocard",params);
	});
	$(document).on("click",".LGT",function(){
		func("logout");
	});

	
});


$(document).ready(function(){
		$('[ttoggle="tooltip"]').tooltip();
});

function func2(a,b,callback=function(){}){
    var FD = new FormData();
    FD.append('fname',a);
		for (var key in b) {
			if(b!=undefined){
				FD.append(key,b[key]);
			}
		}
	$.ajax({
		type: "POST",
		cache: false,
		contentType: false,
		processData: false,
		url: "/func/func.php",
		data: FD,
		success: function (R) {
			if (R) {
				callback(R);
			}
			if(a=="getlang"){
					 $W = JSON.parse(R);
				}
		}
	});
}
function func(a,b,callback=(function(){})){
    var FD = new FormData();
    FD.append('function',a);
		for (var key in b) {
			if(b!=undefined){
				FD.append(key,b[key]);			
			}
			// console.log(a[key]);
		}
	$.ajax({  
		type: "POST", 
		cache: false,
		contentType: false,
		processData: false, 
		url: "/func/func.php",
		data: FD,
		success: function (R) {
			if (R) {
				if(a=="logout"){
					location.href="/";
				}
				if(a=="recovery"){
					if(R==1){
						snack("პაროლის აღდგენის ლინკი გადმოგეგზავნათ");
					}else{
						snack("მომხმარებელი ვერ მოიძებნა");
					}
				}
				if(a=="changepassword"){
					if(R==1){
						snack("პაროლი წარმატებით შეიცვალა");
						setTimeout(function(){location.href="/";},2500);
					}else{
						snack("თოქენი გამოყენებულია");
					}
				}
				if(a=="suggestion"){
                    if(R!="__1")
					{
					RR=R.split("__")
					$(".suggest").html(RR[0]);
					}
					else
					{
						$(".suggest").html("");
					}
				}
				if(a=="login"){
					if(R==1){
						const queryString = window.location.search;
						const urlParams = new URLSearchParams(queryString);
						const back = urlParams.get('backurl')
						if(back!=null){
							try{
								
								location.href=back;
							}catch(e){
								location.href="/"+$("body").attr("lang")+"/profile";
							}								
						}else{
							location.href="/"+$("body").attr("lang")+"/profile";
						}
					
					}else{
						snack(R);
					}
				}
				if(a=="getitems"){
					$(R).insertBefore(".BEFO");
				}
				// if(a=="addorder"){
					
					// if(b.method=="1"){
						// // var arr=R.split(',');
						// // location.href=encodeURI("https://proteller.ge/wallet/?page=merchantbog&id=26&amount="+$(".TSUM").html()+"&order="+arr[0]+"&fullname="+arr[1]+"&ident="+arr[2]);	
					// }else{
						// location.href="/profile";
					// }
				// }
				if(a=="register"){
					if(R==1){
						snack("წარმატებით დარეგისტრირდით");
						location.href="/";
					}else{
						snack(R);
					}
				}
			}
			callback(R);
		}
	});
}
function wr(){
	location.reload();
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function sum( obj ) {
  var sum = 0;
  for( var el in obj ) {
    if( obj.hasOwnProperty( el ) ) {
      sum += parseFloat( obj[el] );
    }
  }
  return sum;
}
function MF1(x) {
    x.classList.toggle("change");
	if($(x).hasClass("change")){
		$(".mobm").show(); 
	}else{
		$(".mobm").hide(); 
	}
}
function snack(a="",b="show") {

$("#snackbar").html(a);
  $("#snackbar").attr("class",b);

  setTimeout(function(){ $("#snackbar").attr("class","");}, 3000);
}