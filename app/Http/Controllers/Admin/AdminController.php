<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return View
     */
    public function dashboard(): View
    {
        return view('admin.index');
    }

    /**
     * @return View
     */
    public function users(): View
    {
        $users = User::with('profile')->where('role_as', 0)->get();
        return view('admin.users.index', ['title' => 'Users', 'users' => $users]);
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function ban(string $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        $user->active = 0;
        $user->save();

        return redirect()->back()->with('success', 'User has been banned');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function unban(string $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        $user->active = 1;
        $user->save();

        return redirect()->back()->with('success', 'User has been unbanned');
    }
}
