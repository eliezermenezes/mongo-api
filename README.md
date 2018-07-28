# mongo-api

Uma API RESTFul em PHP usando o Framework Laravel 5.2, criada por [Eliezer dos Santos Menezes](https://github.com/eliezermenezes), Eloise Miranda dos Santos e Marilice Andrade, para consumir uma base de dados MongoDB. Assunto ministrado pelo Prof. Eder Martins Franco na disciplina de Tópicos Especiais em Banco de Dados, TURMA 2018/01.

---
## Utilização:

1) Clone ou baixe este repositório e, estando no diretório do projeto, abra o console e digite: 
`composer install`

2) Para gerar a `APP_KEY`, estando no diretório do projeto, abra o console e digite:
`php artisan key:generate`

1) Para executar, estando no diretório do projeto, abra o console e digite: 
`php artisan serve`

3) Para testar as requisições, utilize o software de sua preferência ([Postman](https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop), por exemplo) e acesse:
`http://localhost:8000`

## Exemplos de Requisições:

A API é composta por cinco módulos, a saber (endereco, usuario, empresa, area, vaga).

---

## 1 Requisições para Endereço:

METHOD:
`GET`

URL:
`localhost:8000/api/endereco`

Response:
```
[
    {
	"cep": "00000000",
	"rua": "R dos Programadores",
	"numero": "S/N",
	"bairro": "Centro",
	"cidade": "Manaus",
	"estado": "AM"
    },
    {
	"cep": "11111111",
	"rua": "R dos Frameworks",
	"numero": "S/N",
	"bairro": "Centro",
	"cidade": "Manaus",
	"estado": "AM"
    }
]
```

METHOD:
`POST`

URL:
`localhost:8000/api/endereco`

Body (JSON):
```
{
	"cep": "..Cep",
	"rua": "..Nome da Rua/Avenida",
	"numero": "..N° da residência",
	"bairro": "..Nome do bairro",
	"cidade": "..Nome da Cidade",
	"estado": "..UF"
}
```

METHOD:
`PUT`

URL:
`localhost:8000/api/endereco/__id__`

##### Obs:
Substitua o `__id__` pelo `_id` do endereço que deseja editar. Ex: `localhost:8000/api/endereco/507f1f77bcf86cd799439011`

Body (JSON):
```
{
	"cep": "..Cep",
	"rua": "..Nome da Rua/Avenida",
	"numero": "..N° da residência",
	"bairro": "..Nome do bairro",
	"cidade": "..Nome da Cidade",
	"estado": "..UF"
}
```

Validação dos Dados (Body). Para as requisiçes `POST` e `PUT`.
```
cep 	=> [Obrigatório, Somente números], ex: 69000000.
rua 	=> [Obrigatório, Máximo 150 caracteres].
numero 	=> [Obrigatório, Máximo 5 caracteres].
bairro	=> [Obrigatório, Máximo 150 caracteres].
cidade	=> [Obrigatório, Máximo 150 caracteres].
estado	=> [Obrigatório, UF], ex: AM.
```

METHOD:
`DELETE`

URL:
`localhost:8000/api/endereco/__id__`

##### Obs:
Substitua o `__id__` pelo id do endereço que deseja deletar. Ex: `localhost:8000/api/endereco/507f1f77bcf86cd799439011`

Response:
```
{
	"success": "Endereço deletado com sucesso."
}
ou
{
	"message": "O endereço informado não foi encontrado."
}
```

## 2 Requisições para Usuário:

METHOD:
`GET`

URL:
`localhost:8000/api/usuario`

Response:
```
[
    {
	"nome": "Fulano Desenvolvedor I",
	"telefone": "999999999",
	"email": "fulano_developI@xxx.com",
	"endereco":
	{
		"cep": "00000000",
		"rua": "R dos Progamadores",
		"numero": "S/N",
		"bairro": "Centro",
		"cidade": "Manaus",
		"estado": "AM"
	}
    },
    {
	"nome": "Fulano Desenvolvedor II",
	"telefone": "988888888",
	"email": "fulano_developII@xxx.com",
	"endereco":
	{
		"cep": "11111111",
		"rua": "R dos Frameworks",
		"numero": "S/N",
		"bairro": "Centro",
		"cidade": "Manaus",
		"estado": "AM"
	}
    }
]
```

