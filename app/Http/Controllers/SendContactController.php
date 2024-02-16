<?php

namespace App\Http\Controllers;

use App\Models\Sendcontact;
use Illuminate\Http\Request;

class SendContactController extends Controller
{
    public function sendcontact(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $requestData = $request->all();
        Sendcontact::create($requestData);
        return redirect()->route('index')->with('success', 'sendcontact');
    }
}
