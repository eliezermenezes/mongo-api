<?php

namespace App\Http\Controllers;
use App\Service\IEmpresaService;
use App\Service\Traits\ValidatorTrait;
use App\Service\Utils\ResponseUtils;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    use ValidatorTrait;
    private $companyService;

    public function __construct(IEmpresaService $companyService) {
        $this->companyService = $companyService;
    }

    public function getEmpresas() {
        $empresas = $this->companyService->getEmpresas();

        if (is_null($empresas) || count($empresas) == 0) {
            return ResponseUtils::msgNoRegisterFound();
        }
        return response()->json($empresas, ResponseUtils::COD_OK);
    }

    public function addEmpresa(Request $request) {
        $validate = $this->validateCompanyRequests($request);

        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $create = $this->companyService->createEmpresa($request);
        if (!$create) {
            return ResponseUtils::msgCompanyConflict();
        }
        return response()->json($create, ResponseUtils::COD_CREATED);
    }

    public function getEmpresaById($id) {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $empresa = $this->companyService->getEmpresaById($id);
        if (is_null($empresa) || count($empresa) == 0) {
            return ResponseUtils::msgCompanyNotFound();
        }
        return response()->json($empresa, ResponseUtils::COD_OK);
    }

    public function updateEmpresa(Request $request, $id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $validate = $this->validateCompanyRequests($request);
        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $update = $this->companyService->updateEmpresa($id, $request);
        if (!$update) {
            return ResponseUtils::msgCompanyNotFound();
        } else if ($update == 'conflict') {
            return ResponseUtils::msgCompanyConflict();
        }
        return response()->json($update);
    }


    public function deletaEmpresa($id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $deleta = $this->companyService->deleteEmpresa($id);
        if (!$deleta) {
            return ResponseUtils::msgCompanyNotFound();
        }

        return response()->json(['success' => ResponseUtils::MSG_COMPANY_DELETED], ResponseUtils::COD_OK);
    }
}
