<?php
require_once 'views/components/header.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo);
?>

<h2 class="text-2xl font-bold mb-6">Edit Mata Kuliah</h2>

<?php if (isset($errors) && !empty($errors)): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/project/kuliah/update/<?= $user['id']; ?>" method="POST" class="space-y-4 max-w-md">
    <input type="hidden" name="csrf_token" value="<?= $auth->generateCsrfToken(); ?>">
    <div>
        <label class="block mb-1">NIM Mahasiswa:</label>
        <input type="text" name="fk_nim" value="<?= htmlspecialchars($old['fk_nim'] ?? $user['fk_nim']); ?>" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div>
        <label class="block mb-1">Kode Mata Kuliah:</label>
        <input type="text" name="fk_kode_matkul" value="<?= htmlspecialchars($old['fk_kode_matkul'] ?? $user['fk_kode_matkul']); ?>" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div>
        <label class="block mb-1">NIP Dosen:</label>
        <input type="text" name="fk_nip" value="<?= htmlspecialchars($old['fk_nip'] ?? $user['fk_nip']); ?>" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div>
        <label class="block mb-1">Nilai:</label>
        <input type="text" name="nilai" value="<?= htmlspecialchars($old['nilai'] ?? $user['nilai']); ?>" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Perbarui</button>
</form>

<?php require_once 'views/components/footer.php'; ?>