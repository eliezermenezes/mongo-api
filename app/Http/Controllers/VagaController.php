<?php

namespace App\Http\Controllers;
use App\Service\IVagaService;
use App\Service\Traits\ValidatorTrait;
use App\Service\Utils\ResponseUtils;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    use ValidatorTrait;
    private $vacancyService;

    public function __construct(IVagaService $vacancyService) {
        $this->vacancyService = $vacancyService;
    }

    public function getVagas() {
        $vagas = $this->vacancyService->getVagas();

        if (is_null($vagas) || count($vagas) == 0) {
            return ResponseUtils::msgNoRegisterFound();
        }
        return response()->json($vagas, ResponseUtils::COD_OK);
    }

    public function addVaga(Request $request) {
        $validate = $this->validateVacancyRequests($request);

        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $create = $this->vacancyService->createVaga($request);
        return response()->json($create, ResponseUtils::COD_CREATED);
    }

    public function getVagaById($id) {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $vaga = $this->vacancyService->getVagaById($id);
        if (is_null($vaga) || count($vaga) == 0) {
            return ResponseUtils::msgVacancyNotFound();
        }
        return response()->json($vaga, ResponseUtils::COD_OK);
    }

    public function updateVaga(Request $request, $id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $validate = $this->validateVacancyRequests($request);
        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $update = $this->vacancyService->updateVaga($id, $request);
        if (!$update) {
            return ResponseUtils::msgVacancyNotFound();
        }
        return response()->json($update);
    }


    public function deletaVaga($id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $vaga = $this->vacancyService->deleteVaga($id);
        if (!$vaga) {
            return ResponseUtils::msgVacancyNotFound();
        }

        return response()->json(['success' => ResponseUtils::MSG_VACANCY_DELETED], ResponseUtils::COD_OK);
    }
}