METHOD:
`POST`

URL:
`localhost:8000/api/usuario`

Body (JSON):
```
{
	"nome": "..Nome do Usuário",
	"telefone": "..Telefone do Usuário",
	"email": "..E-mail do Usuário",
	"endereco": {
		"cep": "..Cep",
		"rua": "..Nome da Rua/Avenida",
		"numero": "..N° da Residência",
		"bairro": "..Nome do Bairro",
		"cidade": "..Nome da Cidade",
		"estado": "..UF"
	}
}
```

METHOD:
`PUT`

URL:
`localhost:8000/api/usuario/__id__`

##### Obs:
Substitua o `__id__` pelo `_id` do usuário que deseja editar. Ex: `localhost:8000/api/usuario/507f1f77bcf86cd799439012`

Body (JSON):
```
{
	"nome": "..Nome do Usuário",
	"telefone": "..Telefone do Usuário",
	"email": "..E-mail do Usuário",
	"endereco": {
		"cep": "..Cep",
		"rua": "..Nome da Rua/Avenida",
		"numero": "..N° da Residência",
		"bairro": "..Nome do Bairro",
		"cidade": "..Nome da Cidade",
		"estado": "..UF"
	}
}
```

Validação dos Dados (Body). Para as requisiçes `POST` e `PUT`.
```
nome	 	=> [Obrigatório, Máximo 150 caracteres].
telefone 	=> [Obrigatório, Somente números], ex: 92999999999.
email 	 	=> [Obrigatório, E-mail, Máximo 150 caracteres].
endereco.cep 	=> [Obrigatório, Somente números], ex: 69000000.
endereco.rua 	=> [Obrigatório, Máximo 150 caracteres].
endereco.numero	=> [Obrigatório, Máximo 5 caracteres].
endereco.bairro	=> [Obrigatório, Máximo 150 caracteres].
endereco.cidade	=> [Obrigatório, Máximo 150 caracteres].
endereco.estado	=> [Obrigatório, UF], ex: AM.
```

METHOD:
`DELETE`

URL:
`localhost:8000/api/usuario/__id__`

##### Obs:
Substitua o `__id__` pelo `_id` do usuário que deseja deletar. Ex: `localhost:8000/api/usuario/507f1f77bcf86cd799439012`

Response:
```
{
	"success": "Usuário deletado com sucesso."
}
ou
{
	"message": "O usuário informado não foi encontrado."
}
```

## 3 Requisições para _Empresa:

METHOD:
`GET`

URL:
`localhost:8000/api/empresa`

Response:
```
[
    {
	"cnpj": "cnpj 1",
	"nome": "empresa 1",
	"telefone": "telefone 1",
	"endereco":
	{
		"cep": "cep 1",
		"rua": "rua 1",
		"numero": "n° 1",
		"bairro": "bairro 1",
		"cidade": "cidade 1",
		"estado": "estado 1"
	}
    }
]
```

METHOD:
`POST`

URL:
`localhost:8000/api/empresa`

Body (JSON):
```
{
	"cnpj": "CNPJ da Empresa",
	"nome": "Nome da Empresa",
	"telefone": "Telefone da Empresa",
	"endereco": "CEP do Endereço"
}
```

METHOD:
`PUT`

URL:
`localhost:8000/api/empresa/<<identificador>>`

Obs: Troque o `<<identificador>>` pelo id da empresa que deseja editar. Ex: `localhost:8000/api/empresa/1`

Body (JSON):
```
{
	"cnpj": "CNPJ da Empresa",
	"nome": "Nome da Empresa",
	"telefone": "Telefone da Empresa",
	"endereco": "CEP do Endereço"
}
```

