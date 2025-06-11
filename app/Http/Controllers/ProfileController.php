<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(Request $request): View
    {
        return view('user.profile', [
            'user' => $request->user(),
        ]);
    }
    public function edit($id): View
    {
       $user=User::FindOrFail($id);
       return view('profile.edit',compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update($id,Request $request): RedirectResponse
    {

    $user=User::findOrFail($id);
    $user->name=$request->name;
    $user->email=$request->email;
    if ($request->hasFile('profile_photo')) {
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image=$request->profile_photo;
        $ext=$image->getClientOriginalExtension();
        $imageName=time().'.'.$ext;
        $image->move(public_path('uploads/profile_photos'),$imageName);
        $user->profile_photo = $imageName;
        $user->save();

    }



    return Redirect::route('profile.edit',$id)->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate that the confirmation checkbox is checked.
        // Optionally, you can also validate the current password if desired.
        $request->validate([
            'confirm_deletion' => 'accepted',
            // Uncomment the next line if you want to require the password as well:
            // 'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete any related records if needed.
        // For example, if the user has posts, comments, or files that are not set to cascade:
        // $user->posts()->delete();
        // $user->comments()->delete();
        // $user->files()->delete();
        // Alternatively, ensure your database foreign keys are configured with "on delete cascade".

        Auth::logout();

        // Delete the user record.
        $user->delete();

        // Invalidate and regenerate the session.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Account deleted successfully.');
    }



}
