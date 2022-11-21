CREATE DATABASE fakultas;

CREATE TABLE jurusan (
 id INTEGER PRIMARY KEY AUTO_INCREMENT,
 kode CHAR(4) NOT NULL,
 nama VARCHAR(50) NOT NULL
);
CREATE TABLE mahasiswa(
 id INTEGER PRIMARY KEY AUTO_INCREMENT,
 id_jurusan INTEGER NOT NULL,
 nim CHAR(8) NOT NULL,
 nama VARCHAR(50) NOT NULL,
 jenis_kelamin enum('laki-laki', 'perempuan' ) NOT NULL,
 tempat_lahir VARCHAR(50) NOT NULL,
 tanggal_lahir DATE NOT NULL, 
 alamat VARCHAR (255) NOT NULL,
 FOREIGN KEY (id_jurusan) REFERENCES jurusan(id)
);

 desc jurusan;
+-------+-------------+------+-----+---------+----------------+
| Field | Type        | Null | Key | Default | Extra          |
+-------+-------------+------+-----+---------+----------------+
| id    | int(11)     | NO   | PRI | NULL    | auto_increment |
| kode  | char(4)     | NO   |     | NULL    |                |
| nama  | varchar(50) | NO   |     | NULL    |                |
+-------+-------------+------+-----+---------+----------------+

 desc mahasiswa;
+---------------+-------------------------------+------+-----+---------+----------------+
| Field         | Type                          | Null | Key | Default | Extra          |
+---------------+-------------------------------+------+-----+---------+----------------+
| id            | int(11)                       | NO   | PRI | NULL    | auto_increment |
| id_jurusan    | int(11)                       | NO   | MUL | NULL    |                |
| nim           | char(8)                       | NO   |     | NULL    |                |
| nama          | varchar(50)                   | NO   |     | NULL    |                |
| jenis_kelamin | enum('laki-laki','perempuan') | NO   |     | NULL    |                |
| tempat_lahir  | varchar(50)                   | NO   |     | NULL    |                |
| tanggal_lahir | date                          | NO   |     | NULL    |                |
| alamat        | varchar(255)                  | NO   |     | NULL    |                |
+---------------+-------------------------------+------+-----+---------+----------------+

insert into jurusan (kode , nama) values ("APBL", "Administrasi Publik");
 select * from jurusan;
+----+------+---------------------+
| id | kode | nama                |
+----+------+---------------------+
|  1 | APBL | Administrasi Publik |
+----+------+---------------------+

insert into jurusan (kode , nama) values ("PTIF", "Pendidikan Teknik Informatika");


MariaDB [fakultas]> select * from jurusan;
+----+------+-------------------------------+
| id | kode | nama                          |
+----+------+-------------------------------+
|  1 | APBL | Administrasi Publik           |
|  2 | PTIF | Pendidikan Teknik Informatika |
+----+------+-------------------------------+

insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) value (1, "20220001", "Selvia", "perempuan", "Tuban", "2001-06-19", "Jl. Jetis Kulon X");

MariaDB [fakultas]> select * from mahasiswa;
+----+------------+----------+--------+---------------+--------------+---------------+-------------------+
| id | id_jurusan | nim      | nama   | jenis_kelamin | tempat_lahir | tanggal_lahir | alamat            |
+----+------------+----------+--------+---------------+--------------+---------------+-------------------+
|  1 |          1 | 20220001 | Selvia | perempuan     | Tuban        | 2001-06-19    | Jl. Jetis Kulon X |
+----+------------+----------+--------+---------------+--------------+---------------+-------------------+

insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) value (2, "20220002", "Nipfasari", "perempuan", "Surabaya", "2002-06-15", "Jl. Pahlawan 12");

update mahasiswa set alamat = " Jl. Bunga Indah" where id = 1;

MariaDB [fakultas]> select * from mahasiswa;
+----+------------+----------+-----------+---------------+--------------+---------------+-------------------+
| id | id_jurusan | nim      | nama      | jenis_kelamin | tempat_lahir | tanggal_lahir | alamat            |
+----+------------+----------+-----------+---------------+--------------+---------------+-------------------+
|  1 |          1 | 20220001 | Selvia    | perempuan     | Tuban        | 2001-06-19    |  Jl. Bunga Indah  |
|  2 |          1 | 20220001 | Selvia    | perempuan     | Tuban        | 2001-06-19    | Jl. Jetis Kulon X |
|  3 |          2 | 20220002 | Nipfasari | perempuan     | Surabaya     | 2002-06-15    | Jl. Pahlawan 12   |
+----+------------+----------+-----------+---------------+--------------+---------------+-------------------+

 delete from mahasiswa where id = 1;
 MariaDB [fakultas]> select * from mahasiswa;
+----+------------+----------+-----------+---------------+--------------+---------------+-------------------+
| id | id_jurusan | nim      | nama      | jenis_kelamin | tempat_lahir | tanggal_lahir | alamat            |
+----+------------+----------+-----------+---------------+--------------+---------------+-------------------+
|  2 |          1 | 20220001 | Selvia    | perempuan     | Tuban        | 2001-06-19    | Jl. Jetis Kulon X |
|  3 |          2 | 20220002 | Nipfasari | perempuan     | Surabaya     | 2002-06-15    | Jl. Pahlawan 12   |
+----+------------+----------+-----------+---------------+--------------+---------------+-------------------+