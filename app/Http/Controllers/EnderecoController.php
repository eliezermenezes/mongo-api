<?php

namespace App\Http\Controllers;
use App\Service\IEnderecoService;
use App\Service\Traits\ValidatorTrait;
use App\Service\Utils\ResponseUtils;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    use ValidatorTrait;
    private $addressService;

    public function __construct(IEnderecoService $addressService) {
        $this->addressService = $addressService;
    }

    // TODO: Listagem de Endereços.
    public function getEnderecos() {
        $enderecos = $this->addressService->getEnderecos();

        if (is_null($enderecos) || count($enderecos) == 0) {
            return ResponseUtils::msgNoRegisterFound();
        }
        return response()->json($enderecos, ResponseUtils::COD_OK);
    }

    // TODO: Cadastro de Endereço.
    public function addEndereco(Request $request) {
        $validate = $this->validateAddressRequests($request);

        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $create = $this->addressService->createEndereco($request);
        if (!$create) {
            return ResponseUtils::msgAddressConflict();
        }
        return response()->json($create, ResponseUtils::COD_CREATED);
    }

    public function getEnderecoById($id) {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $endereco = $this->addressService->getEnderecoById($id);
        if (is_null($endereco) || count($endereco) == 0) {
            return ResponseUtils::msgAddressNotFound();
        }
        return response()->json($endereco, ResponseUtils::COD_OK);
    }

    public function updateEndereco(Request $request, $id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $validate = $this->validateAddressRequests($request);
        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $update = $this->addressService->updateEndereco($id, $request);
        if (!$update) {
            return ResponseUtils::msgAddressNotFound();
        } else if ($update == 'conflict') {
            return ResponseUtils::msgAddressConflict();
        }
        return response()->json($update, ResponseUtils::COD_OK);
    }


    public function deletaEndereco($id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $deleta = $this->addressService->deleteEndereco($id);
        if (!$deleta) {
            return ResponseUtils::msgAddressNotFound();
        }

        return response()->json(['success' => ResponseUtils::MSG_ADDRESS_DELETED], ResponseUtils::COD_OK);
    }
}
