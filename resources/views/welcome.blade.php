<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">	
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name = "_token" content= "{{csrf_token()}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
		label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}
		
		
		</style>       
				<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
                <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.js"></script>
                    <script src='https://www.google.com/recaptcha/api.js'></script>
     <link rel="stylesheet" href="{{URL::asset('panaroma/photo-sphere-viewer.css')}}">

  <style>
  
    #photosphere {
      width: 100%;
      height: 400px;
    }

    .psv-button.custom-button {
      font-size: 22px;
      line-height: 20px;
    }
  </style>
                
    </head>
    <body>
       <div>
    @if(Session::has('message'))
   {{ Session::get('message') }}
	@endif
</div>
	<!-- Errors -->  
    <div>	
		@if(count($errors) >0)
				<div class ="row">
					<div class="col-md-6">
						<ul>
							@foreach($errors->all() as $error)
							
                               {{$error}}
							@endforeach
                         
						</ul>
					</div>
				</div>
			@endif
	</div>

       <form id="regForm" action='{{route('adminSignIn')}}' method="post">
    
    <label>Email:</label>
    <input type="email" name="email" id="email" /><br>
    <div id="status"></div>
    <label>Password:</label>
    <input type="password" name="password" id="password" required /><br>
    <label>Password Reenter</label>
    <input type="hidden" name="_token" value = "{{ csrf_token() }}" />
    <input type="password" name="passwordreenter" required /><br>
     <label> Username:</label>
    <input type="text" name="username" required /><br>
    <input type="checkbox" name="checkBox" id="check" value ="Agreed" required />
    <label for="check">&nbsp;&nbsp;&nbsp;&nbsp;I agreed to the RotaractMora  Private Policy.</label>
<!--  <div class="g-recaptcha"   name="recaptcha" id="recaptcha" data-callback="enableBtn" data-expired-callback="capcha_expired" data-sitekey="6LcOyBQUAAAAAJ37mhXw5aAaFlH1YLXJ4fGR-Eb8"></div> -->
    <input type="submit" value="submit" id="submit" ><br>
</form>

<a href='{{route ('pdf' ,['file=booksdata/PP.pdf'])}}'> TestPDF </a>


<H1> Login window </H1>
<form action='{{route('login')}}' method="post">
 <label>Email:</label>
    <input type="email" name="email" /><br>
    <label>Password:</label>
    <input type="password" name="password" id="password" required />
      <input type="hidden" name="_token" value = "{{ csrf_token() }}" /><br>
     <input type="submit" value="submit" id="submitlogin" ><br>
</form>


<!----------------------------------forgot Password----------------------------------------------------------->
<div style="margin:20px 0 20px 0"> 
  <a href="{{ URL::route('forgotPass') }}">Forgot Password</a>
</div>

<!----------------------------------forgot Password----------------------------------------------------------->


<div id="photosphere"></div>

<script src="{{URL::asset('panaroma/three.min.js')}}"></script>
<script src="{{URL::asset('panaroma/D.min.js')}}"></script>
<script src="{{URL::asset('panaroma/uevent.min.js')}}"></script>
<script src="{{URL::asset('panaroma/doT.min.js')}}"></script>
<script src="{{URL::asset('panaroma/CanvasRenderer.js')}}"></script>
<script src="{{URL::asset('panaroma/Projector.js')}}"></script>
<script src="{{URL::asset('panaroma/EffectComposer.js')}}"></script>
<script src="{{URL::asset('panaroma/RenderPass.js')}}"></script>
<script src="{{URL::asset('panaroma/ShaderPass.js')}}"></script>
<script src="{{URL::asset('panaroma/MaskPass.js')}}"></script>
<script src="{{URL::asset('panaroma/CopyShader.js')}}"></script>
<script src="{{URL::asset('panaroma/DeviceOrientationControls.js')}}"></script>
<script src="{{URL::asset('panaroma/photo-sphere-viewer.js')}}"></script>

<script type="text/template" id="pin-content">

<pre><code>
#header h1 a {
	display: block;
	width: 300px;
	height: 80px;
}
</code></pre>
</script>

