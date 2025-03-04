<?php
error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'RobertMa-Shakopee-PRD-169ec6b8e-bb30ba02';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = 'sneakers';  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0
// Create a PHP array of the item filters you want to use in your request
$filterarray =
  array(
    array(
    'name' => 'MaxPrice',
    'value' => '25',
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
    array(
    'name' => '',
    'value' => 'true',
    'paramName' => '',
    'paramValue' => ''),
    array(
    'name' => 'ListingType',
    'value' => array('AuctionWithBIN','FixedPrice'),
    'paramName' => '',
    'paramValue' => ''),
  );

// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  // Iterate through each filter in the array
  foreach($filterarray as $itemfilter) {
    // Iterate through each key in the filter
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { // Index the key for each value
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);


// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=50";
$apicall .= "$urlfilter";
// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
    $i     =  0
  $results = '';
  
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
/////////////////////////EDIT THIS LINE/////////////////////////////////////////////////////
    // For each SearchResultItem node, build a link and append it to $results
    if ($1 % 3 === 1){
        $results .= "div class='row'><div class='col-sm-4><img sc=\"$pic\"><a href=\"$link\">$title</a>"
    }
    if ($1 % 3 === 2){
        $results .= "div class='row'><div class='col-sm-4><img sc=\"$pic\"><a href=\"$link\">$title</a>"
    }
    if ($1 % 3 === 3){
        $results .= "div class='row'><div class='col-sm-4><img sc=\"$pic\"><a href=\"$link\">$title</a>"
    }
    $results .= "$location""<img src\"pic\"><a href=\"$link\">$title</a>";
////////////////////////EDIT THIS LINE//////////////////////////////////////////////////////      
  }
  $results  = "div class='r";
  $results .= "AppID for the Production environment.</h3>";
}
?>
<!-- Build the HTML page with values from the call response -->
<html>

<head>
<div class="menu">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="http://shakonet.isd720.com" class="navbar-brand">Sneaker Mania</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="main.html"
                        class="nav-item nav-link active">Home</a>
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="AboutUs.html"
                        class="nav-item nav-link">About Us</a>
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="list.html"
                        class="nav-item nav-link">Lists</a>
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="accessories.html"
                        class="nav-item nav-link">Accessories</a>
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="http://localhost:8080/WebDev2/Version8.0/user10/weather/ebayapi.php"
                        class="nav-item nav-link">Shop Here</a>
                     <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="http://localhost:8080/WebDev2/Version9.0/user10/register.php"
                        class="nav-item nav-link">Make An Account!</a>
                    <a href="mailto:sample@gmail.com?Subject=Hello" class="nav-item nav-link disabled"
                        tabindex="-1"></a>
                    </a>
                </div>
    <title>eBay Search Results for <?php echo $query; ?></title>
  
    <!-- CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="style.css">

    <!-- JavaScript -->
    <!-- These are needed to get the responsive menu to work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            font-family: arial, sans-serif;
        }

    </style>
</head>

<body>

    <h1>eBay Search Results for <?php echo $query; ?></h1>

    <table>
        <tr>
            <td>
                <?php echo $results;?>
            </td>
        </tr>
    </table>

</body>

</html>
