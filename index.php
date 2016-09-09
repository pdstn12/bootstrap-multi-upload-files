<html>
<head>
	<title>PDS multi upload</title>
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script type="text/javascript">
	var kk = 1;
		function removefile(e){
			$("#fil"+e).remove();
			$("#div"+e).remove();
		}
		function chang( event ) {  
			var filval = event.value;
			var namee = filval.match(/[^\/\\]+$/);
			var name = namee[0];
			if(filval !== ''){
				var lst3 = filval.slice(-4);
				var lst4 = filval.slice(-5);
				if(lst3 == '.jpg' || lst3 == '.JPG' || lst3 == '.png' || lst3 == '.PNG' || lst3 == '.gif' || lst3 == '.GIF' || lst3 == '.bmp' || lst3 == '.BMP' || lst4 == '.jpeg' || lst4 == '.JPEG'){
					if (event.files && event.files[0]) {
						var FR= new FileReader();
						FR.onload = function(e) {
							var fld = e.target.result;
							$(".file-return").append("<div class='row alldata col-lg-8 col-sm-11 col-xs-12' id='div"+kk+"'><img class='show col-lg-3 col-sm-6 col-xs-6' src='"+fld+"'><div class='col-lg-3 col-sm-4 col-xs-4 nameshow'>"+name+"</div><div class='col-lg-2 col-sm-1 col-xs-1'><a id='cancel' class='  btn btn-danger'  onclick='removefile("+kk+")'>cancel</a></div></div>");
							$("#labl").attr("for","my-file"+kk);
							$(".hid-input").append('<input class="input-file input-file'+kk+'" onchange="chang(this);" id="my-file'+kk+'" name="allfil[]" type="file">');
							$("#div"+kk).stop().animate({scrollTop:0}, '500', 'swing');
						};
						FR.readAsDataURL( event.files[0] );
					}
					kk++;
				}else {
					alert('you can upload only image .jpg,.jpeg,.png,.gif,.bmp');
				}
			}
		}
	</script>
	<style type="text/css">
	.upload{
		border: 1px dashed #cccccc;
		border-radius:7px;
		border-width: 1px; 
		width: 100%;
		min-height:250px;
		overflow: inherit;
		padding-bottom: 20px;
	    overflow-y: scroll;
	}
	body {
		padding: 20px 20px 20px 20px;
	}
	.input-file-container {
		position: relative;
		width: 225px;
	} 
	.js .input-file-trigger {
		display: block;
		margin: 10px 10px 10px 10px;
		padding: 15px 15px;
		background: #00abc7;
		color: #fff;
		font-size: 1em;
		transition: all .4s;
		cursor: pointer;
		border: 2px solid #4ac0d3;
		border-radius: 3px;
		width: 20%;
		border-bottom:2px solid #a2a2a2;
	}
	.js .input-file {
		position: absolute;
		top: 0; left: 0;
		width: 225px;
		opacity: 0;
		padding: 14px 0;
		cursor: pointer;
	}
	.js .input-file:hover + .input-file-trigger,
	.js .input-file:focus + .input-file-trigger,
	.js .input-file-trigger:hover,
	.js .input-file-trigger:focus {	
		background: #4ac0d3;
	}
	.hid-input{
		visibility: hidden;
		position: absolute;
	}
	.show {
		width: 150px;
		height: 100px;
	}
	.row{
		width: 100%;
		display: inline-block;
		margin-top: 25px;
	}
	.nameshow{
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
		margin-top: 10px;
	}
	.alldata {
		background: #f6f6f6;
		padding:15px 0px 15px 15px;
	}
	#cancel {
		margin-top: 10px;
	}
	</style>
</head>
<body>
	<form action="up.php" method="POST" enctype="multipart/form-data">
	<div class="upload" id="PDSUP">
	<input class="input-file input-file1" onchange="chang(this);" id="my-file" name='allfil[]' type="file">
    <label id="labl" tabindex="0" for="my-file" class="input-file-trigger">sélectionner des images</label>
    <div class="file-return"></div>
    <div class="hid-input">
	</div>
	</div>
	<br/><br/>
	<button type="submit" class="btn btn-success" > Upload </button>
	</form>
</body>
<script type="text/javascript">
$(function(){
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file"+kk ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  

});  
</script>
</html>
