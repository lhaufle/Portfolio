<?php
include("../template/database.php");
include("../template/template.php");

$id = $_POST['id']; //get id that was passed to make sure proper row is selected

displayHeader("View Financials");
echo "<div class=\"container\">";
displayJumbo("View Financials", "");

viewOnlyFinancials($id);
echo "</div>";

displayFooter();

echo "  <script src=\"../scripts/script.js\"></script>";

?>