<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Organization;
use App\Models\Individual;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        $userType = $data['account_type'];
        // $organizationRequest = new StoreOrganizationRequest();
        // $individualRequest = new StoreIndividualRequest();

    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'account_type' => 'required',
        'organization_name' => ['required_if:account_type,organization'],
        'city' => ['required_if:account_type,organization'],
        'address' => ['required_if:account_type,organization'],
        'phone' => ['required_if:account_type,organization'],
        'job_title' => ['required_if:account_type,individual'],
        'phone' => ['required_if:account_type,individual'],
        'bank_account' => ['required_if:account_type,individual'],
        'iban' => ['required_if:account_type,individual'],

    ];

    return Validator::make($data, $rules);

    }

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $validator = $this->validator($data);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();

        }

        $user =  User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'account_type' => $data['account_type'],

                ]);
        $user->save();

       $userType = $data['account_type'];

        if ($userType === 'organization') {

            $organizationData = [
                'organization_name' => $data['organization_name'],
                'city' => $data['city'],
                'address' => $data['address'],
                'phone' => $data['organization_phone'],
                'user_id' => $user->id,
            ];

            $organization = Organization::create($organizationData);

        }
        elseif ($userType === 'individual') {

            $individualData = [
                'job_title' => $data['job_title'],
                'phone' => $data['phone'],
                'bank_account' => $data['bank_account'],
                'iban' => $data['iban'],
                'user_id' => $user->id,
            ];

            $individual = Individual::create($individualData);
        }

      return $user;

    }
}
