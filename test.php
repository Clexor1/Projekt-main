
<?php
//čitanje podataka iz obrazca 
require_once('config.php');
require_once('fpdf186/fpdf.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){ 
    $First_name = $_POST['First_name'];
    $Last_name = $_POST['Last_name'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $Photo_path ="";
    $Training_plan_ID = $_POST['Training_plan_ID'];
    $Trainer_ID = 0;
    $Access_card = "";
    

//upis u bazu
$sql= "INSERT INTO members (First_name, Last_name, Phone, Email, Photo_path, Training_plan_ID, Trainer_ID, Access_card)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$run = $conn -> prepare($sql);
$run -> bind_param("sssssiis", $First_name, $Last_name, $Phone, $Email, $Photo_path, $Training_plan_ID, $Trainer_ID, $Access_card );
$run ->execute();  //izvrsi

    //var_dump($conn);
    //die();
    $Members_ID = $conn->insert_id;
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B','20');
    $pdf -> Cell(40,10,'Access Card');
    $pdf ->Ln();
    $pdf->Cell(40,10,'Member ID: '.$Members_ID);
    $pdf ->Ln();
    $pdf->Cell(40,10,'First name: '.$First_name);
    $pdf ->Ln();
    $pdf->Cell(40,10,'Last name: '.$Last_name);
    $pdf ->Ln();
    $pdf->Cell(40,10,'Email: '.$Email);
    $pdf ->Ln();
    $pdf->Cell(40,10,'Phone: '.$Phone);
    $pdf ->Ln();

    $Photo =$_FILES['my_image'];
    //var_dump($Photo);
    $Photo_name = basename($Photo['name']);
    $Photo_path = 'member_photos/' . $Photo_name; 
    var_dump($Photo_path);
    
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];  //dozvoljeni nastavci
    $ext = pathinfo($Photo_name, PATHINFO_EXTENSION);  //exstenzija mog file

   if(in_array($ext, $allowed_ext) && $Photo ['size'] < 2000000){
    move_uploaded_file($Photo['tmp_name'],$Photo_path);
    $sql = "UPDATE members SET Photo_path = '$Photo_path' WHERE Members_ID = $Members_ID";
    $conn -> query($sql);

   }
    $filename= 'access_cards/access_card_' . $Members_ID . '.pdf';
    $pdf -> Output('F', $filename);

    $sql = "UPDATE members SET Access_card = '$filename' WHERE Members_ID = $Members_ID";
    $conn -> query($sql);
    $conn -> close();
   

//html poruka
    $_SESSION['poruka'] = 'You have successfully registered a user.';
    header('location: register_member.php');
    exit();
}
?>


