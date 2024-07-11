<?php
include 'includes/db.php';
include 'includes/functions.php';
include 'includes/header.php';


$sql = "SELECT p.id, p.serial_number, p.manufacturer, p.type, p.submission_date, p.status, p.last_status_change
        FROM products p
        WHERE p.status != 'Kész' OR (p.status = 'Kész' AND DATE(p.last_status_change) = CURDATE())
        ORDER BY FIELD(p.status, 'Beérkezett', 'Hibafeltárás', 'Alkatrész beszerzés alatt', 'Javítás', 'Kész')";
$result = $conn->query($sql);

?>
<h2>Szerviz összesítő</h2>
<table>
    <thead>
        <tr>
            <th>Szériaszám</th>
            <th>Gyártó</th>
            <th>Típus</th>
            <th>Leadás dátuma</th>
            <th>Státusz</th>
            <th>Utolsó státuszváltozás</th>
            <th>Kapcsolattartó neve</th>
            <th>Telefon</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <?php $color = getStatusColor($row['status']); ?>
            <tr style="background-color: <?= $color; ?>;">
                <td><?= $row['serial_number']; ?></td>
                <td><?= $row['manufacturer']; ?></td>
                <td><?= $row['type']; ?></td>
                <td><?= $row['received_date']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?= $row['last_status_change']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['email']; ?></td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
include 'includes/footer.php';
?>
