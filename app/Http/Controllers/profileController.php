<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Cache;

class profileController extends Controller
{
    // middleware auth
    public function __construct() {
        $this->middleware('auth')->except('create', 'store');
    }

    public function index(){
        $profiles = Cache::remember('profile', 10, function () {
            return Profile::paginate(9);
        });
        return view('profile.index', compact('profiles'));
    }
    public function show(string $id){
        //route model by name >

        // $id =(int) $request->id;
        // $profile = Profile::findOrFail($id);

        $profile = Cache::remember('profile_'.$id, 10, function () use ($id) {
            return Profile::findOrFail($id);
        });

        return view('profile.show', compact('profile'));
    }
    public function create(){
        return view('profile.create');
    }
    public function store(ProfileRequest $request){

        // $name = $request->name;
        // $email = $request->email;
        // $password = $request->password;
        // $bio = $request->bio;

        //validation
        $formFields = $request->validated();

        //hash password
        $formFields['password'] = Hash::make($request->password);
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('profile', 'public');
        }

        //insertion

        Profile::create($formFields);

        return redirect()->route('profile.index')->with('success', 'le compte est bien cree !!');
    }

    public function destroy(Profile $profile){
        $profile->delete();

        return to_route('profile.index')->with('success', 'le profile est bien supremer');
    }

    public function edit(profile $profile){
        return view('profile.edit', compact('profile'));
    }

    public function update(ProfileRequest $request, profile $profile){
        $formFields = $request->validated();
                //hash password
            $formFields['password'] = Hash::make($request->password);

            if ($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('profile', 'public');
            }
        $profile -> fill($formFields)->save();
        return to_route('profile.show', $profile->id)->with('success', 'le profile est bien modifier');
    }


}
