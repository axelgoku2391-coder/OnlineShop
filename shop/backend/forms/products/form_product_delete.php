<?php
require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/db/db_product_delete.php';
require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/header.php';

$id = $_POST['product_id'];
$confirmado = $_POST['confirmar'] ?? null;
$productoEliminado = ($id && $confirmado) ? eliminarProducto($id) : null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
</head>

<body class="bg-[#0D0D0D] flex items-center justify-center min-h-screen font-sans">
    <div class="bg-[#1A1A1A] p-10 rounded-2xl shadow-2xl text-center max-w-md w-full mx-auto border border-[#737373]/30">

        <h1 class="text-2xl font-bold mb-6 text-[#F5F5F5]">
            <?= ($productoEliminado === true) ? "Producto eliminado" : (($id && !$confirmado) ? "Confirmar eliminación" : "No se pudo eliminar") ?>
        </h1>

        <p class="mb-8 text-[#F5F5F5]">
            <?= ($productoEliminado === true)
                ? "El producto con ID <span class='text-[#00C4CC] font-semibold'>" . ($id) . "</span> se eliminó correctamente."
                : (($id && !$confirmado)
                    ? "¿Seguro que quieres borrar el producto con ID <span class='text-[#00C4CC] font-semibold'>" . ($id) . "</span>?"
                    : "El producto con ID <span class='text-[#00C4CC] font-semibold'>" . ($id) . "</span> no existe o no se seleccionó correctamente.") ?>
        </p>

        <?= ($id && !$confirmado) ? '
        <form method="POST" class="flex justify-center gap-4">
            <input type="hidden" name="product_id" value="' . ($id) . '">
            <input type="hidden" name="confirmar" value="1">
            <input type="submit" value="Aceptar" class="bg-[#FF4D00] text-[#F5F5F5] px-6 py-2 rounded-xl font-bold hover:bg-[#00C4CC] hover:text-[#0D0D0D] cursor-pointer transition-all duration-200">
            <a href="../../index.php" class="bg-[#737373] text-[#F5F5F5] px-6 py-2 rounded-xl font-bold hover:bg-[#00C4CC] transition-all duration-200 cursor-pointer no-underline">Cancelar</a>
        </form>' : ''
        ?>

        <a href="../../products.php" class="block mt-6 text-sm text-[#737373] hover:text-[#00C4CC] transition">← Volver atras</a>
    </div>
</body>

</html>