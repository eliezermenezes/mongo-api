<?php
namespace App\Service\Utils;

class ResponseUtils
{
    const COD_OK = '200';
    const COD_CREATED = '201';
    const COD_CONFLICT = '409';
    const COD_NOT_FOUND = '404';
    const COD_ERROR_SERVER = '500';
    const COD_INVALID_REQUEST = '422';

    const MSG_NO_REGISTER_FOUND = 'Nenhum registro encontrado.';
    const MSG_USER_NOT_FOUND = 'O usuário informado não foi encontrado.';
    const MSG_ADDRESS_NOT_FOUND = 'O endereço informado não foi encontrado.';
    const MSG_COMPANY_NOT_FOUND = 'A empresa informada não foi encontrada.';
    const MSG_AREA_NOT_FOUND = 'A área informada não foi encontrada.';
    const MSG_VACANCY_NOT_FOUND = 'A vaga informada não foi encontrada.';

    const MSG_IDENTIFIER_NULL = 'Informe um identificador válido do registro.';
    const MSG_USER_DELETED = 'Usuário deletado com sucesso';
    const MSG_COMPANY_DELETED = 'Empresa deletada com sucesso';
    const MSG_ADDRESS_DELETED = 'Endereço deletado com sucesso';
    const MSG_AREA_DELETED = 'Área deletada com sucesso';
    const MSG_VACANCY_DELETED = 'Vaga deletada com sucesso';

    const MSG_USER_CONFLICT = 'Um usuário com o NOME informado já existe na base de dados.';
    const MSG_ADDRESS_CONFLICT = 'Um endereço com o CEP informado já existe na base de dados.';
    const MSG_COMPANY_CONFLICT = 'Uma empresa com o CNPJ informado já existe na base de dados.';
    const MSG_AREA_CONFLICT = 'Uma área com a descrição informada já existe na base de dados.';

    public static function msgNoRegisterFound() {
        return response()->json(['message' => ResponseUtils::MSG_NO_REGISTER_FOUND], ResponseUtils::COD_NOT_FOUND);
    }

    public static function msgIdentifierInvalid() {
        return response()->json(['message' => ResponseUtils::MSG_IDENTIFIER_NULL], ResponseUtils::COD_INVALID_REQUEST);
    }

    public static function msgUserNotFound() {
        return response()->json(['message' => ResponseUtils::MSG_USER_NOT_FOUND], ResponseUtils::COD_NOT_FOUND);
    }

    public static function msgAddressNotFound() {
        return response()->json(['message' => ResponseUtils::MSG_ADDRESS_NOT_FOUND], ResponseUtils::COD_NOT_FOUND);
    }

    public static function msgCompanyNotFound() {
        return response()->json(['message' => ResponseUtils::MSG_COMPANY_NOT_FOUND], ResponseUtils::COD_NOT_FOUND);
    }

    public static function msgAreaNotFound() {
        return response()->json(['message' => ResponseUtils::MSG_AREA_NOT_FOUND], ResponseUtils::COD_NOT_FOUND);
    }

    public static function msgVacancyNotFound() {
        return response()->json(['message' => ResponseUtils::MSG_VACANCY_NOT_FOUND], ResponseUtils::COD_NOT_FOUND);
    }

    public static function msgAddressConflict() {
        return response()->json(['message' => ResponseUtils::MSG_ADDRESS_CONFLICT], ResponseUtils::COD_CONFLICT);
    }

    public static function msgUserConflict() {
        return response()->json(['message' => ResponseUtils::MSG_USER_CONFLICT], ResponseUtils::COD_CONFLICT);
    }

    public static function msgCompanyConflict() {
        return response()->json(['message' => ResponseUtils::MSG_COMPANY_CONFLICT], ResponseUtils::COD_CONFLICT);
    }

    public static function msgAreaConflict() {
        return response()->json(['message' => ResponseUtils::MSG_AREA_CONFLICT], ResponseUtils::COD_CONFLICT);
    }
}