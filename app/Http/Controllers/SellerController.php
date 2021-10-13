<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function add()
    {
        return view('seller/add');
    }

    public function view()
    {
        return view('seller/view');
    }

	public function ajaxAdd(Request $request)
    {
        $valid = validator($request->only('name', 'name2', 'nip', 'regon', 'address', 'zipcode', 'city', 'bank', 'bro'), [
            'name' => 'required|string|min:4|max:255',
            'name2' => 'required|string|min:4|max:255',
            'nip' => 'required|string|min:4|max:255',
            'regon' => 'required|string|min:4|max:255',
            'address' => 'required|string|min:4|max:255',
            'zipcode' => 'required|string|min:4|max:255',
            'city' => 'required|string|min:4|max:255',
            'bank' => 'required|string|min:4|max:255',
            'bro' => 'required|string|min:4|max:255'
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors(), 400);
        }

        $data = request()->only('name', 'name2', 'nip', 'regon', 'address', 'zipcode', 'city', 'bank', 'bro');

        $seller = Seller::create([
            'name' => $data['name'],
            'name2' => $data['name2'],
            'nip' => $data['nip'],
            'regon' => $data['regon'],
            'address' => $data['address'],
            'zipcode' => $data['zipcode'],
            'city' => $data['city'],
            'bank' => $data['bank'],
            'bro' => $data['bro'],
        ]);

        return response()->json(["seller" => $seller], 201);
    }
}
