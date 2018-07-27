<?php

namespace App\Service\Utils;

use App\Empresa;
use App\Endereco;
use App\Usuario;

class DataUtils
{
    public static function issetAddressInBase($cep) {
        $address = Endereco::where('cep', $cep)->first();
        return !is_null($address);
    }

    public static function issetUserInBase($nome) {
        $user = Usuario::where('nome', $nome)->first();
        return !is_null($user);
    }

    public static function issetCompanyInBase($cnpj) {
        $company = Empresa::where('cnpj', $cnpj)->first();
        return !is_null($company);
    }
}