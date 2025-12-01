<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // SEARCH
        if ($request->search) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")
                  ->orWhere('email', 'like', "%$keyword%");
            });
        }

        $data['dataUser'] = $query->paginate(10)->withQueryString();

        return view('admin.user.index', $data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'       => 'required',
            'last_name'        => 'required',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:6',
            'role'             => 'required|in:admin,pegawai,pelanggan,mitra',
            'status'           => 'required|in:active,inactive',
            'profile_picture'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload foto
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')
                ->store('profile_pictures', 'public');
        }

        User::create([
            'name'             => $request->first_name . ' ' . $request->last_name,
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'role'             => $request->role,
            'status'           => $request->status,
            'profile_picture'  => $profilePicturePath,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat!');
    }

    public function edit($id)
    {
        $dataUser = User::findOrFail($id);
        return view('admin.user.edit', compact('dataUser'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'            => 'required',
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'role'            => 'required|in:admin,pegawai,pelanggan,mitra',
            'status'          => 'required|in:active,inactive',
            'password'        => 'nullable|min:6|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user->name   = $request->name;
        $user->email  = $request->email;
        $user->role   = $request->role;
        $user->status = $request->status;

        // Foto baru?
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
            $user->profile_picture = $request->file('profile_picture')
                ->store('profile_pictures', 'public');
        }

        // Password baru?
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture);
        }

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus!');
    }
}
