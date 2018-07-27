<?php

namespace App\Http\Controllers;
use App\Service\IUsuarioService;
use App\Service\Traits\ValidatorTrait;
use App\Service\Utils\ResponseUtils;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    use ValidatorTrait;
    private $userService;

    public function __construct(IUsuarioService $userService) {
        $this->userService = $userService;
    }

    public function getUsuarios() {
        $usuarios = $this->userService->getUsuarios();

        if (is_null($usuarios) || count($usuarios) == 0) {
            return ResponseUtils::msgNoRegisterFound();
        }
        return response()->json($usuarios, ResponseUtils::COD_OK);
    }

    public function addUsuario(Request $request) {
        $validate = $this->validateUserRequests($request);

        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $create = $this->userService->createUsuario($request);
        if (!$create) {
            return ResponseUtils::msgUserConflict();
        }
        return response()->json($create, ResponseUtils::COD_CREATED);
    }

    public function getUsuarioById($id) {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $usuario = $this->userService->getUsuarioById($id);
        if (is_null($usuario) || count($usuario) == 0) {
            return ResponseUtils::msgUserNotFound();
        }
        return response()->json($usuario, ResponseUtils::COD_OK);
    }

    public function updateUsuario(Request $request, $id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $validate = $this->validateUserRequests($request);
        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $update = $this->userService->updateUsuario($id, $request);
        if (!$update) {
            return ResponseUtils::msgUserNotFound();
        } else if ($update == 'conflict') {
            return ResponseUtils::msgUserConflict();
        }
        return response()->json($update, ResponseUtils::COD_OK);
    }

    public function deletaUsuario($id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $deleta = $this->userService->deleteUsuario($id);
        if (!$deleta) {
            return ResponseUtils::msgUserNotFound();
        }

        return response()->json(['success' => ResponseUtils::MSG_USER_DELETED], ResponseUtils::COD_OK);
    }
}
