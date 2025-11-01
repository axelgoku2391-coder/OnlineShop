<?php session_start(); ?>
<?php 
$name = $_SESSION['user_name'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panel Administración</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/46652c82d3.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#0D0D0D] text-[#F5F5F5] min-h-screen font-sans">
  <nav class="p-4 border-b border-[#737373] flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0">

    <div class="flex items-center">
      <a href="\student002\shop\backend\index.php" class="flex items-center">
        <img src="\student002\shop\frontend\assets\images\logo.png" alt="Logo" class="w-20 mr-2">
      </a>
    </div>

    <div class="flex flex-wrap gap-3 items-center justify-center">
      <span class="text-[#F5F5F5] font-semibold flex items-center gap-2">
        <i class="fa-regular fa-user" style="color: #ff4d00;"></i>
        <?php echo $name;
        if ($_SESSION) {
          include("logout.php");
        }
        ?>
      </span>

      <a href="/student002/shop/backend/products.php">
        <button class="bg-[#FF4D00] text-[#F5F5F5] py-2 px-4 rounded-xl font-semibold hover:bg-[#00C4CC] hover:text-[#0D0D0D] transition-all duration-200 transform">Productos</button>
      </a>

      <a href="/student002/shop/backend/customers.php">
        <button class="bg-[#FF4D00] text-[#F5F5F5] py-2 px-4 rounded-xl font-semibold hover:bg-[#00C4CC] hover:text-[#0D0D0D] transition-all duration-200">Clientes</button>
      </a>

      <a href="/student002/shop/backend/orders.php">
        <button class="bg-[#FF4D00] text-[#F5F5F5] py-2 px-4 rounded-xl font-semibold hover:bg-[#00C4CC] hover:text-[#0D0D0D] transition-all duration-200">Pedidos</button>
      </a>

      
        <?php if(!$_SESSION) {
          echo 'No ha iniciado sesión';
        } else {
          echo "<div> <a href='/student002/shop/backend/shopping_cart.php'><button type='submit'><i class='fa-solid fa-cart-shopping fa-2xl' style='color: #ff4d00;'></i></button></a></div>";
        }
          ?>
         
      </a>

    </div>
  </nav>