<?php

use Illuminate\Routing\Controller;

class SessionsController extends Controller
{

    public function registration()
    {
        return View::make('user.sign_up');
    }

    public function loginGet()
    {
        return View::make('user.login');
    }

    public function loginPost()
    {
        $userData = Input::except('_token');

        try {

            if( ! Auth::attempt(['email' => $userData['email'], 'password' => $userData['password']])) {

                throw new Exception('yo dawg, you got incorrect credentials');
            }

            return Redirect::back()->with('successMessage', 'Successfully Signed in');

        } catch(Exception $e) {

            return Redirect::back()
                ->withInput()
                ->with('errorMessage', $e->getMessage());

        }
    }

    public function store()
    {
        $user_data= Input::get('user');

        $user = new User($user_data);

        if($user->save()) {

            return Redirect::route('login');
        }

        return Redirect::to('sign-up')->withErrors($user->errors)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy()
    {
        Session::flush();
        Auth::logout();

        return Redirect::to('/')->with('successMessage', 'You are logged out');
    }
}