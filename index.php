<?php
    $data = json_decode(file_get_contents('data.json'));

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Обана</title>
    <link rel="stylesheet" href="semantic-ui/semantic.css">
    <script src="jquery-2.2.4.js"></script>
    <script src="semantic-ui/semantic.js"></script>
    <style>
        body{
            background-color: #DADADA;
        }
        .container {
            height: 100%;
            margin-top: 150px;
        }



    </style>
</head>
<body>
<form action="save.php" method="post">
    <div class="ui container">
        <div id="panel">
            <div class="ui top attached borderless menu">
                <div id="add-button" class="link item">
                    <i class="green plus icon"></i>
                    Добавить строку
                </div>
            </div>
            <div class="ui attached segment">
                <table class="ui very basic celled table">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Количество</th>
                            <th class="collapsing"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($data as $id=>$row){
                            echo "<tr data-id='$id'>";

                            echo "<td>".$row->name."</td>";
                            echo "<td>".$row->count."</td>";

                            echo '<td class="collapsing"><div class="ui icon basic button remove-item" data-id="'.$id.'"><i class="remove icon"></i></div></td>';

                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="ui bottom attached right aligned segment">
                <button id="save-button" class="ui green button">Сохранить</button>
            </div>
        </div>
    </div>
</form>
</body>
<script>
    $(function(){
        $('#add-button').click(function(){
            $('table tbody').append('<tr><td><div class="ui fluid input"><input name="name[]"></div></td><td><div class="ui fluid input"><input name="count[]"></div></td><td><div class="ui icon basic button remove-row"><i class="remove icon"></i></div></td></tr>');
            $('.remove-row').click(function(){
                $(this).closest('tr').remove();
            });
        });

        $('.remove-item').click(function(){
            var id = $(this).data('id');
            location.href = "remove.php?id="+id;
        });
    })
</script>
</html>