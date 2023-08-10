<?php
require_once('config.php');

if(isset($_GET['What'])){
    if($_GET['What'] == 'members'){
        $sql = "SELECT * FROM members";
        $csv_cols = ["Members_ID",	
        "First_name",	
        "Last_name"	,
        "Phone"	,
        "Email"	,
        "Photo_path",	
        "Training_plan_ID",	
        "Trainer_ID",
        "Access_card",	
        "Created_date"	];
    }
    else if($_GET['What'] =='trainers'){
        $sql = "SELECT * FROM trainers";
        $csv_cols = ["Trainer_ID",	
        "First_name",	
        "Last_name",	
        "Phone",	
        "Email",	
        "Created_date"	];
    }
    else{
        echo "Greška";
        die();
    }
    $run = $conn -> query($sql);
    $results = $run -> fetch_all(MYSQLI_ASSOC);

    $output = fopen('php://output', 'w');
    header('Content-Type:text/csv');
    header('Content-Disposition:attachment; filename ='. $_GET['What']. ".csv");
    fputcsv($output, $csv_cols);

    foreach($results as $result){
        fputcsv($output, $result);

    }
    fclose($output);
}



?>