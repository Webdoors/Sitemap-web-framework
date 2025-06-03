$(document).on('change','.UPL',function(){
	snack("uploading...");
    $(this).prop("disabled", true);
    var fileone = document.getElementById($(this).attr("id"));
    var filebig = fileone.files;
    func("uploadfiles", $(this).attr("d"), filebig);
});
$(document).on('click','.fa-close',function(){
	window.parent.$(".FILEMANAGER").remove();
}); 
$(document).on('click','.USEIT',function(){
	try{
		window.parent.$("#"+$(this).attr("target")).val($(this).attr("url")).trigger("keyup");		
	}catch(e){}
	window.parent.$(".FILEMANAGER").remove();
    window.parent.postMessage({
      mceAction: 'insert',
      content: $(this).attr("url")
    }, '*');
    
    // Optionally, close the file manager window
    window.close();
}); 
$(document).on('click','.SELECTALL',function(){
	$(".SELECTINP").each(function(){
		$(this).prop("checked",!$(this).is(":checked"));
	});	
});
$(document).on('click','.GETMOVE',function(){
	var pars={
	}
	func2("getfolders", pars,function(R){
		$.confirm({
			columnClass: 'col-md-7',
			title: 'Move files to selected folder?',
			content: R,
			buttons: {
				move: function () {
					var k=[];
					$(".SELECTINP").each(function(){
						if($(this).is(":checked")){
							k.push($(this).attr("file"));		
						}
					});
					var pars={
						to:$('input[name="folder"]:checked').attr('folder'),
						files:k
					}
					func2("move", pars,function(){
						snack("Files moved successfully");
						wr();
					});	
				},
				cancel: function () {

				}
			}
		});
	});	
}); 
$(document).on('click','.DELSEL',function(){
	$.confirm({
		columnClass: 'col-md-7',
		title: 'Delete selected files?',
		content:'',
		buttons: {
			Delete: function () {
				var k=[];
				$(".SELECTINP").each(function(){
					if($(this).is(":checked")){
						k.push($(this).attr("file"));		
					}
				});
				var pars={
					files:k
				}
				func2("deletefiles", pars,function(){
					snack("Files deleted successfully");
					wr();
				});	
			},
			cancel: function () {

			}
		}
	});
}); 

$(document).on('click','.COPYLINK',function(){
            var textToCopy = $(this).attr("url");
            navigator.clipboard.writeText(textToCopy).then(function() {
                snack('Link copied to clipboard');
            }).catch(function(error) {
                console.error('Error copying text: ', error);
            });
});
$(document).on('click','.RENAME',function(){
	var file=$(this).attr("file");
	var d=$(this).attr("d");
	$.confirm({
		columnClass: 'col-md-7',
		title: 'Change file name',
		content: "<input class='form-control FILERENAME' value='"+file+"' d='"+d+"' />",
		buttons: {
			save: function () {
				var pars={
					name:$(".FILERENAME").val(),
					file:$(".FILERENAME").attr("d"),
				}
				func2("filerename", pars,function(){
					snack("Saved");
					wr();
				});	
			},
			cancel: function () {

			}
		}
	});
});
$(document).on('click','.ADDFOLDER',function(){
	var pars={
		folder:$(".NEWFOLDER").val(),
		d:$(this).attr("d"),
	}
	func2("newfolder", pars,function(){
		wr();
	});	
});
$(document).on('click','.DEL',function(){
	var k=$(this).attr("d");
	$.confirm({
		title: false,
		content: 'Are you sure?',
		buttons: {
			yes: {
				keys: ['y'],
				action: function () {
					var pars={
						file:k
					}
					func2("deletefile", pars,function(){
						wr();
					});	
				}
			},
			no: {
				keys: ['N'],
				action: function () {

				}
			},
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
				}

				if(a=="additems"){

				}

				callback(R);
			}
			if(a=="getlang"){
					 $W = JSON.parse(R);


				}
		}
	});
}
function func(fn, a, b, c, d, e, g, f, h, i, j, k, l, m, n, o, p, r, s, t) {
  var FD = new FormData();
  FD.append("fname", fn);
  if (a != undefined) {
    FD.append("a", a);
  }
  if (b != undefined) {
    FD.append("b", b);
  }
  if (c != undefined) {
    FD.append("c", c);
  }
  if (d != undefined) {
    FD.append("d", d);
  }
  if (e != undefined) {
    FD.append("e", e);
  }
  if (g != undefined) {
    FD.append("g", g);
  }
  if (f != undefined) {
    FD.append("f", f);
  }
  if (h != undefined) {
    FD.append("h", h);
  }
  if (i != undefined) {
    FD.append("i", i);
  }
  if (j != undefined) {
    FD.append("j", j);
  }
  if (k != undefined) {
    FD.append("k", k);
  }
  if (l != undefined) {
    FD.append("l", l);
  }
  if (m != undefined) {
    FD.append("m", m);
  }
  if (n != undefined) {
    FD.append("n", n);
  }
  if (o != undefined) {
    FD.append("o", o);
  }
  if (p != undefined) {
    FD.append("p", p);
  }
  if (r != undefined) {
    FD.append("ar1[]", r);
  }
  if (s != undefined) {
    FD.append("ar2[]", s);
  }
  if (t != undefined) {
    FD.append("t", t);
  }
  if (
    fn == "uploadfiles"
  ) {
    var FD = new FormData();
    if (a != undefined) {
      FD.append("a", a);
    }
    if (b != undefined) {
      var ins = b.length;
      for (var x = 0; x < ins; x++) {
        console.log(b[x]);
        FD.append("b[]", b[x]);
      }
    }
  }
  FD.append("fname", fn);
  $.ajax({
    type: "POST",
    cache: false,
    contentType: false,
    processData: false,
    url: "func/func.php",
    data: FD,
    success: function (R) {
      if (R) {
		  if(fn=="uploadfiles"){
			 wr(); 
		  }
		  //wr();
	  }
	}
  });
}
function wr(){
	location.reload();
}
function snack(a="",b="show") {
$("#snackbar").html(a);
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

// Include the setCookie and getCookie functions here


