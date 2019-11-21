<?php 
namespace App\Http\Controllers\Auth;

use DB;
use Illuminate\Contracts\Validation\Rule;
use DateTime;

class ValidAdult implements Rule
{
	public function passes($attribute, $value)
	{
		$d1 = new DateTime($value);
		$d2 = new DateTime(date('Y-m-d'));
		$diff = $d2->diff($d1);
		return $diff->y >= 18;
	}

	public function message()
	{
		return 'User is underage';
	}	

}