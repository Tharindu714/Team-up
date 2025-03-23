<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
$user_role = $_SESSION['user_role'];
if ($user_id == NULL || $security_key == NULL) {
  header('Location: index.php');
}




if (isset($_GET['delete_attendance'])) {
  $action_id = $_GET['aten_id'];

  $sql = "DELETE FROM attendance_info WHERE aten_id = :id";
  $sent_po = "attendance-info.php";
  $obj_admin->delete_data_by_this_method($sql, $action_id, $sent_po);
}


if (isset($_POST['add_punch_in'])) {
  $info = $obj_admin->add_punch_in($_POST);
}

if (isset($_POST['add_punch_out'])) {
  $obj_admin->add_punch_out($_POST);
}


$page_name = "Dashboard";
include("include/sidebar.php");

//$info = "Hello World";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



<div class="row">

  <input type="text" name="" id="basic_search">
  <button onclick="basicSearch(0);">search</button>
  <table class="table table-codensed table-custom table bg-white" style="margin-top: 100px;">

    <thead id="basicSearchResult">
      <tr>
        <th style="color: white;">task title</th>
        <th style="color: white;">start time</th>
        <th style="color: white;">end time</th>
        <th style="color: white;">task id</th>
      </tr>

      

    </thead>



</div>


<?php

include("include/footer.php");



?>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>