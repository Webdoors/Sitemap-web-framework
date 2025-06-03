$(function(){
	$(document).on("click",".ADPROMO",function() {
		var c=0;
		
		var qn=1;
		var tp=$(".chpromo").val();
		
		//alert(c);
		//alert($(".ADSL").val());
		var user = $(".usrlst").val();
		user=user.split("---");
		
		
		func("addpromo",
		
			$(".ADPRC").val(),
		
			c,
			
			user[2],
			qn,
			tp
					
		);		
		return 0;
	} );
	$(document).on("click",".acpromo",function(){
				var k=0;
				if($(this).is(":checked")){
					k=1;
				}
				var d=$(this).attr("d");
					bootbox.confirm({
						message: "Are you sure?",
						buttons: {
							confirm: {
								label: 'Yes',
								className: 'btn-success'
							},
							cancel: {
								label: 'No',
								className: 'btn-danger'
							}
						},
						callback: function (result) {
							if(result){
								func("promoactive",d,k);
							}
						}
					});
			});
	$(document).on("keyup",".usrlst",function() {
				func("getuser",$(this).val());
				//alert($(this).val());
	});
	
	$(document).on("click",".plist",function() {
				 
				
				$(".usrlst").val($(this).attr("n") + "---"+$(this).attr("pp")+"---"+$(this).attr("d"));
				
				func("getuser");
			});
	if($('.COMBO').length>0){
		$('.COMBO').combobox();	
	}
	$(document).on("click",".ADDITEM",function(e) {
		func2("additem",{table:$(".ITEM").attr("t"),column:$(".ITEM").attr("n"),value:$(".ITEM").val()},function(R){
			wr();
		})
	});
	$(document).on("click",".COPY",function(){
		func2("copyoption",{a:$(this).attr("d")},function(){
			wr();
		});	
	});
	$(document).on("click",".PROPOP",function(e) {
		$("body").append("<div class='PROBOX dragme text-right' ><i class='fa fa-window-close PROCLO CP'></i><iframe class='w-100 h-100' src='?page=product&hidemenu=1&id="+$(this).attr("d")+"'></iframe></div>");
		$( ".dragme" ).draggable();
	});
	$(document).on("click",".SER2",function(e) {
		window.location.href="?page=users&key="+$(".SERKEY2").val();
	});
	$(document).on("click",".GETDET",function(e) {
		func2("getdetails",{orderid:$(this).attr("d")},function(R){
			bootbox.dialog({
				message:R,
				size:"large"
			});		
		});
	});
	$(document).on("click",".delord",function(){
		  var d=$(this).attr('d');
		  //alert(d);
				bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func2("orderdelete",{a:d},function(R){
							wr();
						});
						
					}
				}
			});
	});
	$(document).on("click",".delorders",function(e) {
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					
					$(".SUS").each(function(){
						if($(this).is(":checked")){
							func("orderdelete",$(this).attr("d"));
						}
					});
				}
			}
		});		
	});
	$(document).on("click",".SER3",function(e) {
		window.location.href="?page=products&key="+$(".SERKEY3").val();
	});
	$(document).on("keyup",".SERKEY3",function(e) {
		
		if(e.which==13){
			$(".SER3").trigger("click");
		}
	});
	$(document).on("click",".SER4",function(e) {
		window.location.href="?page=orders&key="+$(".SERKEY4").val();
	});
	$(document).on("keyup",".SERKEY4",function(e) {
		
		if(e.which==13){
			$(".SER4").trigger("click");
		}
	});
	$(document).on("click",".PROCLO",function(e) {
		$(".PROBOX").remove();
	});
	$(document).on("click",".NEWPRO",function(){
		func2("addproduct",{},function(R){
			location.href="?page=product&id="+R;
		});	
	});
	$(document).on("click",".notf",function(){
		window.location.href="?page=alerts";  
		});	
	$(document).on("keyup",".CHECKUSER",function(){
		func2("checkuser",{user:$(".USR").val(),pass:$(".PAS").val()},function(R){
			if(R=="1"){
				$(".smscode").show();
			}
			else{
				$(".smscode").hide();
			}
		});	
	});
	$(document).on("click",".CROPPER",function(){
		func2("getcropper",{a:$(this).attr("d")},function(R){
			var jc=$.dialog({
				title: 'Crop Image',
				boxWidth: '80%',
				columnClass: 'col-md-8 col-md-offset-8 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',
				useBootstrap: false,
				lazyOpen: true,
				content:R
			});	
			jc.open();						
		});
	});
	$(document).on("click",".SAVESET",function(e) {
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
				
					$(".UPTNO").each(function(){
		var val=$(this).val();
		var k=0;
		if($(this).attr("type")=="checkbox"){
			if($(this).is(":checked")){
				k=1;
			}
			val=k;
		}	
		if($(this).attr("tiny")=="1"){
			val=tinyMCE.get($(this).attr("id")).getContent();
		}
		// val=val.toString().replaceAll("frame", "#####");
		// val=val.toString().replaceAll("src", "***");
			
			func("updatetable",$(this).attr("t"),$(this).attr("n"),val,$(this).attr("d"));

						
					});
							snack("Saved","show");
				}
			}
		});				
	});



$(document).on("click",".SAVEROLE",function(){
	var d=$(this).attr("d");
	bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){	
					var arr=[];
					var params={
						rolename:$(".ROLENAME").val(),
						roleid:d
					}	
					$(".PERMS").each(function(){
						if($(this).is(":checked")){
							arr.push($(this).attr("d"));							
						}
					});
					params["perms"]=arr.join();
					func2("saverole",params,function(a,R){
						wr();
					});
				}
			}
	});
});

