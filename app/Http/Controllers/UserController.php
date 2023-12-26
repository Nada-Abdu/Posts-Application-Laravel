<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        return view('pages.profile.edit')
            ->with('user', auth()->user());
    }

    public function update(Request $request, User $user)
    {
        $passwordValidate = '';
        if ($request->password != null) {
            $passwordValidate = 'string | min:8 | confirmed';
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => $passwordValidate,
            'user_image' => ['image', 'mimes:jpeg,png,jpg'],
        ]);

        if ($request->hasFile('user_image')) {
            File::delete('storage/users_images/' . $user->image);
            $extension = $request->file('user_image')->getClientOriginalExtension();
            $imageName = 'image' . $user->id . '_' . time() . '.' . $extension;
            $request->file('user_image')->storeAs('public/' . '/users_images', $imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.edit', $user)
            ->with('success', 'Profile updated successfully');
    }
}
