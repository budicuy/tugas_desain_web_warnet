CREATE TABLE `barang` (
  `id_brg` smallint(6) NOT NULL,
  `kode_brg` char(5) DEFAULT NULL,
  `nama_brg` varchar(25) DEFAULT NULL,
  `kode_jenis` char(3) NOT NULL,
  `kode_merk` char(3) DEFAULT NULL,
  `kode_jenis_voucher` char(3) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
);
CREATE TABLE `detail_jual` (
  `no_nota` varchar(15) DEFAULT NULL,
  `kode_brg` varchar(10) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_jual` int(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
);
CREATE TABLE `jenis_barang` (
  `id_jenis` smallint(6) NOT NULL,
  `kode_jenis` char(3) DEFAULT NULL,
  `Nama_jenis` varchar(25) NOT NULL
);
CREATE TABLE `jenis_voucher` (
  `id_jenisvcr` smallint(6) NOT NULL,
  `kode_jenis` char(3) DEFAULT NULL,
  `voucher` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
);
CREATE TABLE `merk` (
  `id_merk` smallint(6) NOT NULL,
  `kode_merk` char(3) DEFAULT NULL,
  `merk` varchar(25) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
);
CREATE TABLE `nota_jual` (
  `id_nota` int(11) NOT NULL,
  `no_nota` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_plg` varchar(15) DEFAULT NULL
);
CREATE TABLE `pelanggan` (
  `id_pelanggan` smallint(6) NOT NULL,
  `kode_plg` char(5) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telpon` varchar(50) DEFAULT NULL
);
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD UNIQUE KEY `kode_brg` (`kode_brg`),
  ADD KEY `mul_kode_merk` (`kode_merk`),
  ADD KEY `mul_kode_jenis_voucher` (`kode_jenis_voucher`);
ALTER TABLE `detail_jual`
  ADD KEY `mul_no_nota` (`no_nota`),
  ADD KEY `mul_kode_brg` (`kode_brg`);
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`);
ALTER TABLE `jenis_voucher`
  ADD PRIMARY KEY (`id_jenisvcr`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`);
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`),
  ADD UNIQUE KEY `kode_merk` (`kode_merk`);
ALTER TABLE `nota_jual`
  ADD KEY `mul_id_nota` (`id_nota`),
  ADD KEY `mul_no_nota` (`no_nota`),
  ADD KEY `mul_kode_plg` (`kode_plg`);
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `kode_plg` (`kode_plg`);
ALTER TABLE `barang`
  MODIFY `id_brg` smallint(6) NOT NULL AUTO_INCREMENT;
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` smallint(6) NOT NULL AUTO_INCREMENT;
ALTER TABLE `jenis_voucher`
  MODIFY `id_jenisvcr` smallint(6) NOT NULL AUTO_INCREMENT;
ALTER TABLE `merk`
  MODIFY `id_merk` smallint(6) NOT NULL AUTO_INCREMENT;
ALTER TABLE `nota_jual`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` smallint(6) NOT NULL AUTO_INCREMENT;
COMMIT;

