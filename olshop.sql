-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2023 pada 20.58
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `member_id`, `product_id`, `cart_qty`) VALUES
(5, 1, 8, 1),
(6, 1, 8, 1),
(13, 3, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_link`) VALUES
(1, 'BOOK', 'book'),
(2, 'MUG', 'mug'),
(3, 'BAG', 'bag'),
(4, 'TUMBLR', 'tumblr'),
(5, 'HAT', 'hat'),
(6, 'T-SHIRT', 't-shirt'),
(7, 'HOODIE', 'hoodie'),
(8, 'KORSA', 'korsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `checkout_number` varchar(15) NOT NULL,
  `checkout_total` int(11) NOT NULL,
  `checkout_delivery` int(11) NOT NULL,
  `checkout_discount` int(11) NOT NULL,
  `checkout_payment` enum('cod','transfer') NOT NULL,
  `checkout_file` varchar(100) NOT NULL,
  `checkout_status` enum('pending','checking','packing','sending','finished','canceled') NOT NULL,
  `checkout_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `member_id`, `checkout_number`, `checkout_total`, `checkout_delivery`, `checkout_discount`, `checkout_payment`, `checkout_file`, `checkout_status`, `checkout_datetime`) VALUES
(1, 1, '23010001', 230000, 15000, 23000, 'cod', '', 'sending', '2023-01-11 20:00:43'),
(2, 1, '23010002', 145000, 15000, 14500, 'cod', '', 'pending', '2023-01-11 14:03:19'),
(3, 3, '23070003', 145000, 15000, 14500, 'transfer', 'coffee-stackoverflow-code.jpg', 'finished', '2023-07-12 20:11:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout_product`
--

CREATE TABLE `checkout_product` (
  `checkout_product_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `checkout_product_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `checkout_product`
--

INSERT INTO `checkout_product` (`checkout_product_id`, `checkout_id`, `product_id`, `checkout_product_qty`) VALUES
(1, 1, 7, 1),
(2, 1, 4, 1),
(3, 2, 8, 1),
(4, 3, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `destination`
--

CREATE TABLE `destination` (
  `destination_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `destination_first_name` varchar(25) NOT NULL,
  `destination_last_name` varchar(25) NOT NULL,
  `destination_company_name` varchar(50) NOT NULL,
  `destination_country` varchar(25) NOT NULL,
  `destination_city` varchar(25) NOT NULL,
  `destination_address` text NOT NULL,
  `destination_telp` varchar(25) NOT NULL,
  `destination_mobile` varchar(25) NOT NULL,
  `destination_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destination`
--

INSERT INTO `destination` (`destination_id`, `checkout_id`, `destination_first_name`, `destination_last_name`, `destination_company_name`, `destination_country`, `destination_city`, `destination_address`, `destination_telp`, `destination_mobile`, `destination_notes`) VALUES
(1, 1, 'Zalza', 'Tes', 'MSV Studio', 'Indonesia', 'Yogyakarta', 'Bandara', '123', '123', 'Tes'),
(2, 2, 'Zalza', 'Tes', 'MSV Studio', 'Indonesia', 'Yogyakarta', 'Bandara', '', '', ''),
(3, 3, 'Test First', 'and Last', 'Test Company Name', 'Indonesia', 'Yogyakarta', 'Test Address', 'Test Telephone', 'Test Mobile', 'Test Note');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_email` varchar(25) NOT NULL,
  `member_password` varchar(100) NOT NULL,
  `member_first_name` varchar(25) NOT NULL,
  `member_last_name` varchar(25) NOT NULL,
  `member_company_name` varchar(50) NOT NULL,
  `member_country` varchar(25) NOT NULL,
  `member_city` varchar(25) NOT NULL,
  `member_address` text NOT NULL,
  `member_telp` varchar(25) NOT NULL,
  `member_mobile` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`member_id`, `member_email`, `member_password`, `member_first_name`, `member_last_name`, `member_company_name`, `member_country`, `member_city`, `member_address`, `member_telp`, `member_mobile`) VALUES
(1, 'tes@email', 'd1c056a983786a38ca76a05cda240c7b86d77136', 'Zalza', 'Tes', 'MSV Studio', 'Indonesia', 'Yogyakarta', 'Bandara', '', ''),
(2, 'rafly@email', '2fea5b462ccbac532d13d6a9ae774a6d04c833fb', '', '', '', '', '', '', '', ''),
(3, 'tes@email.com', 'd1c056a983786a38ca76a05cda240c7b86d77136', 'Test First', 'and Last', 'Test Company Name', 'Indonesia', 'Yogyakarta', 'Test Address', 'Test Telephone', 'Test Mobile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_gender` enum('','Male','Female','Unisex') NOT NULL,
  `product_overview` text NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_link` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_show` varchar(50) NOT NULL,
  `product_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_gender`, `product_overview`, `product_description`, `product_price`, `product_link`, `product_image`, `product_show`, `product_stock`) VALUES
(1, 1, 'INFORMATICS NOTEBOOK', '', '', '', 65000, 'informatics-notebook', 'img8.jpg', 'home,recommend,', 10),
(2, 2, 'INFORMATICS BLACK MUG', '', '', '', 55000, 'informatics-black-mug', 'img7.jpg', 'home,', 10),
(3, 3, 'INFORMATICS TOTEBAG', 'Unisex', '', '', 50000, 'informatics-totebag', 'img6.jpg', 'home,recommend,', 10),
(4, 4, 'INFORMATICS TUMBLR', '', '', '', 80000, 'informatics-tumblr', 'img5.jpg', 'home,', 9),
(5, 5, 'INFORMATICS HAT', 'Unisex', '', '', 45000, 'informatics-hat', 'img4.jpg', 'home,recommend,', 10),
(6, 6, 'INFORMATICS T-SHIRT', 'Unisex', '', '', 80000, 'informatics-tshirt', 'img3.jpg', 'home,', 10),
(7, 7, 'INFORMATICS HOODIE', 'Unisex', '', '', 150000, 'informatics-hoodie', 'img2.jpg', 'home,recommend,', 9),
(8, 8, 'KORSA INFORMATIKA', 'Unisex', 'Korsa adalah seragam yang digunakan untuk menunjukkan identitas kita sebagai bagian dari kelompok atau organisasi. Dalam prakteknya, korsa digunakan ketika ada acara atau kegiatan baik kegiatan internal maupun eksternal.', '<div class=\"product-long-description\"> 	<h3>Product Description</h3> 	<p><br>Spesifikasi Kemeja PDL<br></p> 	* Bahan : DRILL (Berkualitas)/American Drill-Venoza<p></p> 	<p></p>* Bahan Nyaman Dipakai Enak Dilihat<p></p> 	<p></p>* Kualitas Super dengan Harga Murah<p></p> 	<p></p>* Harga sesuai kualitas Karena Langsung di tempat Produksi langsung<p></p> 	<p></p>* siapkan format jpg/pdf : Text,Logo,dll<p></p>  	<br>Keterangan:<br> 	<p></p>P= tinggi kemeja (diukur dari kerah sampai ke bawah)<p></p> 	<p></p>L= Lebar bahu/pundak (diukur bahu ke bahu)<p></p> 	<p></p>P. Lengan = Panjang lengan (diukur dari jahitan ujung pundak ke ujung lengan)<p></p>  	<br>Size Chart<br> 	<p></p>S (Lebar: 51cm, Panjang: 69cm, Tangan: 58cm)<p></p> 	<p></p>M (Lebar: 54cm, Panjang: 72cm, Tangan: 61cm)<p></p> 	<p></p>L (Lebar: 56cm, Panjang: 75cm, Tangan: 63cm)<p></p> 	<p></p>XL (Lebar: 58cm, Panjang: 77cm, Tangan: 66cm)<p></p> 	<p></p>XXL (Lebar: 60cm, Panjang: 80cm, Tangan: 68cm)<p></p> 	<p></p>XXXL (Lebar: 62cm, Panjang: 82cm, Tangan: 71cm)<p></p>  	<p></p> </div>', 145000, 'korsa_informatika', 'img1.png', 'home,', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(50) NOT NULL,
  `slider_sale` int(11) NOT NULL,
  `slider_link` varchar(50) NOT NULL,
  `slider_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_sale`, `slider_link`, `slider_image`) VALUES
(1, 'Informatics T-shirt', 50, 'product3.html', 'slide-1.jpg'),
(2, 'Korsa Informatika', 10, 'product.html', 'slide-2.png'),
(3, 'Informatics Hoodie', 20, 'product2.html', 'slide-3.jpg'),
(4, 'Informatics Hat', 30, 'product4.html', 'slide-4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Sindi', 'sindi@email.com', 'e79af82dbbb7846153df00a790f76c8a17a60884'),
(2, 'Rafly', 'rafly@email.com', '2fea5b462ccbac532d13d6a9ae774a6d04c833fb');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indeks untuk tabel `checkout_product`
--
ALTER TABLE `checkout_product`
  ADD PRIMARY KEY (`checkout_product_id`),
  ADD KEY `checkout_id` (`checkout_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destination_id`),
  ADD KEY `checkout_id` (`checkout_id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `checkout_product`
--
ALTER TABLE `checkout_product`
  MODIFY `checkout_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `destination`
--
ALTER TABLE `destination`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `checkout_product`
--
ALTER TABLE `checkout_product`
  ADD CONSTRAINT `checkout_product_ibfk_1` FOREIGN KEY (`checkout_id`) REFERENCES `checkout` (`checkout_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `destination_ibfk_1` FOREIGN KEY (`checkout_id`) REFERENCES `checkout` (`checkout_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
