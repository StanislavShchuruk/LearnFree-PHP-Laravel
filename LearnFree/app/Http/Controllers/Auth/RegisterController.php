<?php

namespace App\Http\Controllers\Auth;

use Debugbar;
use DB;
use App\Contracts\Repositories\IUserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/'; 
    
    // @var IUserRepository
    //private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Debugbar::warning('__construct…');
        $this->middleware('guest');
        //$this->repository = $repository;
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
            'nickname' => 'required|string|max:60',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|string|min:6|max:255|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        Debugbar::addMessage('Create user controller debug', 'ControllerCreateUser');
        return User::create([
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'show_name_id' => DB::table('show_name_types')->where('name', 'nickname')
                                                          ->first()->id
        ]);        
    }
}
