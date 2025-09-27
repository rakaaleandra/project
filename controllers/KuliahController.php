<?php
require_once __DIR__ . '/../models/Auth.php';
require_once __DIR__ . '/../models/Kuliah.php';
require_once __DIR__ . '/../models/Mahasiswa.php';
require_once __DIR__ . '/../models/MataKuliah.php';
require_once __DIR__ . '/../models/Dosen.php';

class KuliahController {
    private $user;
    private $auth;

    private $mahasiswa;
    private $mataKuliah;
    private $dosen;

    public function __construct($pdo) {
        $this->user = new Kuliah($pdo);
        $this->auth = new Auth($pdo);
        $this->mahasiswa = new Mahasiswa($pdo);
        $this->mataKuliah = new MataKuliah($pdo);
        $this->dosen = new Dosen($pdo);
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
        global $pdo;
        $this->checkAuth();
        require_once 'views/kuliahs/create.php';
    }

    public function store() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
            header('Location: /project/kuliah/index');
            exit;
        }

        if (!$this->auth->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $errors[] = "CSRF token tidak valid.";
            require_once 'views/kuliahs/create.php';
            return;
        }

        $data = [
            'fk_nim' => htmlspecialchars($_POST['fk_nim'] ?? '', ENT_QUOTES, 'UTF-8'),
            'fk_kode_matkul' => htmlspecialchars($_POST['fk_kode_matkul'] ?? '', ENT_QUOTES, 'UTF-8'),
            'fk_nip' => htmlspecialchars($_POST['fk_nip'] ?? '', ENT_QUOTES, 'UTF-8'),
            'nilai'=> (int) ($_POST['nilai'] ?? 0),
        ];

        $errors = [];
        $nim = $this->mahasiswa->find($data['fk_nim']);
        $nip = $this->dosen->find($data['fk_nip']);
        $kode_matkul = $this->mataKuliah->find($data['fk_kode_matkul']);
        if (!$kode_matkul) {
            $errors[] = "Kode Mata Kuliah belum terdaftar.";
        }
        if (!$nip) {
            $errors[] = "NIP belum terdaftar.";
        }
        if (!$nim) {
            $errors[] = "NIM belum terdaftar.";
        }
        // if (!is_string($data['nama_matkul'])) {
        //     $errors[] = "nama_matkul harus berupa teks.";
        // }
        // if (empty($data['nama_matkul']) || !preg_match('/^[a-zA-Z\s\']+$/', $data['nama_matkul'])) {
        //     $errors[] = "nama_matkul hanya boleh berisi huruf, spasi, atau apostrof.";
        // }

        if (!empty($errors)) {
            $old = $data;
            require_once 'views/kuliahs/create.php';
            return;
        }

        if ($this->user->create($data)) {
            header('Location: /project/kuliah/index');
        } else {
            $errors[] = "Gagal menyimpan data.";
            $old = $data;
            require_once 'views/kuliahs/create.php';
        }
    }

    public function edit($id) {
        global $pdo;
        $this->checkAuth();
        $user = $this->user->find($id);
        if ($user) {
            require_once 'views/kuliahs/edit.php';
        } else {
            echo "Pengguna tidak ditemukan.";
        }
    }

    public function update($id) {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
            header('Location: /project/kuliah/index');
            exit;
        }

        if (!$this->auth->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $errors[] = "CSRF token tidak valid.";
            $user = $this->user->find($id);
            require_once 'views/kuliahs/edit.php';
            return;
        }

        $data = [
            'fk_nim' => htmlspecialchars($_POST['fk_nim'] ?? '', ENT_QUOTES, 'UTF-8'),
            'fk_kode_matkul' => htmlspecialchars($_POST['fk_kode_matkul'] ?? '', ENT_QUOTES, 'UTF-8'),
            'fk_nip' => htmlspecialchars($_POST['fk_nip'] ?? '', ENT_QUOTES, 'UTF-8'),
            'nilai'=> (int) ($_POST['nilai'] ?? 0),
        ];

        $errors = [];
        $nim = $this->mahasiswa->find($data['fk_nim']);
        $nip = $this->dosen->find($data['fk_nip']);
        $kode_matkul = $this->mataKuliah->find($data['fk_kode_matkul']);
        if (!$kode_matkul) {
            $errors[] = "Kode Mata Kuliah belum terdaftar.";
        }
        if (!$nip) {
            $errors[] = "NIP belum terdaftar.";
        }
        if (!$nim) {
            $errors[] = "NIM belum terdaftar.";
        }

        if (!empty($errors)) {
            $old = $data;
            $user = $this->user->find($id);
            require_once 'views/kuliahs/edit.php';
            return;
        }

        if ($this->user->update($id, $data)) {
            header('Location: /project/kuliah/index');
        } else {
            $errors[] = "Gagal memperbarui data.";
            $old = $data;
            $user = $this->user->find($id);
            require_once 'views/kuliahs/edit.php';
        }
    }

    public function delete($id) {
        $this->checkAuth();
        if ($this->user->delete($id)) {
            header('Location: /project/kuliah/index');
        } else {
            echo "Gagal menghapus data.";
        }
    }

    public function show($id) {
        $this->checkAuth();
        $user = $this->user->viewAll($id);
        if ($user) {
            require_once 'views/kuliahs/show.php';
        } else {
            echo "Pengguna tidak ditemukan.";
        }
    }
}
