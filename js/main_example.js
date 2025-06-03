// $(document).on("click",".ADDDIR",function(){
	// var params = {
		// a: $(".D1").val(),
		// b: $(".D2").val(),
		// c: $(".D3").val(),
		// d: $(".D4").val()
	// };
	// func("adddirector",params);
// });
function func(fn, a) {

		var FD = new FormData();
		FD.append('fname',fn);
		for (var key in a) {
			if(a!=undefined){
				FD.append(key,a[key]);
			}
		}
		$.ajax({
			type: "POST",
			cache: false,
			contentType: false,
			processData: false,
			url: "/wallet/func/func.php",
			data: FD,
			success: function (R) {
			    if (R) {
						// if(fn=="adddirector"){
							// do something
						// }

					}else{

					}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {

			}
		});
}
function wr(){
	location.reload();
}