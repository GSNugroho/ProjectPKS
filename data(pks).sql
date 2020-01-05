/*
 Navicat Premium Data Transfer

 Source Server         : server
 Source Server Type    : SQL Server
 Source Server Version : 10504000
 Source Host           : localhost:1433
 Source Catalog        : data
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 10504000
 File Encoding         : 65001

 Date: 05/01/2020 21:13:22
*/


-- ----------------------------
-- Table structure for pubgugus
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[pubgugus]') AND type IN ('U'))
	DROP TABLE [dbo].[pubgugus]
GO

CREATE TABLE [dbo].[pubgugus] (
  [vc_k_gugus] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [vc_n_gugus] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [vc_kd_hgugus] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[pubgugus] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of pubgugus
-- ----------------------------
INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0302', N'KLINIK TUMBUH KEMBANG', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1201', N'BAGIAN LOGISTIK', N'12')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0001', N'GUDANG', NULL)
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0002', N'SERVICE', NULL)
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0003', N'LELANG', NULL)
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0233', N'HEMODIALISA', NULL)
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0223', N'KLINIK KARYAWAN', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1105', N'HOME CARE', N'11')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0224', N'KLINIK KECANTIKAN', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1401', N'GAS MEDIS', N'14')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0225', N'TUMBUH KEMBANG', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0309', N'ONE DAY SURGERY', N'03')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0226', N'KLINIK ENDOSKOPI', N'01')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0227', N'KLINIK BEDAH DIGESTIF', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0228', N'PELATIHAN PIJAT BAYI', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0229', N'SENAM HAMIL', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1202', N'GUDANG ATK', N'12')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1203', N'GUDANG RUMAH TANGGA', N'12')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1204', N'GUDANG LINEN', N'12')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1702', N'PENDAFTARAN', N'17')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'2202', N'PIUTANG', N'22')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'5101', N'DIREKTUR', N'31')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'2203', N'AKRI', N'22')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1200', N'BAGIAN LOGISTIK DAN UMUM', N'12')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0300', N'INSTALASI RAWAT INAP', N'03')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0330', N'BP NUSUKAN', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'5102', N'DIVISI PELAYANAN MEDIK', N'31')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'5103', N'DIVISI PENUNJANG MEDIS', N'31')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'5104', N'DIVISI KEUANGAN DAN UMUM', N'31')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'3001', N'TIM PENAMPILAN', N'30')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'3002', N'TIM PEMBELIAN BARANG MEDIK', N'30')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'3003', N'TIM PEMBELIAN BARANG UMUM', N'30')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0200', N'INSTALASI RAWAT JALAN', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0700', N'INSTALASI LABORATORIUM', N'07')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0101', N'INSTALASI GAWAT DARURAT', N'01')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0202', N'KLINIK ANAK', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'2101', N'AKUNTANSI', N'21')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0204', N'KLINIK BEDAH ANAK', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0209', N'KLINIK BEDAH UROLOGI', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0211', N'KLINIK INTERNIS', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0212', N'KLINIK JANTUNG', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0214', N'KLINIK KIA/KKB/IMUNISASI', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0215', N'KLINIK KONSULTASI GIZI', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0216', N'KLINIK KULIT DAN KELAMIN', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0221', N'KLINIK THT', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0222', N'KLINIK UMUM', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1501', N'INSTALASI GIZI', N'15')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0303', N'RUANG BAKUNG', N'3')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0304', N'RUANG BOUGENVILLE', N'3')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0306', N'RUANG CATLEYA IBU', N'3')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0308', N'RUANG DAHLIA', N'3')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0801', N'RADIOLOGI', N'8')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0901', N'REHABILITASI MEDIK', N'9')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'2302', N'HUMAS DAN INFORMASI', N'23')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'7701', N'DRIVER', N'77')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1601', N'KEPERAWATAN', N'16')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1801', N'SEKRETARIAT', N'18')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1901', N'INSTALASI KESEHATAN LINGKUNGAN', N'19')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'2001', N'EDP', N'20')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0701', N'LABORAT - PATOLOGI KLINIK', N'7')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0604', N'FARMASI GUDANG', N'6')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0702', N'LABORAT - MIKROBIOLOGI', N'7')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0703', N'LABORAT - PATOLOGI ANATOMI', N'7')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0203', N'KLINIK ANDROLOGI', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0205', N'KLINIK BEDAH ORTOPEDI', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0206', N'KLINIK BEDAH PLASTIK', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0208', N'KLINIK BEDAH UMUM', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0220', N'KLINIK SYARAF', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'2601', N'SOSIO MEDIK', N'26')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'5163', N'SPI', N'63')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0301', N'RUANG ANGGREK', N'3')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0302', N'RUANG ASTER', N'3')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0307', N'RUANG CEMPAKA', N'3')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0401', N'INSTALASI PERAWATAN INTENSIF', N'4')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0501', N'INSTALASI KAMAR BEDAH', N'5')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0601', N'FARMASI BARAT', N'6')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0602', N'FARMASI TIMUR', N'6')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1103', N'SECURITY', N'11')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1104', N'PANGRUKTI LOYO', N'11')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0218', N'KLINIK OBSGYN', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1101', N'HOSPITAL SERVICE', N'11')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1205', N'LINEN LAUNDRY', N'14')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0603', N'FARMASI OKSIGEN', N'6')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0305', N'RUANG CATLEYA BAYI', N'3')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0210', N'KLINIK GIGI', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0213', N'KLINIK JIWA', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0217', N'KLINIK MATA', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0219', N'KLINIK PARU', N'2')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1301', N'PERSONALIA', N'13')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1001', N'INSTALASI STERILISASI', N'10')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1701', N'REKAM MEDIS', N'17')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'2301', N'HUMAS DAN PEMASARAN', N'23')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'2201', N'KEUANGAN', N'22')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0201', N'KLINIK AKUPUNTUR MEDIK', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0207', N'KLINIK BEDAH SYARAF', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1861', N'KOMITE MEDIK', NULL)
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'0262', N'UPKM', N'02')
GO

