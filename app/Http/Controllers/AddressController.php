<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function create(Request $request, $userId)
    {
        $address = Address::create(array_merge(
            $request->only(['estado', 'cidade', 'rua', 'numero', 'cep']),
            ['user_id' => $userId]
        ));
        return $address;
    }

    public function read($id)
    {
        return Address::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->only(['estado', 'cidade', 'rua', 'numero', 'cep']));
        return $address;
    }

    public function delete($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return response()->json(['message' => 'Endereço deletado com sucesso.']);
    }
}
