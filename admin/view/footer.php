<div>
    <?php if($action != "list_vehicles") { ?>
        <p><a href="?action=list_vehicles">View Full Vehicle List</a></p>
    <?php } else if($filters != []) { ?>
        <p><a href="?action=list_vehicles">View Full Vehicle List</a></p>
    <?php } ?>

    <?php if($action != "show_add_form") { ?>
        <p><a href="?action=show_add_form">Click Here</a>
        <a>to add a vehicle.</a></p>
    <?php } ?>

    <?php if($action != "list_makes") { ?>
        <p><a href="?action=list_makes">View/Edit Vehicle Makes</a></p>
    <?php } ?>

    <?php if($action != "list_types") { ?>
        <p><a href="?action=list_types">View/Edit Vehicle Types</a></p>
    <?php } ?>

    <?php if($action != "list_classes") { ?>
        <p><a href="?action=list_classes">View/Edit Vehicle Classes</a></p>    
    <?php } ?>

</div>
<footer>
    <p class="copyright">&copy; <?php echo date("Y"); ?> Zippy Used Autos</p>
    </p>
</footer>
</body>
</html>