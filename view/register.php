<?php include('header.php'); ?>

<?php if(!$firstname) { ?>
    <form action="." method="get" class="register_name">
    <input type="hidden" name="action" value="register">
        <br>
        <div>
            <label for="firstname">Please enter your firstname:</label>
            <input type="text" name="firstname" id="firstname" maxlength="30" required>
        </div>
        <br>
        <div class="form_group my-2 row">
            <button class="button" type="submit" value="Submit">Register</button>
        </div>
    </form>
<?php } else { ?>
    <h2><?php echo  "Thank you for registering, {$firstname}!" ?></h2>
    <p><a href="?action=list_vehicles">Click here</a> to view our vehicle list.</p>
<?php } ?>

<?php include('footer.php'); ?>