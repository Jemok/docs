<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\CampusRepository;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Show the form for registering a lecturer
     * @param CampusRepository $campusRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLecturerRegistrationForm(CampusRepository $campusRepository){

        $campuses = $campusRepository->index();

        return view('auth.register_lecturer', compact('campuses'));
    }

    /**
     * Validate lecturer registration data
     * @param array $data
     * @return mixed
     */
    protected function validateLecturer(array  $data){

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'staff_id' => 'required',
            'campus'   => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data, $request)
    {
        if($request->path() == 'register/lecturer'){

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'account_type' => 1
            ]);

            /**
             * Create an instance of a lecturer
             */
            $user->lecturer()->create([
                'staff_id' => $data['staff_id'],
                'campus_id' => $data['campus']
            ]);

        }else{
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            /**
             * Create an instance of a user school details
             * and initiate the status to 0
             */
            //$user->student()->create([]);
            $user->school_details()->create([]);
        }

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        if($request->path() == '/register/lecturer'){
            $validator = $this->validateLecturer($request->all());
        }else{
            $validator = $this->validator($request->all());
        }

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        \Auth::guard($this->getGuard())->login($this->create($request->all(), $request));

        return redirect($this->redirectPath());
    }

}