Validação dos Dados (Body). Para as requisiçes `POST` e `PUT`.
```
cnp	 => [Obrigatório, Somente números, 14 dígitos].
nome 	 => [Obrigatório, Máximo 150 caracteres].
telefone => [Obrigatório, Somente números], ex: 92999999999.
endereco => [Obrigatório, Somente números], ex: 69000000.
```

METHOD:
`DELETE`

URL:
`localhost:8000/api/empresa/<<identificador>>`

Obs: Troque o `<<identificador>>` pelo id da empresa que deseja deletar. Ex: `localhost:8000/api/empresa/1`

Response:
```
Empresa deletada com sucesso.
ou
A empresa informada não foi encontrada.
```
## 4 Requisições para ÁREA:

METHOD:
`GET`

URL:
`localhost:8000/api/area`

Response:
```
[
    {
	"descricao": "área 1"
    },
    {
	"descricao": "área 2"
    },
    {
	"descricao": "área 3"
    }
]
```

METHOD:
`POST`

URL:
`localhost:8000/api/area`

Body (JSON):
```
{
	"descricao": "Descrição da área"
}
```

METHOD:
`PUT`

URL:
`localhost:8000/api/area/<<identificador>>`

Obs: Troque o `<<identificador>>` pelo id da área que deseja editar. Ex: `localhost:8000/api/area/1`

Body (JSON):
```
{
	"descricao": "Descrição da área"
}
```

Validação dos Dados (Body). Para as requisiçes `POST` e `PUT`.
```
descricao => [Obrigatório, Máximo 150 caracteres].
```

METHOD:
`DELETE`

URL:
`localhost:8000/api/area/<<identificador>>`

Obs: Troque o `<<identificador>>` pelo id da área que deseja deletar. Ex: `localhost:8000/api/area/1`

Response:
```
Área deletada com sucesso.
ou
A área informada não foi encontrada.
```
## 5 Requisições para VAGA:

METHOD:
`GET`

URL:
`localhost:8000/api/vaga`

Response:
```
[
    {
	"funcao": "Desenvolvedor Web",
	"salario": 1800,
	"descricao": "Atuará no desenvolvimento de Sistemas para a Web, usando Laravel e Angular 6.",
	"empresa":
	{
		"cnpj": "12345678998765",
		"nome": "Empresa Web System Manaus",
		"telefone": "999999999",
		"endereco":
		{
			"cep": "69000000",
			"rua": "Rua Manaus R",
			"numero": "1500",
			"bairro": "Bairro Manaus B",
			"cidade": "Manaus",
			"estado": "AM"
		}
	},
	area:
	{
		"descricao": "Desenvolvimento de Sistemas"
	}
    }
]
```

METHOD:
`POST`

URL:
`localhost:8000/api/vaga`

Body (JSON):
```
{
	"funcao": "Cargo referente à vaga",
	"salario": "Remuneração",
	"descricao": "Descrição da Vaga",
	"empresa": "CNPJ da empresa",
	"area": "Código da área de atuação"
}
```

METHOD:
`PUT`

URL:
`localhost:8000/api/vaga/<<identificador>>`

Obs: Troque o `<<identificador>>` pelo id da vaga que deseja editar. Ex: `localhost:8000/api/vaga/1`

Body (JSON):
```
{
	"funcao": "Cargo referente à vaga",
	"salario": "Remuneração",
	"descricao": "Descrição da Vaga",
	"empresa": "CNPJ da empresa",
	"area": "Código da área de atuação"
}
```

Validação dos Dados (Body). Para as requisiçes `POST` e `PUT`.
```
funcao 	  => [Obrigatório, Máximo 150 caracteres].
salario   => [Obrigatório, R$].
descricao => [Obrigatório, Máximo 150 caracteres].
empresa   => [Obrigatório, ID da Empresa].
area      => [Obrigatório, ID da área de atuação].
```

METHOD:
`DELETE`

URL:
`localhost:8000/api/vaga/<<identificador>>`

Obs: Troque o `<<identificador>>` pelo id da vaga que deseja deletar. Ex: `localhost:8000/api/vaga/1`

Response:
```
Vaga deletada com sucesso.
ou
A vaga informada não foi encontrada.
```
