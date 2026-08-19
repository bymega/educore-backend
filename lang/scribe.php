<?php

return [
    'labels' => [
        'search' => 'Pesquisar',
        'base_url' => 'URL base',
    ],

    'auth' => [
        'none' => 'Esta API não requer autenticação.',
        'instruction' => [
            'query' => <<<'TEXT'
                Para autenticar as requisições, inclua o parâmetro **`:parameterName`** na query string.
                TEXT,
            'body' => <<<'TEXT'
                Para autenticar as requisições, inclua o parâmetro **`:parameterName`** no corpo da requisição.
                TEXT,
            'query_or_body' => <<<'TEXT'
                Para autenticar as requisições, inclua o parâmetro **`:parameterName`** na query string ou no corpo da requisição.
                TEXT,
            'bearer' => <<<'TEXT'
                Para autenticar as requisições, inclua o header **`Authorization`** com o valor **`"Bearer :placeholder"`**.
                TEXT,
            'basic' => <<<'TEXT'
                Para autenticar as requisições, inclua o header **`Authorization`** no formato **`"Basic {credentials}"`**.
                O valor de `{credentials}` deve conter seu usuário/id e sua senha, separados por dois-pontos (:),
                e codificados em base64.
                TEXT,
            'header' => <<<'TEXT'
                Para autenticar as requisições, inclua o header **`:parameterName`** com o valor **`":placeholder"`**.
                TEXT,
        ],
        'details' => <<<'TEXT'
            Todos os endpoints autenticados estão marcados com o indicador `requer autenticação` na documentação abaixo.
            TEXT,
    ],

    'headings' => [
        'introduction' => 'Introdução',
        'auth' => 'Autenticação das requisições',
    ],

    'endpoint' => [
        'request' => 'Requisição',
        'headers' => 'Cabeçalhos',
        'url_parameters' => 'Parâmetros da URL',
        'body_parameters' => 'Parâmetros do corpo',
        'query_parameters' => 'Parâmetros da consulta',
        'response' => 'Resposta',
        'response_fields' => 'Campos da resposta',
        'example_request' => 'Exemplo de requisição',
        'example_response' => 'Exemplo de resposta',
        'responses' => [
            'binary' => 'Dados binários',
            'empty' => 'Resposta vazia',
        ],
    ],

    'try_it_out' => [
        'open' => 'Testar ⚡',
        'cancel' => 'Cancelar 🛑',
        'send' => 'Enviar requisição 💥',
        'loading' => '⏱ Enviando...',
        'received_response' => 'Resposta recebida',
        'request_failed' => 'A requisição falhou com erro',
        'error_help' => <<<'TEXT'
            Dica: verifique se você está conectado corretamente à rede.
            Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
            Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.
            TEXT,
    ],

    'links' => [
        'postman' => 'Ver coleção do Postman',
        'openapi' => 'Ver especificação OpenAPI',
    ],
];
