<?php

namespace App\Http\Controllers;

use Auth;
use Debugbar;
use DateTime;
use Illuminate\Http\Request;
use App\Contracts\Repositories\ILocationRepository;
use App\Contracts\Repositories\IUserRepository;
use App\Contracts\Repositories\IShowNameTypeRepository;
use App\Contracts\Repositories\IGenderRepository;

class ProfileController extends Controller
{
    
    private $locationRepository;
    private $userRepository;
    private $showNameTypeRepository;
    private $genderRepository;

    public function __construct(ILocationRepository $locationRepository, IUserRepository $userRepository, 
                         IShowNameTypeRepository $showNameTypeRepository,
                         IGenderRepository $genderRepository)
    {
        $this->middleware('auth');
        $this->locationRepository = $locationRepository;
        $this->userRepository = $userRepository;
        $this->showNameTypeRepository = $showNameTypeRepository;
        $this->genderRepository = $genderRepository;
    }
    
    //GET
    public function myProfile()
    {
        $title = 'Профиль';    
        $email = Auth::user()->email;
        $email = substr_replace( $email, '********', 1, (strpos($email, '@') - 1) );
        $male_id = $this->genderRepository->getGenderId('male');
        $female_id = $this->genderRepository->getGenderId('female');
        $nickname_id = $this->showNameTypeRepository->getShowNameTypeId('nickname');
        $fullname_id = $this->showNameTypeRepository->getShowNameTypeId('fullname');
        return view('profile')->with([ 'title' => $title, 'email' => $email,
                'male_id' => $male_id, 'female_id' => $female_id,                   //for radio 'gender'
                'nickname_id' => $nickname_id, 'fullname_id' => $fullname_id ]);    //for radio 'show_name'
    }
    
    //GET
    public function getCountriesJSON()
    {
        $countries = $this->locationRepository->getCountries();
        return json_encode($countries);
    }
    
    //GET
    public function getRegionsJSON(Request $request)
    {
        $regions = $this->locationRepository->getRegions($request->country_id);
        return json_encode($regions);
    }
    
    //GET
    public function getCitiesJSON(Request $request)
    {
        $cities = $this->locationRepository->getCities($request->region_id);
        return json_encode($cities);
    }
    
    //POST
    public function updateProfile(Request $request)
    {
        $dateOfBirth = DateTime::createFromFormat('d-m-Y', "{$request->day}-{$request->month}-{$request->year}");
        if(!$dateOfBirth) $dateOfBirth = null;
        if( ($request->country_id >= 0) == false ) $request->country_id = null;
        if( ($request->region_id >= 0) == false ) $request->region_id = null;
        if( ($request->city_id >= 0) == false ) $request->city_id = null;
        $this->userRepository->update(Auth::user()->id, $request->nickname,
                $request->show_name_id, $request->name, $request->surname,
                $dateOfBirth, $request->gender_id, $request->country_id, 
                $request->region_id, $request->city_id );  
        return redirect('/my_profile/');
    }
}
