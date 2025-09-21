<?php require_once 'views/components/header.php'; ?>

<div class="flex justify-center items-start bg-gray-100 pt-12 min-h-screen">
    <div class="max-w-md w-full bg-gradient-to-r from-blue-50 to-blue-100 p-1 rounded-2xl shadow-lg">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-3xl font-extrabold text-blue-600 mb-6 text-center flex items-center justify-center gap-2">
                <i data-lucide="graduation-cap" class="w-7 h-7"></i> Detail Mahasiswa
            </h2>

            <div class="space-y-4 text-gray-700">
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i data-lucide="user" class="text-blue-500 w-5 h-5"></i>
                    <div>
                        <p class="text-sm text-gray-500">Nama</p>
                        <p class="text-lg font-semibold"><?= htmlspecialchars($user['nama']); ?></p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i data-lucide="map-pin" class="text-blue-500 w-5 h-5"></i>
                    <div>
                        <p class="text-sm text-gray-500">Alamat</p>
                        <p class="text-lg font-semibold"><?= htmlspecialchars($user['alamat']); ?></p>
                    </div>
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