<?php
//This is the vehicle controller. All web trafficks are directed here


// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model from the model folder
require_once '../model/vehicles-model.php';

$classifications = getClassifications();
//var_dump($classifications);
//	exit;
// Build a navigation bar using the $classifications array
$navList = '<ul class="test">';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';
#for the code above, we have a key called 'action' and the value is the 'classificationName' inside the 'classification' variable
#the function '.urlencode'was just added to take care of any spaces and characters in the process


#THIS SECTION IS MADE TO CREATE THE DYNAMIC CARCLASSIFICATION DROP DOWN LIST
$classificationlist = "<select navListid='models' name='classificationId'> ";#creates the select option
#create first option
$classificationlist .= "<option value='choose' selected disabled> Choose from car classification</option>";
#iterate through list to add carclassification options using the ID as the value 
foreach ($classifications as $classification) {
  $classificationlist .= "<option value='$classification[classificationId]'> $classification[classificationName]</option>";
}

$classificationlist .= '</select>';


$action = filter_input(INPUT_POST, 'action'); #(ACTION)This is the variable used to store the type of content being requested

#We check the post object (from forms) and get (from links) for name value pair where key is the word "action"
#if found the value is stored in the action variable
if ($action == NULL){ #filter is used to sift the content to eliminate code that could do the website harm
$action = filter_input(INPUT_GET, 'action');
}
switch ($action){ #Examines the action variable to see what the value is 
    case 'vehicles':#represents different process to execute
    include '../view/add-vehicles.php';
    break;
#if action has a value and our case statement matches, then it would run and the others will be ignored

    case 'classification':
    include '../view/add-classification.php';
    break;
    
    case 'return':# if the classification name is empty 
    $classificationName = filter_input(INPUT_POST, 'classificationName');
    if(empty($classificationName)){
      $message = '<p>Please provide information for the empty form fields.</p>';
      include '../view/add-classification.php';
      exit; 
    }

    //Send data to the model
    $vehOutcome = insertClassification($classificationName);

  // Check and report the result
  
    if($vehOutcome === 1){
      header('Location:index.php');
      exit;
    } else {
      $message = "<p>Error Occured. Failed to add new classification. Please try again</p>";
      include '../view/add-classification.php';
      exit;
    }
    
 


      if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invPrice) || empty($invThumbnail) || empty($invStock) || empty($invColor)){
        $message = '<p>Please provide information for the empty form fields.</p>';
        include '../view/add-vehicle.php';
        exit; 
      }
  
      //Send data to the model
      $vehOutcome2 = insertVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

      
  
    // Check and report the result
  
      if($vehOutcome2 === 1){
        $message = "<p>Vehicle added succesfully</p>";
        include '../view/add-vehicle.php';
        
        exit;
      } else {
        $message = "<p>Error Occured. Failed to add new vehicle. Please try again</p>";
        include '../view/add-vehicle.php';
        exit;
      }





    default:
    include '../view/vehicle-management.php';
}