INSERT INTO [dbo].[pubgugus] ([vc_k_gugus], [vc_n_gugus], [vc_kd_hgugus]) VALUES (N'1503', N'INSTALASI PENGADAAN MAKANAN', N'15')
GO


-- ----------------------------
-- Table structure for SKR_Pks
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[SKR_Pks]') AND type IN ('U'))
	DROP TABLE [dbo].[SKR_Pks]
GO

CREATE TABLE [dbo].[SKR_Pks] (
  [id_pks] int  IDENTITY(1,1) NOT NULL,
  [kd_pks] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nm_instansi] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jns_pks] int  NULL,
  [des_pks] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [asal_pks] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_mulai] datetime  NULL,
  [tgl_akhir] datetime  NULL,
  [pic_pks] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dt_cr] datetime  NULL,
  [dl_sts] int  NULL,
  [date_rev] datetime  NULL,
  [nm_pks] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [date_cor] datetime  NULL,
  [date_ttd] datetime  NULL,
  [date_sls] datetime  NULL,
  [prsn_pks] int  NULL,
  [dt_exp] datetime  NULL
)
GO

ALTER TABLE [dbo].[SKR_Pks] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of SKR_Pks
-- ----------------------------
SET IDENTITY_INSERT [dbo].[SKR_Pks] ON
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'32', N'PKS000011', N'Cokro Bersaudara ( Bengkel )', N'1', N'a', N'Internal', N'2019-10-28 00:00:00.000', N'2019-10-31 00:00:00.000', N'Saya', N'2019-10-28 00:00:00.000', N'1', N'2019-10-28 00:00:00.000', N'Coba lagi', N'2019-10-28 00:00:00.000', N'2019-10-28 00:00:00.000', N'2019-10-28 00:00:00.000', N'100', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'33', N'PKS000012', N'AJ.Nusantara ( BLUE DOT )', N'1', N'a', N'at', N'2019-10-28 00:00:00.000', N'2019-10-31 00:00:00.000', N'a', N'2019-10-28 00:00:00.000', N'1', N'2019-10-28 00:00:00.000', N'Coba lagi lagi', NULL, NULL, NULL, N'25', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'3', N'PKS000002', N'AQUA', N'1', N'Supplay air minum', N'AQUA', N'2019-09-11 00:00:00.000', N'2019-09-30 00:00:00.000', N'Gizi', N'2019-09-11 00:00:00.000', N'0', NULL, NULL, NULL, NULL, NULL, N'0', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'4', N'PKS000003', N'Biznet', N'1', N'Langganan koneksi internet', N'Bagian Teknologi Informasi', N'2019-12-09 00:00:00.000', N'2020-12-09 00:00:00.000', N'Kabag TI', N'2019-09-12 00:00:00.000', N'1', N'2019-10-26 00:00:00.000', N'Kerjasama Layanan Internet Rumah Sakit Panti Waluyo', NULL, NULL, NULL, N'25', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'5', N'PKS000004', N'Powertel, PT', N'1', N'Layanan Internet', N'Bagian Teknologi Informasi', N'2019-09-10 00:00:00.000', N'2019-09-30 00:00:00.000', N'Ditya', N'2019-09-16 00:00:00.000', N'1', N'2019-10-26 00:00:00.000', N'Kerjasama Layanan Internet Rumah Sakit Panti Waluyo', N'2019-10-26 00:00:00.000', N'2019-10-26 00:00:00.000', NULL, N'75', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'26', N'PKS000005', N'CitraNet', N'1', N'', N'Bagian Teknologi Informasi', N'2019-09-16 00:00:00.000', N'2019-09-30 00:00:00.000', N'Ditya', N'2019-09-16 00:00:00.000', N'1', N'2019-10-25 00:00:00.000', N'Kerjasama Layanan Internet Rumah Sakit Panti Waluyo', N'2019-10-25 00:00:00.000', N'2019-10-25 00:00:00.000', N'2019-10-26 00:00:00.000', N'100', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'27', N'PKS000006', N'MyRepublic', N'1', N'Layanan Internet untuk Rumah Sakit Panti Waluyo', N'Bagian Teknologi Informasi', N'2019-09-17 00:00:00.000', N'2019-09-24 00:00:00.000', N'Kabag TI', N'2019-09-17 00:00:00.000', N'1', N'2019-10-25 00:00:00.000', N'Kerjasama Layanan Internet Rumah Sakit Panti Waluyo', NULL, NULL, NULL, N'25', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'28', N'PKS000007', N'Grand Orchid Hotel', N'1', N'Kerjasama untuk tempat istirahat peserta studi banding di Rumah Sakit Panti Waluyo', N'Dirkektur', N'2019-09-23 00:00:00.000', N'2019-09-29 00:00:00.000', N'Personalia', N'2019-09-23 00:00:00.000', N'1', N'2019-10-25 12:37:27.000', N'Tempat Istirahat Untuk Peserta Studi Banding di RS Panti Waluyo', N'2019-10-25 12:37:31.000', N'2019-10-25 12:37:33.000', N'2019-10-25 12:37:36.000', N'100', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'29', N'PKS000008', N'Coca Cola , CV', N'2', N'Kerjasama RS Panti Waluyo untuk menyediakan layanan kesehatan bagi seluruh karyawan coca cola', N'HRD Coca Cola', N'2019-10-01 00:00:00.000', N'2019-10-31 00:00:00.000', N'PSDM', N'2019-10-01 00:00:00.000', N'1', NULL, N'Kerjasama Layanan Kesehatan Untuk Karyawan Coca cola', NULL, NULL, NULL, N'0', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'30', N'PKS000009', N'Abata Donuts', N'1', N'a', N'a', N'2019-10-04 00:00:00.000', N'2019-10-04 00:00:00.000', N'', N'2019-10-04 00:00:00.000', N'0', NULL, N'a', NULL, NULL, NULL, N'0', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'31', N'PKS000010', N'Coba', N'1', N'Coba test input nama instansi free', N'Internal', N'2019-10-23 00:00:00.000', N'2019-10-31 00:00:00.000', N'coba', N'2019-10-23 00:00:00.000', N'1', N'2019-10-25 00:00:00.000', N'Coba', N'2019-10-28 00:00:00.000', NULL, NULL, N'50', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'34', N'PKS000013', N'ANGKASA PURA, PT.', N'1', N'asdf', N'Internal', N'2019-10-29 00:00:00.000', N'2019-10-31 00:00:00.000', N'aa', N'2019-10-29 00:00:00.000', N'1', NULL, N'Coba coba', NULL, NULL, NULL, N'0', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'35', N'PKS000014', N'Indosat, PT', N'1', N'Kerjasama dengan Indosat', N'Internal', N'2019-10-01 00:00:00.000', N'2019-11-30 00:00:00.000', N'Saya', N'2019-10-30 00:00:00.000', N'1', N'2019-10-30 00:00:00.000', N'Kerjasama', NULL, NULL, NULL, N'25', NULL)
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'36', N'PKS000015', N'Abata Donuts', N'1', N'Coba fitur expired', N'Eksternal', N'2020-01-01 00:00:00.000', N'2020-01-31 00:00:00.000', N'kamu', N'2019-10-31 00:00:00.000', N'1', N'2019-10-31 00:00:00.000', N'Coba expired', NULL, NULL, NULL, N'25', N'2019-12-11 00:00:00.000')
GO

