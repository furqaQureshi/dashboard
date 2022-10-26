<?php

include "crudBook.php";
$id = $_GET["id"];
$crud = new crudBook();
echo $crud->Delete($id);
header("Location: basic_table.php");
