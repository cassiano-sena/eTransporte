<?php
include '../db/connect.php';

// ***atualizando informações no banco de dados*** //
$id=$_GET['updateid'];
$sql="Select * from `tab_rotas` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$rota=$row['rota'];
$veiculo=$row['veiculo'];
$motorista=$row['motorista'];
$data=$row['data'];
$horarios=$row['horarios'];

if(isset($_POST['submit'])){ // quando autorizar, atualizar os dados guardados com os novos
    $rota=$_POST['rota'];
    $veiculo=$_POST['veiculo'];
    $motorista=$_POST['motorista'];
    $data=$_POST['data'];
    $horarios=$_POST['horarios'];

    $sql="update `tab_rotas` set id='$id',rota='$rota',veiculo='$veiculo',motorista='$motorista',data='$data',horarios='$horarios' where id='$id'";
    $result=mysqli_query($con,$sql);
    if ($result) {
        echo "Dados atualizados com sucesso!";
        header('location:../rotas.php');
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
                <label for="rota" class="form-label">Rota</label>
                <input type="rota" class="form-control" id="rota" placeholder="Insira a rota" autocomplete="off" autocapitalize="off" name="rota" value=<?php echo $rota; ?>>
            </div>
            <div class="mb-3">
                <label for="veiculo" class="form-label">Veículo</label>
                <input type="text" class="form-control" id="veiculo" placeholder="Insira o Veículo" autocomplete="off" autocapitalize="off" name="veiculo" value=<?php echo $veiculo; ?>>
            </div>
            <div class="mb-3"> 
                <label for="motorista" class="form-label">Motorista</label>
                <input type="text" class="form-control" id="motorista" placeholder="Insira o Motorista" autocomplete="off" autocapitalize="off" name="motorista" value=<?php echo $motorista; ?>>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" placeholder="Insira a data" autocomplete="off" autocapitalize="off" name="data" value=<?php echo $data; ?>>
            </div>
            <div class="mb-3">
                <label for="horario" class="form-label">Horário</label>
                <input type="text" class="form-control" id="horario" placeholder="Insira o horário" autocomplete="off" autocapitalize="off" name="horario" value=<?php echo $horario; ?>>
            </div>
            
            <button type="submit" clas="btn btn-primary" name="submit">Submit</button>
    </div>
</body>

</html>