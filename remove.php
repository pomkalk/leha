<?php
    $id = $_GET['id'];
    $data = json_decode(file_get_contents('data.json'));

    unset($data[$id]);

    file_put_contents('data.json', json_encode($data));

    header("location: /");
?>