$(document).on("click",".SAVEUSER",function(){
	var d=$(this).attr("uid");
	bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){	
					var arr=[];
					var params={
						firstname:$(".FIRSTNAME").val(),
						lastname:$(".LASTNAME").val(),
						email:$(".EMAIL").val(),
						tel:$(".TEL").val(),
						password:$(".PASSWORD").val(),
						roleid:$(".ROLE").val(),
						uid:d
					}	
					func2("saveuser",params,function(a,R){
						wr();
					});
				}
			}
	});
});
$(document).on("click",".SAVEPERMS",function(){
	var d=$(this).attr("uid");
	bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){	
					var arr=[];
					var params={
						uid:d
					}	
					$(".PERMS").each(function(){
						if($(this).is(":checked")){
							arr.push($(this).attr("permid"));							
						}
					});
					params["perms"]=arr.join();	
					func2("saveperms",params,function(a,R){
						 wr();
					});
				}
			}
	});
});
	 $(document).on("change",".chpldps",function(){
	
		var d=$(this).attr("d");
		var t=$(this).attr("t");
		var v=$(this).val();
		    //alert (v);
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("changepos",d,v,t);					
					}else{
						wr();
					}
				}
			});	
	});
	
	$(document).on("click",".ADDOPT",function(){
		func2("addoption",{pid:$(this).attr("d")},function(){
			wr();
		});
	});
	
		
	$(document).on("keyup",".YDA1",function(){
			
			 var d= $(this).attr('d');
			 var t= $(this).attr('t');
			 var n= $(this).attr('n');
			 var nm= $(this).val();
			 var ln= $(this).attr('ln');
			 var ln='';
			
			
				
						func("updatetable",t,n,nm,d,ln);
						location.reload();
			
	});
	
		$(document).on("click", ".SAVESERV", function (e) {
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if (result) {

					$(".UPTNO").each(function () {
						var val = $(this).val();
						var k = 0;
						if ($(this).attr("type") == "checkbox") {
							if ($(this).is(":checked")) {
								k = 1;
							}
							val = k;
						}
						if ($(this).attr("tiny") == 1) {
							val = tinyMCE.get($(this).attr("id")).getContent();
						}
						func("updatetable", $(this).attr("t"), $(this).attr("n"), val, $(this).attr("d"), $(this).attr("lang"));


					});

					snack("შენახულია", "show");
				}
			}
		});
	});
	
	
	
	
		$(document).on("change",".chslps",function(){
	
		var d=$(this).attr("d");
		var v=$(this).val();
		    //alert (v);
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("changeslidepos",d,v);					
					}else{
						wr();
					}
				}
			});	
	});
	
	
	$(document).on("click",".GETSMS",function(){
		var d=$(this).attr("d");
		if(d!=1)
		{
	if($(".A5").val()!=""){
		func("getsms",{a:$(".A5").val()});	
		snack("Sms კოდი გადმოგზავნილია");
	}else{
		snack("მიუთითეთ ტელეფონის ნომერი");
	}
		}
		else
		{
			var usr=$(".USR").val();
			var pass=$(".PAS").val();
			    if(usr!=''&&pass!='')
			{
		           func("getsms",usr,pass,d);	
		           snack("Sms კოდი გადმოგზავნილია");
	        }          
		         else{
		            snack("შეავსეთ ველები!"); 
	      }
		}
});
	
	$(document).on("click",".SAVECRO",function(){
		func2("savecropped",{a:$(".CROPPED").attr("src"),b:$(this).attr("d")},function(R){
			wr();
		});
	});
	$(document).on("click",".GETPROCO",function(){
		if($(".FORSLUG[d='"+$(".PROCO").val()+"']").length>0){
			snack("უკვე დამატებულია");
		}else{ 
			func2("getproduct",{a:$(".PROCO").val(),b:$(".gid").val()},function(R){
				wr();
			});					
		}

	});
	$(document).on("click",".GETPROCO2",function(){
		if($(".FORSLUG[d='"+$(".PROCO2").val()+"']").length>0){
			snack("უკვე დამატებულია");
		}else{ 
			func2("getproduct2",{a:$(".PROCO2").val(),b:$(".SAVPRO").attr("d")},function(R){
				wr();
			});					
		}

	});
			$(document).on("click",".REMGROUP",function(){
				var d=$(this).attr("d");
				var gid=$(this).attr("gid");
				var el=this;
				bootbox.confirm({
					message: "Are you sure?",
					size:"small",
					buttons: {
						confirm: {
							label: 'Yes',
							className: 'btn-success'
						},
						cancel: {
							label: 'No',
							className: 'btn-danger'
						}
					},
					callback: function (result) {
						if(result){
							$(el).parent().parent().remove();
							func2("removegroup",{a:d,b:gid},function(R){
								wr();
							});
						}
					}
				});
			});
	$(document).on("click",".SER3",function(e) {
		window.location.href="?page=products&key="+$(".SERKEY3").val();
	});
	$(document).on("change input",".CITY",function(e) {
		$(".REGION").val($(" option:selected",this).attr("d"));
	});
	$(document).on("click",".FALL",function(e) {
		if($(this).is(":checked")){
			$(this).parent().parent().find(".FLIST").prop("checked",true);
		}else{
			$(this).parent().parent().find(".FLIST").prop("checked",false);
		}
	});
	$(document).on("change",".REL",function(){
		$(this).trigger("blur");
		setTimeout(function(){wr();},500);
	});
	$(document).on("click",".ADDIMG",function(e) {
		var params={
			img:$(".PIMG").val(),
			productid:$(this).attr("d")
		}
		func2("addimg",params,function(R){
			$(".IMGES").append(R);
		});
	});
	$(document).on("click",".ADDFILE",function(e) {
		var params={
			file:$(".PFILE").val(),
			productid:$(this).attr("d")
		}
		func2("addfile",params,function(R){
			$(".FELAS").append(R);
		});
	});

	$(document).on("keyup",".SERKEY3",function(e) { 
		
		if(e.which==13){
			$(".SER3").trigger("click");
		}
	});	
	$(document).on("click",".UPT2",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		func("updatetable",$(this).attr("t"),$(this).attr("n"),k,$(this).attr("d"));
		snack("შენახულია","show");
	});
	$(document).on("change keyup",".UPT",function(){
		console.log($(this).val());
		var k=$(this).val();	
        var ln='';		
		if($(this).attr("type")=="checkbox"||$(this).attr("type")=="radio"){
			k=0;
			if($(this).is(":checked")){
				k=1;
			}
	
		}
		
			 if($(this).attr('ln')!=null)
		 {
			// alert($(this).attr('ln'));
			 ln=$(this).attr('ln');
		 }
		console.log(this.checked);
		func("updatetable",$(this).attr("t"),$(this).attr("n"),k,$(this).attr("d"),$(this).attr("ln"),Number(this.checked));
		snack("შენახულია","show");
	});
		$(document).on("change keyup",".UPT3",function(){
		var va=$(this).val();
		c=3;
		l='';
		try{
			var res = va;
			func("updatetable",$(this).attr("t"),$(this).attr("n"),res,$(this).attr("d"),l,c);
			snack("შენახულია","show");
		}catch(e){

		}
	});
	$(document).on("change keyup",".UPT4",function(){
		var va=$(this).val();
		try{
			var res = va.join(",");
			func("updatetable",$(this).attr("t"),$(this).attr("n"),res,$(this).attr("d"));
			snack("შენახულია","show");	
		}catch(e){

		}
	});
	$(document).click(function(e) 
	{
		var container1 = $(".FILTER");
		var container2 = $(".FILT");

		// if the target of the click isn't the container nor a descendant of the container
		if (!container1.is(e.target) && container1.has(e.target).length === 0&&!container2.is(e.target) && container2.has(e.target).length === 0) 
		{
			container1.parent().removeClass("ACT1");
		}
	});
	$(document).on("click",".FILTBUT",function(){
		var fn1=$(this).parent().parent().parent().find(".FROM1").attr("n");
		var f1=$(this).parent().parent().parent().find(".FROM1").val();
		var tn1=$(this).parent().parent().parent().find(".TO1").attr("n");
		var t1=$(this).parent().parent().parent().find(".TO1").val();

var url = new URL(location.href);
url.searchParams.set(fn1,f1);		
url.searchParams.set(tn1,t1);				
location.href=url;
	});
	$(document).on("input",".FILTKEY",function(){
		var key=$(this).val().toLowerCase();
		$(this).parent().parent().parent().find(".FLAB").each(function(){
			// console.log($(this).html().toLowerCase().indexOf(key));
			if($(this).html().toLowerCase().indexOf(key)<0){
				$(this).parent().hide();
			}else{
				$(this).parent().show();
			}
		});		
	});
	$(document).on("click",".FILTBUT2",function(){
		var ar=[];
		var n="";
		$(this).parent().parent().parent().find(".FLIST").each(function(){
			n=$(this).attr("n");
			if($(this).is(":checked")){
				ar.push($(this).val());
			}
		});
	var par=ar.join();
var url = new URL(location.href);
url.searchParams.set(n,par);					
location.href=url;
	});
	$(document).on("click",".FILT",function(){
		$(".FILT").parent().removeClass("ACT1");
		$(this).parent().addClass("ACT1");
	});
	$(document).on("click",".AFI",function(){
		func("addtable","filters","namege",$(".ADN").val());
	});
	$(document).on("click",".ADF",function(){
		if(typeof dia1.modal==="function"){
			dia1.modal("hide");
		}		
		func("addfilter",$(".ANF").val(),$(this).attr("d"));
	});
	$(document).on("click",".AFG",function(){
		if(typeof dia1.modal==="function"){
			dia1.modal("hide");
		}		
		func("addfgroup",$(".SFL").val(),$(this).attr("d"));
	});
	$(document).on("click",".UCH",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		func("updatetable",$(this).attr("t"),$(this).attr("n"),k,$(this).attr("d"));
		snack("შენახულია");
	});
	$(document).on("click",".UPF",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		func("updatefproduct",$(this).attr("d"),k,$(this).attr("pid"));
		var fils=[];
		$(".UPF").each(function(){
			if($(this).is(":checked")){
				fils.push($(this).attr("d"));			
			}
		});
		let filters = fils.join();
		func("updatetable","products","filters",filters,$(this).attr("pid"));
		snack("შენახულია");
	});
	$(document).on("click",".GFI",function(){
		func("getfilter",$(this).attr("d"));
	});
	$(document).on("click",".FIL",function(){
		func("getaddfilter",$(this).attr("d"));
	});
	$(document).on("click",".ATB",function(){
		func("addtable",$(this).attr("t"),"nameen",$(".ADN").val());
	});
	$(document).on("click",".APA",function(){
		func2("addlanguage",{a:"languages",b:"name",c:$(".ADN").val()},function(R){
			snack("დამატებულია");
			wr();
		});
	});
	$(document).on("click",".DELLANG",function(){
		var d=$(this).attr("d");
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func2("deletelanguage",{a:d},function(R){
						snack("წაშლილია");
						wr();
					});					
				}
			}
		});

	});
	$(document).on("click",".ADR",function(){
		func("addtable",$(this).attr("t"),$(this).attr("n"),$(".ADN").val());
	});
	$(document).on("click",".SAVPRO",function(){
		
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					var params={
						productid:$(".SAVPRO").attr("d"),	
						DESCRIPTION:tinyMCE.get('ADTGE').getContent()
					}
					$(".INP").each(function(){
						params[$(this).attr("n")]=$(this).val();
					});
					$(".INP2").each(function(){
						var va=$(this).val();
						try{
							var res = va.join(",");
							params[$(this).attr("n")]=res;
						}catch(e){
							
						}					
					});
	
					func2("saveproduct",params,function(){
						snack("შენახულია");
					});
				}
			}
		});

	});
	$(document).on("click",".SEA",function(e) {
		window.location.href="?key="+$(".SERC").val()+"&store="+$(".STO").val()+"&brand="+$(".BRN").val();
	});
	$(document).on("click",".TBCGAN",function(e) {
		func("sendgan","tbc",$(this).attr("d"));
		bootbox.dialog({
			message:"გადაიგზავნა!!!"
		});
	});
	$(document).on("click",".CREGAN",function(e) {
		func("sendgan","credo",$(this).attr("d"));
		bootbox.dialog({
			message:"გადაიგზავნა!!!"
		});
	});
	$(document).on("click",".CRYGAN",function(e) {
		func("sendgan","crystal",$(this).attr("d"));
		bootbox.dialog({
			message:"გადაიგზავნა!!!"
		});
	});
	// bootbox.dialog({
		// message:"თქვენ გაქვთ 1 გადაუხდელი ინვოისი!"
	// });
	$(document).on("keyup",".SALESP",function(e) {
		func("updatesalesprice",$(this).val(),$(this).attr("d"));
	});
	$(document).on("click",".SELLIT",function(e) {
		e.stopPropagation();
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					$(".ITMS").each(function(){
						var k=0;
						if($(this).find(".SALCHE").is(":checked")){
							k=1;
						}
						func("seller",$(".METH").val(),$(".SELLER").val(),$(".SALAMO").val(),$(".PLACE").val(),$(this).attr("salesprice"),$(this).attr("takeprice"),$(this).attr("d"),k,$(this).find(".SALPRI").val());						
					});
				}
			}
		});
	});
	$(document).on("click",".SEE",function(e) {
		window.location.href="?page=journal&opertype="+$(".SELOPE").val()+"&key="+$(".SERK").val();
	});
	$(document).on("click",".SEEP",function(e) {
		window.location.href="?page=productprices&key="+encodeURIComponent($(".SERKK").val());
	});
	
	$(document).on("keyup",".SERK",function(e) {
		if(e.which==13){
			$(".SEE").trigger("click");
		}
	});
	$(document).on("change",".SALAMO",function(e) {
		var total=parseFloat($(".TOTAL").val());
		total=total*parseFloat($(".SALAMO").val());
		$(".TOTAL").val(total.toFixed(2));
	});
	$(document).on("change",".SELOPE",function(e) {
		window.location.href="?page=journal&opertype="+$(this).val()+"&key="+$(".SERK").val();
	});
	if($(".CASHIER").length>0){
		$(".CASHIER").focus();
	}
	$(document).on("click",".SALCHE",function(e) {
		if($(this).is(":checked")){
			$(this).parent().next().find(".SALPRI").prop("disabled",false);
		}else{
			$(this).parent().next().find(".SALPRI").prop("disabled",true);			
		}
	});
	$(document).on("keyup",".CASHIER",function(e) {
		if(e.which==13){
			e.stopPropagation();
			func("getproductbybarcode",$(this).val().trim());		
			$(this).val("");			
		}
	});
	$(document).on("keyup",".SEZK",function(e) {
		if(e.which==13){
			$(".SEE").trigger("click");
		}
	});
	$(document).on("keyup",".SER",function(e) {
		if(e.which==13){
			$(".SEA").trigger("click");
		}
	});
	$(document).on("keyup",".NAM",function(e) {
		if($(this).val().length>3){
			func("getnames",$(this).val());			
		}else{
			snack("მინიმუმ 4 სიმბოლო");
		}

	});
	$(document).on("keyup",".NAM1",function(e) {
		if($(this).val().length>3){
			func("getnames1",$(this).val(),$(this).attr("oid"));			
		}else{
			snack("მინიმუმ 4 სიმბოლო");
		}

	});
	$(document).on("change",".UPDPAY",function(){
		func2("updatepayed",{a:$(this).attr("d"),b:$(this).val()},function(R){
			wr();
		});
		snack("შენახულია","show");
	});
	$(document).on("change",".UPDMET",function(){
		func("updatemethod",$(this).attr("d"),$(this).val());
		snack("შენახულია","show");
	});
	$(document).on("change",".UPDSTA",function(){
		func("updatestatus",$(this).attr("d"),$(this).val());
		snack("შენახულია","show");
	});
	$(document).on("click",".IPAY",function(){
		var params={
			order_id:$(this).attr("d")
		}
		func2("ipay",params,function(R){
			bootbox.dialog({
				message:R
			});
		});
		snack("გთხოვთ დაელოდოთ...");
	});
	$(document).on("click",".GNA1",function(e) {
		func("getnames2",$(this).attr("d"),$(this).parent().attr("oid"));			
	});
	$(document).on("click",".SER",function(){
		location.href="/admin/?page="+$(".PAGE").val()+"&key="+$(".KEY").val();
	});
	$(document).on("click",".STORR",function(){
		location.href="/admin/func/edashboard.php?store="+$(".strr").val()+"&method="+$(".smm").val();
	});
	$(document).on("click",".EXPORD",function(){
	location.href="/admin/func/eorders.php?from="+$('.in1').val()+"&to="+$('.in2').val()+"&store="+$(".exstore").val()+"&method="+$(".exmtd").val();
	});
	
	$(document).on("click",".DBASE",function(){
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func("deletebase");
				}
			}
		});
	});
	$(document).on("click",".CLN",function(){
		location.href="/admin/?page="+$(".PAGE").val()+"";
	});
	$(document).on("keyup",".KEY",function(e){
		if(e.which==13){
			$(".SER").trigger("click");
		}
	});
	$(document).on("click",".REMITE",function(e) {
		$(".OITEM[d='"+$(this).attr("d")+"']").remove();
	});
	$(document).on("click",".GNA",function(e) {
		$(".NAM").val("");
		$(".TPR").val(parseFloat($(this).find(".N2").html()));
		$(".MOM").val($(this).find(".N3").val());
		$(".barc").val($(this).find(".N4").html());
		$(".SUG").html("");
		if($(".OITEM[d='"+$(this).find(".N1").attr("d")+"']").length>0){
			$(".OITEM[d='"+$(this).find(".N1").attr("d")+"']").find(".QUA").val(parseInt($(".OITEM[d='"+$(this).find(".N1").attr("d")+"']").find(".QUA").val())+1);
		}else{
			$(".OITEMS").append("<div class='row mt-2 OITEM' takeprice='"+$(this).find(".N1").attr("price")+"' salesprice='"+$(this).find(".N1").attr("salesprice")+"' d='"+$(this).find(".N1").attr("d")+"' barcode='"+$(this).find(".N4").html()+"'><div class='col-sm-8 p-0 ' >"+$(this).find(".N1").html()+"</div><div class='col-sm-2 p-0'><input class='form-control QUA p-2' type='number' min='1' value='1' d='"+$(this).find(".N1").attr("d")+"' placeholder='Qnty' /></div><div class='col-sm-2 p-0'><button class='btn btn-primary REMITE' d='"+$(this).find(".N1").attr("d")+"'><i class='fa fa-minus'></i></div></div>");			
		}

	});
	$(document).on("click",".GNA1",function(e) {
		$(".NAM1").val("");
		$(".TPR").val(parseFloat($(this).find(".N2").html()));
		$(".MOM").val($(this).find(".N3").val());
		$(".barc").val($(this).find(".N4").html());
		$(".SUG1").html("");
		if($(".OITEM[d='"+$(this).find(".N1").attr("d")+"']").length>0){
			$(".OITEM[d='"+$(this).find(".N1").attr("d")+"']").find(".QUA").val(parseInt($(".OITEM[d='"+$(this).find(".N1").attr("d")+"']").find(".QUA").val())+1);
		}else{
			$(".OITEMS").append("<div class='row mt-2 OITEM' takeprice='"+$(this).find(".N1").attr("price")+"' salesprice='"+$(this).find(".N1").attr("salesprice")+"' d='"+$(this).find(".N1").attr("d")+"' barcode='"+$(this).find(".N4").html()+"'><div class='col-sm-8 p-0 ' >"+$(this).find(".N1").html()+"</div><div class='col-sm-2 p-0'><input class='form-control QUA p-2' type='number' min='1' value='1' d='"+$(this).find(".N1").attr("d")+"' placeholder='Qnty' /></div><div class='col-sm-2 p-0'><button class='btn btn-primary REMITE' d='"+$(this).find(".N1").attr("d")+"'><i class='fa fa-minus'></i></div></div>");			
		}

	});
	$(document).on("click",".AOR",function(e) {
		var items=[];
		$('.OITEM').each(function () {
			
			var item={
				
			}
			item["quantity"]=$(this).find(".QUA").val();			
			item["barcode"]=$(this).attr("barcode");
			item["itemid"]=$(this).attr("d");
			item["takeprice"]=$(this).attr("takeprice");
			item["salesprice"]=$(this).attr("salesprice");
			items.push(item);
		});
		var json = JSON.stringify(items);
		var p = {
			items:json
		};

		$('.A').each(function () {
			p[$(this).attr("n")]=$(this).val();
		});
		bootbox.confirm({
			message: "გსურთ ნივთის დამატება ?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
			   if(result){
					func2("addorder",p);
				}
			}
		});
	});
	$(document).on("click",".AST",function(){
		func("addstore",$(".STR").val());
	});
	$(document).on("keyup paste",".B[d='takeprice']",function(){
		var t=parseFloat($(this).val());
		var p=parseFloat($(".B[d='price'][w='"+$(this).attr("w")+"']").val());
		var pr=(p-t)/1.18;
		$(".B[d='profit'][w='"+$(this).attr("w")+"']").val(pr.toFixed(2));
	});
	$(document).on("blur",".B",function(){
		var val=$(this).val();
		if($(this).attr("d")=="comment"){
			val=$(this).text();
		}
		func("updateorders",$(this).attr("d"),$(this).val(),$(this).attr("w"));
	});
	$(document).on("click",".ABR",function(){
		func("addbrand",$(".BRN").val());
	});
	$(document).on("click",".GQU",function(){
		func("getquantity",$(this).attr("d"));
	});
	$(document).on("keyup",".CCM",function(){
		func("updatecom",$(this).attr("d"),$(this).attr("c"),$(this).val());
	});
	$(document).on("click",".GCO",function(){
		func("getcom",$(this).attr("d"),$(this).attr("c"));
	});
	$(document).on("click",".SAV",function(){
		if($(".SAW").val()!=""&&$(".OPE").val()!=""&&!isNaN(parseInt($(".RAM").val()))){
			// console.log($(".SAW").val()+" "+$(".OPE").val()+" "+!isNaN(parseInt($(".RAM").val())));
			func("saveoper",$(".SAW").val(),$(".OPE").val(),$(".COM").val(),$(".RAM").val(),$(this).attr("d"),"getquantity",$(this).attr("d"),$(".N1").val(),$(".N2").val(),$(".N3").val(),$(".N4").val());
		}else{
			bootbox.dialog({
				message:"სწორად შეავსეთ ყველა ველი!!!"
			});
		}
	});
	$(document).on("click",".MOV",function(){
		if($(".SAI").val()!=""&&$(".SAD").val()!=""&&!isNaN(parseInt($(".RAD").val()))){
			func("move",$(".SAI").val(),$(".SAD").val(),$(".RAD").val(),"getquantity",$(this).attr("d"),$(".CMM").val());
		}else{
			bootbox.dialog({
				message:"სწორად შეავსეთ ყველა ველი!!!"
			});
		}
	});
	$(document).on("click",".DEL",function(){
		var t=$(this).attr("t");
		var d=$(this).attr("d");
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func("delete",t,d);
				}
			}
		});
	});
	$(document).on("click",".DELO",function(){
		var t=$(this).attr("t");
		var d=$(this).attr("d");
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func("deleteorder",t,d);
				}
			}
		});
	});
	$(document).on("click",".CHM",function(e) {
		var th=$(this);
		var k=$(this).attr("d");
		var t=$(this).attr("t");
		var v=$(this).parent().prev().find(".RC1").val();
		var q=$(this).parent().parent().find(".QC1").html();
		var w=$(this).attr("w");
		if(!isNaN(parseInt(v))&&parseInt(v)<=parseInt(q)&&parseInt(v)>0){
			bootbox.confirm({
				size:"small",
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("writeoff",v,k,w,t);
						if((parseInt(v)-parseInt(q))==0){
							th.parent().parent().remove();
						}else{
							th.parent().parent().find(".QC1").html(parseInt(q-v));
						}
					}
				}
			});
		}
	});
	$(document).on("click",".PAD",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		func("updatepermissions",$(this).attr("d"),$(this).attr("aid"),k);
	});
	$(document).on("click",".PRM",function(){
		func("getpermissions",$(this).attr("d"));
	});
	$(document).on("change",".AC4",function(){
		if($(this).val()==1){
			$(".PGT").show();
			$(".GAL,.PST").hide();
		}
		if($(this).val()==2){
			$(".PGT,.GAL").show();
			$(".PST").hide();
		}
		if($(this).val()==3){
			$(".PST").show();
			$(".GAL,.PGT").hide();
		}
	});
	$(document).on("click",".BUT",function(){
		func("Glogin",$(".USR").val(),$(".PAS").val(),$(".SMS").val());
	});
	
	
	//save post 
	
		$(document).on("click",".SAVNS",function(){
		//alert($('#ADLRU').val());
		    var t=0;
			var a=1;
			var s=0;
		    if($('.atbilisi').is(":checked")){
			t=1;
		    }
		   if($('.asld').is(":checked")){
			s=1;
		    }
			if($('.aactv').is(":checked")){
			a=0;
		    }
	        //alert(a);
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("savenews",
							$(".SAVNS").attr("d"),
							$('#ADLGE').val(),
							tinyMCE.get('ADTGE').getContent(),
							$(".UPT").val(),
							cslug($('#ADLGE').val()),
							$(".ACA2").val(),t,s,a,
							$('#ADLENG').val(),
							$('#ADLRU').val(),
							tinyMCE.get('ADTENG').getContent(),
							tinyMCE.get('ADTRU').getContent(),
						);
					}
				}
			});
	});
	//end save post
	
	
	//language tabs

    	$(document).on("click",".ltab",function(){
		$(".enebi").hide();
	    	$(".ltab").addClass('btn-danger');
			$(".ltab").removeClass('btn-success');
		
		$(".ltab[d='"+$(this).attr("d")+"']").removeClass('btn-danger');
		$(".ltab[d='"+$(this).attr("d")+"']").addClass('btn-success');
		$(".enebi[d='"+$(this).attr("d")+"']").show();
	
	
	});
