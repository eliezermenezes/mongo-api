<?php

namespace App\Service;

use App\AreaConhecimento;
use App\Service\Exceptions\AreaConflictException;
use App\Service\Utils\DataUtils;
use Illuminate\Http\Request;

class AreaService implements IAreaService
{
    public function createArea(Request $request)
    {
        try {

            if (!DataUtils::issetAreaInBase($request->input('descricao'))) {
                $area = AreaConhecimento::create($request->all());
                return $area;
            }
        } catch(AreaConflictException $e) {
            return false;
        }
    }

    public function getAreas()
    {
        $areas = AreaConhecimento::all();
        return $areas;
    }

    public function getAreaById($id)
    {
        $area = AreaConhecimento::find($id);
        return $area;
    }

    public function updateArea($id, Request $request)
    {
        $area = $this->getAreaById($id);

        if (is_null($area)) return false;

        $save = false;
        if (DataUtils::issetAreaInBase($request->input('descricao')) && $area->descricao === $request->input('descricao')) {
            $save = true;
        } else if (!DataUtils::issetAreaInBase($request->input('descricao'))) {
            $save = true;
        }

        if ($save) {
            $area->update($request->all());
            return $area;
        }

        return 'conflict';
    }

    public function deleteArea($id)
    {
        $area = $this->getAreaById($id);
        return is_null($area) ? false : $area->delete();
    }
}