INSERT INTO jenis_barang (id_jenis, kode_jenis, Nama_jenis) VALUES
(1, 'HP', 'Handphone'),
(2, 'AKS', 'Asesoris'),
(3, 'VCR', 'Voucher');

    INSERT INTO merk (id_merk, kode_merk, merk, keterangan) VALUES
    (1, 'APL', 'Apple', 'Handphone'),
    (2, 'SMS', 'Samsung', 'Handphone'),
    (3, 'XMI', 'Xiaomi', 'Handphone'),
    (4, 'OPP', 'Oppo', 'Handphone'),
    (5, 'VVO', 'Vivo', 'Handphone'),
    (6, 'HWI', 'Huawei', 'Handphone'),
    (7, 'RIL', 'Realme', 'Handphone'),
    (8, 'NRD', 'Nokia', 'Handphone'),
    (9, 'MSF', 'Microsoft', 'Handphone'),
    (10, 'NON', 'Non Handphone', 'Other Items');

    INSERT INTO jenis_voucher (id_jenisvcr, kode_jenis, voucher, keterangan) VALUES
    (1, 'VCR1', 'Voucher GSM 1', 'GSM'),
    (2, 'VCR2', 'Voucher GSM 2', 'GSM'),
    (3, 'VCR3', 'Voucher GSM 3', 'GSM'),
    (4, 'VCR4', 'Voucher GSM 4', 'GSM'),
    (5, 'VCR5', 'Non Voucher', 'Other');


    -- Handphones
    INSERT INTO barang (kode_brg, nama_brg, kode_jenis, kode_merk, jumlah, harga, keterangan) VALUES
    ('BR001', 'iPhone 13', 'HPH', 'APL', 50, 15000000, 'Latest model'),
    ('BR002', 'Samsung S22', 'HPH', 'SMS', 30, 12000000, 'High performance'),
    ('BR003', 'Xiaomi 12', 'HPH', 'XMI', 40, 9000000, 'Affordable'),
    ('BR004', 'Oppo Find X5', 'HPH', 'OPP', 25, 8000000, 'Stylish'),
    ('BR005', 'Vivo V21', 'HPH', 'VVO', 35, 7000000, 'Camera phone'),
    ('BR006', 'Huawei P50', 'HPH', 'HWI', 20, 13000000, 'Flagship'),
    ('BR007', 'Realme 10 Pro', 'HPH', 'RIL', 45, 6000000, 'Budget phone'),
    ('BR008', 'Nokia XR20', 'HPH', 'NRD', 15, 7500000, 'Durable');

    -- Accessories
    INSERT INTO barang (kode_brg, nama_brg, kode_jenis, kode_merk, jumlah, harga, keterangan) VALUES
    ('BR009', 'Phone Case', 'ASR', 'NON', 100, 50000, 'Universal case'),
    ('BR010', 'Screen Protector', 'ASR', 'NON', 150, 30000, 'Tempered glass'),
    ('BR011', 'Wireless Charger', 'ASR', 'NON', 50, 250000, 'Fast charging'),
    ('BR012', 'Earphones', 'ASR', 'NON', 200, 150000, 'High quality'),
    ('BR013', 'Power Bank', 'ASR', 'NON', 80, 300000, 'Portable'),
    ('BR014', 'Bluetooth Speaker', 'ASR', 'NON', 60, 500000, 'Loud sound'),
    ('BR015', 'Selfie Stick', 'ASR', 'NON', 120, 100000, 'Compact design'),
    ('BR016', 'USB Cable', 'ASR', 'NON', 180, 20000, 'Fast data transfer');

    -- Vouchers
    INSERT INTO barang (kode_brg, nama_brg, kode_jenis, kode_jenis_voucher, jumlah, harga, keterangan) VALUES
    ('BR017', 'Voucher 50K', 'VCR', 'VCR', 100, 50000, 'GSM Voucher'),
    ('BR018', 'Voucher 100K', 'VCR', 'VCR', 80, 100000, 'GSM Voucher'),
    ('BR019', 'Voucher 200K', 'VCR', 'VCR', 60, 200000, 'GSM Voucher'),
    ('BR020', 'Voucher 500K', 'VCR', 'VCR', 40, 500000, 'GSM Voucher'),
    ('BR021', 'Special Voucher', 'VCR', 'VCR', 20, 1000000, 'Non GSM'),
    ('BR022', 'Data Voucher 5GB', 'VCR', 'VCR', 50, 150000, 'Internet'),
    ('BR023', 'Data Voucher 10GB', 'VCR', 'VCR', 30, 250000, 'Internet'),
    ('BR024', 'Data Voucher 20GB', 'VCR', 'VCR', 20, 400000, 'Internet');

    INSERT INTO pelanggan (kode_plg, nama, alamat, telpon) VALUES
    ('PL001', 'John Doe', 'Jakarta', '081234567890'),
    ('PL002', 'Jane Smith', 'Bandung', '081234567891'),
    ('PL003', 'Alice Brown', 'Surabaya', '081234567892'),
    ('PL004', 'Bob White', 'Yogyakarta', '081234567893'),
    ('PL005', 'Charlie Black', 'Medan', '081234567894'),
    ('PL006', 'David Green', 'Bali', '081234567895'),
    ('PL007', 'Eve Blue', 'Semarang', '081234567896'),
    ('PL008', 'Frank Yellow', 'Makassar', '081234567897'),
    ('PL009', 'Grace Pink', 'Malang', '081234567898'),
    ('PL010', 'Hank Red', 'Solo', '081234567899');

    -- Nota Jual
    INSERT INTO nota_jual (no_nota, tanggal, kode_plg) VALUES
    ('N001', '2024-01-01', 'PL001'),
    ('N002', '2024-01-02', 'PL001'),
    ('N003', '2024-01-03', 'PL002'),
    ('N004', '2024-01-04', 'PL002'),
    ('N005', '2024-01-05', 'PL003'),
    ('N006', '2024-01-06', 'PL003'),
    ('N007', '2024-01-07', 'PL004'),
    ('N008', '2024-01-08', 'PL004'),
    ('N009', '2024-01-09', 'PL005'),
    ('N010', '2024-01-10', 'PL005');

    -- Detail Jual
    INSERT INTO detail_jual (no_nota, kode_brg, jumlah, harga_jual) VALUES
    ('N001', 'BR001', 1, 15000000),
    ('N001', 'BR009', 2, 100000),
    ('N002', 'BR002', 1, 12000000),
    ('N002', 'BR010', 1, 30000),
    ('N003', 'BR003', 1, 9000000),
    ('N003', 'BR011', 1, 250000),
    ('N004', 'BR004', 1, 8000000),
    ('N004', 'BR012', 1, 150000),
    ('N005', 'BR005', 1, 7000000),
    ('N005', 'BR013', 1, 300000),
    ('N006', 'BR006', 1, 13000000),
    ('N006', 'BR014', 1, 150000),
    ('N007', 'BR007', 1, 6000000),
    ('N007', 'BR015', 1, 100000),
    ('N008', 'BR008', 1, 7500000),
    ('N008', 'BR016', 1, 20000),
    ('N009', 'BR017', 1, 50000),
    ('N009', 'BR018', 1, 100000),
    ('N010', 'BR019', 1, 200000),
    ('N010', 'BR020', 1, 500000),
    ('N011', 'BR021', 1, 1000000),
    ('N011', 'BR022', 1, 150000),
    ('N012', 'BR023', 1, 250000),
    ('N012', 'BR024', 1, 400000),
    ('N013', 'BR001', 1, 15000000),
    ('N013', 'BR009', 2, 100000),
    ('N014', 'BR002', 1, 12000000),
    ('N014', 'BR010', 1, 30000),
    ('N015', 'BR003', 1, 9000000),
    ('N015', 'BR011', 1, 250000);


    