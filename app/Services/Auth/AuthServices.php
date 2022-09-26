<?php 
    namespace App\Services\Auth;

    use App\Http\Requests\Auth\LoginValidator;
    use App\Http\Requests\Auth\RegisterValidator;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
    Use Alert;

    class AuthServices {
        public function showLogin()
        {
            return view('auth.login');
        }

        public function login(LoginValidator $request)
        {
            $user = User::where('email', $request->email)->first();

            if(!$user){
                Alert::error('Maaf', 'email tidak ditemukan'); // cara 1 alert pake Use Alert;
                return redirect('/login');
            }

            if(Auth::Attempt([
                'email'     => $request->email,
                'password'  => $request->password,
            ])){
                // cara 1 toast
                toast('Selamat datang kembali ' . Auth::user()->fname, 'success');
                return redirect('/dashboard');
            }
            alert()->error('Maaf','Password Salah'); // cara 2 alert
            return redirect('/login');
        }
        
        public function showRegister()
        {
            return view('auth.register');
        }

        public function register(RegisterValidator $request)
        {
            User::create([
                'fname'      => $request->fname,
                'lname'      => $request->lname,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
                'role'       => 'user'
            ]);

            alert()->success('success', 'Akun berhasil dibuat');
            return redirect('/login');
        }

        public function logout()
        {
            Auth::logout();
            alert()->success('success', 'Anda berhasil logout');
            return redirect('/login');
        }
    }
?>
