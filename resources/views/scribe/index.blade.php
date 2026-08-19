<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.11.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.11.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Pesquisar">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introducao" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introducao">
                    <a href="#introducao">Introdução</a>
                </li>
                            </ul>
                    <ul id="tocify-header-autenticacao-das-requisicoes" class="tocify-header">
                <li class="tocify-item level-1" data-unique="autenticacao-das-requisicoes">
                    <a href="#autenticacao-das-requisicoes">Autenticação das requisições</a>
                </li>
                            </ul>
                    <ul id="tocify-header-alunos" class="tocify-header">
                <li class="tocify-item level-1" data-unique="alunos">
                    <a href="#alunos">Alunos</a>
                </li>
                                    <ul id="tocify-subheader-alunos" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="alunos-GETapi-students">
                                <a href="#alunos-GETapi-students">Listar Alunos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="alunos-POSTapi-students">
                                <a href="#alunos-POSTapi-students">Cadastrar Alunos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="alunos-PUTapi-students--uuid-">
                                <a href="#alunos-PUTapi-students--uuid-">Atualizar Alunos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="alunos-DELETEapi-students--uuid-">
                                <a href="#alunos-DELETEapi-students--uuid-">Deletar Alunos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="alunos-PUTapi-students--uuid--restore">
                                <a href="#alunos-PUTapi-students--uuid--restore">Restaurar Alunos</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-anos-letivos" class="tocify-header">
                <li class="tocify-item level-1" data-unique="anos-letivos">
                    <a href="#anos-letivos">Anos Letivos</a>
                </li>
                                    <ul id="tocify-subheader-anos-letivos" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="anos-letivos-GETapi-school-years">
                                <a href="#anos-letivos-GETapi-school-years">Listar Anos Letivos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="anos-letivos-POSTapi-school-years">
                                <a href="#anos-letivos-POSTapi-school-years">Cadastrar Anos Letivos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="anos-letivos-PUTapi-school-years--uuid-">
                                <a href="#anos-letivos-PUTapi-school-years--uuid-">Atualizar Anos Letivos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="anos-letivos-DELETEapi-school-years--uuid-">
                                <a href="#anos-letivos-DELETEapi-school-years--uuid-">Deletar Anos Letivos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="anos-letivos-PUTapi-school-years--uuid--restore">
                                <a href="#anos-letivos-PUTapi-school-years--uuid--restore">Restaurar Anos Letivos</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-autenticacao" class="tocify-header">
                <li class="tocify-item level-1" data-unique="autenticacao">
                    <a href="#autenticacao">Autenticação</a>
                </li>
                                    <ul id="tocify-subheader-autenticacao" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="autenticacao-POSTapi-login">
                                <a href="#autenticacao-POSTapi-login">Login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacao-GETapi-auth-life">
                                <a href="#autenticacao-GETapi-auth-life">Get Lifetime Token</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacao-POSTapi-auth-logout">
                                <a href="#autenticacao-POSTapi-auth-logout">Logout</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-professores" class="tocify-header">
                <li class="tocify-item level-1" data-unique="professores">
                    <a href="#professores">Professores</a>
                </li>
                                    <ul id="tocify-subheader-professores" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="professores-GETapi-teachers">
                                <a href="#professores-GETapi-teachers">Listar Professores</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="professores-POSTapi-teachers">
                                <a href="#professores-POSTapi-teachers">Cadastrar Professores</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="professores-PUTapi-teachers--uuid-">
                                <a href="#professores-PUTapi-teachers--uuid-">Atualizar Professores</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="professores-DELETEapi-teachers--uuid-">
                                <a href="#professores-DELETEapi-teachers--uuid-">Deletar Professores</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="professores-PUTapi-teachers--uuid--restore">
                                <a href="#professores-PUTapi-teachers--uuid--restore">Restaurar Professores</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-responsaveis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="responsaveis">
                    <a href="#responsaveis">Responsáveis</a>
                </li>
                                    <ul id="tocify-subheader-responsaveis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="responsaveis-GETapi-guardians">
                                <a href="#responsaveis-GETapi-guardians">Listar Responsáveis</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="responsaveis-PUTapi-guardians--uuid-">
                                <a href="#responsaveis-PUTapi-guardians--uuid-">Atualizar Responsáveis</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="responsaveis-DELETEapi-guardians--uuid-">
                                <a href="#responsaveis-DELETEapi-guardians--uuid-">Deletar Responsáveis</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="responsaveis-PUTapi-guardians--uuid--restore">
                                <a href="#responsaveis-PUTapi-guardians--uuid--restore">Restaurar Responsáveis</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-usuarios" class="tocify-header">
                <li class="tocify-item level-1" data-unique="usuarios">
                    <a href="#usuarios">Usuários</a>
                </li>
                                    <ul id="tocify-subheader-usuarios" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="usuarios-GETapi-users">
                                <a href="#usuarios-GETapi-users">Listar usuários</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-POSTapi-users">
                                <a href="#usuarios-POSTapi-users">Criar usuário</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-PUTapi-users--uuid-">
                                <a href="#usuarios-PUTapi-users--uuid-">Atualizar usuário</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-DELETEapi-users--uuid-">
                                <a href="#usuarios-DELETEapi-users--uuid-">Deletar usuário</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-PUTapi-users--uuid--restore">
                                <a href="#usuarios-PUTapi-users--uuid--restore">Restaurar usuário</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">Ver coleção do Postman</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">Ver especificação OpenAPI</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: August 19, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introducao">Introdução</h1>
