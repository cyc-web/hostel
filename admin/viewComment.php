<?php include "includes/head.php"?> 

                    

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include "includes/navbar.php"?>
        <?php include "includes/sidebar.php"?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                <a href="conversation.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="background-color:white; padding: 20px;">
                <?php 
                   include "../conn.php";
                    $id = base64_decode($_GET["edit"]);
      

                        $sql="SELECT * FROM trans_docs WHERE id='$id'";
                        if ($result=$conn->query($sql)) {
                        # code...
                        while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                            
                        $section = $row['section'];
                        $appno = $row['appno'];
                        $sender = $row['name'];
                    if ($section == 1 || $section == 13) {
                       $section = 'Admin';
                    }elseif ($section == 2) {
                        # code...
                        $section = 'Information Office';
                    
                    }elseif ($section == 9) {
                        # code...
                        $section = 'Filing Office';
                    
                    }elseif ($section == 10) {
                        # code...
                        $section = 'Result Office';
                    
                    }elseif ($section == 11) {
                        # code...
                        $section = 'Process Office';
                    
                    }
                       
                ?>
                <?php 
                if (isset($_POST["process"])) 
                {
                     $sql="SELECT * FROM trans_docs WHERE id='".$_POST["id"]."' AND status='comment'";
                        $result=$conn->query($sql);
                        $row=$result->fetch_array(MYSQLI_ASSOC);
                        if ($row)
                        {
                            $update_time = $row['update_time'];
                            $id=$_POST['id'];
                            $comments=$_POST['comments'];
                            $matric=$_POST['matric'];
                            $section=$_POST['section'];
                            
                            
                            $sql="UPDATE trans_docs SET id='$id', comments='$comments', status='approved' WHERE id='$id' AND status='comment'";
                        
                            $conn->query($sql);
                            
                            
                            $sql1 = "SELECT * FROM trans_details_new WHERE matric=".$_POST['matric'].";";
                            $result = $conn->query($sql1);
                            $row1 = $result->fetch_array(MYSQLI_ASSOC);
                            $surname = $row1['Surname'];
                            $othername = $row1['Othernames'];
                            $email = $row1['email'];
                        
                            $subject = "Notification (Transcript Portal)";
                            $emails=mysqli_real_escape_string($conn, $email);
                            $user=mysqli_real_escape_string($conn, $surname);
                            $user2=mysqli_real_escape_string($conn, $othername);
                            $email = htmlspecialchars($emails);
                            $message = "<html>
                            <head>
                            <title>Transcript Request Status</title>
                            </head>
                            <body style='font: 13px arial, helvetica, tahoma;'>
                            <div class='email-container' style='width: 650px; border: 1px solid #eee;'>
                                    <div id='header' style='background-color: #3DD481; border-bottom: 4px solid #1A865F;
                                    height: 45px; padding: 10px 15px;'>
                                        <strong id='logo' style='color: white; font-size: 20px;
                                        text-shadow: 1px 1px 1px #8F8888; margin-top: 10px; display: inline-block'><img src='' alt='Transcript Portal'>
                                                </strong>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    
                            
                                    <div id='content' style='padding: 10px 15px;'>
                                    <h2>Hello Dear <b style='text-transform:uppercase;'>".$user." ".$user2."</b></h2>
                                        This is to inform you that your Transcript Status Has Been Updated! <br>
                                        <p>Status:</p>    
                                    <b>".$comments."</b> currently at <b>".$section."</b> as at<b>".$update_time."</b>   
                                    </div>
                                    
                                    <div id='footer' style='padding: 10px; text-align: center; margin-top: 10px;
                                    border-top: 1px solid #EEE; background: #FAFAFA;'>
                                        Powered by
                                        <a href='#' style='text-decoration: none;'>Transcript Portal</a>
                                        
                                    </div>
                                    </div>
                            </body>
                            </html>
                            ";
                            
                                    $headers = "MIME-Version: 1.0" . "\r\n";
                                    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                                    $headers .= 'From: Transcript Portal | Online Transcript Portal <no-reply@transcriptportal.ng>'."\r\n";
                                    $to = $emails;
                        }
                                    echo "<script>alert('Notification successfully sent!');</script>";
                                    echo "<script>window.open('conversation.php', '_self');</script>";
                }
                
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Sender</label>
                        <input type="text" name="name" class="form-control" readonly="" value="<?php echo $sender?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" readonly="" value="<?php echo $id?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Section</label>
                        <input type="text" name="section" class="form-control" readonly="" value="<?php echo $section?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Matric Number</label>
                        <input type="text" name="matric" class="form-control" readonly="" value="<?php echo $appno?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Message</label>
                        <textarea name="comments" id="compose-textarea"><?php echo $row['comments']?></textarea>
                    </div>
                    <div>
                    <input type="submit" value="Update" name="process" class="btn btn-success float-right">
                    </div>
                </form>
                     <form id="delete-form-<?php echo $row['id']?>" action="delete_comment.php?id=<?php echo base64_encode($row['id'])?>" method="post" style="display: none;">
                      
                      </form>
                       <a href="" onclick="
                       if(confirm('Are you sure you want to delete this comment ?'))
                       {
                         event.preventDefault();document.getElementById('delete-form-<?php echo $row['id']?>').submit();
                        }else
                        {
                          event.preventDefault();
                        }" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                  <?php }}?>  
                    </div>
                </div>
            </section>
          <br><br><br><br><br><br>
          </div>
           
        </div>

<?php include 'includes/footer.php'?>
