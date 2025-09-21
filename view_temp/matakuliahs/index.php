<?php require_once 'views/components/header.php'; ?>

<h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Mata Kuliah</h2>
<a href="create" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">Tambah Mata Kuliah</a>
<table class="w-full border-collapse bg-white shadow-md rounded">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Kode Mata Kuliah</th>
            <th class="border px-4 py-2 text-left">Nama Mata Kuliah</th>
            <th class="border px-4 py-2 text-left">SKS</th>
            <th class="border px-4 py-2 text-left">Semester</th>
            <th class="border px-4 py-2 text-left">Control</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td class="border px-4 py-2"><?= $user['kode_matkul']; ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($user['nama_matkul']); ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($user['sks']); ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($user['semester']); ?></td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="show/<?= $user['kode_matkul']; ?>" class="text-blue-500 hover:underline">Lihat</a>
                    <a href="edit/<?= $user['kode_matkul']; ?>" class="text-green-500 hover:underline">Edit</a>
                    <a href="delete/<?= $user['kode_matkul']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once 'views/components/footer.php'; ?>