<?php

namespace App\Http\Controllers;
use App\Service\IAreaService;
use App\Service\Traits\ValidatorTrait;
use App\Service\Utils\ResponseUtils;
use Illuminate\Http\Request;

class AreaConhecimentoController extends Controller
{
    use ValidatorTrait;
    private $areaService;

    public function __construct(IAreaService $areaService) {
        $this->areaService = $areaService;
    }

    public function getAreas() {
        $areas = $this->areaService->getAreas();

        if (is_null($areas)) {
            return ResponseUtils::msgNoRegisterFound();
        }
        return response()->json($areas, ResponseUtils::COD_OK);
    }

    public function addArea(Request $request) {
        $validate = $this->validateAreaRequests($request);

        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $create = $this->areaService->createArea($request);
        if (!$create) {
            return response()->json(ResponseUtils::MSG_AREA_CONFLICT, ResponseUtils::COD_CONFLICT);
        }
        return response()->json($create, ResponseUtils::COD_CREATED);
    }

    public function getAreaById($id) {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $area = $this->areaService->getAreaById($id);
        if (is_null($area)) {
            return ResponseUtils::msgAreaNotFound();
        }
        return response()->json($area, ResponseUtils::COD_OK);
    }

    public function updateArea(Request $request, $id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $validate = $this->validateAreaRequests($request);
        if ($validate->error) {
            return response()->json($validate->message, ResponseUtils::COD_INVALID_REQUEST);
        }

        $update = $this->areaService->updateArea($id, $request);
        if (!$update) {
            return ResponseUtils::msgAreaNotFound();
        }
        return response()->json($update);
    }


    public function deletaArea($id)
    {
        if (!$this->identifierValid($id)) {
            return ResponseUtils::msgIdentifierInvalid();
        }

        $area = $this->areaService->deleteArea($id);
        if (!$area) {
            return ResponseUtils::msgAreaNotFound();
        }

        return response()->json(ResponseUtils::MSG_AREA_DELETED, ResponseUtils::COD_OK);
    }
}
