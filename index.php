<?php
$nn = 0;
foreach (glob("*.csv") as $filename) {
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {

            $c = count($data);

            for ($x=0;$x<$c;$x++)
            {
                $csvarray[$nn][] = $data[$x];
            }
            $nn++;
        }

        fclose($handle);
    }

}

$fp = fopen('final.csv', 'w');//output file set here

foreach ($csvarray as $fields) {
    fputcsv($fp, $fields);
}

echo "<html><body><table>\n\n";
$f = fopen("final.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($fp);

echo "\n</table></body></html>";

?>