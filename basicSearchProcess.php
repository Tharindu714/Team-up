<?php

session_start();
require "connection.php";

$txt = $_POST["t"];


$query = "SELECT * FROM `task_info`";

if (!empty($txt)) {
    $query .= "WHERE `t_title` LIKE '%" . $txt . "%'AND `status`='1' ";
} else if (empty($txt)) {

    $query = "SELECT * FROM `task_info` WHERE `status`='1' ";

}


?>

<thead class="basicSearchResult">
    <tr>
    <th style="color: white;">task title</th>
        <th style="color: white;">start time</th>
        <th style="color: white;">end time</th>
        <th style="color: white;">task id</th>

        <?php

        $taskrs = Database::search($query);




        ?>
    </tr>

    <?php
    for ($x = 0; $x < $taskrs->num_rows; $x++) {

        $taskData = $taskrs->fetch_assoc();

        ?>

        <tr>
            <th style="color: #22C414;">
                <?php echo $taskData["t_title"] ?>
            </th>
            <th style="color: #22C414;">
                <?php echo $taskData["t_start_time"] ?>
            </th>
            <th style="color: #22C414;">
                <?php echo $taskData["t_end_time"] ?>
            </th>
            <th style="color: #22C414;">
                <?php echo $taskData["task_id"] ?>
            </th>

        </tr>

        <?php

    }

    ?>


</thead>