<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/small.css">
    <link rel="stylesheet" href="css/medium.css">
    <link rel="stylesheet" href="css/large.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iceland&family=Rationale&display=swap" rel="stylesheet">
    <title>Add Classification</title>
</head>

<body>
    <div id=inside>
        <header>
            
            <div class="top">
                <img src="images/site/logo.png" alt="logo Phpmotors">
                <ul class = "account"><li><a href=#>My Account</a></li></ul>
            </div>

            <nav class='it'>
            
          
                    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippet/navigation.php'; ?>
                
                
            </nav>
        </header>


        <main>
        <h1>Register</h1>

<?php 
if (isset($message)) {
    echo $message;
    }
    ?>

<form action='/phpmotors/vehicles/index.php' class ="vehicle" method="post">
    <label for="className"> Car Classification:</label><br>
    <input type="text" id="classname" name="classificationName" ><br>
    
    <input type="submit" value="Submit" class="submit">
    <input type="hidden" name="action" value="return">
  </form>
        </main>
        
        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippet/footer.php'; ?>
        </footer>
    </div>
</body>

</html>