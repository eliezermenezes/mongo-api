<?php

namespace App\Service\Utils;

class ValidatorUtils
{

    const REQUIRED_STRING   = "required|max:150|string";
    const REQUIRED_CEP      = "required|regex:/^(\d){8}$/";
    const REQUIRED_UF       = "required|string|size:2";
    const REQUIRED_PHONE    = "required|regex:/^(\d){9}$/";
    const REQUIRED_EMAIL    = "required|email|max:150";
    const REQUIRED_CNPJ     = "required|digits:14";
    const REQUIRED_MONEY    = "required|regex:/^\d{1,13}(\.\d{1,4})?$/";
    const REQUIRED_NUMBER   = "required|max:5";
    const REQUIRED_ID       = "required";

    const MSG_REQUIRED              = "Campo de preenchimento obrigatório.";
    const MSG_STRING                = "Este campo deve ser uma string.";
    const MSG_EMAIL                 = "Este campo deve ser um e-mail válido.";
    const MSG_MAX_FIVE_CHARACTERS   = "Este campo deve ser composto por no máximo 5 caracteres";
    const MSG_UF_FORMAT             = "Este campo deve ser no formato de UF, com 2 caracteres";
    const MSG_MAX_NANE_CHARACTERS   = "Este campo deve ser composto por no máximo 9 caracteres";
    const MSG_MONEY_FORMAT          = "Este campo deve ser em formato de moeda (R$). Ex: 1500.00";
    const MSG_PHONE_FORMAT          = "Este campo deve ser um telefone válido. Ex: 900000000";
    const MSG_CEP_FORMAT            = "Este campo deve ser em formato de CEP. Ex: 00000000";
    const MSG_CNPJ_FORMAT           = "Este campo deve ser em formato de CNPJ, com 14 dígitos. Obs: Somente números";

    const QNT_FIELDS_ADDRESS = 6;
    const QNT_FIELDS_USERS = 9;
    const QNT_FIELDS_COMPANY = 9;
    const QNT_FIELDS_VACANCY = 7;
 }