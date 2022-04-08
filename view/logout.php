<?php include('header.php'); ?>

<h2><?php echo "Thank you for signing out, {$firstname}." ?></h2>
<p><a href="?action=list_vehicles">Click here</a> to view our vehicle list.</p>

<?php unset($firstname); ?>
<?php include('footer.php'); ?>
