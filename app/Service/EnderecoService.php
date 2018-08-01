<?php
namespace App\Service;

use App\Endereco;
use App\Service\Exceptions\AddressConflictException;
use App\Service\Utils\DataUtils;
use Illuminate\Http\Request;

class EnderecoService implements IEnderecoService
{

    public function createEndereco(Request $request)
    {
        try {
            if (!DataUtils::issetAddressInBase($request->input('cep'))) {
                $endereco = Endereco::create($request->all());
                return $endereco;
            }
        } catch(AddressConflictException $e) {
            return false;
        }
    }

    public function getEnderecos()
    {
        $enderecos = Endereco::all();
        return $enderecos;
    }

    public function getEnderecoById($id)
    {
        $endereco = Endereco::find($id);
        return $endereco;
    }

    public function updateEndereco($id, Request $request)
    {
        $endereco = $this->getEnderecoById($id);

        if (is_null($endereco)) return false;

        $save = false;
        if (DataUtils::issetAddressInBase($request->input('cep')) && $endereco->cep === $request->input('cep')) {
            $save = true;
        } else if (!DataUtils::issetAddressInBase($request->input('cep'))) {
            $save = true;
        }

        if ($save) {
            $endereco->update($request->all());
            return $endereco;
        }

        return 'conflict';
    }

    public function patchEndereco($id, Request $request) {
        $endereco = $this->getEnderecoById($id);

        if (is_null($endereco)) return false;

        $endereco->fill($request->all())->save();
        return $endereco;
    }

    public function deleteEndereco($id)
    {
        $endereco = $this->getEnderecoById($id);
        return is_null($endereco) ? false : $endereco->delete();
    }
}