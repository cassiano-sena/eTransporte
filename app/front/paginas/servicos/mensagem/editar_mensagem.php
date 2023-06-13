<?php
include '../db/connect.php';

// ***atualizando informações no banco de dados*** //
$id=$_GET['updateid'];
$sql="Select * from `tab_mensagens` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$usuario=$row['usuario'];
$rota=$row['rota'];
$data=$row['data'];
$hora=$row['hora'];
$descricao=$row['descricao'];

if(isset($_POST['submit'])){ // quando autorizar, atualizar os dados guardados com os novos
    $usuario=$_POST['usuario'];
    $rota=$_POST['rota'];
    $data=$_POST['data'];
    $hora=$_POST['hora'];
    $descricao=$_POST['descricao'];

    $sql="update `tab_mensagens` set id='$id',usuario='$usuario',rota='$rota',data='$data',hora='$hora',descricao='$descricao' where id='$id'";
    $result=mysqli_query($con,$sql);
    if ($result) {
        echo "Dados atualizados com sucesso!";
        header('location:../mensagens.php');
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
                <label for="rota" class="form-label">Rota</label>
                <input type="rota" class="form-control" id="rota" placeholder="Insira a rota" autocomplete="off" autocapitalize="off" name="rota" value=<?php echo $rota; ?>>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" placeholder="Insira a data" autocomplete="off" autocapitalize="off" name="data" value=<?php echo $data; ?>>
            </div>
            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="text" class="form-control" id="hora" placeholder="Insira a hora" autocomplete="off" autocapitalize="off" name="hora" value=<?php echo $hora; ?>>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="textarea" class="form-control" id="descricao" placeholder="Insira a Descrição" autocomplete="off" autocapitalize="off" name="descricao" value=<?php echo $descricao; ?>>
            </div>
            
            <button type="submit" clas="btn btn-primary" name="submit">Submit</button>
    </div>
</body>

</html>