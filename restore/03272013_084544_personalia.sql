DROP TABLE ahli;

CREATE TABLE `ahli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `ahli` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO ahli VALUES("1","1","admin","administrasi");
INSERT INTO ahli VALUES("2","1","surveyor","survey");
INSERT INTO ahli VALUES("3","2","Penyiar","broadcast");



DROP TABLE award;

CREATE TABLE `award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `jns_award` varchar(255) NOT NULL,
  `award` varchar(255) NOT NULL,
  `ket_award` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO award VALUES("1","2","internal","anggota terbuuuuaek","juara 2");
INSERT INTO award VALUES("2","1","Kinerja","Paling cepat","kompeten");



DROP TABLE award_kary;

CREATE TABLE `award_kary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_award` int(11) NOT NULL,
  `ket_awd` varchar(255) NOT NULL,
  `tgl_awd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO award_kary VALUES("1","5","2","Bagus","01-03-2013");



DROP TABLE family;

CREATE TABLE `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `ayah` varchar(255) NOT NULL,
  `ibu` varchar(255) NOT NULL,
  `alm_ortu` varchar(255) NOT NULL,
  `istri` varchar(255) NOT NULL,
  `alm_istri` varchar(255) NOT NULL,
  `anak1` varchar(255) NOT NULL,
  `anak2` varchar(255) NOT NULL,
  `anak3` varchar(255) NOT NULL,
  `anak4` varchar(255) NOT NULL,
  `anak5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO family VALUES("1","4","Rere","Rara","jl malang sby","roro","jl sby mlg","joko","joni","joki","jono","jino");



DROP TABLE golongan;

CREATE TABLE `golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gol` varchar(255) NOT NULL,
  `ket_gol` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO golongan VALUES("1","Honorerrr","honooorrrrrrr");
INSERT INTO golongan VALUES("2","Tetap","pegawai tetap");



DROP TABLE karyawan;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_kary` varchar(100) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_bag` int(11) NOT NULL,
  `nama_kary` varchar(255) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto_kary` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO karyawan VALUES("2","0203198700002","2","3","treew","","Honorer","2.jpg");
INSERT INTO karyawan VALUES("3","0201198500003","2","3","2324f","","Tetap","3.jpg");
INSERT INTO karyawan VALUES("4","0201199500004","2","5","TYUR","","Percobaan","4.jpg");
INSERT INTO karyawan VALUES("5","0101198200005","1","1","Petrov S.Kom","Perempuan","Belum Menikah","5.jpg");
INSERT INTO karyawan VALUES("6","0201197900006","2","3","Mr Lent","","Belum Menikah","6.jpg");



DROP TABLE karyawan_ahli;

CREATE TABLE `karyawan_ahli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_ahli` int(11) NOT NULL,
  `ket_kary_ahli` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO karyawan_ahli VALUES("3","5","1","BFI X");
INSERT INTO karyawan_ahli VALUES("4","5","2","opo");
INSERT INTO karyawan_ahli VALUES("5","6","3","radio makubu");
INSERT INTO karyawan_ahli VALUES("6","4","3","radio MFM");



DROP TABLE karyawan_detail;

CREATE TABLE `karyawan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `kota_lhr` varchar(255) NOT NULL,
  `tgl_lhr` varchar(50) NOT NULL,
  `alm_kary` varchar(255) NOT NULL,
  `kota_kary` varchar(255) NOT NULL,
  `kec_kary` varchar(255) NOT NULL,
  `telp_kary` varchar(50) NOT NULL,
  `email_kary` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO karyawan_detail VALUES("1","1","","Malang","121991","Jl Sby 1","Malang","","454634","vallet@yah.co");
INSERT INTO karyawan_detail VALUES("2","2","","Surabaya","581987","Malang1 ","Surabaya","","76768","hghg@iut.co");
INSERT INTO karyawan_detail VALUES("3","3","","Malang","2661985","KidulPasar","Malang","","868674","ann@lyo.p");
INSERT INTO karyawan_detail VALUES("4","4","","Malang","1-1-1995","Malang","Mlanag","","343","asdas");
INSERT INTO karyawan_detail VALUES("5","5","123123129","Malangg","5-2-1982","JL gegeg","Malangg","Klojeng","454634g","vasd@fsd.kg");
INSERT INTO karyawan_detail VALUES("6","6","0011111","Salatiga","4-3-1979","tujuh","sepuluh","minus","23213","vasd@fsd.kg");



DROP TABLE karyawan_golongan;

CREATE TABLE `karyawan_golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `ket_kary_gol` varchar(255) NOT NULL,
  `tgl_ttp_gol` varchar(50) NOT NULL,
  `tgl_akh_gol` varchar(50) NOT NULL,
  `jamsostek` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO karyawan_golongan VALUES("1","6","2","weres","01-03-2013","28-08-2013","3433");



DROP TABLE karyawan_pendd;

