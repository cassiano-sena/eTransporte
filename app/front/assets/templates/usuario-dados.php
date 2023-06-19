<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS ;?>bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo CSS ;?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS ;?>index.css">
    <link rel="stylesheet" href="<?php echo CSS ;?>comum.css">
    <script src="<?php echo JS ;?>bootstrap.min.js"></script>
    <title>eTransporte-</title>
</head>
<body>
    <div class="conteudo">
        <div class="home-title">
            <span class="usuario-dados">
                <div class="foto">
                    <img src="<?php echo IMAGES; ?>usuario.png" width="150px" alt="" class="usuario"><br>
                    <div id="nome-usuario"class="nome-usuario">
                        Usuário
                    </div>
                    <!-- <div id="nome" class="nome">< ?php echo $nome;?></div> -->
                </div>
                <div class="informacoes">
                    <div id="nome" class="nome">
                        <div class="divisor-informacoes-1">Nome</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-nome" placeholder="Nome">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="sobrenome" class="sobrenome">
                        <div class="divisor-informacoes-1">Sobrenome</div> 
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-sobrenome" placeholder="Sobrenome">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="email" class="email">
                        <div class="divisor-informacoes-1">Email</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-email" placeholder="Email">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="senha" class="senha">
                        <div class="divisor-informacoes-1">Senha</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-senha" placeholder="Senha">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="telefone" class="telefone">
                        <div class="divisor-informacoes-1">Telefone</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-telefone" placeholder="Telefone">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="cidade" class="cidade">
                        <div class="divisor-informacoes-1">Cidade</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-cidade" placeholder="Cidade">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="endereco" class="endereco">
                        <div class="divisor-informacoes-1">Endereço</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-endereco" placeholder="Endereço">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="estudante" class="estudante">
                        <div class="divisor-informacoes-1">Estudante</div>
                        <div class="divisor-informacoes-2">
                            <select name="" id=""></select>
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="universidade" class="universidade">
                        <div class="divisor-informacoes-1">Universidade</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-universidade" placeholder="Universidade">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="matricula" class="matricula">
                        <div class="divisor-informacoes-1">Matrícula</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-matricula" placeholder="Matrícula">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="motorista" class="motorista">
                        <div class="divisor-informacoes-1">Motorista</div>
                        <div class="divisor-informacoes-2">
                            <select name="" id=""></select>
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="cnh" class="cnh">
                        <div class="divisor-informacoes-1">CNH</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-cnh" placeholder="CNH">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="transporte" class="transporte">
                        <div class="divisor-informacoes-1">Transporte</div>
                        <div class="divisor-informacoes-2">
                            <input type="text" id="input-transporte" placeholder="Transporte">
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                    <div id="administrador" class="administrador">
                        <div class="divisor-informacoes-1">Administrador</div>
                        <div class="divisor-informacoes-2">
                            <select name="" id=""></select>
                        </div>
                        <div class="divisor-informacoes editar-remover"></div>
                    </div>
                </div>
            </span>
        </div>
        <!-- < ?php include TEMPLATE.'notificacoes.php';?> -->
    </div>
</body>
</html>