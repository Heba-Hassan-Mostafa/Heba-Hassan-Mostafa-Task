<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserProfileRequest;
use App\Http\Requests\Admin\UserPasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get(['id','name']);

        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $request->validated();

        $input['name']                      = $request->name;
        $input['email']                     = $request->email;
        $input['phone']                     = $request->phone;
        $input['password']                  = $request->password;
        $input['is_admin']                  = $request->is_admin;

       $user = User::create($input);
       $user->markEmailAsVerified();  //to make email_verified_at

       $user->roles()->attach($request->roles);
       foreach($user->roles as $role)
       {
        $user->permissions()->attach($role->permissions);
       }
       //upload photo
       if($request->hasFile('photo'))
       {
           if($photo= $request->file('photo'))
           {
               $img = $photo->getClientOriginalName();
               $photo->storeAs('User/', $img , 'upload_photos');


           }

           $user->photo = $img;
       }

       $user->save();

        $success=[
            'message'=>trans('words.added-successfully'),
            'alert-type'=>'success'
        ];

        return redirect()->route('admin.users.index')->with($success);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get(['id','name']);
        $userRole = $user->roles->pluck('id','name')->toArray();
        return view('admin.users.edit' , compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $request->validated();

        $user = User::findOrFail($id);

        if ($user) {
            $data['name']           = $request->name;
            $data['email']          = $request->email;
            $data['phone']          = $request->phone;
            $data['is_admin']       = $request->is_admin;
            if (trim($request->password) != '') {
                $data['password'] = $request->password;
            }

            //upload photo
       if($request->hasFile('photo'))
       {
        if ($user->photo != '') {
            if (File::exists('Files/User/' . $user->photo)) {
                unlink('Files/User/' . $user->photo);
            }
        }
           if($photo= $request->file('photo'))
           {
               $img = $photo->getClientOriginalName();
               $photo->storeAs('User/', $img , 'upload_photos');


           }

           $data['photo'] = $img;
       }

        }
       $user->update($data);

        $user->updateUserRoles($request->roles);
        $user->updateUserPermissions();

       $success=[
        'message'=>trans('words.updated-successfully'),
        'alert-type'=>'success'
    ];


      return redirect()->route('admin.users.index')->with($success);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();

        $success=[
            'message'=>trans('words.deleted-successfully'),
            'alert-type'=>'error'
        ];

        return redirect()->back()->with($success);

    }
    public function change_password()
   {
       return view('admin.users.change-password' );
   }

   public function update_password(UserPasswordRequest $request)
   {
        $request->validated();

       if(!Hash::check($request->old_password, auth()->user()->password)){
        return back()->with("error", trans('words.password-not-match'));
        }

        User::whereId(auth()->id())->update([
            'password' => bcrypt($request->new_password)
        ]);

           $success=[
            'message'=>trans('words.updated-successfully'),
            'alert-type'=>'success'
        ];

        return redirect()->back()->with($success);

   }

   public function profile()
   {
       return view('admin.users.profile');
   }



   public function update_profile(UserProfileRequest $request)
   {
     $request->validated();

       $data['name']             = $request->name;
       $data['email']            = $request->email;
       $data['phone']            = $request->phone;

       if($request->hasFile('photo'))
       {
        if (auth()->user()->photo != '') {
            if (File::exists('Files/User/' . auth()->user()->photo)) {
                unlink('Files/User/' . auth()->user()->photo);
            }
        }
           if($photo= $request->file('photo'))
           {
               $img = $photo->getClientOriginalName();
               $photo->storeAs('User/', $img , 'upload_photos');


           }

           $data['photo'] = $img;
       }

      auth()->user()->update($data);

          $success=[
            'message'=>trans('words.updated-successfully'),
            'alert-type'=>'success'
        ];

        return redirect()->back()->with($success);
       }
   }