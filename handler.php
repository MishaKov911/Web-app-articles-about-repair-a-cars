<?php


// from site
$url = $_POST['From']; // Replace this with the actual URL of the website
// cURL setup
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);

// // Check if cURL request was successful
// if ($response === false) {
//     echo 'Error: ' . curl_error($ch);
//     curl_close($ch);
//     exit;
// }
// curl_close($ch);

// Parse HTML content
$dom = new DOMDocument();
@$dom->loadHTML($response); // Suppress any HTML parsing warnings
// from site




// Initialize an associative array to store SKU and Quantity values
$skuQuantityArray = array();

// Find all rows in the table
$tableRows = $dom->getElementsByTagName('tr');

// Loop through table rows and extract SKU and Quantity values
foreach ($tableRows as $row) {
    $columns = $row->getElementsByTagName('td');

    // Assuming there are two columns in the table (SKU and Quantity)
    if ($columns->length === 2) {
        $sku = $columns->item(0)->textContent;
        $quantity = $columns->item(1)->textContent;
        if ($quantity >=2 && $quantity <=9 ){
            $quantity = 1;
        } elseif($quantity >=10 && $quantity <=50){
            $quantity = 2;
        } elseif($quantity >50){
            $quantity = 5;
        } elseif ($quantity == 1 || $quantity ==0){
            $quantity = 0;
        } else{
            $quantity = "ERROR";
        }

        // Add SKU and Quantity values to the associative array
        $skuQuantityArray[$sku] = $quantity;
    }
}



//--kind of ExelDocument

$jsonData = json_encode($skuQuantityArray);
// Save the JSON data to a file
$file = $_POST['To']; // Replace this with the desired filename
file_put_contents($file, $jsonData);


//--kind of ExelDocument




// Now $skuQuantityArray contains all the SKU and Quantity values as an associative array
// You can use this array as per your requirements (e.g., display, process, etc.).

// Example: Displaying the extracted values from the associative array
// foreach ($skuQuantityArray as $sku => $quantity) {
//     echo "SKU: " . $sku . ", Quantity: " . $quantity . "<br>";
// }

print_r ($skuQuantityArray);







// $xmlData = $_POST['From']; // Replace this with the actual XML data received via POST

// // Load XML content
// // $dom = new DOMDocument();
// // if (!$dom->loadXML($xmlData)) {
// //     echo 'Error: Failed to load XML data';
// //     exit;
// // }

// // Initialize an associative array to store SKU and Quantity values
// $skuQuantityArray = array();

// // Find all elements in the XML with the tag name 'item' (Assuming 'item' contains SKU and Quantity data)
// $items = $dom->getElementsByTagName('price');

// // Loop through 'item' elements and extract SKU and Quantity values
// foreach ($items as $item) {
//     $sku = $item->getElementsByTagName('sku')->item(0)->nodeValue;
//     $quantity = $item->getElementsByTagName('quantity')->item(0)->nodeValue;

//     // Assuming the quantity value is numeric
//     if ($quantity >= 2 && $quantity <= 9) {
//         $quantity = 1;
//     } elseif ($quantity >= 10 && $quantity <= 50) {
//         $quantity = 2;
//     } elseif ($quantity > 50) {
//         $quantity = 5;
//     } elseif ($quantity == 1 || $quantity == 0) {
//         $quantity = 0;
//     } else {
//         $quantity = "ERROR";
//     }

//     // Add SKU and Quantity values to the associative array
//     $skuQuantityArray[$sku] = $quantity;
// }

// //--kind of ExcelDocument

// $jsonData = json_encode($skuQuantityArray);
// // Save the JSON data to a file
// $file = $_POST['To']; // Replace this with the desired filename
// file_put_contents($file, $jsonData);

// //--kind of ExcelDocument

// // Now $skuQuantityArray contains all the SKU and Quantity values as an associative array
// // You can use this array as per your requirements (e.g., display, process, etc.).

// // Example: Displaying the extracted values from the associative array
// // foreach ($skuQuantityArray as $sku => $quantity) {
// //     echo "SKU: " . $sku . ", Quantity: " . $quantity . "<br>";
// // }

// print_r($skuQuantityArray);
