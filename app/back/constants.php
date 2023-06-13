<?php

    // Security
    define('SECRET_KEY','123'); // Chave secreta para o JWT

    // Data Type
    define('BOOLEAN','1'); // Definido booleano com um
    define('INTEGER','2'); // Definido inteiro como dois
    define('STRING','3'); // Definido string como três

    // Error Codes
    define('REQUEST_METHOD_NOT_VALID',100); // Método de requisição inválido (GET/PUT)
    define('REQUEST_CONTENTTYPE_NOT_VALID',101); // Tipo de conteúdo de requisição inválido
    define('REQUEST_NOT_VALID',102); // Requisição inválida
    define('VALIDATE_PARAMETER_REQUIRED',103); // Necessário validar parâmetro
    define('VALIDATE_PARAMETER_DATATYPE',104); // Validar tipo de informações do parâmetro
    define('API_NAME_REQUIRED',105); // Nome da API necessário
    define('API_PARAM_REQUIRED',106); // Parâmetro da API necessário
    define('API_DOES_NOT_EXIST',107); // API não existe
    define('INVALID_USER_PASS',108); // Usuário/Senha errado
    define('USER_IS_ACTIVE',109); // O usuário está online
    define('LIMITED_USER_ACCESS',110); // O usuário tem acesso reduzido
    
    define('SUCCESS_RESPONSE',200); // Sucesso
    
    // Server Errors
    define('JWT_PROCESSING_ERROR',300); // Erro no processamento do JWT
    define('AUTHORIZATION_HEADER_NOT_FOUND',301); // Header de autorização não encontrado
    define('ACCESS_TOKEN_ERROR',302); // Erro no token de acesso
