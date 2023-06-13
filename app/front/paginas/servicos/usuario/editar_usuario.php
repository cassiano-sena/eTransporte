<?php
include '../db/connect.php';

// ***atualizando informações no banco de dados*** //
$id=$_GET['updateid'];
$sql="Select * from `tab_usuario` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$usuario=$row['usuario'];
$email=$row['email'];
$telefone=$row['telefone'];
$senha=$row['senha'];

if(isset($_POST['submit'])){ // quando autorizar, atualizar os dados guardados com os novos
    $usuario=$_POST['usuario'];
    $email=$_POST['email'];
    $telefone=$_POST['telefone'];
    $senha=$_POST['senha'];

    $sql="update `tab_usuarios` set id='$id',usuario='$usuario',email='$email',telefone='$telefone',senha='$senha' where id='$id'";
    $result=mysqli_query($con,$sql);
    if ($result) {
        echo "Dados atualizados com sucesso!";
        header('location:../usuarios.php');
    } else{
        die(mysqli_error($con));
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operação Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <h1>Operação CRUD</h1>
    <div class="container my-5">
        <form method="post">

            <div class="mb-3"> 
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="usuario" placeholder="Insira o Usuário" autocomplete="off" autocapitalize="off" name="usuario" value=<?php echo $usuario; ?>>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" autocomplete="off" autocapitalize="off" name="email" value=<?php echo $email; ?>>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" placeholder="1234-5678" autocomplete="off" autocapitalize="off" name="telefone" value=<?php echo $telefone; ?>>
            </div>
            <div class="mb-3">
                <ltelefone for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" placeholder="Insira a Senha" autocomplete="off" autocapitalize="off" name="senha" value=<?php echo $senha; ?>>
            </div>
            
            <button type="submit" clas="btn btn-primary" name="submit">Submit</button>
    </div>
</body>

</html>