INSERT INTO [dbo].[SKR_Pks] ([id_pks], [kd_pks], [nm_instansi], [jns_pks], [des_pks], [asal_pks], [tgl_mulai], [tgl_akhir], [pic_pks], [dt_cr], [dl_sts], [date_rev], [nm_pks], [date_cor], [date_ttd], [date_sls], [prsn_pks], [dt_exp]) VALUES (N'37', N'PKS000016', N'Wafels n Co', N'1', N'Penawaran', N'Eksternal', N'2019-12-01 00:00:00.000', N'2019-12-31 00:00:00.000', N'SAya', N'2019-11-01 00:00:00.000', N'1', N'2019-11-01 00:00:00.000', N'Penawaran baru', NULL, NULL, NULL, N'25', N'2019-12-12 00:00:00.000')
GO

SET IDENTITY_INSERT [dbo].[SKR_Pks] OFF
GO


-- ----------------------------
-- Table structure for SKR_Pks_detail
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[SKR_Pks_detail]') AND type IN ('U'))
	DROP TABLE [dbo].[SKR_Pks_detail]
GO

CREATE TABLE [dbo].[SKR_Pks_detail] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kd_pks] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [d_tind] int  NULL,
  [tgl_tind] datetime  NULL,
  [ket_tind] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pic_tind] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[SKR_Pks_detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of SKR_Pks_detail
-- ----------------------------
SET IDENTITY_INSERT [dbo].[SKR_Pks_detail] ON
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'2', N'PKS000007', N'1', N'2019-10-25 00:00:00.000', N'Lanjut saja', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'3', N'PKS000007', N'2', N'2019-10-25 00:00:00.000', N'Lanjut saja', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'4', N'PKS000007', N'3', N'2019-10-25 00:00:00.000', N'Sudah', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'13', N'PKS000005', N'4', N'2019-10-26 00:00:00.000', N'Oke', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'14', N'PKS000004', N'1', N'2019-10-26 00:00:00.000', N'Sudah', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'15', N'PKS000004', N'2', N'2019-10-26 00:00:00.000', N'Oke', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'16', N'PKS000004', N'3', N'2019-10-26 00:00:00.000', N'coba', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'17', N'PKS000003', N'1', N'2019-10-26 00:00:00.000', N'Lanjut saja', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'5', N'PKS000007', N'4', N'2019-10-25 00:00:00.000', N'Oke', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'6', N'PKS000010', N'1', N'2019-10-25 00:00:00.000', N'coba', N'coba')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'7', N'PKS000010', N'2', N'2019-10-25 00:00:00.000', N'coba', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'8', N'PKS000006', N'1', N'2019-10-25 00:00:00.000', N'coba', N'coba')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'9', N'PKS000005', N'1', N'2019-10-25 00:00:00.000', N'coba', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'10', N'PKS000005', N'2', N'2019-10-25 00:00:00.000', N'Lanjut saja', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'11', N'PKS000005', N'3', N'2019-10-25 00:00:00.000', N'Oke', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'12', N'PKS000006', N'1', N'2019-10-25 00:00:00.000', N'Oke', N'Saya')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'18', N'PKS000015', N'1', N'2019-10-31 00:00:00.000', N'Bagus', N'Saya dan dia')
GO

