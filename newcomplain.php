<?php
require_once './header.php';

require_once './FunctionHelper.php';
$d = new HelperFunction();
?>

<section id="content_area">
    <div class="clearfix wrapper main_content_area">

        <div class="clearfix main_content floatleft">




            <div class=" clearfix content">

                <div class="contact_us">
                    <div class="content_title"><h2>शिकायत</h2></div>




                    <center>
                        <p> <?php
                            if (isset($_POST['submit'])) {


                                $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
                                $ward_id = htmlspecialchars($_POST['ward_id'],ENT_QUOTES);
                                $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
                                $subject = htmlspecialchars($_POST['subject'],ENT_QUOTES);
                                $message = htmlspecialchars($_POST['message'],ENT_QUOTES);
                                $sql = "INSERT INTO `complain` (`id`, `name`, `ward_id`, `email`, `subject`, `message`, `dor`) VALUES (NULL, '$name', '$ward_id', '$email', '$subject', '$message', CURRENT_TIMESTAMP)";

                                if (mysqli_query($d->con, $sql)or die(mysqli_error($d->con))) {
                                    ?>
                             <p>शिकायत दर्ज हो गई है</p>
                                <h1>
                                    शिकायत न०  : <?= mysqli_insert_id($d->con) ?>
                                </h1>

                                <?php
                                $html = "<table><tr><th>Ward</th><td>$ward_id</td></tr><tr><th>Name</th><td>$name</td></tr><tr><th>Email</th><td>$email</td></tr><tr><th>Subject</th><td>$subject</td></tr><tr><th>Message</th><td>$message</td></tr></table>";
                                $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
                                mail("office@rampurkarkhana.in", $subject, $html,$headers  );
                            }
                        }
                        ?></p>
                        <form method="post">
                            <p><select  style="    display: block;
                                        width: 47%;
                                        height: 36px;
                                        "class="hindi" class="wpcf7-submit" name="ward_id" id="wardid">
                                    <option>अपना वार्ड चुने</option>
                                    <?php
                                    $d->getWardsListHtml();
                                    ?>
                                </select>
                            </p>
                            <p><input type="text" class="wpcf7-text" name="name" placeholder="नाम*"/></p>
                            <p><input type="text" class="wpcf7-email" name="email" placeholder="ई-मेल*"/></p>
                            <p><input type="text" class="wpcf7-text" name="subject" placeholder="शिकायत का विषय*"/></p>
                            <p><textarea class="wpcf7-textarea" name="message" placeholder="शिकायत*"></textarea></p>
                            <p><input type="Submit" class="wpcf7-submit" name="submit" value="शिकायत रजिस्टर करे"/></p>
                        </form>


                    </center>

                </div>

                <div id="familydetail" class="table">

                </div>

            </div>



        </div>


        <?php
        require_once './right_panel.php';
        ?>
    </div>
</section>
<?php
require_once './footer.php';
?>