//end language tabs	
	
	
	
	
		$(document).on("click",".ADDJOU",function(){
		if($(".JOU").val()!='')
		{
		let params={
			pdf:$(".JOU").val(),
		}
		func2("addjournal",params);
		$(this).html("იტვირთება...");
		$(this).prop("disabled",true);	
		}
		else
		{
		  snack("გთხოვთ შეავსოთ ველები!");	
		}
	});
	
	
	
	/*add items*/
			$(document).on("click",".ADDITEMS",function(){
	
	       
		      var table=$(this).attr("t");
		      var id=$(this).attr("d");
              var jname='';
			  var oldval='';
	          var newval='';
			  var chtbl=0;  
	          var z=0;
	          var journal=0;
			  var fnd=''; 
			  var rl='';
			  var msg="";
			  var novalid="";
			  var WR=$(this).attr('wr')!=null?1:"";
			  var sitemap=$(this).attr('sitemap')!=null?$(this).attr('sitemap'):"";
			  var pagename=$(this).attr('pagename')!=null?$(this).attr('pagename'):"";
			  var pos=$(this).attr('pos')!=null?$(this).attr('pos'):"";
 			  var norep= ($(".itmcontainer[t='"+table+"']").attr("norep")!=undefined)?$(".itmcontainer[t='"+table+"']").attr("norep"):"";
			 // alert(norep);
			  var message= (!isNaN($(".itmcontainer[t='"+table+"']").attr("message")))?$(".itmcontainer[t='"+table+"']").attr("message"):"";
			  var conf= (!isNaN($(".itmcontainer[t='"+table+"']").attr("conf")))?1:0;
			  //alert($(".itmcontainer[t='"+table+"']").attr("conf"));
			//  alert(message);
			  var container=$(".itmcontainer[t='"+table+"']");
			 // alert($(".itmcontainer").attr('t'));
			  var slug='';
			  if($(this).attr('slug')!=null)
			  {
				  slug=$(this).attr('slug');
			  }
			  if($(this).attr('msg')!=null)
			  {
				  msg=$(this).attr("msg");
			  }
			  
			  			var itmar={};
						var itmarlang={};
						let childtable=[];
	                    let childitems={};
						i=0;
						j=0;
						$(".itmcontainer[t='"+table+"'] .UPTS").each(function () {
							
						if($(this).hasClass("novalid"))
						{
							$(this).attr("vs")==0?j++:"";
							
						}
							// alert(children[i].getAttribute("t")); 
		   if($(this).attr("t")!=null&&$(this).attr("rl")!=null)
		   { 
			 alert($());
			     fnd=childtable.includes($(this).attr("t")+"--"+rl);
			   if(fnd===false)
			   {
				   // alert(fnd);
				   // alert(fnd);
				   thstable=$(this).attr("t");
				    rl=$(this).attr("rl");
				 childtable.push(thstable+"--"+rl);
			
				  chtbl =1;
			   }
			 
				 //  alert($(this).attr("t")+"--"+$(this).attr("name"));
			   
			   
		   }
		   else
		   {
			   thstable="";
			   rl="";
			   chtbl =0;
		   }
		   
						//alert(thstable);	
						   
							var k=0;
							if($(this).attr('ln')!=''&&isNaN($(this).attr('ln')))
							{
								if ($(this).attr("tiny") == 1) { 
							    itmarlang[$(this).attr('name')+'-'+$(this).attr('ln')] = tinyMCE.get($(this).attr("id")).getContent();
						        }
								else
								{	
						         itmarlang[$(this).attr('name')+'-'+$(this).attr('ln')]=$(this).val();
								}
							}
							else
							{
								if ($(this).attr("tiny") == 1) {
							   chtbl==1?childitems[$(this).attr('name')+"^"+thstable]=tinyMCE.get($(this).attr("id")).getContent():itmar[$(this).attr('name')] = tinyMCE.get($(this).attr("id")).getContent();
								// alert(1);
						        }
								else
								{

								 		
						         if ($(this).attr("type") == "checkbox") {
							      if ($(this).is(":checked")) {
								k = 1;
							     }
							    itmar[$(this).attr('name')+"_int"]= k;
					     	}
                             else
							 {	
                                if($(this).attr('tp')!=''&&isNaN($(this).attr('tp')))
								{ 
									 chtbl==1?childitems[$(this).attr('name')+"^"+thstable+"_" + $(this).attr('tp')]=$(this).val() :itmar[$(this).attr('name')+"_" + $(this).attr('tp')]=$(this).val();
									// alert($(this).attr('tp'));
								}	
                                else
								{									
								 chtbl==1?childitems[$(this).attr('name')+"^"+thstable]=$(this).val() :itmar[$(this).attr('name')]=$(this).val();
								}
							 }
								
								
								}
							}
						i++;
				
						// if ($(this).attr("tiny") == 1) {
							// val = tinyMCE.get($(this).attr("id")).getContent();
						// }
						
                       

					});
							var jsn=JSON.stringify(itmar);
							var jsnlang=JSON.stringify(itmarlang);
							var jsnchildtable=JSON.stringify(childtable);
							var jsnchilditems=JSON.stringify(childitems);
			  
			 // alert(jsnchildtable)
			//  alert(conf);
			  
			  if(conf==1)
			  {
			    
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				
				
				
				callback: function (result) {
					if(result){
	
					// alert(jsn);
						
						//func("addslide",$('.slstx').val(),$('.sltxen').val(),$('.sltxru').val(),$('.slink').val(),$('.slimg').val(),$('.desc').val(),$('.descen').val(),$('.descru').val(),$('.CHDSL').val(),$('.slvideo').val());
						var params={
							a:jsn,
							b:jsnlang,
							c:table,
							d:id,
							e:slug,
							norepeat:norep,
							message:message,
							jsnchildtable:jsnchildtable,
							jsnchilditems:jsnchilditems,
							msg:msg,
							wr:WR,
							sitemap:sitemap,
							pagename:pagename,
							pos:pos
							
						}
						if(j==0)
						{
						func2("additems",params,function(R){
							RR=R.split("--");
						//	RR[1]=="reload"?wr():snack(RR[0]);
						});
						}
						else
						{
							snack("გთხოვთ სწორად შეავსეთ ველები!");
						}
					}else{
					//	wr();
					}
				}
			});	
		}
		else
		{
			
				var params={
							a:jsn,
							b:jsnlang,
							c:table,
							d:id,
							e:slug,
							norepeat:norep,
							message:message,
						    jsnchildtable:jsnchildtable,
							jsnchilditems:jsnchilditems,
							msg:msg,
							wr:WR,
							sitemap:sitemap,
							pagename:pagename,
							pos:pos
						}
						if(j==0)
						{
						func2("additems",params,function(R){
							RR=R.split("--");
							RR[1]=="reload"?wr():snack(RR[0]);
						});
						}
						else
						{
							snack("გთხოვთ სწორად შეავსეთ ველები!");
						}
		}
	
	});
	
	
	
	/*end add items*/

	/*language word file*/
	
	$(document).on("keyup paste",".UPDWORD",function(){
				func2("updateword",{word:$(this).attr("d"),lang:$(this).attr("lang"),value:$(this).val()},function(){
					snack("დამახსოვრებულია");
				});
			});
			$(document).on("click",".UPDLANG",function(){
				func2("updatelang",{doc:$("#YDA2").val()},function(){
					snack("დამახსოვრებულია");
				});
			});
			
			
	$(document).on("click",".REMWORD",function(){ 
				var d=$(this).attr("d");
				bootbox.confirm({
					message: "Are you sure?",
					size:"small",
					buttons: {
						confirm: {
							label: 'Yes',
							className: 'btn-success'
						},
						cancel: {
							label: 'No',
							className: 'btn-danger'
						}
					},
					callback: function (result) {
						if(result){
							func2("removeword",{ind:d},function(){
								wr();
							});
						}
					}
				});
			});
