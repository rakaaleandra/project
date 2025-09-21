<?php require_once 'views/components/header.php'; ?>

<h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Dosen</h2>
<div class="bg-white p-6 rounded shadow-md max-w-md">
    <p class="mb-2"><strong>NIM Mahasiswa:</strong> <?= htmlspecialchars($user['fk_nim']); ?></p>
    <p class="mb-2"><strong>Kode Mata Kuliah:</strong> <?= htmlspecialchars($user['fk_kode_matkul']); ?></p>
    <p class="mb-2"><strong>NIP Dosen:</strong> <?= htmlspecialchars($user['fk_nip']); ?></p>
    <p class="mb-2"><strong>Nilai:</strong> <?= htmlspecialchars($user['nilai']); ?></p>
    <a href="/project/kuliah/index" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
</div>

<?php require_once 'views/components/footer.php'; ?>