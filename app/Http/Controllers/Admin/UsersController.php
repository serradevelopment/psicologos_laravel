<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Notifications\CreatedUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['storeFirstUser','register','registerForm']]);
    }

    public function storeFirstUser(Request $request) {
        $user = new User;

        $user->fill($request->all());

        $user->password = Hash::make($request->password);
        $user->role = User::ROLE_ADMIN;

        $user->save();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            return redirect()->route('home');
        }

        return redirect()->route('home');
    }

    public function registerForm(){
        return view('auth.login');
    }

    public function register(Request $request) {

        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
        ]);

        $user = new User;

        $user->fill($request->all());

        $user->password = Hash::make($request->password);

        $user->role = User::ROLE_COMMON;

        if($request->is_trainee == '1'){
            $user->role = User::ROLE_TRAINEE;
        }

        $user->locked = 1;

        if ($request->hasFile('crp_scan')) {
            $extension_crp = $request->file('crp_scan')->getClientOriginalExtension();
            $user->crp_image_extension = $extension_crp;
        }
        if ($request->hasFile('e_psi')) {
            $e_psi_image_extension = $request->file('e_psi')->getClientOriginalExtension();
            $user->e_psi_image_extension = $e_psi_image_extension;
        }

        $user->save();

        if ($request->hasFile('crp_scan')) {
            $request->file('crp_scan')->move(base_path('/public_html/files/users/crp'), sprintf('%s.%s', $user->id, $extension_crp));
        }
        if ($request->hasFile('e_psi')) {
            $request->file('e_psi')->move(base_path('/public_html/files/users/epsi'), sprintf('%s.%s', $user->id, $e_psi_image_extension));
        }

        return redirect()->route('login')->with('flash.success','Usuário cadastrado com sucesso. Seus dados serão validados e assim que confimados, você reberá um email informando que seu acesso foi liberado. Não esqueça de verificar a caixa de spam do seu email.');
    }

    public function index()
    {
        $this->authorize('index', User::class);

        $users = User::orderBy('name')->get();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);

        $user = new User;

        return view('admin.users.create', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
        ]);

        $user = new User;

        $user->fill($request->all());

        if($request->is_trainee == '1'){
            $user->role == User::ROLE_TRAINEE;
        }
        $user->password = Hash::make($request->password);

        if ($request->hasFile('crp_scan')) {
            $extension_crp = $request->file('crp_scan')->getClientOriginalExtension();
            $user->crp_image_extension = $extension_crp;
        }
        if ($request->hasFile('e_psi')) {
            $e_psi_image_extension = $request->file('e_psi')->getClientOriginalExtension();
            $user->e_psi_image_extension = $e_psi_image_extension;
        }

        $user->save();

        if ($request->hasFile('crp_scan')) {
            $request->file('crp_scan')->move(base_path('/public_html/files/users/crp'), sprintf('%s.%s', $user->id, $extension_crp));
        }
        if ($request->hasFile('e_psi')) {
            $request->file('e_psi')->move(base_path('/public_html/files/users/epsi'), sprintf('%s.%s', $user->id, $e_psi_image_extension));
        }


        $allAdmins = User::all()->where('role',User::ROLE_ADMIN);

        foreach ($allAdmins as $user) {
            $user->notify(new CreatedUser($user,auth()->user()));
        }

        return redirect()->route('users.index')->with('flash.success', 'Usuário salvo com sucesso');
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        $user->fill($request->all());

        if (!empty($request->new_password)) {
            $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('crp_scan')) {
            $extension_crp = $request->file('crp_scan')->getClientOriginalExtension();
            $user->crp_image_extension = $extension_crp;
        }
        if ($request->hasFile('e_psi')) {
            $e_psi_image_extension = $request->file('e_psi')->getClientOriginalExtension();
            $user->e_psi_image_extension = $e_psi_image_extension;
        }

        $user->save();

        if ($request->hasFile('crp_scan')) {
            $request->file('crp_scan')->move(base_path('/public_html/files/users/crp'), sprintf('%s.%s', $user->id, $extension_crp));
        }
        if ($request->hasFile('e_psi')) {
            $request->file('e_psi')->move(base_path('/public_html/files/users/epsi'), sprintf('%s.%s', $user->id, $e_psi_image_extension));
        }

        return redirect()->route('users.index')->with('flash.success', 'Usuário salvo com sucesso');
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);

        $user->delete();

        return redirect()->route('users.index')->with('flash.success', 'Usuário excluído com sucesso');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('admin.users.profile', [
            'user' => $user
        ]);
    }

    public function show(User $user){
        return view('admin.users.show')->with(['user'=>$user]);
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->fill($request->all());

        if (!empty($request->new_password)) {
            $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('imagem')) {
            $extension = $request->file('imagem')->getClientOriginalExtension();

            $user->avatar_extension = $extension;
        }
        if ($request->hasFile('crp_scan')) {
            $extension_crp = $request->file('crp_scan')->getClientOriginalExtension();
            $user->crp_image_extension = $extension_crp;
        }
        if ($request->hasFile('e_psi')) {
            $e_psi_image_extension = $request->file('e_psi')->getClientOriginalExtension();
            $user->e_psi_image_extension = $e_psi_image_extension;
        }

        $user->save();

        if ($request->hasFile('imagem')) {
            $request->file('imagem')->move(base_path('/public_html/files/users'), sprintf('%s.%s', $user->id, $extension));
        }
        if ($request->hasFile('crp_scan')) {
            $request->file('crp_scan')->move(base_path('/public_html/files/users/crp'), sprintf('%s.%s', $user->id, $extension_crp));
        }
        if ($request->hasFile('e_psi')) {
            $request->file('e_psi')->move(base_path('/public_html/files/users/epsi'), sprintf('%s.%s', $user->id, $e_psi_image_extension));
        }
        return redirect()->route('users.profile')->with('flash.success', 'Perfil salvo com sucesso');
    }

    public function checkEmail(Request $request)
    {
        if (!empty($request->id)) {
            $user = User::find($request->id);

            return (User::where('email', $request->email)
                ->where('email', '<>', $user->email)
                ->first()) ? 'false' : 'true';
        } else {
            return (User::where('email', $request->email)->first()) ? 'false' : 'true';
        }
    }

    public function checkProfileEmail(Request $request)
    {
        if ($request->email == Auth::user()->email) {
            return 'true';
        }

        $user = User::where('email', $request->input('email'))->first();

        return ($user) ? 'false' : 'true';
    }

    public function checkProfilePassword(Request $request)
    {
        $user = Auth::user();

        return (Hash::check($request->old_password, $user->password)) ? 'true' : 'false';
    }

    public function block(User $user) {
        $this->authorize('block', $user);

        $user->locked = true;

        $user->save();

        return redirect()->route('users.index')->with('flash.success', 'Usuário bloqueado com sucesso');
    }

    public function unblock(User $user) {

        Mail::to($user->email)->send(new \App\Mail\CadastroLiberado($user));

        $this->authorize('unblock', $user);

        $user->locked = false;

        $user->save();

        return redirect()->route('users.index')->with('flash.success', 'Usuário desbloqueado com sucesso');
    }
}
