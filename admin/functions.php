<?php
/*
    =====This app is designed and developed by Aderopo =====
*/

//Load Composer's autoloader
//require '../vendor/autoload.php'; // If you're using Composer (recommended)
    //Getting paid request
    function getPaidRequest(){
        include"conn.php";
         $sql="SELECT appno, invoiceno, purpose, amount_paid, invoice_flag, paid_time FROM transinvoice WHERE (purpose like '%Transcript%' OR purpose ='Student copy') AND amount_paid > '0' AND invoice_flag='0' AND paid_time like '%20%' order by id DESC";
         $requests = array();
        if($result = $conn->query($sql)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "paid_time" =>$row["paid_time"], "purpose" =>$row["purpose"], "invoiceno" =>$row["invoiceno"]);
                array_push($requests, $announcement);
            }
        }
        return $requests;
    }
    function getFilter($flag, $start, $end){
        include"conn.php";
         $sql="SELECT appno, invoiceno, purpose, amount_paid, invoice_flag, paid_time FROM transinvoice WHERE (purpose like '%Transcript%' OR purpose ='Student copy') AND amount_paid > '0' AND invoice_flag='$flag' AND paid_time BETWEEN '$start' and '$end' order by id DESC";
         $requests = array();
        if($result = $conn->query($sql)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "paid_time" =>$row["paid_time"], "purpose" =>$row["purpose"], "invoiceno" =>$row["invoiceno"], "invoice_flag" => $row["invoice_flag"]);
                array_push($requests, $announcement);
            }
        }
        return $requests;
    }
    function getFileRequest(){
        include"conn.php";
         $sql="SELECT appno, invoiceno, purpose, amount_paid, invoice_flag, paid_time FROM transinvoice WHERE (purpose like '%Transcript%' OR purpose ='Student copy') AND amount_paid > '0' AND invoice_flag='1' order by id DESC";
         $requests = array();
        if($result = $conn->query($sql)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "paid_time" =>$row["paid_time"], "purpose" =>$row["purpose"], "invoiceno" =>$row["invoiceno"]);
                array_push($requests, $announcement);
            }
        }
        return $requests;
    }
    function getResultRequest(){
        include"conn.php";
         $sql="SELECT appno, invoiceno, purpose, amount_paid, invoice_flag, paid_time FROM transinvoice WHERE (purpose like '%Transcript%' OR purpose ='Student copy') AND amount_paid > '0' AND invoice_flag='2' order by id DESC";
         $requests = array();
        if($result = $conn->query($sql)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "paid_time" =>$row["paid_time"], "purpose" =>$row["purpose"], "invoiceno" =>$row["invoiceno"]);
                array_push($requests, $announcement);
            }
        }
        return $requests;
    }
    function getProcessRequest(){
        include"conn.php";
         $sql="SELECT appno, invoiceno, purpose, amount_paid, invoice_flag, paid_time FROM transinvoice WHERE (purpose like '%Transcript%' OR purpose ='Student copy') AND amount_paid > '0' AND invoice_flag='3' order by id DESC";
         $requests = array();
        if($result = $conn->query($sql)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "paid_time" =>$row["paid_time"], "purpose" =>$row["purpose"], "invoiceno" =>$row["invoiceno"]);
                array_push($requests, $announcement);
            }
        }
        return $requests;
    }
    function getDispatchRequest(){
        include"conn.php";
         $sql="SELECT appno, invoiceno, purpose, amount_paid, invoice_flag, paid_time FROM transinvoice WHERE (purpose like '%Transcript%' OR purpose ='Student copy') AND amount_paid > '0' AND invoice_flag='5' order by id DESC";
         $requests = array();
        if($result = $conn->query($sql)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "paid_time" =>$row["paid_time"], "purpose" =>$row["purpose"], "invoiceno" =>$row["invoiceno"]);
                array_push($requests, $announcement);
            }
        }
        return $requests;
    }
    function getSignRequest(){
        include"conn.php";
         $sql="SELECT appno, invoiceno, purpose, amount_paid, invoice_flag, paid_time FROM transinvoice WHERE (purpose like '%Transcript%' OR purpose ='Student copy') AND amount_paid > '0' AND invoice_flag='4' order by id DESC";
         $requests = array();
        if($result = $conn->query($sql)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "paid_time" =>$row["paid_time"], "purpose" =>$row["purpose"], "invoiceno" =>$row["invoiceno"]);
                array_push($requests, $announcement);
            }
        }
        return $requests;
    }

    //Payment Details
     function getPaymentDetails($invoice){
        include"conn.php";
        $sql = "SELECT appno, invoiceno, purpose, amount_paid, paid_time FROM transinvoice  WHERE invoiceno= '$invoice'";
         $payments = array();
        if($result = $conn->query($sql)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "paid_time" =>$row["paid_time"], "purpose" =>$row["purpose"], "invoiceno" =>$row["invoiceno"], "amount_paid" =>$row["amount_paid"]);
                array_push($payments, $announcement);
            }
        }
        return $payments;
    }

     //Student biodata
     function getData($appno){
        include"conn.php";
        $sql = "SELECT * FROM biodata  WHERE id= '$appno'";
         $students = array();
        $result = $conn->query($sql);
        $row= $result->fetch_array(MYSQLI_ASSOC);
        $students = $row;
        return $students;
    }

    //Getting courier details
    function getCourier($appno){
        include"conn.php";
        $sql1 = "SELECT address, destination FROM courier  WHERE appno='$appno' order by courier_id desc LIMIT 1";
        $couriers = array();
        if($result = $conn->query($sql1)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("address" =>$row["address"], "destination" =>$row["destination"]);
                array_push($couriers, $announcement);
            }
        }
        return $couriers;

    }

    //getting all units

    function getUnit(){
        include 'conn.php';
        $sql1 = "SELECT id, unit, created_at FROM unit WHERE deleted_at IS NULL order by id asc";
        $couriers = array();
        if($result = $conn->query($sql1)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("unit" =>$row["unit"], "id" =>$row["id"], "created_at" =>$row["created_at"]);
                array_push($couriers, $announcement);
            }
        }
        return $couriers;
    }
    function getUsers($user_id){
        include 'conn.php';
        $sql1 = "SELECT * FROM admin WHERE id!='$user_id' order by name asc";
        $couriers = array();
        if($result = $conn->query($sql1)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("name" =>$row["name"], "id" =>$row["id"], "othername" =>$row["othername"], "email" => $row["email"], "telephone" => $row["telephone"], "deleted_at" => $row["deleted_at"],);
                array_push($couriers, $announcement);
            }
        }
        return $couriers;
    }
    function getSection($user_id){
        include 'conn.php';
        $sql1 = "SELECT * FROM unit WHERE id='$user_id'";
        if($result = $conn->query($sql1)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $adm = $row['unit'];
                if ($adm == 'Super') {
                    return 'Admin';
                }else{
                    return $row['unit'];
                }
            }
        }
    }
    function getCouriers(){
        include 'conn.php';
        $sql1 = "SELECT * FROM courier_admin order by id desc";
        $couriers = array();
        if($result = $conn->query($sql1)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("name" =>$row["name"], "id" =>$row["id"], "email" => $row["email"], "telephone" => $row["telephone"], "deleted_at" => $row["deleted_at"],);
                array_push($couriers, $announcement);
            }
        }
        return $couriers;
    }
    function getFeedback($id){
        include 'conn.php';
        $sql11 = "SELECT * FROM trans_docs WHERE id ='$id'";
        $couriers = array();
        if($result1 = $conn->query($sql11)){
            while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "section" =>$row["section"], "id" =>$row["id"], "sessionadmin" =>$row["sessionadmin"], "sessiongrad" => $row["sessiongrad"], "comments" => $row["comments"], "name" => $row["name"],);
                array_push($couriers, $announcement);
            }
        }
        return $couriers;
    }
    function getTrack($id){
        include 'conn.php';
        $sql11 = "SELECT * FROM trans_docs WHERE appno ='$id' order by id desc";
        $couriers = array();
        if($result1 = $conn->query($sql11)){
            while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "section" =>$row["section"], "id" =>$row["id"], "update_time" =>$row["update_time"], "status" => $row["status"], "comments" => $row["comments"], "name" => $row["name"],);
                array_push($couriers, $announcement);
            }
        }
        return $couriers;
    }
    function getPrevious($id){
        include 'conn.php';
        $sql11 = "SELECT * FROM transinvoice WHERE appno ='$id' order by id desc";
        $couriers = array();
        if($result1 = $conn->query($sql11)){
            while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("appno" =>$row["appno"], "amount_paid" =>$row["amount_paid"], "id" =>$row["id"], "paid_time" =>$row["paid_time"], "purpose" => $row["purpose"], "invoiceno" => $row["invoiceno"]);
                array_push($couriers, $announcement);
            }
        }
        return $couriers;
    }
    function getUser($user_id){
        include 'conn.php';
        $sql1 = "SELECT * FROM admin WHERE role_id !='1' AND id !='$user_id' order by name asc";
        $couriers = array();
        if($result = $conn->query($sql1)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("name" =>$row["name"], "id" =>$row["id"], "othername" =>$row["othername"], "email" => $row["email"], "telephone" => $row["telephone"], "deleted_at" => $row["deleted_at"],);
                array_push($couriers, $announcement);
            }
        }
        return $couriers;
    }
    function getResultUser(){
        include 'conn.php';
        $sql1 = "SELECT * FROM result group by user";
        $reports = array();
        if($result = $conn->query($sql1)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                # code...
                $announcement = array("user" =>$row["user"]);
                array_push($reports, $announcement);
            }
        }
        return $reports;
    }
    function getTotalUpload($user_id){
        include 'conn.php';
        $sql11 = "SELECT * FROM result WHERE user ='$user_id'";
        $result = $conn->query($sql11);
        $count = mysqli_num_rows($result);
            return $count;
        
    }
    function getUserName($id){
        include 'conn.php';
        $sql11 = "SELECT * FROM admin WHERE id ='$id'";
        $result = $conn->query($sql11);
        $row = $result->fetch_array(MYSQLI_ASSOC);
            return $row['name'];
        
    }
    function getUserOName($id){
        include 'conn.php';
        $sql11 = "SELECT * FROM admin WHERE id ='$id'";
        $result = $conn->query($sql11);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row['othername'];
        
    }

    function getAddress($user_id){
        include 'conn.php';
        $sql11 = "SELECT * FROM courier WHERE invoiceno ='$user_id'";
        $result = $conn->query($sql11);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               return $row['address'];
            }
        
    }
    
    function getCountry($user_id){
        include 'conn.php';
        $sql1 = "SELECT * FROM courier WHERE invoiceno ='$user_id'";
        $result = $conn->query($sql1);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               return $row['destination'];
            }
        
    }
    function getChannel($user_id){
        include 'conn.php';
        $sql1 = "SELECT * FROM courier WHERE invoiceno ='$user_id'";
        $result = $conn->query($sql1);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               return $row['courier_name'];
            }
        
    }
    function getNotification($user_id){
        include 'conn.php';
        $sql1 = "SELECT * FROM doc_transcript WHERE matric ='$user_id'";
        $result = $conn->query($sql1);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               return $row['degree'];
            }
        
    }
    function getWes($user_id){
        include 'conn.php';
        $sql11 = "SELECT * FROM doc_transcript WHERE matric ='$user_id' order by id DESC";
        $result1 = $conn->query($sql11);
            while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
               return $row1['file'];
            }
        
    }
    function getSurname($user_id){
        include 'conn.php';
        $sql11 = "SELECT * FROM trans_details_new WHERE matric ='$user_id' order by id DESC";
        $result1 = $conn->query($sql11);
            while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
               return $row1['Surname'];
            }
        
    }
    function getOname($user_id){
        include 'conn.php';
        $sql11 = "SELECT * FROM trans_details_new WHERE matric ='$user_id' order by id DESC";
        $result1 = $conn->query($sql11);
            while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
               return $row1['Othernames'];
            }
        
    }
    function getEmail($user_id){
        include 'conn.php';
        $sql11 = "SELECT * FROM trans_details_new WHERE matric ='$user_id' order by id DESC";
        $result1 = $conn->query($sql11);
            while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
               return $row1['email'];
            }
        
    }
    function getTime($user_id){
        include 'conn.php';
        $sql11 = "SELECT * FROM dispatch_office WHERE id ='$user_id'";
        $result1 = $conn->query($sql11);
            while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
               return $row1['update_time'];
            }
        
    }
    function getStatus($user_id){
        include 'conn.php';
        $sql11 = "SELECT * FROM dispatch_office WHERE invoiceno ='$user_id'";
        $result1 = $conn->query($sql11);
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);
        if ($row1) {
            $status = "Candidate notified";
        }else {
            $status ='Candidate yet to be notified';
        }
    return $status;
        
        
    }

    //sendingemail
    function sendMail($emails, $surname, $othername, $comments, $officer, $update_time){
        
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("noreply@pgcollegeui.com", "POSTGRADUATE COLLEGE, UI.");
        $email->setSubject("Transcript request status.");
        $email->addTo($emails);
        $email->addContent(
                "text/html", "<body style='font: 13px arial, helvetica, tahoma;'>
                <div class='email-container' style='width: 650px; border: 1px solid #eee;'>
                <div id='header' style='background-color: skyblue; border-bottom: 4px solid #1A865F;
                height: 45px; padding: 10px 15px;'>
                <strong id='logo' style='color: white; font-size: 20px;
                text-shadow: 1px 1px 1px #8F8888; margin-top: 10px; display: inline-block'><img src='' alt='PG LOGO'>
                </strong>
                </div>
                <br>
                <br>
                <br>
                <br>
                
                
                <div id='content' style='padding: 10px 15px;'>
                <h2>Hello Dear <b style='text-transform:uppercase;'>".$surname." ".$othername."</b></h2>
                This is to inform you that your transcript status has been updated! <br>
                <p>Status:</p>    
                <b>".$comments."</b> 
                <p>By <b>".$officer."</b></p> 
                <p>Time <b>".$update_time."</b></p>   
                </div>
                
                <div id='footer' style='padding: 10px; text-align: center; margin-top: 10px;
                border-top: 1px solid #EEE; background: #FAFAFA;'>
                Powered by
                <a href='#' style='text-decoration: none;'>Transcript Portal</a>
                
                </div>
                </div>
                </body>
                </html>"
            );
        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($email);
            echo "Message sent";
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

    
?>