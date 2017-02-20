<?php
namespace App\Http\Middleware;
use App\functions\functions;
use Closure;

class emailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $mail = $request->input('data');
       $value = new functions();
	   //href="https://localhost/maestromora/public/verifyMail?data={{$email}}">Activate Your Account</a>
	   // href="https://localhost/maestromora/public/forgotpre?key={{$keyvalue}}">Reset Password</a>
	 
	    
	   		if ($value->checkUserVerification($mail))
			{
		 	}
		 	else {
			 	$message= "Your account already verified!";
				return redirect()->route('home')->with('message',$message);
			 }
	   
 

        return $next($request);
    
    }
}
