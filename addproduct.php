<?php
include 'includes/db.php';
include 'includes/functions.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serial_number = $_POST['serial_number'];
    $manufacturer = $_POST['manufacturer'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO products (serial_number, manufacturer, type, received_date, status, last_status_change) VALUES (?, ?, ?, ?, ?, ?)");
    $received_date = date('Y-m-d');
    $status = 'Beérkezett';
    $last_status_change = date('Y-m-d');
    $stmt->bind_param("ssssss", $serial_number, $manufacturer, $type, $received_date, $status, $last_status_change);
    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();

    $stmt = $conn->prepare("INSERT INTO contacts (product_id, name, phone, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $product_id, $name, $phone, $email);
    $stmt->execute();
    $stmt->close();

    echo "<p>Termék sikeresen hozzáadva!</p>";
}
?>
<h2>Új termék leadása</h2>
<form method="post">
    <label for="serial_number">Szériaszám:</label>
    <input type="text" id="serial_number" name="serial_number" required>
    <label for="manufacturer">Gyártó:</label>
    <input type="text" id="manufacturer" name="manufacturer" required>
    <label for="type">Típus:</label>
    <input type="text" id="type" name="type" required>
    <label for="name">Kapcsolattartó neve:</label>
    <input type="text" id="name" name="name" required>
    <label for="phone">Telefon:</label>
    <input type="tel" id="phone" name="phone" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Leadás</button>
</form>
<?php
include 'includes/footer.php';
?>
<link rel="stylesheet" type="text/css" href="css/styles.css">