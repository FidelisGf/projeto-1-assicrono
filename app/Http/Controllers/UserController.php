<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
   
     public function create(Request $request)
     {
         $user = User::create($request->only(['name', 'cpf', 'email', 'telefone']));
         return $user;
     }
 
  
     public function read($id)
     {
         return User::findOrFail($id);
     }
 
   
     public function update(Request $request, $id)
     {
         $user = User::findOrFail($id);
         $user->update($request->only(['nome', 'cpf', 'email', 'telefone']));
         return $user;
     }
 
    
     public function delete($id)
     {
         $user = User::findOrFail($id);
         $user->delete();
         return response()->json(['message' => 'Usuário deletado com sucesso.']);
     }
}
