<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stamps</title>
    <link href="../../../../Coffee_Shop-01/public/src/tailwindstyles.css" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <div class="logo">MyLogo</div>
        <div class="nav-links">
            <a href="<?= site_url('home') ?>">Home</a>
                <a href="<?= site_url('categories') ?>">Categories</a>
                <a href="<?= site_url('orders') ?>">Orders</a>
                <a href="<?= site_url('profile') ?>">Profile</a>
                <a href="<?= site_url('stamps') ?>">Stamps</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
        </div>
    </div>

    <h1 class="">This is the Stamps Page</h1>

    <div id="stamps" class="grid grid-cols-4 gap-4 mb-4">
                
        <div class="" value="stamped">Stamp 1</div>
        <div class="" value="stamped">Stamp 2</div>
        <div class="" value="stamped">Stamp 3</div>
        <div class="" value="default">Stamp 4</div>
        <div class="" value="default">Stamp 5</div>
        <div class="" value="default">Stamp 6</div>
        <div class="" value="stamped">Stamp 7</div>
        <div class="" value="stamped">Stamp 8</div>
        <div class="" value="stamped">Stamp 9</div>
        <div class="" value="default">Stamp 10</div>
        
    </div> 

</body>


</html>