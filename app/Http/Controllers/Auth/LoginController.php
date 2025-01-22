<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processar o login
    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);

            $user = $this->attemptLogin($credentials);

            if ($user) {
                return $this->authenticated($request, $user);
            }

            return back()->withErrors(['password' => 'Usuário ou senha incorreto(s).'])->withInput();

        } catch (\Exception $e) {
            dd($e);
        }
    }

    protected function attemptLogin($credentials): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        foreach (['email', 'login'] as $field) {
            if (Auth::attempt([$field => $credentials[$field] ?? $credentials['email'], 'password' => $credentials['password']])) {
                return Auth::user();
            }
        }

        return null;
    }

    protected function authenticated(Request $request, $user): \Illuminate\Http\RedirectResponse
    {
        if (!$user->active) {
            Auth::logout();
            return redirect()->route('login')->with('error', "Conta desabilitada");
        }

        return redirect()->intended($this->redirectPath());
    }
}