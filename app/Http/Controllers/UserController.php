<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy(request()->get('sortBy') ?? 'created_at')
            ->where(function ($q) {
                if (request()->get('search')) {
                    $q->where('name', 'LIKE', '%' . request()->get('search') . '%')
                        ->orWhere('email', 'LIKE', '%' . request()->get('search') . '%');
                }
            })
            ->paginate(10);

        return view('pages.users.user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ])->assignRole($validated['role']);

        session()->flash('success', 'Berhasil menambah user.');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.users.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
            'role' => ['required', 'string', 'in:manager,krani,assistant'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ], [
            // Custom error messages
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh user lain.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        try {
            // Update data user
            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
            ];

            // Update password jika diisi
            if (!empty($validated['password'])) {
                $userData['password'] = Hash::make($validated['password']);
            }

            // Update user data
            $user->update($userData);

            // Hapus semua role lama dan assign role baru
            $user->syncRoles([$validated['role']]);

            // Redirect dengan pesan sukses
            return redirect()
                ->route('user.index')
                ->with('success', 'User berhasil diupdate!');

        } catch (\Exception $e) {
            // Log error untuk debugging
            \Log::error('Error updating user: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mengupdate user. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'Berhasil menghapus user.');
        return redirect()->route('user.index');
    }
}
