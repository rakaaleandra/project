<?php
require_once 'views/components/header.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo);
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-purple-100">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
        <h2 class="text-3xl font-extrabold text-center mb-6 text-blue-600 tracking-wide">
            Selamat Datang
        </h2>

        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/project/doLogin" method="POST" class="space-y-5">
            <input type="hidden" name="csrf_token" value="<?= $auth->generateCsrfToken(); ?>">

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <div class="flex items-center border rounded-lg px-3 py-2 focus-within:ring-2 focus-within:ring-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-blue-500 mr-2"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l9 6 9-6M4 6h16v12H4z" />
                    </svg>
                    <input type="email" name="email"
                        value="<?= htmlspecialchars($old['email'] ?? ''); ?>"
                        required class="w-full outline-none text-gray-700 placeholder-gray-400"
                        placeholder="contoh@email.com">
                </div>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Kata Sandi</label>
                <div class="flex items-center border rounded-lg px-3 py-2 focus-within:ring-2 focus-within:ring-purple-400">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-purple-500 mr-2"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 11c.667 0 2 .4 2 2v3H10v-3c0-1.6 1.333-2 2-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 11V7a5 5 0 00-10 0v4" />
                        <rect x="5" y="11" width="14" height="10" rx="2" ry="2" />
                    </svg>
                    <input type="password" name="password"
                        required class="w-full outline-none text-gray-800 placeholder-red-400"
                        placeholder="••••••••">
                </div>
            </div>


            <div class="flex items-center justify-between text-sm">
                <p class="text-gray-600">Belum punya akun?</p>
                <a href="/project/register" class="font-medium text-blue-500 hover:text-blue-600 transition">Daftar di sini</a>
            </div>

            <div class="pt-2">
                <button type="submit" name="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-2 rounded-lg font-semibold shadow hover:from-blue-600 hover:to-indigo-600 transform hover:scale-[1.02] transition">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once 'views/components/footer.php'; ?>