INSERT INTO [dbo].[SKR_Pks_detail] ([id], [kd_pks], [d_tind], [tgl_tind], [ket_tind], [pic_tind]) VALUES (N'19', N'PKS000016', N'1', N'2019-11-01 00:00:00.000', N'Lanjut', N'dia saya mereka')
GO

SET IDENTITY_INSERT [dbo].[SKR_Pks_detail] OFF
GO


-- ----------------------------
-- Table structure for SKR_Pks_jns
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[SKR_Pks_jns]') AND type IN ('U'))
	DROP TABLE [dbo].[SKR_Pks_jns]
GO

CREATE TABLE [dbo].[SKR_Pks_jns] (
  [id_jns] int  IDENTITY(1,1) NOT NULL,
  [kd_jns_pks] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nm_jns_pks] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[SKR_Pks_jns] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of SKR_Pks_jns
-- ----------------------------
SET IDENTITY_INSERT [dbo].[SKR_Pks_jns] ON
GO

INSERT INTO [dbo].[SKR_Pks_jns] ([id_jns], [kd_jns_pks], [nm_jns_pks]) VALUES (N'1', N'1', N'Manajerial')
GO

INSERT INTO [dbo].[SKR_Pks_jns] ([id_jns], [kd_jns_pks], [nm_jns_pks]) VALUES (N'2', N'2', N'Medis')
GO

SET IDENTITY_INSERT [dbo].[SKR_Pks_jns] OFF
GO


-- ----------------------------
-- Auto increment value for SKR_Pks
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[SKR_Pks]', RESEED, 37)
GO


-- ----------------------------
-- Auto increment value for SKR_Pks_detail
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[SKR_Pks_detail]', RESEED, 19)
GO


-- ----------------------------
-- Auto increment value for SKR_Pks_jns
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[SKR_Pks_jns]', RESEED, 2)
GO

