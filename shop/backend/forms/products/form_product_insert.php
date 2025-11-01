¡
<?php require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/db/db_product_insert.php'; ?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/db/db_insert_image.php'; ?>


<?php 
$productoInsertado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $imagePath = null;
    if (isset($_FILES['product_image'])) {
        $imagePath = subirImagenPNG($_FILES['product_image']);
    }

    if ($imagePath) {
        $productoInsertado = insertarProducto(
            $_POST['product_name'],
            $_POST['product_price'],
            $_POST['stock'],
            $_POST['category_id'],
            $imagePath
        );
    } else {
        $productoInsertado = false;
    }
}
?>

<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-[#1A1A1A] p-10 rounded-2xl shadow-2xl text-center max-w-md w-full border border-[#737373]/30">

        <?php if ($productoInsertado === true): ?>
            <h1 class="text-2xl font-bold mb-6 text-[#F5F5F5]">Producto insertado</h1>
            <p class="mb-8 text-[#F5F5F5]">
                El producto <span class="text-[#00C4CC] font-semibold"><?= ($_POST['product_name']) ?></span> se ha insertado correctamente.
            </p>
        <?php endif; ?>

        <h1 class="text-2xl font-bold mb-6 text-[#F5F5F5]">Insertar Producto</h1>
        <form method="POST" enctype="multipart/form-data" class="flex flex-col items-center space-y-4">
            <input type="text" name="product_name" placeholder="Nombre del producto" required class="w-64 p-2 rounded-xl border border-[#737373] text-[#0D0D0D] focus:outline-none focus:ring-2 focus:ring-[#00C4CC]">
            <input type="text" name="product_price" placeholder="Precio del producto" required class="w-64 p-2 rounded-xl border border-[#737373] text-[#0D0D0D] focus:outline-none focus:ring-2 focus:ring-[#00C4CC]">
            <input type="number" name="stock" placeholder="Cantidad" required class="w-64 p-2 rounded-xl border border-[#737373] text-[#0D0D0D] focus:outline-none focus:ring-2 focus:ring-[#00C4CC]">
            <input type="number" name="category_id" placeholder="ID de la categoría" required class="w-64 p-2 rounded-xl border border-[#737373] text-[#0D0D0D] focus:outline-none focus:ring-2 focus:ring-[#00C4CC]">
            <input type="file" name="product_image" accept="image/png" required class="w-64 p-2 rounded-xl border border-[#737373] text-[#0D0D0D] focus:outline-none focus:ring-2 focus:ring-[#00C4CC]">
            <input type="submit" value="Insertar" class="w-64 bg-[#FF4D00] text-[#F5F5F5] py-2 rounded-xl font-bold cursor-pointer hover:bg-[#00C4CC] hover:text-[#0D0D0D] transition-all duration-200">
        </form>

        <a href="../../products.php" class="block mt-6 text-sm text-[#737373] hover:text-[#00C4CC] transition">← Volver al inicio</a>
    </div>
</div>
