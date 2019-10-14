<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class AuthenticateController extends BaseController
{
    public function login(Request $req)
    {
        $errors = new MessageBag();
        if (!empty($req->post())) {
            // User's submitting data
            $validators = Validator::make($req->post(), [
                'username' => 'required|min:5',
                'password' => 'required|min:5'
            ]);

            if (!$validators->fails()) {
                // User's data correct
                $username = $req->post('username');
                $pwd = $req->post('password');

                $user = User::query()->where('username', $username)->get();
                if (!empty($user)) {
                    $user = $user[0];

                    if (sha1($pwd) === $user->password) {
                        if ($user->status === 1) {
                            $req->session()->put('isLoggedIn', true);
                            $req->session()->put('username', $username);
                            return redirect('/home');
                        }

                        $errors->add('user_locked', 'This user has been locked');
                    } else {
                        $errors->add('', 'The credentials are incorrect');
                    }
                } else {
                    $errors->add('', 'The credentials are incorrect');
                }
            } else {
                $errors = $validators->errors();
            }

        }
        return view('login', [
            'errors' => $errors
        ]);
    }
}
