<?php
require_once __DIR__ . '/../models/Auth.php';
require_once __DIR__ . '/../models/Kuliah.php';

class KuliahController {
    private $user;
    private $auth;

    public function __construct($pdo) {
        $this->user = new Kuliah($pdo);
        $this->auth = new Auth($pdo);
    }

    private function checkAuth() {
        if (!$this->auth->check()) {
            header('Location: /project/login');
            exit;
        }
    }

    public function index() {
        $this->checkAuth();
        $users = $this->user->all();
        require_once 'views/kuliahs/index.php';
    }

    public function create() {
        $this->checkAuth();
        require_once 'views/kuliahs/create.php';
    }

    public function store() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
            header('Location: /project/matakuliah/index');
            exit;
        }

        if (!$this->auth->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $errors[] = "CSRF token tidak valid.";
            require_once 'views/kuliahs/create.php';
            return;
        }

        $data = [
            'kode_matkul' => htmlspecialchars($_POST['kode_matkul'] ?? '', ENT_QUOTES, 'UTF-8'),
            'nama_matkul' => htmlspecialchars($_POST['nama_matkul'] ?? '', ENT_QUOTES, 'UTF-8'),
            'sks' => (int) ($_POST['sks'] ?? 0),
            'semester'=> (int) ($_POST['semester'] ?? 0),
        ];

        $errors = [];
        $matakuliah = $this->user->find($data['kode_matkul']);
        if ($matakuliah) {
            $errors[] = "kode mata kuliah sudah terdaftar.";
        }
        if (!is_string($data['nama_matkul'])) {
            $errors[] = "nama_matkul harus berupa teks.";
        }
        if (empty($data['nama_matkul']) || !preg_match('/^[a-zA-Z\s\']+$/', $data['nama_matkul'])) {
            $errors[] = "nama_matkul hanya boleh berisi huruf, spasi, atau apostrof.";
        }

        if (!empty($errors)) {
            $old = $data;
            require_once 'views/kuliahs/create.php';
            return;
        }

        if ($this->user->create($data)) {
            header('Location: /project/matakuliah/index');
        } else {
            $errors[] = "Gagal menyimpan data.";
            $old = $data;
            require_once 'views/kuliahs/create.php';
        }
    }

    public function edit($kode_matkul) {
        $this->checkAuth();
        $user = $this->user->find($kode_matkul);
        if ($user) {
            require_once 'views/kuliahs/edit.php';
        } else {
            echo "Pengguna tidak ditemukan.";
        }
    }

    public function update($kode_matkul) {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
            header('Location: /project/matakuliah/index');
            exit;
        }

        if (!$this->auth->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $errors[] = "CSRF token tidak valid.";
            $user = $this->user->find($kode_matkul);
            require_once 'views/kuliahs/edit.php';
            return;
        }

        $data = [
            'nama_matkul' => htmlspecialchars($_POST['nama_matkul'] ?? '', ENT_QUOTES, 'UTF-8'),
            'sks' => htmlspecialchars($_POST['sks'] ?? '', ENT_QUOTES, 'UTF-8'),
            'semester' => htmlspecialchars($_POST['semester'] ?? '', ENT_QUOTES, 'UTF-8'),
        ];

        $errors = [];
        if (!is_string($data['nama_matkul'])) {
            $errors[] = "nama_matkul harus berupa teks.";
        }
        if (empty($data['nama_matkul']) || !preg_match('/^[a-zA-Z\s\']+$/', $data['nama_matkul'])) {
            $errors[] = "nama_matkul hanya boleh berisi huruf, spasi, atau apostrof.";
        }

        if (!empty($errors)) {
            $old = $data;
            $user = $this->user->find($kode_matkul);
            require_once 'views/kuliahs/edit.php';
            return;
        }

        if ($this->user->update($kode_matkul, $data)) {
            header('Location: /project/matakuliah/index');
        } else {
            $errors[] = "Gagal memperbarui data.";
            $old = $data;
            $user = $this->user->find($kode_matkul);
            require_once 'views/kuliahs/edit.php';
        }
    }

    public function delete($kode_matkul) {
        $this->checkAuth();
        if ($this->user->delete($kode_matkul)) {
            header('Location: /project/matakuliah/index');
        } else {
            echo "Gagal menghapus data.";
        }
    }

    public function show($kode_matkul) {
        $this->checkAuth();
        $user = $this->user->find($kode_matkul);
        if ($user) {
            require_once 'views/kuliahs/show.php';
        } else {
            echo "Pengguna tidak ditemukan.";
        }
    }
}