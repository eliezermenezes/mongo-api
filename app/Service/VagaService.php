<?php
namespace App\Service;


use App\Vaga;
use Illuminate\Http\Request;

class VagaService implements IVagaService
{
    public function createVaga(Request $request)
    {
        $empresa = Vaga::create($request->all());
        return $empresa;
    }

    public function getVagas()
    {
        $vagas = Vaga::all();
        return $vagas;
    }

    public function getVagaById($id)
    {
        $vaga = Vaga::find($id);
        return $vaga;
    }

    public function updateVaga($id, Request $request)
    {
        $vaga = $this->getVagaById($id);

        if (is_null($vaga)) return false;

        $vaga->update($request->all());
        return $vaga;
    }

    public function patchVaga($id, Request $request) {
        $vaga = $this->getVagaById($id);

        if (is_null($vaga)) return false;

        $vaga->fill($request->all())->save();
        return $vaga;
    }

    public function deleteVaga($id)
    {
        $vaga = $this->getVagaById($id);
        return is_null($vaga) ? false : $vaga->delete();
    }
}