$(document).on("click",".ADDWORD",function(){
				func2("addword",{word:$(".WORD").val()},function(){
					wr();
				});
			});

			
	/*end language word file */ 
	
	
		$(document).on("change keyup",".default",function(){
		console.log($(this).val());
		var k=$(this).val();	
        var ln='';		
		if($(this).attr("type")=="checkbox"||$(this).attr("type")=="radio"){
			k=0;
			if($(this).is(":checked")){
				k=1;
			}
	
		}
		
		func("default",$(this).attr("t"),$(this).attr("n"),k,$(this).attr("d"));
		snack("შენახულია","show");
		
	});
	
	
	
	
	
		$(document).on("click",".addslr",function(){
		func("addseller",$(".sellername").val());
	});
	
	
		$(document).on("click",".addmethods",function(){
		func("addmethods",$(".methodname").val());
	});
	
			$(document).on("click",".addcur",function(){
		func("addcurier",$(".curname").val());
	});
				$(document).on("click",".delcurr",function(){
		func("delcurrier",$(this).attr("d"));
	});
	
	
		$(document).on("click",".dellslr",function(){
		func("delseller",$(this).attr("d"));
	});
	
		$(document).on("click",".dellmtds",function(){
		func("delmethods",$(this).attr("d"));
	});
	
	
	$(document).on("click",".AXL",function(){
		func("specialexcel",$("#YDA").val());
		$(this).html("Uploading...");
	});
	$(document).on("click",".FOB",function(){
		func("specialexfob",$("#YDA2").val());
		$(this).html("Uploading...");
	});
	$(document).on("click",".MON",function(){
		func("specialexmon",$("#YDA3").val());
		$(this).html("Uploading...");
	});
	$(document).on("click",".UNI",function(){
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
				func("specialuniversal",$("#YDA3").val());
				$(this).html("Uploading...");
				}
			}
		});
	});
	$(document).on("click",".DSL",function(){
		var k=$(this).attr("d");
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("delslide",k);
					}
				}
			});
	});
	$(document).on("keydown",".IN",function (e) {
	  if (e.keyCode == 13) {
		$('.BUT').click();
	  }
	});
	$(document).on("click",".RMB",function(){
		var k=$(this);
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						k.parent().remove();
						updateOutput($('#nestable').data('output', $('#nestable-output')));
					}
				}
			});
	});
	$(document).on("click",".EMB",function(){
		var k=$(this);
		var m=k.attr("d");
			bootbox.confirm({
				message: "<input class='form-control CNC' d='"+m+"' value='"+k.parent().find(".dd-handle").html()+"'/>",
				buttons: {
					confirm: {
						label: 'Save',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancel',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("updcategory",$(".CNC").val(),$(".CNC").attr("d"));
					}
				}
			});
	});
	$(document).on("click",".LGT",function(){
		func("Glogout");
	});
	$(document).on("click",".UNE",function(){
		func("addpage");
	});
	$(document).on("click",".UNO",function(){
		var AC1=0;
		if($(".AC1").is(":checked")){
			AC1=1;
		}
		var AC2=0;
		if($(".AC2").is(":checked")){
			AC2=1;
		}
		func("updatepage",AC1,AC2,$(".A1").val(),$(".A2").val(),$(".A3").val(),tinyMCE.get('ADL1').getContent(),tinyMCE.get('ADL2').getContent(),tinyMCE.get('ADL3').getContent(),$("#YDA").val(),$(".AC3").val(),$(this).attr("d"));
	});
	$(document).on("keyup",".fil7",function(){
		$(".key").attr("href","?page=pages&key="+$(".fil7").val());
	});
	
	
	
	$(document).on("click",".ACA",function(){
		
		if($(".ADN").val()!=""&&$(".ctypes").val()!=0)
		{
		func("addcat",$(".ADN").val(),$(".ctypes").val());
		}
		else
		{
			snack("სწორად შეავსეთ ველები!");
		}
	});
	$(document).on("click",".ACO",function(){
		func("addcol",$(".ADN").val());
	});
	$(document).on("click",".DCA",function(){
		func("delcat",$(this).attr("d"));
	});
	$(document).on("click",".DCO",function(){
		func("delcol",$(this).attr("d"));
	});
	$(document).on("click",".DNE",function(){
		var k=$(this).attr("d");
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("delpage",k);
					}
				}
			});
	});
	$(document).on("click",".DPR",function(){
		var k=$(this).attr("d");
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("delproduct",k);
					}
				}
			});
	});

