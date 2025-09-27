<?php require_once 'views/components/header.php'; ?>

<div class="flex items-start justify-center bg-gray-100 mt-8">
    <div class="max-w-2xl w-full bg-gradient-to-r from-blue-50 to-blue-100 p-1 rounded-2xl shadow-lg">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-600 flex items-center justify-center gap-2">
                <i data-lucide="award" class="w-6 h-6"></i> Kartu Hasil Studi
            </h2>

            <div class="space-y-4 text-gray-700">
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i data-lucide="book-open" class="text-blue-500 w-5 h-5"></i>
                    <div>
                        <p class="text-sm text-gray-500">Mata Kuliah</p>
                        <p class="text-lg font-semibold"><?= htmlspecialchars($user['nama_matkul']); ?></p>
                    </div>
                </div>
                <div class="space-y-4 text-gray-700">
                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                        <i data-lucide="layers" class="text-blue-500 w-5 h-5"></i>
                        <div>
                            <p class="text-sm text-gray-500">SKS</p>
                            <p class="text-lg font-semibold"><?= htmlspecialchars($user['sks']); ?></p>
                        </div>
                    </div>
                    <div class="space-y-4 text-gray-700">
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                            <i data-lucide="calendar" class="text-blue-500 w-5 h-5"></i>
                            <div>
                                <p class="text-sm text-gray-500">Semester</p>
                                <p class="text-lg font-semibold"><?= htmlspecialchars($user['semester']); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-6">
                        <a href="/project"
                            class="flex items-center gap-2 bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                            <i data-lucide="arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

<?php require_once 'views/components/footer.php'; ?>