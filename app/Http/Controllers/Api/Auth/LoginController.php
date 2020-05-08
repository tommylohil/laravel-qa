<?php
 
namespace App\Http\Controllers\Api\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
class LoginController extends Controller
{
    public function getToken(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => 4,
            'client_secret' => 'nRzC0cSqJnVcfPFNLtwMbENXzS9N4sBob7TaIKpi',
            'username' => $request->email,
            'password' => $request->password,
        ]);
 
        $tokenRequest = Request::create(env('APP_URL') . '/oauth/token', 'post');
 
        $response = Route::dispatch($tokenRequest);
 
        return $response;
    }

    public function destroy(Request $request)
    {
        $request->user()->token()->revoke();
 
        return response()->noContent();
    }
}