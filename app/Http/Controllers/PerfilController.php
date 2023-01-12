<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PerfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('perfil.index');
    }
    public function store(Request $request){
        $this->validate($request,[
            'username'=>['required','max:30',
            'unique:users,username,'.auth()->user()->id,
            'min:3',
            'not_in:twitter,editar-perfil,facebook,gmail,google']
        ]);
        if($request->imagen){
            $imagen=$request->file('imagen');
            $nombreImagen=Str::uuid().".".$imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);

        $imagenPath = public_path('perfiles').'/'.$nombreImagen;
        if(File::exists(public_path('perfiles').'/'.auth()->user()->imagen)){
            unlink(public_path('perfiles').'/'.auth()->user()->imagen);
        }
        $imagenServidor->save($imagenPath);
        }
        $usuario = User::find(auth()->user()->id);

        //Guardar
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ??  '';
        $usuario->save();


        //Redireccionar
        return redirect()->route('posts.index',$usuario->username);
    }
}
