<?php 

    $length = 8; // Default value
    $includeNumbers = false;
    $includeSpecialCharacters = false;
    $includeUpperCase = false;
    $includeLowerCase = false;

    $password = " ";
    $count = 0;
    $message = "";

    if(isset($_POST["submit"])){
        $length = $_POST["passLength"];

        $includeNumbers = isset($_POST["numbers"]);
        $includeSpecialCharacters = isset($_POST["specialCharacters"]);
        $includeUpperCase = isset($_POST["upperCase"]);
        $includeLowerCase = isset($_POST["lowerCase"]);

        $numbers = "123456789";
        $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lowerCase = "abcdefghijklmnopqrstuvwxyz";
        $symbol = "!@#$%^&*()-_=+[]{}|;:'\",.<>?/`~\\";

        $characters = "";

        if($includeNumbers){
            $characters = $characters.$numbers;
            $characters = $characters.$numbers;
            $count++;
        }
        if($includeSpecialCharacters){
            $characters = $characters.$symbol;
            $count++;
        }
        if($includeUpperCase){
            $characters = $characters.$upperCase;
            $count++;
        }
        if($includeLowerCase){
            $characters = $characters.$lowerCase;
            $count++;
        }

        $shuffled = str_shuffle($characters);

        $password = substr($shuffled,0,$length);

        if($count == 4){
            $message = "Password is strong.";
        }
        if($count == 3){
            $message = "Password is medium.";
        }
        if($count < 3){
            $message = "Password is wick.";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="bootstrap_css/bootstrap.css">

     <!-- custom css -->
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- In this Section we design password generate form -->

    <div class="container mt-5 d-flex justify-content-center align-items-center flex-column">

            <h1 class="header">Customize your password</h1>

            <div class="password_generate rounded-4 p-3">
                <!-- Password Length -->
                <form action="" method="post">
                <label for="customRange2" class="form-label fw-semibold">Password Length (8-20 char):</label>
                <input type="range" class="form-range" min="8" max="20" step="1" id="passLength" name="passLength">
                
                <!-- Have Numbers -->
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="numbers" name="numbers">
                    <label class="form-check-label fw-semibold" for="flexCheckIndeterminate">
                        Numbers.
                    </label>
                </div>

                <!-- Have Special Characters -->
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="specialCharacters" name="specialCharacters">
                    <label class="form-check-label fw-semibold" for="flexCheckIndeterminate">
                        Special Characters.
                    </label>
                </div>

                <!-- Have Upper case -->
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="upperCase" name="upperCase">
                    <label class="form-check-label fw-semibold" for="flexCheckIndeterminate">
                        Uppercase Letter.
                    </label>
                </div>

                <!-- Have Lower Case -->
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="lowerCase" name="lowerCase">
                    <label class="form-check-label fw-semibold" for="flexCheckIndeterminate">
                        Lowercase Letter.
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-warning text-white mt-2" id="submit" name="submit">Generate</button>
                </form>
            </div>
            
            <div id="copyText" class="password rounded-4 mt-2 p-2 text-center text-white fw-bold">
                <?php printf(htmlspecialchars($password)); ?>
            </div>
            <div id="message" class="message rounded-4 mt-2 p-2 text-center text-white fw-bold">
                <?php printf($message); ?>
            </div>
    </div>

<!-- Bootstrap JS -->
 <script src="bootstrap_js/bootstrap.bundle.js"></script>

 <script>
    document.getElementById('copyText').addEventListener('mouseenter', function() {
        const textToCopy = document.getElementById('copyText').textContent;
        navigator.clipboard.writeText(textToCopy).then(function() {
            console.log('Text copied to clipboard');
        }).catch(function(error) {
            console.error('Failed to copy text: ', error);
        });
    });
</script>

</body>
</html>