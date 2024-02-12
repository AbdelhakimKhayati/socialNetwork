<?php

namespace App\Http\Controllers\API;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected const CACHE_KEY = 'profile_api';

    public function index()
    {
        // $profiles = Profile::all();
        // return response()->json($profiles);
        $profiles = Cache::remember(self::CACHE_KEY, 14400, function () {
            return ProfileResource::collection(Profile::all());
        });
        return $profiles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all();
        //hash password/ cryptage
        $formFields['password'] = Hash::make($request->password);
        $profile = Profile::create($formFields);
        Cache::forget(self::CACHE_KEY);
        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {

        $formFields = $request->all();
        //hash password/ cryptage
        $formFields['password'] = Hash::make($request->password);
        $profile -> fill($formFields)->save();
        Cache::forget(self::CACHE_KEY);
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json([
            'message' => 'le profile est bien ete suprimer !',
            'id' => $profile->id ,
            'name' => $profile->name
        ]);
    }
}
