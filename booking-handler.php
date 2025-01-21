<?php
<?php
// Database credentials
$host = '	fdb1030.awardspace.net'; 
$dbname = '4578499_easytripdeals'; 
$username = '4578499_easytripdeals'; 
$password = 'hafjinayy23#'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>



// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $destination = $_POST['destination'] ?? '';
    $hotel = $_POST['hotel'] ?? '';
    $flight = $_POST['flight'] ?? '';
    $flight_time = $_POST['flight-time'] ?? '';
    $travel_date = $_POST['date'] ?? '';

    // Check for required fields
    if (!$name || !$email || !$destination || !$hotel || !$flight || !$flight_time || !$travel_date) {
        echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>";
        exit;
    }

    // Insert into database
    $stmt = $connection->prepare("INSERT INTO book_form (name, email, location, hotel, flight, flight_time, travel_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $destination, $hotel, $flight, $flight_time, $travel_date);

    if ($stmt->execute()) {
        echo "<script>alert('Booking successful!'); window.location.href='payment.html';</script>";
    } else {
        echo "<script>alert('Error: Could not submit booking.'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "No data submitted.";
}

$connection->close();
?>