CREATE TABLE `karyawan_pendd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_pendd` int(11) NOT NULL,
  `tmp_kary_pendd` varchar(255) NOT NULL,
  `thn_kary_pendd` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO karyawan_pendd VALUES("1","6","2","SD Muhammadiyah 1","1991");



DROP TABLE karyawan_sertifikat;

CREATE TABLE `karyawan_sertifikat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_sertifikat` int(11) NOT NULL,
  `thn_kary_stfkt` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO karyawan_sertifikat VALUES("2","6","2","");
INSERT INTO karyawan_sertifikat VALUES("3","6","2","1990");
INSERT INTO karyawan_sertifikat VALUES("5","4","2","");
INSERT INTO karyawan_sertifikat VALUES("6","6","1","");
INSERT INTO karyawan_sertifikat VALUES("7","6","1","2001");



DROP TABLE langgar;

CREATE TABLE `langgar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `jns_langgar` varchar(255) NOT NULL,
  `langgar` varchar(255) NOT NULL,
  `ket_langgar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO langgar VALUES("1","1","bolosan","3hari","kurangi 100rb");



DROP TABLE langgar_kary;

CREATE TABLE `langgar_kary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_langgar` int(11) NOT NULL,
  `sanksi_lgr` varchar(255) NOT NULL,
  `ket_lgr` varchar(255) NOT NULL,
  `tgl_lgr` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO langgar_kary VALUES("1","4","1","maem rumputs","serems","12-02-2013");
INSERT INTO langgar_kary VALUES("4","4","1","asdas","dasdsa","26-03-2013");



DROP TABLE mutasi;

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_bag` int(11) NOT NULL,
  `id_unit1` int(11) NOT NULL,
  `id_bag1` int(11) NOT NULL,
  `tgl_mutasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO mutasi VALUES("3","6","1","4","2","3","04-03-2013");
INSERT INTO mutasi VALUES("4","6","2","3","1","1","26-03-2013");
INSERT INTO mutasi VALUES("5","6","1","4","1","1","04-03-2013");
INSERT INTO mutasi VALUES("6","6","1","1","2","3","03-03-2013");
INSERT INTO mutasi VALUES("7","4","1","1","2","3","13-03-2013");



DROP TABLE pendd;

CREATE TABLE `pendd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(50) NOT NULL,
  `ket` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO pendd VALUES("1","SMAI","sekolah menengah atas islam");
INSERT INTO pendd VALUES("2","SD","Sekolah Dasar");



DROP TABLE penddno;

CREATE TABLE `penddno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `jns_non` varchar(255) NOT NULL,
  `nama_non` varchar(255) NOT NULL,
  `thn_non` varchar(5) NOT NULL,
  `ket_non` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO penddno VALUES("1","4","Kursus","Natuna","2010","latihan mobil");
INSERT INTO penddno VALUES("6","4","Diklat","sasd","sdas","dsa");



DROP TABLE pendidikan;

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `tk` varchar(255) NOT NULL,
  `tk_thn` varchar(5) NOT NULL,
  `sd` varchar(255) NOT NULL,
  `sd_thn` varchar(5) NOT NULL,
  `smp` varchar(255) NOT NULL,
  `smp_thn` varchar(5) NOT NULL,
  `sma` varchar(255) NOT NULL,
  `sma_thn` varchar(5) NOT NULL,
  `pt` varchar(255) NOT NULL,
  `pt_thn` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO pendidikan VALUES("1","6","Handayanii","1991","Banyuajuh 3i","1998","SMP 4i","2003","SMA 9i","2006","Unigai","2012");
INSERT INTO pendidikan VALUES("2","6","Handayanii","1991","Banyuajuh 3i","1998","SMP 4i","2003","SMA 9i","2006","Unigai","2012");



DROP TABLE sertifikat;

CREATE TABLE `sertifikat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `sertifikat` varchar(255) NOT NULL,
  `ket_sertifikat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sertifikat VALUES("1","2","546455","lomba makan krupuk","makan krupuk besar");
INSERT INTO sertifikat VALUES("2","2","1212","Karya Tulis","KIR Jaawa Bali");



DROP TABLE unit_bagian;

CREATE TABLE `unit_bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `nama_bag` varchar(255) NOT NULL,
  `kode_bag` varchar(5) NOT NULL,
  `ket_bag` varchar(255) NOT NULL,
  `tunjangan` int(10) NOT NULL,
  `gaji` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO unit_bagian VALUES("1","1","Premium","01","premium","100000","1000000");
INSERT INTO unit_bagian VALUES("3","2","Penyiar","01","ya gitu deh","500000","900000");
INSERT INTO unit_bagian VALUES("4","1","Pertamax","02","pertamaz","500000","6000000");
INSERT INTO unit_bagian VALUES("5","2","On Air","02","teknisi","800000","1000000");



DROP TABLE unit_kerja;

CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO unit_kerja VALUES("1","SPBU","01","premium, solar,  pertamax, dll");
INSERT INTO unit_kerja VALUES("2","Radio","02","on air");
INSERT INTO unit_kerja VALUES("4","Gas","03","LPG");



