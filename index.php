<?php

require_once 'vendor/autoload.php';

use App\Chat;
use App\ChatData;

$system = new Chat();

if (isset($_POST['submit'])) {
    $message = new ChatData($_POST['nickname'], $_POST['message']);
    if ($system->validateInput($message)) {
        if (isset($_POST['submit'])) header("Location: /", );
        $system->addMessage($message);
    }
}

?>





<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>



    <form class="input" method="post">
        <input type="text" placeholder="Nickname" name="nickname">
        <input type="text" placeholder="Your Message" name="message">
        <button type="submit" name="submit">Submit</button>

        <div class="chatBox">
            <?php foreach ($system->messageHistory() as $message) { ?>
                <div class="chatText"><?= $message->nickname() . " - " . $message->message();} ?> </div>
        </div>


    </form>

</body>
</html>