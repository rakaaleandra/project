<?php require_once 'views/components/header.php'; ?>

<div class="flex justify-center items-start bg-gray-100 pt-10 min-h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Detail Dosen</h2>
        <div class="bg-white p-6 rounded shadow-md max-w-md">
            <p class="mb-2"><strong>Nama:</strong> <?= htmlspecialchars($user['nama']); ?></p>
            <p class="mb-2"><strong>Alamat:</strong> <?= htmlspecialchars($user['alamat']); ?></p>
            <a href="/project/dosen/index" class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Kembali</a>
        </div>
    </div>
</div>

<?php require_once 'views/components/footer.php'; ?>