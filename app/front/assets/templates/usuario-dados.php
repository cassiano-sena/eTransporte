<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';
$token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
$usuarioId = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$senha = isset($_SESSION['senha']) ? $_SESSION['senha'] : '';
$telefone = isset($_SESSION['telefone']) ? $_SESSION['telefone'] : '';
$cidade = isset($_SESSION['cidade']) ? $_SESSION['cidade'] : '';
$is_driver = isset($_SESSION['is_driver']) ? $_SESSION['is_driver'] : '';
$is_admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : '';

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>eTransporte</title>
</head>
<body>
    <div class="conteudo">
        <div class="home-title">
            <span class="usuario-dados">
                <div class="foto">
                    <img src="<?php echo IMAGES; ?>usuario.png" width="150px" alt="" class="usuario"><br>
                    <div id="nome-usuario"class="nome-usuario">
                        <?php echo $nome; ?>
                    </div>
                    <div class="spacer"></div>
                    <button id="removeButton" type="button" class="btn btn-danger btn-sm">Remover</button>
                </div>
                <div class="informacoes">
                    <div class="style-group-together">
                        <div id="nome" class="nome">
                            <div>
                                <input type="text" id="input-nome" value="<?php echo isset($nome) ? $nome : 'Nome'; ?>" placeholder="Nome">
                            </div>    
                            
                        </div>
                        <div id="email" class="email">
                            <div>
                                <input type="text" id="input-email" value="<?php echo isset($email) ? $email : 'Email'; ?>" placeholder="Email">
                            </div>
                            
                        </div>
                        <div id="senha" class="senha">
                            <div>
                                <input type="text" id="input-senha" value="<?php echo isset($senha) ? $senha : 'Senha'; ?>" placeholder="Senha">
                            </div>
                            
                        </div>
                        <div id="telefone" class="telefone">
                            <div>
                                <input type="text" id="input-telefone" value="<?php echo isset($telefone) ? $telefone : 'Telefone'; ?>" placeholder="Telefone">
                            </div>
                            
                        </div>
                        <div id="cidade" class="cidade">
                            <div>
                                <input type="text" id="input-cidade" value="<?php echo isset($cidade) ? $cidade : 'Cidade'; ?>" placeholder="Cidade">
                            </div>
                            
                        </div>
                        <div id="motorista" class="motorista">
                            <div>
                                Motorista:
                                <select name="motorista" id="">
                                    <?php if($is_driver!=0){
                                            echo '<option id="is_driver" value="1" selected>Sim</option><br><option id="is_driver" value="0">Não</option>';
                                        }else{
                                            echo '<option id="is_driver" value="0" selected>Não</option><br><option id="is_driver" value="1">Sim</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div id="administrador" class="administrador">
                            <div>
                                Administrador:
                                <select name="administrador" id="">
                                <?php if($is_admin!=0){
                                            echo '<option id="is_admin" value="1" selected>Sim</option><br><option id="is_admin" value="0">Não</option>';
                                        }else{
                                            echo '<option id="is_admin" value="0" selected>Não</option><br><option id="is_admin" value="1">Sim</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        <button id="salvarButton" type="button" class="btn btn-primary btn-sm">Salvar</button>
                    </div>
                </div>
            </span>
        </div>
    </div>
</body>
<script>
$(document).ready(function() {

  //SALVAR
  $('#salvarButton').click(function() {
    if (confirm("Deseja aplicar as alterações? Você precisará relogar para as mudanças acontecerem.")) {
        $.ajax({
        url: '../../back/curl/curl-updateuser.php',
        type: 'POST',
        data: {
            token: '<?php echo $token; ?>',
            usuario_id: '<?php echo $usuarioId; ?>',
            nome: $('#input-nome').val(),
            email: $('#input-email').val(),
            telefone: $('#input-telefone').val(),
            senha: $('#input-senha').val(),
            is_admin: $('#is_admin').val(),
            is_driver: $('#is_driver').val(),
            cidade: $('#input-cidade').val(),
        },
        success: function(response) {
            console.log(response);
            console.log('Usuário atualizado com sucesso.');
            window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
        }); 
    }
  });
  //REMOVER
  $('#removeButton').click(function() {
    var token = <?php echo json_encode($token); ?>;
    var usuarioId = <?php echo json_encode($usuarioId); ?>;
    
    if (confirm("Remover usuário? Você retornará para a tela de login")) {
      $.ajax({
        url: '../../back/curl/curl-deleteuser.php',
        type: 'POST',
        data: {
          token: token,
          usuario_id: usuarioId
        },
        success: function(response) {
          console.log(response);
          console.log('Usuário removido com sucesso.');
          window.location.href = '../paginas/logout.php';
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }
  });
});
</script>
</html>