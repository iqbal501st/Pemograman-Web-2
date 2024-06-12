<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    // Static admin credentials
    private $staticAdminUsername = 'admin';
    private $staticAdminPassword = 'admin123';

    // Static user credentials
    private $staticUserUsername = 'user';
    private $staticUserPassword = 'user123';

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Process login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        Log::info('Login attempt', ['username' => $credentials['username']]);

        // Check if provided credentials match static admin credentials
        if ($credentials['username'] === $this->staticAdminUsername && $credentials['password'] === $this->staticAdminPassword) {
            // Admin login successful
            Log::info('Admin login successful');
            Auth::loginUsingId(1); // Assuming admin user has ID 1
            return redirect()->route('admin');
        }
        // Check if provided credentials match static user credentials
        elseif ($credentials['username'] === $this->staticUserUsername && $credentials['password'] === $this->staticUserPassword) {
            // User login successful
            Log::info('User login successful');
            Auth::loginUsingId(2); // Assuming user has ID 2
            return redirect()->route('pengguna.dashboard');
        }
        // If credentials do not match, log error and redirect back to login with error message
        else {
            Log::error('Invalid credentials', ['username' => $credentials['username']]);
            return redirect()->back()->withInput()->withErrors(['error' => 'Invalid credentials']);
        }
    }
}
