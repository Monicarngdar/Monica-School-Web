<?php include '../includes/header.php'; ?>

<?php
if ($_SESSION['role'] === 'student') {
    header("Location: student/dashboard.php");
} elseif ($_SESSION['role'] === 'lecturer') {
    header("Location: lecturer/dashboard.php");
} elseif ($_SESSION['role'] === 'admin') {
    header("Location: admin/dashboard.php");
}
exit;