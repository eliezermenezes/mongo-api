<?php
namespace App\Service;
use Illuminate\Http\Request;

interface IEmpresaService
{
    public function createEmpresa(Request $request);

    public function getEmpresas();

    public function getEmpresaById($id);

    public function updateEmpresa($id, Request $request);

    public function deleteEmpresa($id);
}