<aside>
    <strong>URL base</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="autenticacao-das-requisicoes">Autenticação das requisições</h1>
<p>Para autenticar as requisições, inclua o header <strong><code>Authorization</code></strong> com o valor <strong><code>"Bearer SEU_TOKEN"</code></strong>.</p>
<p>Todos os endpoints autenticados estão marcados com o indicador <code>requer autenticação</code> na documentação abaixo.</p>
<p>Obtenha o token pelo endpoint de login.</p>

        <h1 id="alunos">Alunos</h1>

    

                                <h2 id="alunos-GETapi-students">Listar Alunos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retorna a lista paginada de alunos.</p>

<span id="example-requests-GETapi-students">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/students?name=b&amp;per_page=1&amp;page=1" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/students"
);

const params = {
    "name": "b",
    "per_page": "1",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-students">
            <blockquote>
            <p>Exemplo de resposta (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-students" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-GETapi-students"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-students"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-students" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-GETapi-students">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-GETapi-students" data-method="GET"
      data-path="api/students"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-students', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-students"
                    onclick="tryItOut('GETapi-students');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-students"
                    onclick="cancelTryOut('GETapi-students');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-students"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/students</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="GETapi-students"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="GETapi-students"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="GETapi-students"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros da consulta</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="GETapi-students"
               value="b"
               data-component="query">
    <br>
<p>Nome ou parte do nome do estudante. Não pode ter mais de 255 caracteres. Exemplo: <code>b</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="per_page"  data-endpoint="GETapi-students"
               value="1"
               data-component="query">
    <br>
<p>Quantidade de estudantes por página, entre 1 e 100. Deve ser pelo menos 1. Não pode ser maior que 100. Exemplo: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="page"  data-endpoint="GETapi-students"
               value="1"
               data-component="query">
    <br>
<p>Número da página que será retornada. Deve ser pelo menos 1. Exemplo: <code>1</code></p>
            </div>
                </form>

                    <h2 id="alunos-POSTapi-students">Cadastrar Alunos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-students">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/students" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 16,
    \"registration_number\": \"n\",
    \"birth_date\": \"2022-09-13\",
    \"gender\": \"other\",
    \"cpf\": \"82256977571\",
    \"address\": \"g\",
    \"status\": \"inactive\",
    \"guardians\": [
        {
            \"name\": \"b\",
            \"cpf\": \"82256977571\",
            \"phone\": \"gzmiyvdljnikhway\",
            \"email\": \"gilbert32@example.com\",
            \"status\": \"blocked\",
            \"relationship\": \"w\",
            \"is_primary\": false
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/students"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 16,
    "registration_number": "n",
    "birth_date": "2022-09-13",
    "gender": "other",
    "cpf": "82256977571",
    "address": "g",
    "status": "inactive",
    "guardians": [
        {
            "name": "b",
            "cpf": "82256977571",
            "phone": "gzmiyvdljnikhway",
            "email": "gilbert32@example.com",
            "status": "blocked",
            "relationship": "w",
            "is_primary": false
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-students">
</span>
<span id="execution-results-POSTapi-students" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-POSTapi-students"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-students"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-students" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-POSTapi-students">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-POSTapi-students" data-method="POST"
      data-path="api/students"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-students', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-students"
                    onclick="tryItOut('POSTapi-students');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-students"
                    onclick="cancelTryOut('POSTapi-students');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-students"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/students</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="POSTapi-students"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="POSTapi-students"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="POSTapi-students"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="user_id"  data-endpoint="POSTapi-students"
               value="16"
               data-component="body">
    <br>
<p>Must match an existing stored value. Exemplo: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>registration_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="registration_number"  data-endpoint="POSTapi-students"
               value="n"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birth_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="birth_date"  data-endpoint="POSTapi-students"
               value="2022-09-13"
               data-component="body">
    <br>
<p>Deve ser uma data válida. Deve ser uma data anterior a <code>today</code>. Exemplo: <code>2022-09-13</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="gender"  data-endpoint="POSTapi-students"
               value="other"
               data-component="body">
    <br>
<p>Exemplo: <code>other</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li> <li><code>other</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cpf</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="cpf"  data-endpoint="POSTapi-students"
               value="82256977571"
               data-component="body">
    <br>
<p>validation.digits. Exemplo: <code>82256977571</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="address"  data-endpoint="POSTapi-students"
               value="g"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="status"  data-endpoint="POSTapi-students"
               value="inactive"
               data-component="body">
    <br>
<p>Exemplo: <code>inactive</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>blocked</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>guardians</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Deve ter no mínimo 1 itens.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="guardians.0.name"  data-endpoint="POSTapi-students"
               value="b"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>b</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>cpf</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="guardians.0.cpf"  data-endpoint="POSTapi-students"
               value="82256977571"
               data-component="body">
    <br>
<p>validation.digits. Exemplo: <code>82256977571</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="guardians.0.phone"  data-endpoint="POSTapi-students"
               value="gzmiyvdljnikhway"
               data-component="body">
    <br>
<p>Não pode ter mais de 20 caracteres. Exemplo: <code>gzmiyvdljnikhway</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="guardians.0.email"  data-endpoint="POSTapi-students"
               value="gilbert32@example.com"
               data-component="body">
    <br>
<p>Deve ser um endereço de e-mail válido. Não pode ter mais de 255 caracteres. Exemplo: <code>gilbert32@example.com</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="guardians.0.status"  data-endpoint="POSTapi-students"
               value="blocked"
               data-component="body">
    <br>
<p>Exemplo: <code>blocked</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>blocked</code></li></ul>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>relationship</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="guardians.0.relationship"  data-endpoint="POSTapi-students"
               value="w"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>w</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>is_primary</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-students" style="display: none">
            <input type="radio" name="guardians.0.is_primary" value="true"
                   data-endpoint="POSTapi-students" data-component="body" >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-students" style="display: none">
            <input type="radio" name="guardians.0.is_primary" value="false"
                   data-endpoint="POSTapi-students" data-component="body" >
            <code>false</code>
        </label>
    <br>
<p>Exemplo: <code>false</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="alunos-PUTapi-students--uuid-">Atualizar Alunos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-students--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/students/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"registration_number\": \"STD101\",
    \"birth_date\": \"2010-05-15\",
    \"gender\": \"female\",
    \"cpf\": \"52289012345\",
    \"address\": \"Rua das Flores, 123\",
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/students/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "registration_number": "STD101",
    "birth_date": "2010-05-15",
    "gender": "female",
    "cpf": "52289012345",
    "address": "Rua das Flores, 123",
    "status": "active"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-students--uuid-">
</span>
<span id="execution-results-PUTapi-students--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-students--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-students--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-students--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-students--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-students--uuid-" data-method="PUT"
      data-path="api/students/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-students--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-students--uuid-"
                    onclick="tryItOut('PUTapi-students--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-students--uuid-"
                    onclick="cancelTryOut('PUTapi-students--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-students--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/students/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-students--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-students--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-students--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-students--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="user_id"  data-endpoint="PUTapi-students--uuid-"
               value="1"
               data-component="body">
    <br>
<p>Must match an existing stored value. Exemplo: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>registration_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="registration_number"  data-endpoint="PUTapi-students--uuid-"
               value="STD101"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>STD101</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birth_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="birth_date"  data-endpoint="PUTapi-students--uuid-"
               value="2010-05-15"
               data-component="body">
    <br>
<p>Deve ser uma data válida. Deve ser uma data anterior a <code>today</code>. Exemplo: <code>2010-05-15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="gender"  data-endpoint="PUTapi-students--uuid-"
               value="female"
               data-component="body">
    <br>
<p>Exemplo: <code>female</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li> <li><code>other</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cpf</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="cpf"  data-endpoint="PUTapi-students--uuid-"
               value="52289012345"
               data-component="body">
    <br>
<p>validation.digits. Exemplo: <code>52289012345</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="address"  data-endpoint="PUTapi-students--uuid-"
               value="Rua das Flores, 123"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>Rua das Flores, 123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="status"  data-endpoint="PUTapi-students--uuid-"
               value="active"
               data-component="body">
    <br>
<p>Exemplo: <code>active</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>blocked</code></li></ul>
        </div>
        </form>

                    <h2 id="alunos-DELETEapi-students--uuid-">Deletar Alunos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-students--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/students/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/students/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-students--uuid-">
</span>
<span id="execution-results-DELETEapi-students--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-DELETEapi-students--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-students--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-students--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-students--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-DELETEapi-students--uuid-" data-method="DELETE"
      data-path="api/students/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-students--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-students--uuid-"
                    onclick="tryItOut('DELETEapi-students--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-students--uuid-"
                    onclick="cancelTryOut('DELETEapi-students--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-students--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/students/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="DELETEapi-students--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="DELETEapi-students--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="DELETEapi-students--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="DELETEapi-students--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                    <h2 id="alunos-PUTapi-students--uuid--restore">Restaurar Alunos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-students--uuid--restore">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/students/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/students/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-students--uuid--restore">
</span>
<span id="execution-results-PUTapi-students--uuid--restore" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-students--uuid--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-students--uuid--restore"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-students--uuid--restore" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-students--uuid--restore">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-students--uuid--restore" data-method="PUT"
      data-path="api/students/{uuid}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-students--uuid--restore', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-students--uuid--restore"
                    onclick="tryItOut('PUTapi-students--uuid--restore');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-students--uuid--restore"
                    onclick="cancelTryOut('PUTapi-students--uuid--restore');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-students--uuid--restore"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/students/{uuid}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-students--uuid--restore"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-students--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-students--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-students--uuid--restore"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                <h1 id="anos-letivos">Anos Letivos</h1>

    

                                <h2 id="anos-letivos-GETapi-school-years">Listar Anos Letivos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retorna a lista paginada de anos letivos.</p>

<span id="example-requests-GETapi-school-years">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/school-years?name=2026&amp;per_page=1&amp;page=1" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/school-years"
);

const params = {
    "name": "2026",
    "per_page": "1",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-school-years">
            <blockquote>
            <p>Exemplo de resposta (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-school-years" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-GETapi-school-years"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-school-years"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-school-years" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-GETapi-school-years">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-GETapi-school-years" data-method="GET"
      data-path="api/school-years"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-school-years', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-school-years"
                    onclick="tryItOut('GETapi-school-years');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-school-years"
                    onclick="cancelTryOut('GETapi-school-years');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-school-years"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/school-years</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="GETapi-school-years"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="GETapi-school-years"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="GETapi-school-years"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros da consulta</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="GETapi-school-years"
               value="2026"
               data-component="query">
    <br>
<p>Ano Letivo. Não pode ter mais de 255 caracteres. Exemplo: <code>2026</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="per_page"  data-endpoint="GETapi-school-years"
               value="1"
               data-component="query">
    <br>
<p>Quantidade de ano letivo por página, entre 1 e 100. Deve ser pelo menos 1. Não pode ser maior que 100. Exemplo: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="page"  data-endpoint="GETapi-school-years"
               value="1"
               data-component="query">
    <br>
<p>Número da página que será retornada. Deve ser pelo menos 1. Exemplo: <code>1</code></p>
            </div>
                </form>

                    <h2 id="anos-letivos-POSTapi-school-years">Cadastrar Anos Letivos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-school-years">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/school-years" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Ano Letivo 2026\",
    \"start_date\": \"2026-02-02\",
    \"end_date\": \"2026-12-18\",
    \"status\": \"planned\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/school-years"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Ano Letivo 2026",
    "start_date": "2026-02-02",
    "end_date": "2026-12-18",
    "status": "planned"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-school-years">
</span>
<span id="execution-results-POSTapi-school-years" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-POSTapi-school-years"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-school-years"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-school-years" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-POSTapi-school-years">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-POSTapi-school-years" data-method="POST"
      data-path="api/school-years"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-school-years', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-school-years"
                    onclick="tryItOut('POSTapi-school-years');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-school-years"
                    onclick="cancelTryOut('POSTapi-school-years');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-school-years"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/school-years</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="POSTapi-school-years"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="POSTapi-school-years"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="POSTapi-school-years"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="POSTapi-school-years"
               value="Ano Letivo 2026"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>Ano Letivo 2026</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="start_date"  data-endpoint="POSTapi-school-years"
               value="2026-02-02"
               data-component="body">
    <br>
<p>Deve ser uma data válida no formato <code>Y-m-d</code>. Deve ser uma data anterior a <code>end_date</code>. Exemplo: <code>2026-02-02</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="end_date"  data-endpoint="POSTapi-school-years"
               value="2026-12-18"
               data-component="body">
    <br>
<p>Deve ser uma data válida no formato <code>Y-m-d</code>. Deve ser uma data posterior a <code>start_date</code>. Exemplo: <code>2026-12-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="status"  data-endpoint="POSTapi-school-years"
               value="planned"
               data-component="body">
    <br>
<p>Exemplo: <code>planned</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>planned</code></li> <li><code>active</code></li> <li><code>completed</code></li> <li><code>cancelled</code></li></ul>
        </div>
        </form>

                    <h2 id="anos-letivos-PUTapi-school-years--uuid-">Atualizar Anos Letivos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-school-years--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/school-years/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Ano Letivo 2026\",
    \"start_date\": \"2026-02-02\",
    \"end_date\": \"2026-12-18\",
    \"status\": \"planned\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/school-years/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Ano Letivo 2026",
    "start_date": "2026-02-02",
    "end_date": "2026-12-18",
    "status": "planned"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-school-years--uuid-">
</span>
<span id="execution-results-PUTapi-school-years--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-school-years--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-school-years--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-school-years--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-school-years--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-school-years--uuid-" data-method="PUT"
      data-path="api/school-years/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-school-years--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-school-years--uuid-"
                    onclick="tryItOut('PUTapi-school-years--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-school-years--uuid-"
                    onclick="cancelTryOut('PUTapi-school-years--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-school-years--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/school-years/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-school-years--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-school-years--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-school-years--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-school-years--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="PUTapi-school-years--uuid-"
               value="Ano Letivo 2026"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>Ano Letivo 2026</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="start_date"  data-endpoint="PUTapi-school-years--uuid-"
               value="2026-02-02"
               data-component="body">
    <br>
<p>Deve ser uma data válida no formato <code>Y-m-d</code>. Deve ser uma data anterior a <code>end_date</code>. Exemplo: <code>2026-02-02</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="end_date"  data-endpoint="PUTapi-school-years--uuid-"
               value="2026-12-18"
               data-component="body">
    <br>
<p>Deve ser uma data válida no formato <code>Y-m-d</code>. Deve ser uma data posterior a <code>start_date</code>. Exemplo: <code>2026-12-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="status"  data-endpoint="PUTapi-school-years--uuid-"
               value="planned"
               data-component="body">
    <br>
<p>Exemplo: <code>planned</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>planned</code></li> <li><code>active</code></li> <li><code>completed</code></li> <li><code>cancelled</code></li></ul>
        </div>
        </form>

                    <h2 id="anos-letivos-DELETEapi-school-years--uuid-">Deletar Anos Letivos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-school-years--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/school-years/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/school-years/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-school-years--uuid-">
</span>
<span id="execution-results-DELETEapi-school-years--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-DELETEapi-school-years--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-school-years--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-school-years--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-school-years--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-DELETEapi-school-years--uuid-" data-method="DELETE"
      data-path="api/school-years/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-school-years--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-school-years--uuid-"
                    onclick="tryItOut('DELETEapi-school-years--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-school-years--uuid-"
                    onclick="cancelTryOut('DELETEapi-school-years--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-school-years--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/school-years/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="DELETEapi-school-years--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="DELETEapi-school-years--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="DELETEapi-school-years--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="DELETEapi-school-years--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                    <h2 id="anos-letivos-PUTapi-school-years--uuid--restore">Restaurar Anos Letivos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-school-years--uuid--restore">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/school-years/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/school-years/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-school-years--uuid--restore">
</span>
<span id="execution-results-PUTapi-school-years--uuid--restore" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-school-years--uuid--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-school-years--uuid--restore"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-school-years--uuid--restore" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-school-years--uuid--restore">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-school-years--uuid--restore" data-method="PUT"
      data-path="api/school-years/{uuid}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-school-years--uuid--restore', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-school-years--uuid--restore"
                    onclick="tryItOut('PUTapi-school-years--uuid--restore');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-school-years--uuid--restore"
                    onclick="cancelTryOut('PUTapi-school-years--uuid--restore');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-school-years--uuid--restore"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/school-years/{uuid}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-school-years--uuid--restore"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-school-years--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-school-years--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-school-years--uuid--restore"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                <h1 id="autenticacao">Autenticação</h1>

    

                                <h2 id="autenticacao-POSTapi-login">Login</h2>

<p>
</p>

<p>Autentica o usuário e retorna um token de acesso.</p>

<span id="example-requests-POSTapi-login">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"admin@educore.com\",
    \"password\": \"Ab123456#@\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "admin@educore.com",
    "password": "Ab123456#@"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="email"  data-endpoint="POSTapi-login"
               value="admin@educore.com"
               data-component="body">
    <br>
<p>Deve ser um endereço de e-mail válido. Exemplo: <code>admin@educore.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="password"  data-endpoint="POSTapi-login"
               value="Ab123456#@"
               data-component="body">
    <br>
<p>Exemplo: <code>Ab123456#@</code></p>
        </div>
        </form>

                    <h2 id="autenticacao-GETapi-auth-life">Get Lifetime Token</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retorna o token de acesso do usuário.</p>

<span id="example-requests-GETapi-auth-life">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/auth/life" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/life"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-life">
            <blockquote>
            <p>Exemplo de resposta (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-life" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-GETapi-auth-life"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-life"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-auth-life" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-life">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-GETapi-auth-life" data-method="GET"
      data-path="api/auth/life"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-life', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-life"
                    onclick="tryItOut('GETapi-auth-life');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-life"
                    onclick="cancelTryOut('GETapi-auth-life');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-life"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/life</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="GETapi-auth-life"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="GETapi-auth-life"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="GETapi-auth-life"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="autenticacao-POSTapi-auth-logout">Logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Realiza o logout do usuário, revogando o token de acesso.</p>

<span id="example-requests-POSTapi-auth-logout">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/logout" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/logout"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
</span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="POSTapi-auth-logout"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="professores">Professores</h1>

    

                                <h2 id="professores-GETapi-teachers">Listar Professores</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retorna a lista paginada de professores.</p>

<span id="example-requests-GETapi-teachers">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/teachers?name=Domingo&amp;per_page=1&amp;page=1" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/teachers"
);

const params = {
    "name": "Domingo",
    "per_page": "1",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teachers">
            <blockquote>
            <p>Exemplo de resposta (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teachers" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-GETapi-teachers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teachers"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teachers" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-GETapi-teachers">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-GETapi-teachers" data-method="GET"
      data-path="api/teachers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teachers', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teachers"
                    onclick="tryItOut('GETapi-teachers');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teachers"
                    onclick="cancelTryOut('GETapi-teachers');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teachers"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teachers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="GETapi-teachers"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="GETapi-teachers"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="GETapi-teachers"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros da consulta</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="GETapi-teachers"
               value="Domingo"
               data-component="query">
    <br>
<p>Nome ou parte do nome do professor. Não pode ter mais de 255 caracteres. Exemplo: <code>Domingo</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="per_page"  data-endpoint="GETapi-teachers"
               value="1"
               data-component="query">
    <br>
<p>Quantidade de professores por página, entre 1 e 100. Deve ser pelo menos 1. Não pode ser maior que 100. Exemplo: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="page"  data-endpoint="GETapi-teachers"
               value="1"
               data-component="query">
    <br>
<p>Número da página que será retornada. Deve ser pelo menos 1. Exemplo: <code>1</code></p>
            </div>
                </form>

                    <h2 id="professores-POSTapi-teachers">Cadastrar Professores</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-teachers">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/teachers" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"registration_number\": \"TCH101\",
    \"cpf\": \"52289012345\",
    \"specialization\": \"Graduado em Matemática\",
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/teachers"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "registration_number": "TCH101",
    "cpf": "52289012345",
    "specialization": "Graduado em Matemática",
    "status": "active"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-teachers">
</span>
<span id="execution-results-POSTapi-teachers" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-POSTapi-teachers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-teachers"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-teachers" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-POSTapi-teachers">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-POSTapi-teachers" data-method="POST"
      data-path="api/teachers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-teachers', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-teachers"
                    onclick="tryItOut('POSTapi-teachers');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-teachers"
                    onclick="cancelTryOut('POSTapi-teachers');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-teachers"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/teachers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="POSTapi-teachers"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="POSTapi-teachers"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="POSTapi-teachers"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="user_id"  data-endpoint="POSTapi-teachers"
               value="1"
               data-component="body">
    <br>
<p>Must match an existing stored value. Exemplo: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>registration_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="registration_number"  data-endpoint="POSTapi-teachers"
               value="TCH101"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>TCH101</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cpf</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="cpf"  data-endpoint="POSTapi-teachers"
               value="52289012345"
               data-component="body">
    <br>
<p>validation.digits. Exemplo: <code>52289012345</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>specialization</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="specialization"  data-endpoint="POSTapi-teachers"
               value="Graduado em Matemática"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>Graduado em Matemática</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="status"  data-endpoint="POSTapi-teachers"
               value="active"
               data-component="body">
    <br>
<p>Exemplo: <code>active</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>blocked</code></li></ul>
        </div>
        </form>

                    <h2 id="professores-PUTapi-teachers--uuid-">Atualizar Professores</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-teachers--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/teachers/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"registration_number\": \"TCH101\",
    \"cpf\": \"52289012345\",
    \"specialization\": \"Graduado em Matemática\",
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/teachers/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "registration_number": "TCH101",
    "cpf": "52289012345",
    "specialization": "Graduado em Matemática",
    "status": "active"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-teachers--uuid-">
</span>
<span id="execution-results-PUTapi-teachers--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-teachers--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-teachers--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-teachers--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-teachers--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-teachers--uuid-" data-method="PUT"
      data-path="api/teachers/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-teachers--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-teachers--uuid-"
                    onclick="tryItOut('PUTapi-teachers--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-teachers--uuid-"
                    onclick="cancelTryOut('PUTapi-teachers--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-teachers--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/teachers/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-teachers--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-teachers--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-teachers--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-teachers--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="user_id"  data-endpoint="PUTapi-teachers--uuid-"
               value="1"
               data-component="body">
    <br>
<p>Must match an existing stored value. Exemplo: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>registration_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="registration_number"  data-endpoint="PUTapi-teachers--uuid-"
               value="TCH101"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>TCH101</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cpf</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="cpf"  data-endpoint="PUTapi-teachers--uuid-"
               value="52289012345"
               data-component="body">
    <br>
<p>validation.digits. Exemplo: <code>52289012345</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>specialization</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="specialization"  data-endpoint="PUTapi-teachers--uuid-"
               value="Graduado em Matemática"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>Graduado em Matemática</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="status"  data-endpoint="PUTapi-teachers--uuid-"
               value="active"
               data-component="body">
    <br>
<p>Exemplo: <code>active</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>blocked</code></li></ul>
        </div>
        </form>

                    <h2 id="professores-DELETEapi-teachers--uuid-">Deletar Professores</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-teachers--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/teachers/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/teachers/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-teachers--uuid-">
</span>
<span id="execution-results-DELETEapi-teachers--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-DELETEapi-teachers--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-teachers--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-teachers--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-teachers--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-DELETEapi-teachers--uuid-" data-method="DELETE"
      data-path="api/teachers/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-teachers--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-teachers--uuid-"
                    onclick="tryItOut('DELETEapi-teachers--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-teachers--uuid-"
                    onclick="cancelTryOut('DELETEapi-teachers--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-teachers--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/teachers/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="DELETEapi-teachers--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="DELETEapi-teachers--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="DELETEapi-teachers--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="DELETEapi-teachers--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                    <h2 id="professores-PUTapi-teachers--uuid--restore">Restaurar Professores</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-teachers--uuid--restore">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/teachers/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/teachers/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-teachers--uuid--restore">
</span>
<span id="execution-results-PUTapi-teachers--uuid--restore" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-teachers--uuid--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-teachers--uuid--restore"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-teachers--uuid--restore" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-teachers--uuid--restore">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-teachers--uuid--restore" data-method="PUT"
      data-path="api/teachers/{uuid}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-teachers--uuid--restore', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-teachers--uuid--restore"
                    onclick="tryItOut('PUTapi-teachers--uuid--restore');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-teachers--uuid--restore"
                    onclick="cancelTryOut('PUTapi-teachers--uuid--restore');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-teachers--uuid--restore"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/teachers/{uuid}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-teachers--uuid--restore"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-teachers--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-teachers--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-teachers--uuid--restore"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                <h1 id="responsaveis">Responsáveis</h1>

    

                                <h2 id="responsaveis-GETapi-guardians">Listar Responsáveis</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retorna a lista paginada de responsáveis.</p>

<span id="example-requests-GETapi-guardians">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/guardians?name=b&amp;per_page=1&amp;page=1" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/guardians"
);

const params = {
    "name": "b",
    "per_page": "1",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-guardians">
            <blockquote>
            <p>Exemplo de resposta (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-guardians" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-GETapi-guardians"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-guardians"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-guardians" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-GETapi-guardians">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-GETapi-guardians" data-method="GET"
      data-path="api/guardians"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-guardians', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-guardians"
                    onclick="tryItOut('GETapi-guardians');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-guardians"
                    onclick="cancelTryOut('GETapi-guardians');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-guardians"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/guardians</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="GETapi-guardians"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="GETapi-guardians"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="GETapi-guardians"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros da consulta</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="GETapi-guardians"
               value="b"
               data-component="query">
    <br>
<p>Nome ou parte do nome do responsável. Não pode ter mais de 255 caracteres. Exemplo: <code>b</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="per_page"  data-endpoint="GETapi-guardians"
               value="1"
               data-component="query">
    <br>
<p>Quantidade de responsáveis por página, entre 1 e 100. Deve ser pelo menos 1. Não pode ser maior que 100. Exemplo: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none" step="any"               name="page"  data-endpoint="GETapi-guardians"
               value="1"
               data-component="query">
    <br>
<p>Número da página que será retornada. Deve ser pelo menos 1. Exemplo: <code>1</code></p>
            </div>
                </form>

                    <h2 id="responsaveis-PUTapi-guardians--uuid-">Atualizar Responsáveis</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-guardians--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/guardians/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Ricardo\",
    \"cpf\": \"52289012345\",
    \"phone\": \"71999999999\",
    \"email\": \"ricardo@gmail.com\",
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/guardians/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Ricardo",
    "cpf": "52289012345",
    "phone": "71999999999",
    "email": "ricardo@gmail.com",
    "status": "active"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-guardians--uuid-">
</span>
<span id="execution-results-PUTapi-guardians--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-guardians--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-guardians--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-guardians--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-guardians--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-guardians--uuid-" data-method="PUT"
      data-path="api/guardians/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-guardians--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-guardians--uuid-"
                    onclick="tryItOut('PUTapi-guardians--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-guardians--uuid-"
                    onclick="cancelTryOut('PUTapi-guardians--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-guardians--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/guardians/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-guardians--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-guardians--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-guardians--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-guardians--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="PUTapi-guardians--uuid-"
               value="Ricardo"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>Ricardo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cpf</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="cpf"  data-endpoint="PUTapi-guardians--uuid-"
               value="52289012345"
               data-component="body">
    <br>
<p>validation.digits. Exemplo: <code>52289012345</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="phone"  data-endpoint="PUTapi-guardians--uuid-"
               value="71999999999"
               data-component="body">
    <br>
<p>Não pode ter mais de 20 caracteres. Exemplo: <code>71999999999</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="email"  data-endpoint="PUTapi-guardians--uuid-"
               value="ricardo@gmail.com"
               data-component="body">
    <br>
<p>Deve ser um endereço de e-mail válido. Não pode ter mais de 255 caracteres. Exemplo: <code>ricardo@gmail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="status"  data-endpoint="PUTapi-guardians--uuid-"
               value="active"
               data-component="body">
    <br>
<p>Exemplo: <code>active</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>blocked</code></li></ul>
        </div>
        </form>

                    <h2 id="responsaveis-DELETEapi-guardians--uuid-">Deletar Responsáveis</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-guardians--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/guardians/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/guardians/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-guardians--uuid-">
</span>
<span id="execution-results-DELETEapi-guardians--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-DELETEapi-guardians--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-guardians--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-guardians--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-guardians--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-DELETEapi-guardians--uuid-" data-method="DELETE"
      data-path="api/guardians/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-guardians--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-guardians--uuid-"
                    onclick="tryItOut('DELETEapi-guardians--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-guardians--uuid-"
                    onclick="cancelTryOut('DELETEapi-guardians--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-guardians--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/guardians/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="DELETEapi-guardians--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="DELETEapi-guardians--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="DELETEapi-guardians--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="DELETEapi-guardians--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                    <h2 id="responsaveis-PUTapi-guardians--uuid--restore">Restaurar Responsáveis</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-guardians--uuid--restore">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/guardians/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/guardians/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-guardians--uuid--restore">
</span>
<span id="execution-results-PUTapi-guardians--uuid--restore" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-guardians--uuid--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-guardians--uuid--restore"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-guardians--uuid--restore" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-guardians--uuid--restore">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-guardians--uuid--restore" data-method="PUT"
      data-path="api/guardians/{uuid}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-guardians--uuid--restore', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-guardians--uuid--restore"
                    onclick="tryItOut('PUTapi-guardians--uuid--restore');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-guardians--uuid--restore"
                    onclick="cancelTryOut('PUTapi-guardians--uuid--restore');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-guardians--uuid--restore"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/guardians/{uuid}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-guardians--uuid--restore"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-guardians--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-guardians--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-guardians--uuid--restore"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                <h1 id="usuarios">Usuários</h1>

    

                                <h2 id="usuarios-GETapi-users">Listar usuários</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retorna a lista paginada de usuários.</p>

<span id="example-requests-GETapi-users">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/users" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Exemplo de resposta (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-GETapi-users">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="GETapi-users"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="usuarios-POSTapi-users">Criar usuário</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-users">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/users" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Ricardo\",
    \"email\": \"ricardo@educore.com\",
    \"phone\": \"11999999999\",
    \"password\": \"adm@1234\",
    \"password_confirmation\": \"adm@1234\",
    \"role\": \"professor\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Ricardo",
    "email": "ricardo@educore.com",
    "phone": "11999999999",
    "password": "adm@1234",
    "password_confirmation": "adm@1234",
    "role": "professor"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-users">
</span>
<span id="execution-results-POSTapi-users" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-POSTapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-POSTapi-users" data-method="POST"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users"
                    onclick="tryItOut('POSTapi-users');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users"
                    onclick="cancelTryOut('POSTapi-users');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="POSTapi-users"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="POSTapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="POSTapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="POSTapi-users"
               value="Ricardo"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>Ricardo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="email"  data-endpoint="POSTapi-users"
               value="ricardo@educore.com"
               data-component="body">
    <br>
<p>Deve ser um endereço de e-mail válido. Não pode ter mais de 255 caracteres. Exemplo: <code>ricardo@educore.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="phone"  data-endpoint="POSTapi-users"
               value="11999999999"
               data-component="body">
    <br>
<p>Não pode ter mais de 20 caracteres. Exemplo: <code>11999999999</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="password"  data-endpoint="POSTapi-users"
               value="adm@1234"
               data-component="body">
    <br>
<p>Deve ter no mínimo 8 caracteres. Exemplo: <code>adm@1234</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="password_confirmation"  data-endpoint="POSTapi-users"
               value="adm@1234"
               data-component="body">
    <br>
<p>Deve ter no mínimo 8 caracteres. Exemplo: <code>adm@1234</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="role"  data-endpoint="POSTapi-users"
               value="professor"
               data-component="body">
    <br>
<p>Must match an existing stored value. Exemplo: <code>professor</code></p>
        </div>
        </form>

                    <h2 id="usuarios-PUTapi-users--uuid-">Atualizar usuário</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-users--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/users/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Ricardo abc\",
    \"email\": \"ricardoS@educore.com\",
    \"phone\": \"11999999999\",
    \"status\": \"active\",
    \"role\": \"professor\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Ricardo abc",
    "email": "ricardoS@educore.com",
    "phone": "11999999999",
    "status": "active",
    "role": "professor"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-users--uuid-">
</span>
<span id="execution-results-PUTapi-users--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-users--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-users--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-users--uuid-" data-method="PUT"
      data-path="api/users/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-users--uuid-"
                    onclick="tryItOut('PUTapi-users--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-users--uuid-"
                    onclick="cancelTryOut('PUTapi-users--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-users--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/users/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-users--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-users--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-users--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-users--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parâmetros do corpo</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="name"  data-endpoint="PUTapi-users--uuid-"
               value="Ricardo abc"
               data-component="body">
    <br>
<p>Não pode ter mais de 255 caracteres. Exemplo: <code>Ricardo abc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="email"  data-endpoint="PUTapi-users--uuid-"
               value="ricardoS@educore.com"
               data-component="body">
    <br>
<p>Deve ser um endereço de e-mail válido. Não pode ter mais de 255 caracteres. Exemplo: <code>ricardoS@educore.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opcional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="phone"  data-endpoint="PUTapi-users--uuid-"
               value="11999999999"
               data-component="body">
    <br>
<p>Não pode ter mais de 20 caracteres. Exemplo: <code>11999999999</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="status"  data-endpoint="PUTapi-users--uuid-"
               value="active"
               data-component="body">
    <br>
<p>Exemplo: <code>active</code></p>
Deve ser um dos seguintes valores:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>blocked</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="role"  data-endpoint="PUTapi-users--uuid-"
               value="professor"
               data-component="body">
    <br>
<p>Must match an existing stored value. Exemplo: <code>professor</code></p>
        </div>
        </form>

                    <h2 id="usuarios-DELETEapi-users--uuid-">Deletar usuário</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-users--uuid-">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/users/6ff8f7f6-1eb3-3525-be4a-3932c805afed" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/6ff8f7f6-1eb3-3525-be4a-3932c805afed"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-users--uuid-">
</span>
<span id="execution-results-DELETEapi-users--uuid-" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-DELETEapi-users--uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--uuid-"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-users--uuid-" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--uuid-">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-DELETEapi-users--uuid-" data-method="DELETE"
      data-path="api/users/{uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--uuid-', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-users--uuid-"
                    onclick="tryItOut('DELETEapi-users--uuid-');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-users--uuid-"
                    onclick="cancelTryOut('DELETEapi-users--uuid-');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-users--uuid-"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/users/{uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="DELETEapi-users--uuid-"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="DELETEapi-users--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="DELETEapi-users--uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="DELETEapi-users--uuid-"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

                    <h2 id="usuarios-PUTapi-users--uuid--restore">Restaurar usuário</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-users--uuid--restore">
<blockquote>Exemplo de requisição:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/users/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore" \
    --header "Authorization: Bearer SEU_TOKEN" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/6ff8f7f6-1eb3-3525-be4a-3932c805afed/restore"
);

const headers = {
    "Authorization": "Bearer SEU_TOKEN",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-users--uuid--restore">
</span>
<span id="execution-results-PUTapi-users--uuid--restore" hidden>
    <blockquote>Resposta recebida<span
                id="execution-response-status-PUTapi-users--uuid--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--uuid--restore"
      data-empty-response-text="<Resposta vazia>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-users--uuid--restore" hidden>
    <blockquote>A requisição falhou com erro:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--uuid--restore">

Dica: verifique se você está conectado corretamente à rede.
Se você mantém esta API, verifique se ela está em execução e se o CORS está habilitado.
Consulte o console das ferramentas de desenvolvedor para obter informações de depuração.</code></pre>
</span>
<form id="form-PUTapi-users--uuid--restore" data-method="PUT"
      data-path="api/users/{uuid}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--uuid--restore', this);">
    <h3>
        Requisição&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-users--uuid--restore"
                    onclick="tryItOut('PUTapi-users--uuid--restore');">Testar ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-users--uuid--restore"
                    onclick="cancelTryOut('PUTapi-users--uuid--restore');" hidden>Cancelar 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-users--uuid--restore"
                    data-initial-text="Enviar requisição 💥"
                    data-loading-text="⏱ Enviando..."
                    hidden>Enviar requisição 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/users/{uuid}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Cabeçalhos</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Authorization" class="auth-value" data-endpoint="PUTapi-users--uuid--restore"
               value="Bearer SEU_TOKEN"
               data-component="header">
    <br>
<p>Exemplo: <code>Bearer SEU_TOKEN</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Content-Type"  data-endpoint="PUTapi-users--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="Accept"  data-endpoint="PUTapi-users--uuid--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Exemplo: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parâmetros da URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"                name="uuid"  data-endpoint="PUTapi-users--uuid--restore"
               value="6ff8f7f6-1eb3-3525-be4a-3932c805afed"
               data-component="url">
    <br>
<p>Exemplo: <code>6ff8f7f6-1eb3-3525-be4a-3932c805afed</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
