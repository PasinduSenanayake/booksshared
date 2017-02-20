<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
    <body>
    
    
    
<?php echo $data->name; ?>
    <H1> TADDAAAA </H1>
     <a href="{{ URL::route('paypal') }}"><button>Go to paypal </button></a>
      <a href="{{ URL::route('uploadImage') }}"><button>Upload Image </button></a>
    <a href="{{ URL::route('signout') }}"><button>Sign Out </button></a>
    
    </body>
<html>