$(document).on("click",".SNP",function(){
		   np=$(".np").val();
		   rnp=$(".rnp").val();
		   if(np==''||rnp=='')
		   {
			   alert("გთხოვთ შეავსოთ ველები! ");
		   }
		   
		   else
		   {
			   
			   if(np!=rnp)
			   {
				 alert("პაროლი არ ემთხვევა");  
			   }
			   else
			   {
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
								func("passchange",$(".np").val(),$(".rnp").val());
								
					}
				}
			});
			}
		   }

	});



	$(document).on("click",".UPL",function(){
		$(this).val("uploading...");
		$(this).prop("disabled",true);
		var fileone=document.getElementById("PIM");
		var filebig=fileone.files[0];
		func("uploadimg",$(".pid").val(),filebig);
	});
	$(document).on("click",".APR",function(){
		func("addproduct");
	});
	$(document).on("click",".SIM",function(){
		func("setmainimg",$(this).attr("d"),$(".pid").val());
	});
	$(document).on("click",".DEI",function(){
		func("delproductimg",$(this).attr("d"));
	});
	$(document).on("change keyup",".POS",function(){
		func("setposition",$(this).attr("d"),$(this).val());
	});
	$(document).on("click",".CHK",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		func("updateproduct",$(this).attr("d"),k,$(".pid").val());
	});
	$(document).on("keyup change",".len",function(){
		func("updateproduct",$(this).attr("d"),$(this).val(),$(".pid").val());
	});
	$(document).on("click",".ADC",function(){
	var k=$(this).attr("d");
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func("deladmin",k);
				}
			}
		});

	});
	$(document).on("click",".ADB",function(){
		func("addadmin",
			$(".ADN").val(),
			$(".ADL").val(),
			$(".ADA").val(),
			$(".ADP").val(),
			$(".ADT").val()
		);
	});
	$(document).on("change",".IN",function(){
		var k=$(this).val();
		if($(this).attr("type")=="checkbox"){
			var k=0;
			if($(this).is(":checked")){
				k=1;
			}
		}
		func("updatepage",k,$(".page").val(),$(this).attr("n"));
	});
});
	$(document).on("click",".ATG",function(){
		func("addgallery",$("#YDG").val(),$(".page").val());
	});
	
