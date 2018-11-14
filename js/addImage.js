$(document).ready(function(){
$(function(){
	$("#fitxategia").change(function(e){
		$("#styleIrudi").remove();
		$("#irudia").remove();
		$("#divIrudi").find("br").remove();
		
		addImage(e);
	});

	function addImage(e){
		var file = e.target.files[0],
		imageType = /image.*/;

		if (!file.type.match(imageType))
			return;
  
		var reader = new FileReader();
		reader.onload = fileOnload;
		reader.readAsDataURL(file);
	}
  
	function fileOnload(e){
		var result=e.target.result;
		
		$("#divIrudi").append('<style id="styleIrudi">#n1,#s1{height:510px;}</style>');
		$("#divIrudi").append('<img id="irudia" src="" width="100" height="100"><br><br>');
		$("#irudia").attr("src",result);
	}
});
});