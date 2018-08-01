<?php
namespace App\Service;
use Illuminate\Http\Request;

interface IEnderecoService
{
    public function createEndereco(Request $request);

    public function getEnderecos();

    public function getEnderecoById($id);

    public function updateEndereco($id, Request $request);

    public function patchEndereco($id, Request $request);

    public function deleteEndereco($id);
}