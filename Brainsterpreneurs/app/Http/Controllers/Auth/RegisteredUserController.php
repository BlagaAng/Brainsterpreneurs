<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Skill;
use App\Models\Academy;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $academies = Academy::get();
        $skills = Skill::get();
        return view('auth.register', compact('academies', 'skills'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        /*  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
 */
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:filter', 'max:255'],
            'password' => ['required'],
            'biography' => ['required']
            /*  'image' => ['required'],
            'academy_id' => ['required'] */
        ]);
        if ($validation->fails()) {
            return response()->json(['code' => 400, 'msg' => $validation->errors()->first()]);
        }
        /*
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $biography = $request->biography;
        $academy_id = $request->academy_id;
        $password =Hash::make($request->password); */
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->biography = $request->biography;
        $user->save();
        /*   event(new Registered($user));
        Auth::login($user); */
        /*   return redirect(RouteServiceProvider::HOME); */
        $academies = Academy::get();
        $skills = Skill::get();
        $next = 2;
        return view('auth.register', compact('academies', 'skills', 'next'));
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [

            'academy_id' => ['required']
        ]);

        $user = User::find($id);
        $user->academy_id = $request->academy_id;
        $user->save();
        $academies = Academy::get();
        $skills = Skill::get();
        return view('auth.register', compact('academies', 'skills'));
    }
    public function update2(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [

            'skill_id' => ['required']
        ]);
        $user = User::find($id);
        $user->skill_id = $request->skill_id;
        $user->save();
        $academies = Academy::get();
        $skills = Skill::get();
        return view('auth.register', compact('academies', 'skills'));
    }
    public function update3(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [

            'image' => ['required']
        ]);
        $path = 'images/upload/';
        $image = time() . '.' . $request->image->extension();
        $request->image->move($path, $image);

        $user = User::find($id);
        $user->image = "/" . $path . $image;

        $user->save();
        return redirect(RouteServiceProvider::HOME);
    }
}
