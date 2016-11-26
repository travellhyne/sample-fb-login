<?php

namespace App\Http\Controllers;

use App\Mail\StayedTooLong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class StayedTooLongController extends Controller
{
    public function alert($id) 
    {
        $user = User::find($id);
        Mail::to($user->email)->send(new StayedTooLong());
        return response()->json([
            'message' => 'Email sent!'
        ]);
    }
}