<svg id="patterns">
  <defs>
    <pattern id="dots" x="10" y="10" width="30" height="30" patternUnits="userSpaceOnUse">
      <circle cx="10" cy="10" r="10" style="stroke: none; fill: rgba(255,0,0,0.4)" />
    </pattern>
    <pattern id="points" x="10" y="10" width="15" height="15" patternUnits="userSpaceOnUse">
      <circle cx="10" cy="10" r="0.8" style="stroke: none; fill: red" />
    </pattern>
  </defs>
</svg>

<script>
  var PSV = new PhotoSphereViewer({
    panorama: 'houseviews/Bryce-Canyon-National-Park-Mark-Doliner.jpg',
    container: 'photosphere',
    //loading_img: 'photosphere-logo.gif',
	
    navbar: [
      'autorotate', 'zoom', 'download', 'markers',
      'spacer-1',
	     
      {
		  	
        title: 'Change image',
        className: 'custom-button',
        content: '↻',
        onClick: (function() {
          var i = false;

          return function() {
            i = !i;
            PSV.clearMarkers();

            PSV.setPanorama(i ? 'houseviews/Bryce-Canyon-By-Jess-Beauchemin.jpg' : 'houseviews/Bryce-Canyon-National-Park-Mark-Doliner.jpg', {
              longitude: i ? 3.7153696451829257 : 3.8484510006474992,
              latitude: i ? 0.57417649320975916 : -0.24434609527920628
            }, true)
              .then(function() {
                PSV.setCaption(i ? 'Bryce Canyon National Park <b>&copy; Jess Beauchemin</b>' : 'Bryce Canyon National Park <b>&copy; Mark Doliner</b>');
              });
          }
        }())
      },
      {
        id: 'disabled',
        title: 'This button is disabled',
        content: '❌',
        enabled: false
      },
      'caption',
      'gyroscope',
      'fullscreen'
    ],
	
    caption: 'Bryce Canyon National Park <b>&copy; Mark Doliner</b>',
    longitude_range: [-7*Math.PI/8, 7*Math.PI/8],
    latitude_range: [-3*Math.PI/4, 3*Math.PI/4],
    anim_speed: '-2rpm',
    default_fov: 50,
    fisheye: true,
    move_speed: 1.1,
    time_anim: false,
    gyroscope: true,
    webgl: true,
    transition: {
      duration: 1000,
      loader: true,
      blur: true
    },

    
    
  });
  
  
  $(document).ready(function(){
    $('#360').click(function(){
  			PSV.clearMarkers();
			var i ;
            PSV.setPanorama(i ? 'houseviews/Bryce-Canyon-By-Jess-Beauchemin.jpg' : 'houseviews/Bryce-Canyon-National-Park-Mark-Doliner.jpg', {
              longitude: i ? 3.7153696451829257 : 3.8484510006474992,
              latitude: i ? 0.57417649320975916 : -0.24434609527920628
            }, true)
              .then(function() {
                PSV.setCaption(i ? 'Bryce Canyon National Park <b>&copy; Jess Beauchemin</b>' : 'Bryce Canyon National Park <b>&copy; Mark Doliner</b>');
              });
    });
  });
</script>



<div> <button id="360"> Enable 360 view </button> </div>




<script>

$(document).ready(function(){
	$("#email").keyup(function(){
		var email = $("#email").val();
		var token = $('meta[name="_token"]').attr('content');
		var urlData='{{route("emailCheck")}}';
		if (email.length==0)
		{
			$("#status").html("");
		}
		if(email.length >= 2)
		{
			$("#status").html('<img src="welcomeassets/loader.gif" /> Checking availability...');
			$.ajax({
    			type: "POST",
    			url: urlData ,
    			data: { _token:token , 'datafile':email},
    			cache: false,
    			success: function(data)
    				{	var datavales = data.split("|");
  						 $("#status").html(datavales[0]);	
						 if (datavales[1] == "false")
						 {
							 document.getElementById("submit").disabled = true;
						}
						else if (datavales[1] == "true")
						{
							document.getElementById("submit").disabled = false;
						}
    				}
    			});
		}
		
	});
});
</script>
<script>

jQuery('#regForm').validate({
	
			
            rules : {
				
                password : {
                    minlength : 5
                },
                passwordreenter : {
                    minlength : 5,
                    equalTo : "#password"
                },
		
            }
});

$('#submit').click(function(){
    console.log($('#regForm').valid());
	
});

 function enableBtn(){
     document.getElementById("submit").disabled = false;
   }
  
</script>

    </body>

</html>
