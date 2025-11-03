<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
<link rel="stylesheet" href="<?= base_url('src/tailwindstyles.css') ?>">
    
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

    <h1 class="text-[50px]">This is the Orders Page</h1>


    <main class="grid grid-flow-col gap-5 h-full w-[full]">
        <div class=" bg-amber-400 w-[550px]">
            <h1 class="flex justify-center">Orders</h1>
            <div class="flex flex-wrap justify-center">
                <div class="grid grid-flow-row bg-neutral-50 m-5">
                    Coffee order 1
                    <input type="number">
                </div>
                <div class="grid grid-flow-row bg-neutral-50 m-5">
                    Coffee order 2
                    <input type="number">
                </div>
                <div class="grid grid-flow-row bg-neutral-50 m-5">
                    Coffee order 3
                    <input type="number">
                </div>
                <div class="grid grid-flow-row bg-neutral-50 m-5">
                    Coffee order 4
                    <input type="number">
                </div>
            </div>
        </div>


        <div class="bg-amber-700">
            <div>Order Details</div>
                <div class="w-[450px] ">
                    <div class="input-container grid grid-flow-row">
                        <input type="text" required>
                            <label>Enter your Name</label>
                    </div>
                    Ordering on:
                    <div class="input-container grid grid-flow-row">
                        <input type="date" required>
                    </div>
                    <div class="input-container grid grid-flow-row">
                        <input type="time" required>
                    </div>
                    <div class="input-container grid grid-flow-row">
                        <input type="tel" required>
                            <label>Phone Number</label>
                    </div>
                    <div class="input-container grid grid-flow-row">
                        <input type="email" required>
                            <label>Email Address</label>
                    </div>
                    <div class="input-container grid grid-flow-row">
                        <textarea type="textarea" required></textarea>
                            <label>Additional Requests or Description</label>
                    </div>
                </div>
        </div>

        <div class=" bg-amber-400">
            <h1 class="">Confirmations</h1>
                <input type="checkbox" class="m-2"/><span>I hereby confirm that all of my details are correct and final.</span>
                <input type="checkbox" class="m-2"/><span>I have entered the right email address to confirm my order and be notified about my stamps.</span>    
                <input type="checkbox" class="m-2"/><span>I am paying a total of {{$totalOrderPrice}} to the cashier.</span>
                                
            <button class="mt-5 p-2 rounded-lg bg-neutral-50 text-neutral-900 hover:bg-green-500 hover:scale-[1.07] hover:text-neutral-50 transition duration-300">Confirm</button>
                            
        </div>
    </main>
</body>
</html>