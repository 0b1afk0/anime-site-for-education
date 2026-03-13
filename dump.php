<?php
$db = new PDO('sqlite:database/database.sqlite');
$sql = '';
foreach ($db->query('SELECT sql FROM sqlite_master WHERE type="table"') as $row) {
    $sql .= $row['sql'] . ";\n";
}
file_put_contents('dump.sql', $sql);
echo "Dump saved to dump.sql\n";
