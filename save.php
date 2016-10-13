<?php

    $names = $_POST['name'];
    $counts = $_POST['count'];

    $data = json_decode(file_get_contents('data.json'));

    for ($i=0;$i<count($names);$i++)
        array_push($data, ['name'=>$names[$i], 'count'=>$counts[$i]]);

    file_put_contents('data.json', json_encode($data));

    header("location: /");
?>