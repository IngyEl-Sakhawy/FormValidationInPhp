<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($_POST as $x => $y) {
        
            if (empty($y)) {
                echo "$x is empty";
                echo "<br>";
                $Flag=1;
            } elseif ($x=="name" && strlen($y) > MAX_LENGTH_NAME ){
                echo "**Name is not valid";
                echo "<br>";
                $Flag=1;
            }elseif ($x=="email" && ! filter_var($y, FILTER_VALIDATE_EMAIL) ){
                echo "**Email is not valid";
                echo "<br>";
                $Flag=1;
            }elseif ($x=="message" && strlen($y) > MAX_LENGTH_MESSAGE ){
                echo "**Message is not valid";
                echo "<br>";
                $Flag=1;
            }    
}
if($Flag == 0)
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        echo THANK_YOU_MESSAGE;
        echo "<br>";
        echo "Name: $name";
        echo "<br>";
        echo "Email: $email";
        echo "<br>";
        echo "Message: $message";
        echo "<br>";

    }

}

// $Flag=0;
// $maxLettersForName=100;
// $maxLengthForMessage=255;
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     foreach ($_POST as $x => $y) {
        
//             if (empty($y)) {
//                 echo "$x is empty";
//                 echo "<br>";
//                 $Flag=1;
//             } elseif ($x=="name" && strlen($y)>$maxLettersForName ){
//                 echo "Name is not valid";
//                 echo "<br>";
//                 $Flag=1;
//             }elseif ($x=="email" && ! filter_var($y, FILTER_VALIDATE_EMAIL) ){
//                 echo "Email is not valid";
//                 echo "<br>";
//                 $Flag=1;
//             }elseif ($x=="message" && strlen($y)>$maxLengthForMessage ){
//                 echo "Message is not valid";
//                 echo "<br>";
//                 $Flag=1;
//             }    
// }
// if($Flag == 0)
//     {
//         $name = $_POST["name"];
//         $email = $_POST["email"];
//         $message = $_POST["message"];
//         echo "<h3>Thank you for contacting Us</h3>";
//         echo "<br>";
//         echo "Name: $name";
//         echo "<br>";
//         echo "Email: $email";
//         echo "<br>";
//         echo "Message: $message";

//     }

// }


?>


<html>
    <head>
        <title> contact form </title>


    </head>

    <body>
        <h3> Contact Form </h3>
        <div id="after_submit">
            
        </div>
        <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">


            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';?>" type="text" value="" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';?>" type="text" value="" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message"  rows="7" cols="30"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';?></textarea><br />

            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="clear form" />

        </form>
    </body>

</html>