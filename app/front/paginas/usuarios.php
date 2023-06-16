<?php
include 'db/connect.php';
?>

<?php

// ***deletando informações no banco de dados*** //
include 'db/connect.php';
if(isset($_GET['deleteid'])){ 
    $id=$_GET['deleteid']; // pegando o dado deleteid e guardando dentro da variavel id

    $sql="delete from `tab_usuarios` where id=$id";
    $result=mysqli_query($con,$sql);
    if ($result) {
        echo "Dados deletados com sucesso!";
    } else{
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <a href="home/home.php">Home</a>
    <div class="container">
        <button class="btn btn-primary my-4"><a href="cadastro/cad_usuario.php" class="text-light">Adicionar Usuário</a></button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
            
                $sql="Select * from `tab_usuarios`"; // * significa todos os dados
                $result=mysqli_query($con,$sql);
                if ($result) {
                    while($row=mysqli_fetch_assoc($result)){ // loop para mostrar todos os dados de usuário em sequencia
                    $id=$row['id'];
                    $usuario=$row['usuario'];
                    $email=$row['email'];
                    $telefone=$row['telefone'];
                    $senha=$row['senha'];
                    
                    // tudo que estiver dentro do banco de dados será mostrado a seguir
                    echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$usuario.'</td>
                    <td>'.$email.'</td>
                    <td>'.$telefone.'</td>
                    <td>'.$senha.'</td>
                    <td>
                    <button class="btn btn-primary"><a href="cadastro/upd_usuario.php?updateid='.$id.'" class="text-light">Editar</a></button>
                    <button class="btn btn-danger"><a href="usuarios.php?deleteid='.$id.'" class="text-light">Remover</a></button>
                    </td>
                </tr>';
                    }
                } else{
                    die(mysqli_error($con));
                }

            ?>
                
            </tbody>
        </table>
    </div>

</body>

</html>