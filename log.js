function showLogoutConfirmation() {
    if (confirm("Apa Anda yakin untuk logout?")) {
        window.location.href = "logout.php";
    }
}
