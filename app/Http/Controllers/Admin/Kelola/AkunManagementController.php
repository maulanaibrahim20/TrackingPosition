<?php

namespace App\Http\Controllers\Admin\Kelola;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AkunManagementController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $content  = [
            'title' => 'Akun Management',
            'subtitle' => 'Kelola Akun Management',
            'breadcrumb' => 'Akun Management',
        ];
        $data['user_akses'] = $this->user::where('akses', '!=', 'admin')->pluck('akses');
        $data['user'] = $this->user::orderBy('akses', 'ASC')->get();
        return view('admin.pages.kelola.akun_management.index', $content, $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|',
            'email' => 'email|required',
            'role' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $this->user::create([
                'name' => $request->name,
                'email' => $request->email,
                'akses' => $request->role,
                'password' => bcrypt('pasword123')
            ]);
            DB::commit();
            return back()->with('success', 'Succes Data User Berhasil Ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error Terjadi Kesalahan', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data["edit"] = $this->user->where("id", $id)->first();
        $data['user_akses'] = $this->user::where('akses', '!=', 'admin')->pluck('akses');

        return view('admin.pages.kelola.akun_management.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|',
            'email' => 'email|required',
            'role' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $user = $this->user::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'akses' => $request->role,
            ]);
            DB::commit();
            return back()->with('success', 'Succes Data User Berhasil Diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error Terjadi Kesalahan', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $user = $this->user::find($id);
            $user->delete();
            DB::commit();
            return back()->with('success', 'Success Data Pengguna Untuk Berhasil Dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error Data Pengguna Untuk Gagal Dihapus!');
        }
    }
}
