<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1) INDEX — envia $usuarios à view
    public function index()
    {
        $usuarios = User::with('turma')->paginate(10);
        return view('admin.usuarios.index', compact('usuarios'));
    }

    // 2) CREATE — só precisa de $turmas
    public function create()
    {
        $turmas = Turma::all();
        return view('admin.usuarios.create', compact('turmas'));
    }

    // 3) STORE — insere novo usuário e redireciona
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
            'role'                  => 'required|in:admin,aluno',
            'turma_id'              => 'nullable|exists:turmas,id',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()
            ->route('admin.usuarios.index')
            ->with('success','Usuário criado com sucesso.');
    }

    // 4) EDIT — injeta o $usuario e lista as $turmas
    public function edit(User $usuario)
    {
        $turmas = Turma::all();
        return view('admin.usuarios.edit', compact('usuario','turmas'));
    }

    // 5) UPDATE — atualiza o $usuario
    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email,'.$usuario->id,
            'password'              => 'nullable|string|min:6|confirmed',
            'role'                  => 'required|in:admin,aluno',
            'turma_id'              => 'nullable|exists:turmas,id',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()
            ->route('admin.usuarios.index')
            ->with('success','Usuário atualizado com sucesso.');
    }

    // 6) DESTROY — exclui o $usuario
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return back()->with('success','Usuário excluído com sucesso.');
    }
}
