<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        return view('dashboard.login');
    }

    public function register()
    {
        return view('dashboard.register');
    }

    public function inputRegister(Request $request)
    {
        // testing hasil input
        // dd($request->all());
        // validasi atau aturan value column pada db
        $request->validate([
            'email' => 'required',
            'name' => 'required|min:4|max:50',
            'username' => 'required|min:4',
            'password' => 'required',
        ]);
        // tambah data ke db bagian table users
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // apabila berhasil, bkl diarahin ke hlmn login dengan pesan success
        return redirect('/login')->with('success', 'berhasil membuat akun!');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => "This username doesn't exists"
        ]);

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('index');
        } else {
            // dd('salah');
            return redirect('/login')->with('fail', "Gagal login, periksa dan coba lagi!");
        }
    }

    public function logout()
    {
        // menghapus history login
        Auth::logout();
        // mengarahkan ke halaman login lagi
        return redirect('/login');
    }

    public function index()
    {
        $ddonor = Donor::all();
        return view('dashboard.index', compact('ddonor'));
    }

    /**             
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:4',
            'nik' => 'required|min:12',
            'address' => 'required|min:12',
            'age' => 'required',
            
        ]);

        Donor::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'age' => $request->age,
            'address' => $request->address,
            'status' => 0,
            
        ]);

        return redirect()->route('index')->with('successAdd','Berhasil menambahkan data donor');
    }

    public function edit($id)
    {
        $item = Donor::Where('id', $id)->first();
        // lalu tampilkan halaman dari view edit dengan mengirim data yang ada di variable todo
        return view('dashboard.edit', compact('item'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|min:4',
            'nik' => 'required|min:12',
            'address' => 'required|min:12',
            'bloodtype' => 'required',
            'age' => 'required',
            'totalcc' => 'required',
        ]);

        Donor::where('id', $id)->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'age' => $request->age,
            'address' => $request->address,
            'bloodtype' => $request->bloodtype,
            'totalcc' => $request->totalcc,
            'status' => 0,           
        ]);

        return redirect()->route('index')->with('successUpdate', 'Berhasil mengubah data donor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Donor::where('id', '=', $id)->delete();
        return redirect()->route('index')->with('successDelete', 'Berhasil menghapus data donor');
    }
}
