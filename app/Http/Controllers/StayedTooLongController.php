<?php

namespace App\Http\Controllers;

use App\Mail\StayedTooLong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class StayedTooLongController extends Controller
{
    public function alert(Request $request) 
    {
        $user = auth()->authenticate();
        $data = $request->session()->all();

        return response()->json($user);
    }
}
