--
---
--
CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `id_pegawai` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_nip` int(6) unsigned NOT NULL,
  `pegawai_tanggal` date NOT NULL,
  PRIMARY KEY (`id_pegawai`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
INSERT INTO `tb_pegawai` (`id_pegawai`, `pegawai_nip`, `pegawai_tanggal`) VALUES
(1, 123456, '2023-03-16'),
(2, 789012, '2023-03-17'),
(3, 345678, '2023-03-18');
 
 