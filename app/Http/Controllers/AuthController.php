<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
  
  
class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('user.login');
    }
  
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);

        if (Auth::check()) {
            return redirect()->route('home');
        }
        else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
  
    }
  
    public function showFormRegister()
    {
        return view('user.register');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'fname'                  => 'required|max:20',
            'lname'                  => 'required|max:20',
            'email'                 => 'required|email|unique:users,email',
            'username'              => 'required|max:10|unique:users,username',
            'password'              => 'required||min:8|max:20|confirmed'
        ];
  
        $messages = [
            'fname.required'         => 'Nama Depan wajib diisi',
            'fname.max'              => 'Nama depan maksimal 20 karakter',
            'lname.required'         => 'Nama Belakang wajib diisi',
            'lname.max'              => 'Nama belakang maksimal 20 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'username.required'     => 'Username wajib diisi',
            'username.max'          => 'Username maksimal 10 karakter',
            'username.unique'       => 'Pengguna lain sudah menggunakan nama ini',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        $user->role = strtolower($request->role);
        $user->fname = ucwords(strtolower($request->fname));
        $user->lname = ucwords(strtolower($request->lname));
        $user->email = strtolower($request->email);
        $user->username = strtolower($request->username);
        $user->password = Hash::make($request->password);
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
  
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }

    public function showFormLoginAdmin()
    {
        return view('admin.login');
    }
  
    public function loginAdmin(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);

        if (Auth::check()) {
            return redirect()->route('homeadmin');
        }
        else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('adptmadm');
        }
  
    }
  
    public function showFormRegisterAdmin()
    {
        return view('admin.register');
    }
  
    public function registerAdmin(Request $request)
    {
        $rules = [
            'fname'                  => 'required|max:20',
            'lname'                  => 'required|max:20',
            'email'                 => 'required|email|unique:users,email',
            'username'              => 'required|max:10|unique:users,username',
            'password'              => 'required||min:8|max:20|confirmed'
        ];
  
        $messages = [
            'fname.required'         => 'Nama Depan wajib diisi',
            'fname.max'              => 'Nama depan maksimal 20 karakter',
            'lname.required'         => 'Nama Belakang wajib diisi',
            'lname.max'              => 'Nama belakang maksimal 20 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'username.required'     => 'Username wajib diisi',
            'username.max'          => 'Username maksimal 10 karakter',
            'username.unique'       => 'Pengguna lain sudah menggunakan nama ini',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        $user->role = strtolower($request->role);
        $user->fname = ucwords(strtolower($request->fname));
        $user->lname = ucwords(strtolower($request->lname));
        $user->email = strtolower($request->email);
        $user->username = strtolower($request->username);
        $user->password = Hash::make($request->password);
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('adptmadm');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('pgfradmonly');
        }
    }
  
    public function logoutAdmin()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('adptmadm');
    }
}