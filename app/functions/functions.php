<?php
namespace App\functions;
use View, Input, Redirect;
use DB;
use App\ForgotPass;
class functions {


	function generateRandomString($length ) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}
	
	
		function checkUserVerification($mail)
	{
		if ((DB::table('users')->where('email',$mail)->value('emailverification'))===0)
		{
		
	
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function verification ($mail)
	{
			DB::table('users')
            ->where('email', $mail)
            ->update(['emailverification' => 1]);	
			return true;
	}
	
	///////////////////////////////////////////////////////////////////
	function checkEmail($email){
		
		$user = DB::table('users')->where('email',$email)->pluck('id');
		
		if($user[0]>0){
			
		/////////////valide user to send email//////////////////	
		
		return true;
			
		}
		
		else{
			
		return false;
			
			}
		
		} 

}
?>