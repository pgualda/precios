<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // los primeros 3 metodos index/edit/update son de asigrol
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(string $userId)
    {
        $user=User::find($userId);
        $roles = Role::get()->pluck('name', 'name');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, string $userId)
        {
            $user=User::find($userId);
            $roles = $request->input('roles') ? $request->input('roles') : [];
            $user->syncRoles($roles);
            return redirect()->route('users.index');
    }
    // metodos authdatos/authadmin/confirmdatos son de authadmin

    public function authdatos(Request $request, string $userId)
    {
        $user=User::find($userId);
        $roles = [Role::find($request->rolProvId)];
        // sincroniza
        $user->syncRoles($roles);
        $user->procesooka = 1;
        $user->save();
        return redirect('/');
    }

    public function authadmin()
    {
        return view('users.authadmin');
    }

//    public function confirmdatos(Request $request, string $userId)
// no puedo mandar la id xq no procesa blade
    public function confirmdatos(string $userId, string $rolProvId)
    {

        // rol 5 comp.pend. => 3 comp // rol 6 juez pend => 2 juez
        $user=User::find($userId);
        if ($rolProvId > 0) {
           if ($rolProvId == 5) {
               $rolDefId =3;
           }
           if ($rolProvId == 6) {
               $rolDefId =4;
           }
           $roles = [Role::find($rolDefId)];
        } else {
           $roles = [];
        }
        // sincroniza
        $user->syncRoles($roles);
        return redirect()->route('users.index');
    }


    public function store()
    {
//
    }

    // funciona para filtrar roles provisorios, de momento no se usa. ruta api
    public function traer_users(){
        // necesito varios campos que no vienen rolname, rolid
        $users = User::all();
        $usersExtra=[];
        foreach($users as $user){
            // arma escuelaname
            // arma rolname
            $firstrol = $user->roles->first();
            if ($firstrol !== null ) {
               $rolid=$firstrol->id;
               $user->setAttribute('rolid',$rolid);
               // setea el nombre -primero hay q levantar id de rol-
               $rol = Role::find($rolid);
               $user->setAttribute('rolname',$rol->name);
               if ($rolid== 5 || $rolid==6) {
                  array_push($usersExtra, $user);
               }
            }
        }
        return $usersExtra;
    }

}
