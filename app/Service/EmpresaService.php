<?php

namespace App\Service;

use App\Empresa;
use App\Service\Exceptions\CompanyConflictException;
use App\Service\Utils\DataUtils;
use Illuminate\Http\Request;

class EmpresaService implements IEmpresaService
{
    public function createEmpresa(Request $request)
    {
        try {
            if (!DataUtils::issetCompanyInBase($request->input('cnpj'))) {
                $empresa = Empresa::create($request->all());
                return $empresa;
            }
        } catch(CompanyConflictException $e) {
            return false;
        }
    }

    public function getEmpresas()
    {
        $empresas = Empresa::all();
        return $empresas;
    }

    public function getEmpresaById($id)
    {
        $empresa = Empresa::find($id);
        return $empresa;
    }

    public function updateEmpresa($id, Request $request)
    {
        $empresa = $this->getEmpresaById($id);

        if (is_null($empresa)) return false;

        $save = false;
        if (DataUtils::issetCompanyInBase($request->input('cnpj')) && $empresa->cnpj === $request->input('cnpj')) {
            $save = true;
        } else if (!DataUtils::issetCompanyInBase($request->input('cnpj'))) {
            $save = true;
        }

        if ($save) {
            $empresa->update($request->all());
            return $empresa;
        }

        return 'conflict';
    }

    public function deleteEmpresa($id)
    {
        $empresa = $this->getEmpresaById($id);
        return is_null($empresa) ? false : $empresa->delete();
    }
}