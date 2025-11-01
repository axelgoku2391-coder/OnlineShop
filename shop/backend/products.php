<?php require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/header.php'; ?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/config/db_connection.php';

$result = mysqli_query($conn, "SELECT * FROM 002products");
$productos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<main class="px-4 md:px-8 lg:px-16 py-8">
    <h1 class="text-3xl font-semibold text-center text-[#F5F5F5] mb-8">Productos</h1>
    <div class="flex justify-end my-5 mx-10">
        <?php include("./forms/products/form_product_insert_call.php") ?>   
    </div>
    

    <ul class="flex flex-wrap gap-8 justify-center">
        <?php foreach ($productos as $p) : ?>
            <li class="border border-[#FF4D00] shadow-md rounded-xl p-4 w-56 flex flex-col items-center text-center transition-transform hover:scale-105">

                <img src="<?= $p['product_image'] ?>" class="w-44 h-44 object-cover mb-3 rounded-lg">
                <strong class="text-lg font-medium mb-1 text-[#F5F5F5]"><?= $p['product_name'] ?></strong>

                <p class="text-[#F5F5F5] mb-3">Precio: <span class="font-semibold"><?= $p['product_price'] ?> €</span></p>

                <div class="flex gap-2 flex-wrap justify-center">
                    <?php
                    include $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/forms/products/form_product_update_call.php';
                    include $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/forms/products/form_product_delete_call.php';
                    include $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/forms/products/form_add_to_cart.php';
                    ?>
                </div>

            </li>
        <?php endforeach; ?>
    </ul>
</main>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/footer.php'; ?>
