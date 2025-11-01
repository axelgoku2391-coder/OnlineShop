<?php require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/header.php'; ?>

<main class="flex justify-center items-center h-screen">
    <form method="POST" action="/student002/shop/backend/db/db_login.php" class="flex flex-col gap-6 items-center justify-center bg-[#111111] border border-[#FF4D00]/60 rounded-2xl p-10 shadow-[0_0_15px_#FF4D00]/30 w-[350px]">

        <h2 class="text-3xl font-bold text-[#FF4D00]">LOGIN</h2>

        <p class="text-red-500 text-sm min-h-[1em]"></p>

        <div class="flex flex-col w-full">
            <label class="text-[#F5F5F5] text-sm mb-1" for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter Email" required class="text-[#F5F5F5] placeholder-[#888] bg-transparent border border-[#333] focus:border-[#00C4CC] outline-none rounded-md w-full py-2 px-3 transition-all duration-200">
        </div>

        <div class="flex flex-col w-full">
            <label class="text-[#F5F5F5] text-sm mb-1" for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required
                class="text-[#F5F5F5] placeholder-[#888] bg-transparent border border-[#333] 
                          focus:border-[#00C4CC] outline-none rounded-md w-full py-2 px-3 transition-all duration-200">
        </div>

        <button type="submit" class="bg-[#FF4D00] text-[#F5F5F5] py-2 rounded-md font-semibold hover:bg-[#00C4CC] hover:text-[#0D0D0D] transition-all duration-200 w-full">Login</button>

        <p class="text-sm text-[#bbb] mt-2">¿No tienes cuenta? <a href="#" class="text-[#00C4CC] hover:underline">Regístrate</a></p>
    </form>
</main>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/footer.php'; ?>
