<?php
namespace App\Service\Traits;
use App\Service\Utils\ValidatorUtils;
use Illuminate\Http\Request;
use Validator;

trait ValidatorTrait
{
    public function identifierValid($id) {
        return !is_null($id) && $id > 0;
    }

    private function mountErrorsRequest($validation) {

        $hasFail = $validation->fails() ? true : false;
        $hasErro = $hasFail ? $validation->errors() : '';

        $errors = new \stdClass();
        $errors->error = $hasFail;
        $errors->message = $hasErro;

        return $errors;
    }

    private function validation($request = null, $rules = [], $messages = []) {
        return Validator::make($request, $rules, $messages);
    }

    public function validateUserRequests(Request $request) {

        $validate = $this->validation($request->all(), $this->fieldsOfUser(), $this->messagesOfErrors());
        return $this->mountErrorsRequest($validate);
    }

    public function validateAddressRequests(Request $request) {
        $validate = $this->validation($request->all(), $this->fieldsOfAddress(), $this->messagesOfErrors());
        return $this->mountErrorsRequest($validate);
    }

    public function validateCompanyRequests(Request $request) {
        $validate = $this->validation($request->all(), $this->fieldsOfCompany(), $this->messagesOfErrors());
        return $this->mountErrorsRequest($validate);
    }

    public function validateAreaRequests(Request $request) {
        $validate = $this->validation($request->all(), $this->fieldsOfArea(), $this->messagesOfErrors());
        return $this->mountErrorsRequest($validate);
    }

    public function validateVacancyRequests(Request $request) {
        $validate = $this->validation($request->all(), $this->fieldsOfVacancy(), $this->messagesOfErrors());
        return $this->mountErrorsRequest($validate);
    }

    private function fieldsOfAddress() {
        return array(
            'cep'               => ValidatorUtils::REQUIRED_CEP,
            'rua'               => ValidatorUtils::REQUIRED_STRING,
            'numero'            => ValidatorUtils::REQUIRED_NUMBER,
            'bairro'            => ValidatorUtils::REQUIRED_STRING,
            'cidade'            => ValidatorUtils::REQUIRED_STRING,
            'estado'            => ValidatorUtils::REQUIRED_UF
        );
    }
    private function fieldsOfUser() {
        return array(
            'nome'              => ValidatorUtils::REQUIRED_STRING,
            'telefone'          => ValidatorUtils::REQUIRED_PHONE,
            'email'             => ValidatorUtils::REQUIRED_EMAIL,
            'endereco.rua'      => ValidatorUtils::REQUIRED_STRING,
            'endereco.numero'   => ValidatorUtils::REQUIRED_NUMBER,
            'endereco.bairro'   => ValidatorUtils::REQUIRED_STRING,
            'endereco.cidade'   => ValidatorUtils::REQUIRED_STRING,
            'endereco.estado'   => ValidatorUtils::REQUIRED_STRING,
            'endereco.cep'      => ValidatorUtils::REQUIRED_CEP
        );
    }
    private function fieldsOfCompany() {
        return array(
            'cnpj'              => ValidatorUtils::REQUIRED_CNPJ,
            'nome'              => ValidatorUtils::REQUIRED_STRING,
            'telefone'          => ValidatorUtils::REQUIRED_PHONE,
            'endereco.rua'      => ValidatorUtils::REQUIRED_STRING,
            'endereco.numero'   => ValidatorUtils::REQUIRED_NUMBER,
            'endereco.bairro'   => ValidatorUtils::REQUIRED_STRING,
            'endereco.cidade'   => ValidatorUtils::REQUIRED_STRING,
            'endereco.estado'   => ValidatorUtils::REQUIRED_STRING,
            'endereco.cep'      => ValidatorUtils::REQUIRED_CEP
        );
    }
    private function fieldsOfArea() {
        return array(
            'descricao'         => ValidatorUtils::REQUIRED_STRING,
        );
    }
    private function fieldsOfVacancy() {
        return array(
            'funcao'            => ValidatorUtils::REQUIRED_STRING,
            'salario'           => ValidatorUtils::REQUIRED_MONEY,
            'descricao'         => ValidatorUtils::REQUIRED_STRING,
            'empresa.cnpj'      => ValidatorUtils::REQUIRED_CNPJ,
            'empresa.nome'      => ValidatorUtils::REQUIRED_STRING,
            'empresa.telefone'  => ValidatorUtils::REQUIRED_PHONE,
            'area.descricao'    => ValidatorUtils::REQUIRED_STRING
        );
    }
    private function messagesOfErrors() {
        return array(
            'required'          => ValidatorUtils::MSG_REQUIRED,
            'string'            => ValidatorUtils::MSG_STRING,
            'email'             => ValidatorUtils::MSG_EMAIL,
            'numero.max'        => ValidatorUtils::MSG_MAX_FIVE_CHARACTERS,
            'estado.size'       => ValidatorUtils::MSG_UF_FORMAT,
            'max'               => ValidatorUtils::MSG_MAX_NANE_CHARACTERS,
            'salario.regex'     => ValidatorUtils::MSG_MONEY_FORMAT,
            'telefone.regex'    => ValidatorUtils::MSG_PHONE_FORMAT,
            'regex'             => ValidatorUtils::MSG_CEP_FORMAT,
            'cnpj.digits'       => ValidatorUtils::MSG_CNPJ_FORMAT,

            'endereco.numero.max' => ValidatorUtils::MSG_MAX_FIVE_CHARACTERS,
            'empresa.cnpj.digits' => ValidatorUtils::MSG_CNPJ_FORMAT,
            'empresa.telefone.regex' => ValidatorUtils::MSG_PHONE_FORMAT
        );
    }
}