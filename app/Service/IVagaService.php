<?php
namespace App\Service;
use Illuminate\Http\Request;

interface IVagaService
{
    public function createVaga(Request $request);

    public function getVagas();

    public function getVagaById($id);

    public function updateVaga($id, Request $request);

    public function deleteVaga($id);
}