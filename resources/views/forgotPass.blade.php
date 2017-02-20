<!DOCTYPE html>

    <head>
<meta name = "_token" content= "{{csrf_token()}}">
	</head>
    <body>
    
  <form action='{{route('forgot')}}' method="post">
 <label>Enter your email here:</label>
    <input type="email" name="email" required autocomplete="off"/><br>
    
      <input type="hidden" name="_token" value = "{{ csrf_token() }}" /><br>
     <input type="submit" value="Send" id="fPassword" ><br>
</form>

    
    </body>
<html>