<?php
require_once 'views/components/header.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo);
?>

<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Register</h2>

        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/project/doRegister" method="POST" class="space-y-4 max-w-md">
            <input type="hidden" name="csrf_token" value="<?= $auth->generateCsrfToken(); ?>">
            <div>
                <label class="block mb-1 font-medium">Nama:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? ''); ?>" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-1 font-medium">Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? ''); ?>" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-1 font-medium">Nomor Telepon:</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($old['phone'] ?? ''); ?>" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: 081234567890">
            </div>
            <div>
                <label class="block mb-1 font-medium">Kata Sandi:</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Daftar</button>
            </div>
        </form>
    </div>
</div>

<?php require_once 'views/components/footer.php'; ?>