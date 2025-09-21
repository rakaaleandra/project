<?php require_once 'views/components/header.php'; ?>

<div class="flex items-start justify-center bg-gray-100 min-h-screen py-10">
    <div class="max-w-lg w-full bg-gradient-to-r from-blue-50 to-blue-100 p-1 rounded-2xl shadow-lg">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center flex items-center justify-center gap-2">
                <i data-lucide="book-open" class="w-7 h-7"></i> Detail Mata Kuliah
            </h2>

            <div class="space-y-4 text-gray-700">
                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <p class="text-sm text-gray-500">Nama Mata Kuliah</p>
                    <p class="text-lg font-semibold"><?= htmlspecialchars($user['nama_matkul']); ?></p>
                </div>
                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <p class="text-sm text-gray-500">SKS</p>
                    <p class="text-lg font-semibold"><?= htmlspecialchars($user['sks']); ?></p>
                </div>
                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <p class="text-sm text-gray-500">Semester</p>
                    <p class="text-lg font-semibold"><?= htmlspecialchars($user['semester']); ?></p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="/project"
                    class="inline-flex items-center gap-2 bg-blue-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-600 hover:shadow-md transition">
                    <i data-lucide="arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

<?php require_once 'views/components/footer.php'; ?>