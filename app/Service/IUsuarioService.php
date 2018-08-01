<?php
namespace App\Service;
use Illuminate\Http\Request;

interface IUsuarioService
{
    public function createUsuario(Request $request);

    public function getUsuarios();

    public function getUsuarioById($id);

    public function updateUsuario($id, Request $request);

    public function patchUsuario($id, Request $request);

    public function deleteUsuario($id);
}