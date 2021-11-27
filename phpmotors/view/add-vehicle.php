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
    <title>Add Vehicle</title>
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
            <?php
            if (isset($message)) {
             echo $message;
            }
            ?>
            
            <form method="post" action="/phpmotors/vehicles/index.php">
            
              <label for="invMake"> Make:</label><br>
              <input type="text" id="invMake" name="invMake" ><br>
              <label for="invModel">Model:</label><br>
              <input type="text" id="invModel" name="invModel" ><br>
              <label for="invDescription"> Description:</label><br>
              <input type="text" id="invDescription" name="invDescription" ><br>
              <label for="invImage"> Image Path:</label><br>
              <input type="text" id="invImage" name="invImage" value="/phpmotors/images/no-image.png" ><br>
              <label for="invThumbnail">Thumbnail Path:</label><br>
              <input type="text" id="invThumbnail" name="invThumbnail" value="/phpmotors/images/no-image-tn.png" ><br>
              <label for="invPrice"> Price:</label><br>
              <input type="text" id="invPrice" name="invPrice" ><br>
              <label for="invStock"># In Stock:</label><br>
              <input type="text" id="invStock" name="invStock" ><br>
              <label for="invColor">Color:</label><br>
              <input type="text" id="invColor" name="invColor"  ><br>
              <input type="submit" value="Add Vehicle" class="sbmit">
              <input type="hidden" name="action" value="vehicleprocess">
            </form> 
        </main>
        
        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippet/footer.php'; ?>
        </footer>
    </div>
</body>

</html>