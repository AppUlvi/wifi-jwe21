<?php
include "funktionen.php";
istEingeloggt();

include "head.php";
?>

<h1>Zutaten</h1>



<?php

$result = mysqli_query($db, "SELECT * FROM zutaten ORDER BY titel ASC");

echo
"<table border=\"1\">
    <thead>
        <tr>
            <th>Titel</th>
            <th>kCal / 100</th>
        </tr>
    </thead>
    </tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row["titel"]}</td>";
    echo "<td>{$row["kcal_pro_100"]}</td>";
    echo "</tr>";
}
echo "</tbody>
</table>";


?>

<?php
include "foot.php";
?>