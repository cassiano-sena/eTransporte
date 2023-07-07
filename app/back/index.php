<?php
    require_once('functions.php');
    $api = new Api;
    $api->processApi();

    // senha: nao possui case-sensitivity

    // addUsuario(): nao é inserido corretamente, provavelmente algum array/coluna/variável possui um valor diferente do que o necessario