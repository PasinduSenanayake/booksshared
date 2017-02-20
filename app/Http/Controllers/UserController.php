<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Database\DataConnection;
use Illuminate\Support\Facades\Auth;
use App\Events\emailVerify;
use Illuminate\Support\Facades\Event;
use App\functions\functions;
use App\Mail\verification;
use App\Mail\forgotPassword;
use Hash;
use View;
Use DB;
use Session;


class UserController extends Controller{
	
	
public function welcome()
{
		$user = Auth::user();
		if ($user->usertype=="admin"){
		 return redirect()->route('admindashboard');
	
		}
}

public function adminSignIn(Request $request)
	{	$this->validate($request,[
		   	'username' => 'required',
    		'email' => 'required',
    		'password' => 'required',
			'passwordreenter' => 'required|same:password',
			//'g-recaptcha-response' => 'required|captcha',
			]);
			$username =  $request['username'];
			$email =  $request['email'];
			$password =  $request['password'];
			$user= new User();
			$user->name = $username;
			$user->email= $email;
			$user->password = bcrypt($password);
			$user->emailverification = 0;
			$user->usertype ="admin";
			$user->save();
			if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
			
			
			return redirect()->route('admindashboard');
		}
		else
		{
		return redirect()->back()->withErrors(['authenticationFailed', 'Please re-enter your password']);
		}
			
		
	}
	
	public function admindashboard(Request $request){
		$user = Auth::user();
		$data ='https://localhost/books/public/verifyMail?data='.$user->email;
		//\Mail::to ($user)->send(new verification($user,$data));
		return view('admindashboard')->with('data' ,$user);
	}
	
	public function logIn(Request $request)
	{
		$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required'
			]);
			
		$email =  $request['email'];
		$password =  $request['password'];
		if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
		
			return redirect()->route('admindashboard');
		}
		else
		{
		return redirect()->back()->withErrors(['authenticationFailed', 'Please re-enter your password']);
		}
	}
	
	public function signout(Request $request)
	{
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->to('/');
    }
	
	
	
	public function verifyMail(Request $request)
	{
		$data= Input::get('data',false);
		$emailVerify = new functions();
		if($emailVerify->verification($data))
		{
			return view('emailverified');
		}
		{
			 return redirect()->to('/')->withErrors(['Verification Failed', 'Please retry']);
		}
	}
	
	public function emailCheck(Request $request)
	{
			$enteredEmail= $request['datafile'];
			if(DB::table('users')->where('email', '?')->setBindings([$enteredEmail])->exists())
			{
				echo '<div style="color: red;"> <b>'.$enteredEmail.'</b> is already in use! </div>|false';
			}
			else 
			{
				echo '<div style="color: green;"> <b>'.$enteredEmail.'</b> is avaialable! </div>|true';
			}	
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////
	public function forgot(Request $request){
		
			$this->validate($request,[
    		'email' => 'required',
    		
			]);
		
			$email = $request['email'];
			$emailCheck = new functions();
		
		if($emailCheck -> checkEmail($email)){
			
			
			//send email to this email
			
			$random=125;
			$user = new user();
			$user->email= $email;
			
			$data ='https://localhost/books/public/forgotPassword?data='.$random;
			\Mail::to ($user)->send(new forgotPassword($data));
			
			}
			
		else {
			
			//give error that email doesn not exist in the databse
			}	
		
		}
		
		
		public function forgotPassword(Request $request){
			
			echo "changing interface";
			
			}
			
	public function addImage(Request $request){
			$data = $request['datafile'];
			/*
			$this->validate($request,[
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
			]);
			
     		//$file = $request->file('image');
			
			//echo 'File Name: '.$file->getClientOriginalName();
   
      	//Move Uploaded File
      	$destinationPath = 'upload/';
		
		$name= $file->getClientOriginalName();
		$extenT= explode('.',$name);
		$extension = $extenT[count($extenT)-1];
		
		$user = Auth::user();
		$email=$user->email;
		
		$func = new functions();
      	//$file->move($destinationPath,$file->getClientOriginalName());
		$temp= $func -> getID($email);
	
		
		Input::file('datafile')->move($destinationPath, $temp.'.'.$extension);
		*/
		
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);

		file_put_contents('image.png', $data);
		
			}

	
}

?>