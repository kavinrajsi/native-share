<?php
// Retrieve the data URL from the POST data
if (isset($_POST['imageData'])) {
    $data = $_POST['imageData'];

    // Extract the image data from the data URL
    $encodedData = substr($data, strpos($data, ',') + 1);
    $decodedData = base64_decode($encodedData);

    // Define the file path where you want to save the image
    $filePath = 'images/'; // Directory where images are stored
    $fileName = uniqid() . '.png'; // Generate a unique file name (you can adjust the file extension as needed)
    $file = $filePath . $fileName;

    // Save the decoded image data to a file
    if (file_put_contents($file, $decodedData)) {
        echo json_encode(['success' => true, 'file' => $file]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to save image']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No image data received']);
}
?>
