<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Fortify\Fortify;
use Validator;
use Socialite;
use Exception;
use Auth;
use function PHPUnit\Framework\returnCallback;

class GoogleLoginController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();
            $existingUser = User::where('google_id', $user->id)->first();

            if($existingUser){
                Auth::login($existingUser);
                if ( ! $existingUser->hasVerifiedEmail()) {
                    $existingUser->sendEmailVerificationNotification();
                }
                return redirect('/login');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                ]);
                $createUser->assignRole('User');
                $createUser->sendEmailVerificationNotification();
                Auth::login($createUser);
                return redirect('/login');
            }

        } catch (\Throwable $th) {
          dd('Something went wrong! '. $th->getMessage());
       }
    }
}
