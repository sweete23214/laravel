<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Показ формы регистрации
    public function showRegister()
    {
        return view('auth.register');
    }

    // Обработка регистрации
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255', // Логин уникальный
            'password' => 'required|confirmed|min:4', // Пароль с подтверждением
        ]);

        // Создаем пользователя (пароль автоматически хешируется)
        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        // Сразу авторизуем его
        Auth::login($user);

        return redirect()->route('home');
    }

    // Показ формы входа
    public function showLogin()
    {
        return view('auth.login');
    }

    // Обработка входа
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Пытаемся войти
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'name' => 'Неверный логин или пароль.',
        ]);
    }

    // Выход
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}