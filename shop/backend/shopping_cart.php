<?php
require('header.php');
include('./db/db_shop_cart.php');

// Sumar producto del carrito
if (isset($_POST['product_id'])) {
    $idProducto = (int) $_POST['product_id'];
    agregarOActualizarProducto($idProducto);
}

// Eliminar producto del carrito
if (isset($_POST['delete_cart_id'])) {
    $idCarrito = (int) $_POST['delete_cart_id'];
    eliminarProducto($idCarrito);
}

// Consulta para obtener productos
$sql = "
SELECT c.cart_id, c.quantity, p.product_id, p.product_name, p.product_price, p.product_image
FROM 002shopping_cart c
JOIN 002products p ON c.product_id = p.product_id
";
$result = mysqli_query($conn, $sql);
$productos = mysqli_fetch_all($result, MYSQLI_ASSOC);

$total = 0;
foreach ($productos as $p) {
    $total += $p['product_price'] * $p['quantity'];
}
?>

<main class="min-h-screen bg-[#0E0E0E] text-white py-12 flex justify-center">
  <div class="w-full max-w-6xl flex flex-col lg:flex-row gap-8 px-4">

    <!-- Productos -->
    <div class="flex-1 bg-[#1A1A1A] p-6 rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-[#FF4D00] mb-6">Tu carrito</h2>

      <?php if ($productos): ?>
        <ul class="divide-y divide-gray-700">
          <?php foreach ($productos as $p): ?>
            <li class="flex items-center justify-between py-4">
              <div class="flex items-center gap-4">
                <img src="<?= ($p['product_image']) ?>" alt="<?= ($p['product_name']) ?>" class="w-20 h-20 object-cover rounded-lg border border-[#FF4D00]">
                <div>
                  <p class="font-semibold"><?= ($p['product_name']) ?></p>
                  <p class="text-gray-400 text-sm"><?= number_format($p['product_price'], 2) ?> € x <?= $p['quantity'] ?></p>
                </div>
              </div>

              <div class="flex items-center gap-3">
                <form method="POST">
                  <input type="hidden" name="product_id" value="<?= $p['product_id'] ?>">
                  <button class="px-3 py-1 text-[#ff4d00]"><i class="fa-solid fa-plus"></i></button>
                </form>
                <form method="POST">
                  <input type="hidden" name="delete_cart_id" value="<?= $p['cart_id'] ?>">
                   <button type="submit"><i class="fa-solid fa-trash" style="color: #ff4d00;"></i></button>
                </form>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-gray-400 text-center">Tu carrito está vacío</p>
      <?php endif; ?>
    </div>

    <!-- Total -->
    <div class="w-full lg:w-80 bg-[#1A1A1A] p-6 rounded-xl shadow-lg h-fit">
      <h2 class="text-2xl font-bold text-[#FF4D00] mb-4">Resumen</h2>
      <p class="text-lg mb-6">Total: <span class="font-semibold text-[#FF4D00]"><?= number_format($total, 2) ?> €</span></p>
      <button class="bg-[#FF4D00] text-[#F5F5F5] py-2 px-4 rounded-xl font-semibold hover:bg-[#00C4CC] hover:text-[#0D0D0D] transition-all duration-200 w-full">
        Finalizar compra
      </button>
    </div>

  </div>
</main>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/footer.php'; ?>

