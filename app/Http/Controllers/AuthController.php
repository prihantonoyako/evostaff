<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function showLogin(): View | RedirectResponse {
		// Check if user logged in (active session)
		if(Auth::check()) {
			return redirect('dashboard');
		}

		return View('auth.login', [
			'urlForgot' => url('/auth/forgot-password'),
			'urlHome' => url('/'),
			'urlLogin' => url('/auth/login'),
			'urlRegister' => url('/auth/register'),
		]);
	}
	
	public function login(Request $request): Redirector | RedirectResponse {
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);

		$credentials['status'] = 1;

		if (!Auth::attempt($credentials)) {
			$user = User::where([
				['email', '=', $credentials['email']],
				['status', '=', 1]
			]);

			$user = $user->first();

			if ($user) {
				$user->fail_login_attempt = ++$user->fail_login_attempt;
				$user->save();
			}

			return back()->withErrors([
				'email' => 'The provided credentials do not match our records.',
			])->onlyInput('email');
		}

		$user = Auth::user();

		// locked account ISO compliance
		if ($user->fail_login_attempt == 5) {
			Auth::logout();
			$request->session()->invalidate();
    		$request->session()->regenerateToken();

			return redirect('/auth/locked-account');
		}
			
		$passwordHistory = PasswordHistory::where('user_id', $user->id);
		if (!$passwordHistory->exists()) {

			$request->session()->invalidate();

			return redirect('/exception/data-not-found');
		}

		$passwordHistory = $passwordHistory->orderBy('created_at', 'desc')->first();

		// prevent session fixation
		$request->session()->regenerate();
		
		return redirect('/dashboard');
	}

	public function logout(Request $request): RedirectResponse {
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/auth/logout');
	}

	public function logoutWebsite(Request $request): RedirectResponse {
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/auth/login');
	}

	public function showRegister(): View {
		return View('auth.register', [
			'urlLogin' => url('auth/login'),
			'urlRegiser' => url('auth/register')
		]);
	}

	public function register(Request $request) {
		// $user = new User();
		// $user->fill([
		//     'password' => Hash::make($request->password, [
		//         'rounds' => 12
		//     ])
		// ]);
	}

	public function lockedAccount(): View {
		return View('auth.locked-account', [
			'warningMessage' => 'Your account was locked. Please contact your administrator!',
			'urlReportIncident' => url('report/locked-account')
		]);
	}
}
