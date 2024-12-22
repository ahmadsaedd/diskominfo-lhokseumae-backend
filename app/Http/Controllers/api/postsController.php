<?php
namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\informasi_publiks;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\postsResource;
use Illuminate\Support\Facades\Storage;

class postsController extends Controller
{
    public function login(Request $request) 
    {
        
        $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
         ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'token' => $token,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function logout(Request $request)
    {
        // Hapus token pengguna
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ]);
    }
    
    public function index()
    {
        $staff = Staff::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diambil',
            'data' => postsResource::collection($staff),
        ]);
    }

    public function informasipublik()
    {
        $data = informasi_publiks::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diambil',
            'data' => $data,
        ]);
    }

    public function informasipost(Request $request)
    {
        $request->validate([
            'informasi' => 'required|string',
            'judul' => 'required|string',
            'url' => 'required|string',
            'tanggal' => 'required|string',
        ]);

        $data = new informasi_publiks();
        $data->informasi = $request->informasi;
        $data->judul = $request->judul;
        $data->url = $request->url;
        $data->dibuat = $request->tanggal;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    public function delete_informasipublik($id)
    {
        $data = informasi_publiks::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }

    public function tambahstaff(Request $request)
    {
        // Menyimpan foto dan mendapatkan path-nya
        $fotoPath = $request->file('foto')->store('', 'public'); // Menyimpan foto di folder public

        // Menyimpan data staff ke database
        $staff = Staff::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath, // Menyimpan path foto ke database
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data staff berhasil ditambahkan!',
            'data' => $staff,
        ], 201);
    }

        public function delete_staff($id)
        {
            $data = staff::find($id);

            if (!$data) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data not found',
                ], 404);
            }

            if ($data->foto) {
                
                $fotoPath = public_path("storage/" . $data->foto);

                if (file_exists($fotoPath)) {
                    unlink($fotoPath); 
                }
            }

            $data->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ]);
        }

}