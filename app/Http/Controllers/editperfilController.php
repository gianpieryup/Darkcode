<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class editperfilController extends Controller
{
  public function edit($id)
  {
      $usuario = User::find($id);
      return view('editarPerfil', compact('usuario'));
  }

  public function update(Request $request, $id)
  {
    $usuario = User::find($id);
    // dd($request);
    //Validaciones
    //$rules = [....]

    //Manejo de errores
    //$messages = [.....]

    //$this->validate($request, $rules, $messages);


    // dd($path, $file);

    $usuario->name = $request->name;
    $usuario->email = $request->email;
    //$usuario->password = Hash::make($request->password);
    $usuario->password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    $usuario->save();
    return redirect('/index.php');
  }
}