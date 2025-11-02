<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage Skeleton</title>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">MyLogo</div>
    <div class="nav-links">
       <a href="<?= site_url('home') ?>">Home</a>
        <a href="<?= site_url('categories') ?>">Categories</a>
         <a href="<?= site_url('orders') ?>">Orders</a>
           <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('stamps') ?>">Stamps</a>
      <a href="<?= site_url('login') ?>">LogIn</a>
    </div>
  </div>

  <!-- Body -->
  <div class="body">
    <h1>BEST SELLERS</h1>
    <p>This is the main content area.</p>
    <div class="flex flex-wragap-4 items-center" id = "Products">
      <div id = "Product_1" class=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgqpEjWZM4UwJMAWrJkeSuyhnrWYfHvMdIKQ&s" alt="coffee"></div>
      <div id = "Product_2" class=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgqpEjWZM4UwJMAWrJkeSuyhnrWYfHvMdIKQ&s" alt="coffee"></div>
      <div id = "Product_3" class=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgqpEjWZM4UwJMAWrJkeSuyhnrWYfHvMdIKQ&s" alt="coffee"></div>
      <div id = "Product_4" class=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgqpEjWZM4UwJMAWrJkeSuyhnrWYfHvMdIKQ&s" alt="coffee"></div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2025 My Website. All rights reserved.</p>
  </div>
</body>
</html>

</body>
</html>