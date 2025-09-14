CREATE DATABASE IF NOT EXISTS perkuliahan;
USE perkuliahan;

CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(15),
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mahasiswa (
	nim VARCHAR(20) PRIMARY KEY,
	nama VARCHAR(50),
	alamat VARCHAR(100),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mata_kuliah (
	kode_matkul VARCHAR(20) PRIMARY KEY,
	nama_matkul VARCHAR(50),
	sks INT,
	semester INT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE dosen (
	nip VARCHAR(20) PRIMARY KEY,
	nama VARCHAR(50),
	alamat VARCHAR(50),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE kuliah (
	id SERIAL PRIMARY KEY,
	fk_nim VARCHAR(20),
	fk_kode_matkul VARCHAR(20),
	fk_nip VARCHAR(20),
	nilai INT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT fk_mahasiswa FOREIGN KEY(fk_nim) REFERENCES mahasiswa(nim),
	CONSTRAINT fk_mata_kuliah FOREIGN KEY(fk_kode_matkul) REFERENCES mata_kuliah(kode_matkul),
	CONSTRAINT fk_dosen FOREIGN KEY(fk_nip) REFERENCES dosen(nip)
);