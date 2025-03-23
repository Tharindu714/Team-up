<?php

session_start();
require "connection.php";

$recever_mail = $_SESSION["user"]["email"];
$sender_mail = $_GET["e"];

$msg_rs = Database::search("SELECT * FROM `chat` WHERE `from`='" . $sender_mail . "' OR `to`='" . $sender_mail . "'");
$msg_num = $msg_rs->num_rows;

for ($x = 0; $x < $msg_num; $x++) {
    $msg_data = $msg_rs->fetch_assoc();

    if ($msg_data["from"] == $sender_mail && $msg_data["to"] == $recever_mail) {

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
        $user_data = $user_rs->fetch_assoc();

?>
        <!-- sender -->
        <div class="media mb-3 w-75">
            <div class="media-body me-4">
                <div class="bg-light rounded py-2 px-3 mb-2">
                    <p class="mb-0 fw-bold text-black-50"> <?php echo $msg_data["content"]; ?></p>
                </div>
                <p class="small fw-bold text-black-50 text-end" ><?php echo $msg_data["datetime"]; ?></p>
                <p class="invisible" id="rmail"><?php echo $msg_data["from"];?></p>
            </div>
        </div>
        <!-- sender -->
    <?php

    } else if ($msg_data["to"] == $sender_mail && $msg_data["from"] == $recever_mail) {
    ?>
        <!-- receiver -->
        <div class="offset-3 col-9 media mb-3 w-75">
            <div class="media-body">
                <div class="bg-success rounded py-2 px-3 mb-2">
                    <p class="mb-0 text-white"><?php echo $msg_data["content"]; ?></p>
                </div>
                <p class="small fw-bold text-white text-end"><?php echo $msg_data["datetime"]; ?></p>
            </div>
        </div>
        <!-- receiver -->
<?php
    }
    if($msg_data["status"]==0){
        Database::insUpdelete("UPDATE `chat` SET `status`='1' WHERE `from`='".$sender_mail."' 
        AND `to`='".$recever_mail."'");
    }
}