$(document).on('click touchend','.DELETEACCOUNT', function(e){
	var d=$(this).attr("d");
	$.confirm({
		title: "Are you sure?",
		content: ' ',
		buttons: {
			yes: {
				text:"yes",
				action: function () {
				var params={
					uid:d
				};
				func2("deleteaccount",params,function(R){
					snack("your account has been deleted");
					//setTimeout(function () { wr(); }, 3000);
				});	
				}
			},
			no: {
				text:"no",
				action: function () {

				}
			}
		}
	});		
});
	$(document).on("click",".ADP",function(){
		func("addpost",$("#YDP").val(),$(".PTI").val(),tinyMCE.get('ADLP').getContent(),$(".page").val());
	});
	$(document).on("click",".DGA",function(){
	var d=$(this).attr("d");
	var n=$(this).attr("n");
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func("delete",n,d);
				}
			}
		});
	});
function func2(a,b,callback=function(){}){
    var FD = new FormData();
    FD.append('fname',a);
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
		url: "func/func.php",
		data: FD,
		success: function (R) {
			if (R) {
				if(a=="saveproduct"){
					//wr();
				}
				// if(a=="addimg"){
					// $(".IMGS").prepend(R);
					 // // wr();
				// }
				if(a=="addorder"){
					snack("დამატებულია");
					setTimeout(function(){wr();},2000);
				}
				
				if(a=="additems"){
					//snack(R);
					
				}
				
				callback(R);
			}
		}
	});
}
function func(fn, a, b, c, d, e,f, g, h, i, j, k, l, m, n, o, p,r,s,t) {
		var FD = new FormData();
		FD.append('fname',fn);
		if(a!=undefined){
			FD.append('a',a);
		}
		if(b!=undefined){

			FD.append('b',b);
		}
		if(c!=undefined){
			FD.append('c',c);
		}
		if(d!=undefined){
			FD.append('d',d);
		}
		if(e!=undefined){
			FD.append('e',e);
		}
		if(f!=undefined){
			FD.append('f',f);
		}
		if(g!=undefined){
			FD.append('g',g);
		}
		if(h!=undefined){
			FD.append('h',h);
		}
		if(i!=undefined){
			FD.append('i',i);
		}
		if(j!=undefined){
			FD.append('j',j);
		}
		if(k!=undefined){
			FD.append('k',k);
		}
		if(l!=undefined){
			FD.append('l', l);
		}
		if(m!=undefined){
			FD.append('m', m);
		}
		if(n!=undefined){
			FD.append('n', n);
		}
		if(o!=undefined){
			FD.append('o', o);
		}
		if(p!=undefined){
			FD.append('p', p);
		}
		if(r!=undefined){
			FD.append('ar1[]', r);
		}
		if(s!=undefined){
			FD.append('ar2[]', s);
		}
		if(t!=undefined){
			FD.append('t', t);
		}
		$.ajax({
			type: "POST",
			cache: false,
			contentType: false,
			processData: false,
			url: "func/func.php",
			data: FD,
			success: function (R) {
			    if (R) {
				          
					if(fn=="addcol"||fn=="delcol"||fn=="delcat"||fn=="delproduct"||fn=="addslide"||fn=="delslide"){
						//wr();
					}
				
				    if(fn=="passchange")
					{
                      alert("პაროლი წარმატებით შეიცვალა!");
					  wr();
					}
					if(fn=="addcat"){
						wr();
					}
					if(fn=="changeslidepos"){
						wr();
					}
					if(fn=="updatepage"){
						//wr();
					}
					if(fn=="getuser"){
						$("#userlist").attr("class","show");
						$("#userlist").html(R);
					} 
					if(fn=="addpromo"){
						wr();
					}					
					if(fn=="addpage"){
						window.location.hrefn="?page=page&id="+R;
					}
					if(fn=="addgallery"){
						wr();
					}
					if(fn=="changepos"){
						wr();
					}
					if(fn=="getfilterbycat"){
						$(".LFL").html(R);
					}
					if(fn=="updatetable"){
						if(R==3)
						{
							wr();
						}
					}
					if(fn=="getfilter"){
						dia1=bootbox.dialog({
							message:R,
							size:"large",
						});
					}
					if(fn=="getaddfilter"){
						dia1=bootbox.dialog({
							message:R,
							size:"medium",
						});
					}
					if(fn=="addfilter"){
						func("getfilter",R);
					}
					if(fn=="addtable"){
						wr();
					}
					if(fn=="addfgroup"){
						func("getaddfilter",R);
					}
					if(fn=="delete"||fn=="deleteorder"){
						wr();
					}
					if(fn=="deletebase"){
						wr();
					}
					if(fn=="seller"){
						
						wr();
						alert("გაიყიდა");
					}
					if(fn=="default"){
						
						wr();
					}
					if(fn=="saveoper"){
						if(R!=100){
							if(f=="getquantity"){
								func(f,g);
							}
						}else{
							bootbox.dialog({
								size:'small',
								message:"რაოდენობა არ არის საკმარისი"
							});
							setTimeout(function(){$("body").attr("class","modal-open");},2500);
						}
					}
					if(fn=="move"){
						if(d=="getquantity"){
							func(d,e);
						}
					}
					if(fn=="specialexcel"||fn=="specialexfob"||fn=="specialexmon"||fn=="specialuniversal"){
						//wr();
					}
					if(fn=="getnames"){
						$(".SUG").html(R);
					}
					if(fn=="getnames2"){
						if($(".BOO[oid='"+b+"']").find(".UPT[n='quantity'][d='"+a+"']").length>0){
							$(".BOO[oid='"+b+"']").find(".UPT[n='quantity'][d='"+a+"']").val(parseInt($(".BOO[oid='"+b+"']").find(".UPT[n='quantity'][d='"+a+"']").val())+1);
						}else{
							$(".BOO[oid='"+b+"']").append(R);
						}
					}
					if(fn=="getnames1"){
						$(".SUG1[oid='"+b+"']").html(R);
					}
					if(fn=="addstore"){
						wr();
					}
					if(fn=="addbrand"){
						wr();
					}
					if(fn=="getproductbybarcode"){
						$("tbody").append(R);
						var total=0;
						$(".ITMPRI").each(function(){
							total=total+parseFloat($(this).html());
						});
						total=total*parseFloat($(".SALAMO").val());
						$(".TOTAL").val(total.toFixed(2));  
					}
					if(fn=="getcom"){
						bootbox.dialog({
							size:'large',
							message:R,
							onEscape: function() {
								setTimeout(function(){$("body").attr("class","modal-open");},500);
							}
						});
					}
					if(fn=="getquantity"){
						bootbox.hideAll();

						bootbox.dialog({
							size:'large',
							message:R,
							onEscape: function() {
								wr();
							}
						});
						setTimeout(function(){$("body").attr("class","modal-open");},500);
					}
					if(fn=="addpost"){
						wr();
					}
					if(fn=="addseller"){
						wr();
					}
					if(fn=="addcurier"){
						wr();
					}
					
					if(fn=="addmethods"){
						wr();
					}
						if(fn=="delseller"){
						wr();
					}
					
						if(fn=="delcurrier"){
						wr();
					}
						if(fn=="delmethods"){
						wr();
					}
					if(fn=="writeoff"){
						wr();
					}
					if(fn=="getpermissions"){
						bootbox.dialog({
							message:R
						});
					}
					if(fn=="setposition"){
						wr();
					}
					if(fn=="setmainimg"){
						wr();
					}
					if(fn=="uploadimg"){
						wr();
					}
					if(fn=="delproductimg"){
						wr();
					}
					if(fn=="updcategory"){
						wr();
					}
					if(fn=="Glogin"){
						if(R=="1"){
							wr();
						}else{
							snack("არასწორი მომხმარებელი ან პაროლი")
						}
					}
					if(fn=="Glogout"){
						wr();
					}
					if(fn=="addadmin"||fn=="deladmin"){
						wr();
					}
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {

			}
		});
}

function open_popup(url){
	var w=880;var h=570;var l=Math.floor((screen.width-w)/2);var t=Math.floor((screen.height-h)/2);var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);
}
function responsive_filemanager_callback(field_id){
	$("#"+field_id).trigger("keyup");
}
function cslug(Text)
{
    return Text
        .toLowerCase()
		.trim()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
function snack(a="",b="show") {

$("#snackbar").html(a);
  $("#snackbar").attr("class",b);

  setTimeout(function(){ $("#snackbar").attr("class","");}, 3000);
}


// input validator
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
		case "pid":
			re = /(?!=.*[a-z])(?=.*[0-9])(?=.{11,11})/;
			el.attr("maxlength",11);
		break;
	
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
	if(re.test(el.val())){
		el.attr("vs",1);
		el.css({"border-color":"red"});
	}else{
		el.attr("vs",0);
		el.css({"border-color":"#de1507"});
	}
	if(funcName=="retype"){
		if(el.val()==el.prev().val()){
			el.attr("vs",1);
			el.css({"border-color":"red"});
		}else{
			el.attr("vs",0);
			el.css({"border-color":"#de1507"});
		}
	}
	return re.test(el.val());
}
$(document).on("keyup",".eml",function(){
		validateInput("email",this);
        $(this).val($(this).val().replace(/[\u10D0-\u10F0]/g, ""));
	});

$(document).on("keyup",".pid",function(){
		validateInput("pid",this);
	});
$(document).on("keyup",".tel",function(){
		validateInput("tel",this);
        //mobilelen();
	});
function wr(){
	location.reload();	
}