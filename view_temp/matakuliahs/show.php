<?php require_once 'views/components/header.php'; ?>

<h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Dosen</h2>
<div class="bg-white p-6 rounded shadow-md max-w-md">
    <p class="mb-2"><strong>Nama Mata Kuliah:</strong> <?= htmlspecialchars($user['nama_matkul']); ?></p>
    <p class="mb-2"><strong>SKS:</strong> <?= htmlspecialchars($user['sks']); ?></p>
    <p class="mb-2"><strong>Semester:</strong> <?= htmlspecialchars($user['semester']); ?></p>
    <a href="/project/matakuliah/index" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
</div>

<?php require_once 'views/components/footer.php'; ?>