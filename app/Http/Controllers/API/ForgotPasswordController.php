<?php
namespace App\Http\Controllers\API;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
	use SendsPasswordResetEmails;
	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
	public function forget(Request $request)
	{
		echo "zxczc";
		$this->validateEmail($request);
		// We will send the password reset link to this user. Once we have attempted
		// to send the link, we will examine the response then see the message we
		// need to show to the user. Finally, we'll send out a proper response.
		$response = $this->broker()->sendResetLink(
			$request->only('email')
		);
		return $response == Password::RESET_LINK_SENT
			? response()->json(['message' => 'Reset link sent to your email.', 'status' => true], ['udata'=>1])
			: response()->json(['message' => 'Unable to send reset link', 'status' => false], ['udata'=>0]);
	}
}
?>