# Programação Web
pw_t4 redo backend only
(não possui swagger)


* Para habilitar/desabilitar o modo de POST-ONLY, descomentar em 'rest.api' linhas 14-16;
* Caso haja problema na conexão com o banco, troque a senha da database em dbconnect.php


>Necessidades:
-PHP 8,
-Servidor local (Foi utilizado XAMPP para a execução do trabalho),
-Thunder Client,
-Alguma IDE (Foi utilizado o VSCode)
(Caso utilizar o XAMPP, colocar a pasta do projeto no diretório 'htdocs'!)

Passo a passo:
-Entre na pasta 'db/' e copie um dos arquivos '.sql' (use o '-drop' para derrubar o banco). Depois, entre em 'localhost/phpmyadmin' ou 'http://127.0.0.1/phpmyadmin' e execute o SQL.
-Após preparar o ambiente (php,servidor,thunder client):
-Checar se possui conexão com o banco, abra uma nova requisição com o link do seu diretório, com o caminho até o arquivo 'dbconnect.php'.
-Com uma conexão estável, retire o 'dbconnect.php' e deixe apenas na pasta 'app'.

Para gerar um token: 
(senha está sem case-sensitivity)
Copie e cole um dos endpoints abaixo

>{
  "name": "generateToken",
  "param": {
    "email": "cassiano@email.com",
    "senha": "cassiano"
  }
}


>{
  "name": "generateToken",
  "param": {
    "email": "eduardo@email.com",
    "senha": "eduardo"
  }
}



*Copie o Token gerado 
1-Vá para 'Headers', no mesmo local
2-Escreva "Content-Type" "application/json"
3-Escreva "Authorization" "Bearer (token)", logo abaixo

Se o token for válido, você terá acesso por 15 minutos
-Agora é possível utilizar o programa!

Para gerenciar usuários (os valores podem ser trocados)



Criar
>{
  "name": "addUsuario",
  "param": {
    "nome": "1",
    "email": "2",
    "telefone": "3",
    "senha": "4",
    "is_admin": "0",
    "is_driver": "0",
    "is_active": "0",
    "usuario_status": "A"
  }
}

Ler
>{
  "name": "getUsuarioDetails",
  "param": {
    "usuario_id":1
  }
}

Atualizar
>{
  "name": "updateUsuario",
  "param": {
    "usuario_id": "1",
    "nome": "2",
    "email": "3",
    "telefone": "4",
    "senha": "5",
    "is_admin": "0",
    "is_driver": "0",
    "is_active": "0",
    "usuario_status": "A",
    "created_on":""
  }
}

Remover
>{
  "name": "deleteUsuario",
  "param": {
    "usuario_id": ""
  }
}


Para gerenciar rotas (os valores podem ser trocados)



Criar
>{
  "name": "addRota",
  "param": {
    "rota": "1",
    "veiculo": "2",
    "motorista": "3",
    "datas": "4",
    "horarios": "5",
    "rota_status": "A"
  }
}

Ler
>{
  "name": "getRotaDetails",
  "param": {
    "rota_id": ""
  }
}

Atualizar
>{
  "name": "updateRota",
  "param": {
    "rota_id": "1",
    "rota": "0",
    "veiculo": "0",
    "motorista": "0",
    "datas": "0",
    "horarios": "0",
    "rota_status": "A"
  }
}

Remover
>{
  "name": "deleteRota",
  "param": {
    "rota_id": "3"
  }
}

Para gerenciar mensagens (os valores podem ser trocados)


Criar
>{
  "name": "addMensagem",
  "param": {
    "usuario": "1",
    "rota": "1",
    "descricao": "a",
    "mensagem_status": "A"
  }
}

Ler
>{
  "name": "getMensagemDetails",
  "param": {
    "mensagem_id": "3"
  }
}

Atualizar
>{
  "name": "updateMensagem",
  "param": {
    "mensagem_id": "3",
    "usuario": "2",
    "rota": "2",
    "mensagem_data": "",
    "hora": "",
    "descricao": "B",
    "mensagem_status": "I"
  }
}

Remover
>{
  "name": "deleteMensagem",
  "param": {
    "mensagem_id": ""
  }
}
