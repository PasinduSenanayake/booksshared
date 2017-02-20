

<!DOCTYPE html>

<head>
		<meta name = "_token" content= "{{csrf_token()}}">
<link href="ImageUpload/jquery.cropbox.min.css" rel="stylesheet" type="text/css">
<style>
div.cropbox .btn-file {
    position: relative;
    overflow: hidden;
}
div.cropbox .btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
div.cropbox .cropped {
    margin-top: 10px;
}



</style>
</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<div id="message" class="alert alert-info"></div> 
<div id="plugin" class="cropbox">
    <div class="workarea-cropbox">
        <div class="bg-cropbox">
            <img class="image-cropbox">
            <div class="membrane-cropbox"></div>
        </div>
        <div class="frame-cropbox">
            <div class="resize-cropbox"></div>
        </div>
    </div>
    <div class="btn-group">
        <span class="btn btn-primary btn-file">
            <i class="glyphicon glyphicon-folder-open"></i>
            Browse <input type="file" accept="image/*">
        </span>
        <button type="button" class="btn btn-success btn-crop" disabled="">
            <i class="glyphicon glyphicon-scissors"></i> Crop
        </button>
        <button type="button" class="btn btn-warning btn-reset">
            <i class="glyphicon glyphicon-repeat"></i> Reset
        </button>
    </div>
    <div class="cropped panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Result of cropping</h3></div>
        <div class="panel-body" >...</div>
    </div>
    <div class="form-group">
        <label>Info of cropping</label>
        <textarea class="data form-control" id="data"; rows="5"></textarea>
        <button id= "show">Show</button>
    </div>
</div>

<input type="file" id="bannerImg"  />

<div id="res"></div>
<script src="ImageUpload/jquery.cropbox.min.js"></script>
<script>
$('#plugin').cropbox({
    selectors: {
        inputInfo: '#plugin textarea.data',
        inputFile: '#plugin input[type="file"]',
        btnCrop: '#plugin .btn-crop',
        btnReset: '#plugin .btn-reset',
        resultContainer: '#plugin .cropped .panel-body',
        messageBlock: '#message'
    },
    imageOptions: {
        class: 'img-thumbnail',
		id:'widget',
        style: 'margin-right: 5px; margin-bottom: 5px'
    },
    variants: [
        {
            width: 200,
            height: 200,
            minWidth: 180,
            minHeight: 200,
            maxWidth: 350,
            maxHeight: 350
        },
        {
            width: 150,
            height: 200
        }
    ],
    messages: [
        'Crop a middle image.',
        'Crop a small image.'
    ]
});

</script>
<script>
$(function() { 
    $("#show").click(function() { 
	/*
	console.log('hi');
        html2canvas($("#widget"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                //document.body.appendChild(canvas);

                // Convert and download as image 
                //Canvas2Image.saveAsPNG(canvas); 
				 var image = Canvas2Image.convertToPNG(canvas);
				 */
	
				 
               var image_data = $('#widget').attr('src');
			   var token = $('meta[name="_token"]').attr('content');
				var urlData='{{route("addImage")}}';
				$.ajax({
    			type: "POST",
    			url: urlData ,
    			data: { _token:token , 'datafile':image_data},
    			cache: false,
    			success: function(data)
    				{	
    				}
    			});
			   console.log(image_data);
                //$("#img-out").append(canvas);
                // Clean up 
                //document.body.removeChild(canvas);
            //}
        //});
    });
}); 
</script>

</body>

</html>