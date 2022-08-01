<?php
// $file_path = 'project.csv';
$file_path = 'gs://test-project-01/project.csv';
    
function readCSV(){
        global $file_path;
        echo '<table border="1">';
        $start_row = 1;
        if(($csv_file = fopen($file_path, 'r')) !== FALSE) {
            while(($read_data = fgetcsv($csv_file, null, ",")) !== FALSE) {
                $column_count = count($read_data);
                echo '<tr>';
                for($c=0; $c < $column_count; $c++) {
                    echo "<td>" . $read_data[$c] . "</td>";
                }
                echo '</tr>';
                $start_row++;
            }
            fclose($csv_file);
        }
        echo '</table>';
    }

function createCSV(){
    global $file_path;
    $csv_file = fopen($file_path, 'r');
        $a = array();
        // Initializing an empty array to store future array inside 
        $read_data = fgetcsv($csv_file, null, ",");
        $column_count = count($read_data);

        function RemoveSpecialChar($str) {
            $res = str_replace( array( '/', '"', ',' , ';', '<', '>', ' ', '.' ), '', $str);
            return $res;
            };
        for ($c=0; $c < $column_count; $c++){
            $data_string = RemoveSpecialChar($read_data[$c]);
            echo $read_data[$c] . ' <input type="text" name="'. $data_string . $c .'"/>' . '<br>';
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            for ($c=0; $c < $column_count; $c++) {
                $data_string = RemoveSpecialChar($read_data[$c]);
                $data[$c] = $_POST[$data_string.$c];
                array_push($a, $data[$c]);
                // Pushing data collected from the form as an array 
            }
        }
        fclose($csv_file);
        
        $fp = fopen($file_path, 'a');
        fputcsv($fp, $a);
        fclose($fp);
    }
?>

