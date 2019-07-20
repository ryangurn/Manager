<?php

namespace App\Http\Controllers;

use App\Carrier;
use App\User;
use App\UserMetadata;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $carriers = Carrier::all();

        return view('user.update', compact('user', 'carriers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->merge(['user' => $user->id]);
        $validator = validator($request->all(), $user->UValidator($user->id));

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->back()->with('success', true);
    }

    public function address(Request $request, User $user)
    {
        $m = new UserMetadata();
        $validator = validator($request->all(), $m->AddressValidator());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $metadata = UserMetadata::firstOrCreate([
            'user_id' => $user->id,
        ]);
        $metadata->address = [
            'lineOne' => $request->get('addressOne'),
            'lineTwo' => ($request->get('addressTwo') == null) ? "" : $request->get('addressTwo'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'zipcode' => $request->get('zipcode'),
            'country' => $request->get('country'),
        ];
        $metadata->save();
        return redirect()->back()->with('success', true);
    }

    public function phone(Request $request, User $user)
    {
        $m = new UserMetadata();
        $validator = validator($request->all(), $m->PhoneValidator());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $metadata = UserMetadata::firstOrCreate([
            'user_id' => $user->id
        ]);

        $phone = [
            'phone' => $request->get('phone'),
            'carrier' => $request->get('carrier')
        ];
        $prevPhone = collect($metadata->phone);
        $finalPhone = $prevPhone->add($phone);

        $metadata->phone = $finalPhone;
        $metadata->save();
        return redirect()->back()->with('success', true);
    }

    public function phoneUpdate(Request $request, User $user, $number)
    {
        $m = new UserMetadata();
        $validator = validator($request->all(), $m->PhoneValidator());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $metadata = UserMetadata::firstOrCreate([
            'user_id' => $user->id
        ]);

        $newPhone = [
            'phone' => $request->get('phone'),
            'carrier' => $request->get('carrier')
        ];
        $selectedKey = -1;
        $prevPhone = collect($metadata->phone);
        foreach($prevPhone as $key => $phone){
            if($phone['phone'] == $number){
                $selectedKey = $key;
            }
        }
        $prevPhone[$selectedKey] = $newPhone;
        $finalPhone = $prevPhone;
        $metadata->phone = $finalPhone;
        $metadata->save();
        return redirect()->back()->with('success', true);
    }

    public function phoneDelete(User $user, $number){
        $validator = validator(['number' => $number], ['number' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $metadata = UserMetadata::firstOrCreate([
            'user_id' => $user->id
        ]);

        $selectedKey = -1;
        $prevPhone = collect($metadata->phone);
        foreach($prevPhone as $key => $phone){
            if($phone['phone'] == $number){
                $selectedKey = $key;
            }
        }
        unset($prevPhone[$selectedKey]);
        $finalPhone = $prevPhone;
        $metadata->phone = $finalPhone;
        $metadata->save();

        return redirect()->back()->with('success', true);
    }

    public function birthdate(Request $request, User $user)
    {
        $m = new UserMetadata();
        $validator = validator($request->all(), $m->BirthdateValidator());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $dob = Carbon::createFromTimestamp(strtotime($request->get('dob')));

        $metadata = UserMetadata::firstOrCreate([
           'user_id' => $user->id,
        ]);
        $metadata->birthdate = $dob;
        $metadata->save();

        return redirect()->back()->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
