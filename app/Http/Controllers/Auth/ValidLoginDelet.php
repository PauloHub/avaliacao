<?php 
namespace App\Http\Controllers\Auth;

use DB;
use Illuminate\Contracts\Validation\Rule;

class ValidLoginDelet implements Rule
{
	public function passes($attribute, $value)
	{
		return !DB::table('users')->whereNull('created_at')->where('email', $value)->exists();
	}

	public function message()
	{
		return 'User deleted!';
	}	

}