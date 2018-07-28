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
    },
    {
	"cep": "22222222",
	"rua": "R dos Patrões",
	"numero": "1500",
	"bairro": "Patrões",
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

## 3 Requisições para Empresa:

METHOD:
`GET`

URL:
`localhost:8000/api/empresa`

Response:
```
[
    {
	"cnpj": "12345678912345",
	"nome": "DESEN SOFT LDTA",
	"telefone": "9333333333",
	"endereco":
	{
		"cep": "22222222",
		"rua": "R dos Patrões",
		"numero": "1500",
		"bairro": "Patrões",
		"cidade": "Manaus",
		"estado": "AM"
	}
    },
    {
	"cnpj": "9876543219865",
	"nome": "AMAZON WEB DEV",
	"telefone": "966666666",
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
`localhost:8000/api/empresa`

Body (JSON):
```
{
	"cnpj": "..Cnpj",
	"nome": "..Nome da Empresa",
	"telefone": "..Telefone da Empresa",
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
`localhost:8000/api/empresa/__id__`

##### Obs:
Substitua o `__id__` pelo `_id` da empresa que deseja editar. Ex: `localhost:8000/api/empresa/507f1f77bcf86cd799439013`

Body (JSON):
```
{
	"cnpj": "..Cnpj",
	"nome": "..Nome da Empresa",
	"telefone": "..Telefone da Empresa",
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
cnp	 	=> [Obrigatório, Somente números, 14 dígitos].
nome 	 	=> [Obrigatório, Máximo 150 caracteres].
telefone 	=> [Obrigatório, Somente números], ex: 92999999999.
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
`localhost:8000/api/empresa/__id__`

Obs: Troque o `__id__` pelo `_id` da empresa que deseja deletar. Ex: `localhost:8000/api/empresa/507f1f77bcf86cd799439013`

Response:
```
{
	"success": "Empresa deletada com sucesso."
}
ou
{
	"message": "A empresa informada não foi encontrada."
}
```
## 4 Requisições para Área:

METHOD:
`GET`

URL:
`localhost:8000/api/area`

Response:
```
[
    {
	"descricao": "Desenvolvimento de Sistemas Web.",
	"created_at":
	"updated_at":
    },
    {
	"descricao": "Desenvolvimento de Drivers.",
	"created_at":
	"updated_at":
    },
    {
	"descricao": "Engenharia de Sistemas Distribuidos.",
	"created_at":
	"updated_at":
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
	"descricao": "..Descrição da área de conhecimento."
}
```

METHOD:
`PUT`

URL:
`localhost:8000/api/area/__id__`

##### Obs:
Substitua o `__id__` pelo `_id` da área que deseja editar. Ex: `localhost:8000/api/area/507f1f77bcf86cd799439014`

Body (JSON):
```
{
	"descricao": "..Descrição da área de conhecimento."
}
```

Validação dos Dados (Body). Para as requisiçes `POST` e `PUT`.
```
descricao => [Obrigatório, Máximo 150 caracteres].
```

METHOD:
`DELETE`

URL:
`localhost:8000/api/area/__id__`

##### Obs:
Substitua o `id` pelo `_id` da área que deseja deletar. Ex: `localhost:8000/api/area/507f1f77bcf86cd799439014`

Response:
```
{
	"success": "Área deletada com sucesso."
}
ou
{
	"message": "A área informada não foi encontrada."
}
```
## 5 Requisições para Vaga:

METHOD:
`GET`

URL:
`localhost:8000/api/vaga`

Response:
```
[
    {
	"funcao": "Desenvolvedor Web JR I",
	"salario": 1.800,
	"descricao": "Deve possui conhecimento em Angular 6 e Laravel 5.2",
	"empresa":
	{
		"cnpj": "12345678912345",
		"nome": "DESEN SOFT LDTA",
		"telefone": "9333333333",
	},
	area:
	{
		"descricao": "Desenvolvimento de Sistemas Web."
	}
    },
    {
	"funcao": "Desenvolvedor de Driver Sênior",
	"salario": 5.800,
	"descricao": "Atuará no desenvolvimento de drivers para Windows",
	"empresa":
	{
		"cnpj": "9876543219865",
		"nome": "AMAZON WEB DEV",
		"telefone": "966666666",
	},
	area:
	{
		"descricao": "Desenvolvimento de Drivers."
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
	"funcao": "..Cargo referente à vaga.",
	"salario": "..Remuneração.",
	"descricao": "..Descrição da Vaga.",
	"empresa":
	{
		"cnpj": "..Cnpj",
		"nome": "..Nome da Empresa",
		"telefone": "..Telefone da Empresa",
	},
	area:
	{
		"descricao": "..Descrição da área de conhecimento."
	}
}
```

METHOD:
`PUT`

URL:
`localhost:8000/api/vaga/__id__`

##### Obs:
Substitua o `__id__` pelo `_id` da vaga que deseja editar. Ex: `localhost:8000/api/vaga/507f1f77bcf86cd799439015`

Body (JSON):
```
{
	"funcao": "..Cargo referente à vaga.",
	"salario": "..Remuneração.",
	"descricao": "..Descrição da Vaga.",
	"empresa":
	{
		"cnpj": "..Cnpj",
		"nome": "..Nome da Empresa",
		"telefone": "..Telefone da Empresa",
	},
	area:
	{
		"descricao": "..Descrição da área de conhecimento."
	}
}
```

Validação dos Dados (Body). Para as requisiçes `POST` e `PUT`.
```
funcao 	  	 => [Obrigatório, Máximo 150 caracteres].
salario   	 => [Obrigatório, R$].
descricao 	 => [Obrigatório, Máximo 150 caracteres].
empresa.cnp	 => [Obrigatório, Somente números, 14 dígitos].
empresa.nome 	 => [Obrigatório, Máximo 150 caracteres].
empresa.telefone => [Obrigatório, Somente números], ex: 92999999999.
area.descricao   => [Obrigatório, Máximo 150 caracteres].
```

METHOD:
`DELETE`

URL:
`localhost:8000/api/vaga/__id__`

##### Obs:
Substitua o `__id__` pelo `_id` da vaga que deseja deletar. Ex: `localhost:8000/api/vaga/507f1f77bcf86cd799439015`

Response:
```
{
	"success": "Vaga deletada com sucesso."
}
ou
{
	"message": "A vaga informada não foi encontrada."
}
```
