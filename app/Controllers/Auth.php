<?php

namespace App\Controllers;

use App\Models\User;

class Auth extends BaseController
{
    protected User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        return view('auth/login');
    }

    public function authenticate()
    {
        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        if ($email === '' || $password === '') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please enter your email and password.');
        }

        $user = $this->userModel
            ->where('email', $email)
            ->where('status', 1)
            ->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid email or password.');
        }

        if (($user['role'] ?? '') !== 'admin') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'You are not authorized to access the admin panel.');
        }

        session()->regenerate();

        session()->set([
            'user_id'    => $user['id'],
            'user_name'  => $user['name'],
            'user_email' => $user['email'],
            'user_role'  => $user['role'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/admin');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/admin/login')
            ->with('success', 'You have been logged out successfully.');
    }
}