<?php
namespace App\Service;

use App\Service\Exceptions\UserConflictException;
use App\Service\Utils\DataUtils;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioService implements IUsuarioService
{
    public function createUsuario(Request $request)
    {
        try {

            if (!DataUtils::issetUserInBase($request->input('nome'))) {
                $user = Usuario::create($request->all());
                return $user;
            }
        } catch(UserConflictException $e) {
            return response()->json("user_create_conflict", 409);
        }
    }

    public function getUsuarios()
    {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    public function getUsuarioById($id)
    {
        $user = Usuario::find($id);
        return $user;
    }

    public function updateUsuario($id, Request $request)
    {
        $usuario = $this->getUsuarioById($id);

        if (is_null($usuario)) return false;

        $save = false;
        if (DataUtils::issetUserInBase($request->input('nome')) && $usuario->nome === $request->input('nome')) {
            $save = true;
        } else if (!DataUtils::issetUserInBase($request->input('nome'))) {
            $save = true;
        }

        if ($save) {
            $usuario->update($request->all());
            return $usuario;
        }

        return 'conflict';
    }

    public function patchUsuario($id, Request $request) {
        $usuario = $this->getUsuarioById($id);

        if (is_null($usuario)) return false;

        $usuario->fill($request->all())->save();
        return $usuario;
    }

    public function deleteUsuario($id)
    {
        $user = $this->getUsuarioById($id);
        return is_null($user) ? false : $user->delete();
    }
}