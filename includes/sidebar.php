<?php
$isLoggedIn = false; // Ganti dengan logika atau kondisi pengguna sudah login atau belum

if ($isLoggedIn) {
    // Jika pengguna sudah login, tampilkan menu profil
    echo '
        <div class="profile_nav">
            <ul>
                <li><a href="profile.php">Profile Settings</a></li>
                <li><a href="update-password.php">Update Password</a></li>
                <li><a href="my-booking.php">My Booking</a></li>
                <li><a href="post-testimonial.php">Post a Testimonial</a></li>
                <li><a href="my-testimonials.php">My Testimonials</a></li>
                <li><a href="logout.php">Sign Out</a></li>
            </ul>
        </div>
    ';
} else {
    // Jika pengguna belum login, tampilkan tombol Login dan Register
    echo '
        <div class="profile_nav">
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </div>
    ';
}
?>
