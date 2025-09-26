<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        return view('perfil.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'password' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->foto)) {
            if ($request->hasFile('foto')) {
                $avatarPath = $request->file('foto')->store('fotos', 'public');
            }

            $user->foto = $avatarPath;
        }

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->update();

        return back()->with([
            'alert' => ['success', 'Exito', 'Se actualizo la informacion.']
        ]);
    }
}
