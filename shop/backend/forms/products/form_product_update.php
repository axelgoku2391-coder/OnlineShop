<?php
require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/db/db_product_update.php';
require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/header.php';
$id = $_POST['product_id'] ?? null;
$producto = obtenerProducto($id);
$mensaje = '';

$campos = [
    'product_name' => '',
    'product_price' => 0,
    'stock' => 0,
    'categories' => '',
    'product_image' => ''
];

// Actualizar producto si se envió el formulario y el producto existe
if (!empty($_POST['update']) && $producto) {
    foreach ($campos as $key => &$valor) {
        $valor = $_POST[$key] ?? $valor;
    }
    unset($valor);

    $mensaje = actualizarProducto($id, $campos['product_name'], $campos['product_price'], $campos['stock'], $campos['categories'], $campos['product_image']) ? "Producto actualizado correctamente." : "Error al actualizar el producto.";

}
?>

<div class="bg-[#1A1A1A] p-8 rounded-xl shadow-lg text-center max-w-md w-full border border-[#737373]/30 mx-auto my-8">
    <h2 class="text-2xl font-bold text-[#F5F5F5] mb-6">Actualizar producto ID <?= $id ?></h2>

    <?= $mensaje ? "<p class='text-[#00C4CC] mb-4'>$mensaje</p>" : "" ?>

    <form method="POST" class="flex flex-col gap-4">
        <input type="hidden" name="product_id" value="<?= $id ?>">

        <label class="text-[#F5F5F5] text-left">Nombre:</label>
        <input type="text" name="product_name" value="<?= $producto['product_name'] ?>" required
            class="p-2 rounded-lg border border-[#737373] bg-[#0D0D0D] text-[#F5F5F5]">

        <label class="text-[#F5F5F5] text-left">Precio:</label>
        <input type="number" step="0.01" name="product_price" value="<?= $producto['product_price'] ?>" required
            class="p-2 rounded-lg border border-[#737373] bg-[#0D0D0D] text-[#F5F5F5]">

        <label class="text-[#F5F5F5] text-left">Stock:</label>
        <input type="number" name="stock" value="<?= $producto['stock'] ?>" required
            class="p-2 rounded-lg border border-[#737373] bg-[#0D0D0D] text-[#F5F5F5]">

        <label class="text-[#F5F5F5] text-left">Categoría:</label>
        <input type="text" name="categories" value="<?= $producto['category_id'] ?>" required
            class="p-2 rounded-lg border border-[#737373] bg-[#0D0D0D] text-[#F5F5F5]">

        <input type="file" name="fileToUpload" id="fileToUpload" value="<?= $producto['product_image'] ?>" required>
        <button type="submit" name="update" class="bg-[#FF4D00] text-[#F5F5F5] px-6 py-2 rounded-lg font-bold hover:bg-[#00C4CC] hover:text-[#0D0D0D] transition">
            Guardar
        </button>
    </form>

    <a href="../../products.php" class="block mt-6 text-sm text-[#737373] hover:text-[#00C4CC] transition">← Volver atras</a>
</div>