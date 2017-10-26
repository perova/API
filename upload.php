<?php

//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     // if($check !== false) {
//     //     echo "File is an image - " . $check["mime"] . ".";
//     //     $uploadOk = 1;
//     // } else {
//     //     echo "File is not an image.";
//     //     $uploadOk = 0;
    
// // Check if file already exists
// // if (file_exists($target_file)) {
// //     echo "Sorry, file already exists.";
// //     $uploadOk = 0;
// // }
// // // Check file size
// // if ($_FILES["fileToUpload"]["size"] > 500000) {
// //     echo "Sorry, your file is too large.";
// //     $uploadOk = 0;
// // }
// // Allow certain file formats
// // if($imageFileType != "csv" ) {
// //     echo "Sorry, only CSV allowed";
// //     $uploadOk = 0;}
// //Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    
//$emailsFile = fopen("emails.csv", "w") or die("Err!");
    
        $conn = new PDO("mysql:host=localhost;dbname=regitra;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $newfile = fopen($target_file, "r") or die("Err!");


            for ($id=1; !feof($newfile); $id++) {
                
            $file = explode(",", rtrim(fgets($newfile), ""));
            $statement = $conn->prepare("INSERT INTO cars (owner, license, make, model) VALUES (:owner, :license, :make, :model)");


            print_r($file);

            $statement->bindParam(':owner', $file[0]);
            $statement->bindParam(':license', $file[1]);
            $statement->bindParam(':make', $file[2]);
            $statement->bindParam(':model', $file[3]);
            $statement->execute();
            //$response['message'] = ['type' => 'success','body' => 'Car was added'];


    //fwrite($emailsFile, $id . "," . $c[0] . "@php.lt," . $c[1] . "\n");
                }

                $conn = null;
                header("location: index.php ");
            
           // fclose($target_file);
//fclose($emailsFile);

        } else {
            echo "Sorry, there was an error uploading your file.";
     }
 }
