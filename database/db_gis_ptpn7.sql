-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 11:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gis_ptpn7`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bencana_alam`
--

CREATE TABLE `tbl_bencana_alam` (
  `id_bencana` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `nama_bencana` varchar(30) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `kerugian` varchar(20) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `bencana_geojson` text NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `warna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bencana_alam`
--

INSERT INTO `tbl_bencana_alam` (`id_bencana`, `tanggal`, `lokasi`, `nama_bencana`, `luas`, `kerugian`, `foto`, `bencana_geojson`, `latitude`, `longitude`, `warna`) VALUES
(6, '2022-08-04', 'Rejosari (RESA)', 'Serangan Hama', '5 ha', '20 juta', 'Bencana_1661107148.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.16559600830078,\r\n              -5.302095875308281\r\n            ],\r\n            [\r\n              105.16440510749817,\r\n              -5.301177142576937\r\n            ],\r\n            [\r\n              105.16277432441711,\r\n              -5.301113044893504\r\n            ],\r\n            [\r\n              105.16187310218811,\r\n              -5.301989045991155\r\n            ],\r\n            [\r\n              105.16267776489258,\r\n              -5.303847873471403\r\n            ],\r\n            [\r\n              105.16619682312012,\r\n              -5.303591483806935\r\n            ],\r\n            [\r\n              105.16559600830078,\r\n              -5.302095875308281\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '-5.302459094848241', '105.16390085220337', '#e9590c'),
(7, '2022-08-11', 'Bekri (BEKI)', 'Kebakaran', '5 ha', '2 M', 'Bencana_1661230684.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.12001991271971,\r\n              -5.074273000624295\r\n            ],\r\n            [\r\n              105.1365852355957,\r\n              -5.072563112204165\r\n            ],\r\n            [\r\n              105.13701438903809,\r\n              -5.067091438828586\r\n            ],\r\n            [\r\n              105.13847351074219,\r\n              -5.065381531394476\r\n            ],\r\n            [\r\n              105.14001846313477,\r\n              -5.064954053829144\r\n            ],\r\n            [\r\n              105.14164924621582,\r\n              -5.056575436511217\r\n            ],\r\n            [\r\n              105.13958930969238,\r\n              -5.052471584381152\r\n            ],\r\n            [\r\n              105.13521194458008,\r\n              -5.053668543937881\r\n            ],\r\n            [\r\n              105.1197624206543,\r\n              -5.061106743023463\r\n            ],\r\n            [\r\n              105.12001991271971,\r\n              -5.074273000624295\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '-5.064679043765075', '105.12884450569044', '#927d11'),
(8, '2022-08-11', 'Rejosari (RESA)', 'Serangan Hama', '350 m', '35 juta', 'Bencana_1663777893.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.15894412994385,\r\n              -5.292630726118223\r\n            ],\r\n            [\r\n              105.15851497650146,\r\n              -5.29288712033124\r\n            ],\r\n            [\r\n              105.15847206115721,\r\n              -5.293485373081561\r\n            ],\r\n            [\r\n              105.15890121459961,\r\n              -5.293955428407947\r\n            ],\r\n            [\r\n              105.15950202941895,\r\n              -5.293998160692623\r\n            ],\r\n            [\r\n              105.1596736907959,\r\n              -5.293656302332503\r\n            ],\r\n            [\r\n              105.15950202941895,\r\n              -5.2930153173978844\r\n            ],\r\n            [\r\n              105.15894412994385,\r\n              -5.292630726118223\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '-5.2933464930303895', '105.15904605388641', '#d537d7'),
(9, '2022-09-09', 'Rejosari (RESA)', 'Banjir', '200 m', '15 juta', 'Bencana_1663777989.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.15531778335571,\r\n              -5.300536165443214\r\n            ],\r\n            [\r\n              105.15452384948729,\r\n              -5.300279774403449\r\n            ],\r\n            [\r\n              105.15403032302856,\r\n              -5.300279774403449\r\n            ],\r\n            [\r\n              105.15415906906128,\r\n              -5.30109167899755\r\n            ],\r\n            [\r\n              105.15510320663452,\r\n              -5.302608655773172\r\n            ],\r\n            [\r\n              105.15548944473267,\r\n              -5.30205314358365\r\n            ],\r\n            [\r\n              105.15600442886353,\r\n              -5.302224070464442\r\n            ],\r\n            [\r\n              105.15643358230591,\r\n              -5.301967680125518\r\n            ],\r\n            [\r\n              105.15701293945312,\r\n              -5.301711289680123\r\n            ],\r\n            [\r\n              105.1570987701416,\r\n              -5.30109167899755\r\n            ],\r\n            [\r\n              105.15679836273193,\r\n              -5.300536165443214\r\n            ],\r\n            [\r\n              105.15600442886353,\r\n              -5.300578897272817\r\n            ],\r\n            [\r\n              105.15531778335571,\r\n              -5.300536165443214\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '-5.301283972034542', '105.15561819076538', '#3ebe2d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jalan`
--

CREATE TABLE `tbl_jalan` (
  `id_jalan` int(11) NOT NULL,
  `nama_jalan` varchar(30) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `panjang` varchar(15) NOT NULL,
  `lebar` varchar(15) NOT NULL,
  `jalan_geojson` text NOT NULL,
  `ketebalan` varchar(2) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `foto` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jalan`
--

INSERT INTO `tbl_jalan` (`id_jalan`, `nama_jalan`, `lokasi`, `kondisi`, `panjang`, `lebar`, `jalan_geojson`, `ketebalan`, `latitude`, `longitude`, `warna`, `foto`) VALUES
(5, 'Jalan Masuk dan Keluar Kebun', 'Rejosari (RESA)', 'Baik', '1.9 km', '5m', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"LineString\",\r\n        \"coordinates\": [\r\n          [\r\n            105.15443801879883,\r\n            -5.301518996776204\r\n          ],\r\n          [\r\n            105.15649795532225,\r\n            -5.300578897272817\r\n          ],\r\n          [\r\n            105.15671253204346,\r\n            -5.299040549544148\r\n          ],\r\n          [\r\n            105.15632629394531,\r\n            -5.298057714267358\r\n          ],\r\n          [\r\n            105.15585422515868,\r\n            -5.296092039023835\r\n          ],\r\n          [\r\n            105.15645503997803,\r\n            -5.295237395663608\r\n          ],\r\n          [\r\n            105.15782833099364,\r\n            -5.29451094787842\r\n          ],\r\n          [\r\n            105.15907287597656,\r\n            -5.294083625253122\r\n          ],\r\n          [\r\n            105.16031742095947,\r\n            -5.2939126961203185\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '4', '-5.296177503294865', '105.1559829711914', '#10d5c8', 'Jalan_Masuk_dan_Keluar_Kebun_1663773456.jpg'),
(6, 'Jalan Akses Kebun', 'Bekri (BEKI)', 'Baik', '2 km', '5m', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"LineString\",\r\n        \"coordinates\": [\r\n          [\r\n            105.11984825134277,\r\n            -5.074273000624295\r\n          ],\r\n          [\r\n            105.1197624206543,\r\n            -5.061277735100792\r\n          ],\r\n          [\r\n            105.13521194458008,\r\n            -5.053668543937881\r\n          ],\r\n          [\r\n            105.14036178588867,\r\n            -5.05230058997829\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '4', '-5.061277735100792', '105.1197624206543', '#c20aa0', 'Jalan_Akses_Kebun_1661230777.jpg'),
(7, 'Jalan Masuk dan Keluar Kebun', 'Rejosari (RESA)', 'Baik', '2 km', '5m', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"LineString\",\r\n        \"coordinates\": [\r\n          [\r\n            105.16572475433348,\r\n            -5.2970748774271605\r\n          ],\r\n          [\r\n            105.16375064849852,\r\n            -5.297374001848359\r\n          ],\r\n          [\r\n            105.16160488128662,\r\n            -5.297844054217695\r\n          ],\r\n          [\r\n            105.16130447387695,\r\n            -5.298955085669109\r\n          ],\r\n          [\r\n            105.16044616699217,\r\n            -5.298826889834371\r\n          ],\r\n          [\r\n            105.16036033630371,\r\n            -5.3001515788436375\r\n          ],\r\n          [\r\n            105.15958786010742,\r\n            -5.301262606144492\r\n          ],\r\n          [\r\n            105.15928745269775,\r\n            -5.302758216661856\r\n          ],\r\n          [\r\n            105.15787124633789,\r\n            -5.303783776065276\r\n          ],\r\n          [\r\n            105.15594005584717,\r\n            -5.303826507670103\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '4', '-5.299724260118806', '105.1605749130249', '#1ce10e', 'Jalan_Masuk_dan_Keluar_Kebun_1661106682.jpg'),
(8, 'Jalan Masuk Perkebunan', 'Rejosari (RESA)', 'Baik', '678 m', '5m', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"LineString\",\r\n        \"coordinates\": [\r\n          [\r\n            105.16744136810303,\r\n            -5.303612849616365\r\n          ],\r\n          [\r\n            105.16735553741454,\r\n            -5.30267275330133\r\n          ],\r\n          [\r\n            105.16671180725096,\r\n            -5.302245436321211\r\n          ],\r\n          [\r\n            105.16559600830078,\r\n            -5.302245436321211\r\n          ],\r\n          [\r\n            105.16456604003906,\r\n            -5.3017326555546385\r\n          ],\r\n          [\r\n            105.16362190246582,\r\n            -5.301219874362203\r\n          ],\r\n          [\r\n            105.1622486114502,\r\n            -5.300963483606283\r\n          ],\r\n          [\r\n            105.16078948974608,\r\n            -5.300621629099481\r\n          ],\r\n          [\r\n            105.16031742095947,\r\n            -5.2999379195181735\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '4', '-5.301647192052132', '105.16396522521973', '#5b1dcd', 'Jalan_Masuk_Perkebunan_1663773599.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panen`
--

CREATE TABLE `tbl_panen` (
  `id_panen` int(11) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_tandan` varchar(20) NOT NULL,
  `berat_kotor` varchar(20) NOT NULL,
  `tara_kotor` varchar(20) NOT NULL,
  `berat_bersih` varchar(20) NOT NULL,
  `tahun_tanam` varchar(5) NOT NULL,
  `total_panen` varchar(20) NOT NULL,
  `panen_geojson` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `warna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_panen`
--

INSERT INTO `tbl_panen` (`id_panen`, `lokasi`, `tanggal`, `jumlah_tandan`, `berat_kotor`, `tara_kotor`, `berat_bersih`, `tahun_tanam`, `total_panen`, `panen_geojson`, `foto`, `latitude`, `longitude`, `warna`) VALUES
(5, 'Rejosari (RESA)', '2022-08-01', '167,345', '1,6 ton', '464 kg', '1,5 ton', '2022', '1,6 ton', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.15377283096313,\r\n              -5.296006574740986\r\n            ],\r\n            [\r\n              105.1539659500122,\r\n              -5.300536165443214\r\n            ],\r\n            [\r\n              105.15544652938843,\r\n              -5.299831089827726\r\n            ],\r\n            [\r\n              105.15531778335571,\r\n              -5.299232843219757\r\n            ],\r\n            [\r\n              105.15626192092896,\r\n              -5.298634596032405\r\n            ],\r\n            [\r\n              105.15669107437134,\r\n              -5.298976451638979\r\n            ],\r\n            [\r\n              105.15722751617432,\r\n              -5.297886786233538\r\n            ],\r\n            [\r\n              105.15707731246948,\r\n              -5.296903949121466\r\n            ],\r\n            [\r\n              105.15769958496094,\r\n              -5.296305699679254\r\n            ],\r\n            [\r\n              105.15868663787842,\r\n              -5.2962843336170335\r\n            ],\r\n            [\r\n              105.15948057174681,\r\n              -5.29547242270546\r\n            ],\r\n            [\r\n              105.16018867492676,\r\n              -5.294874171877721\r\n            ],\r\n            [\r\n              105.16048908233643,\r\n              -5.294211822071721\r\n            ],\r\n            [\r\n              105.15926599502563,\r\n              -5.2921179373733445\r\n            ],\r\n            [\r\n              105.15377283096313,\r\n              -5.296006574740986\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', 'Panen_1661106199.jpg', '-5.295451056614437', '105.15673398971558', '#77ec18'),
(7, 'Bekri (BEKI)', '2022-08-18', '300', '35', '34', '33', '2018', '400', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.10465621948242,\r\n              -5.0462302594577\r\n            ],\r\n            [\r\n              105.10311126708984,\r\n              -5.057943381442523\r\n            ],\r\n            [\r\n              105.10293960571289,\r\n              -5.0636716194371605\r\n            ],\r\n            [\r\n              105.10233879089355,\r\n              -5.067689905361645\r\n            ],\r\n            [\r\n              105.10190963745116,\r\n              -5.069741786408922\r\n            ],\r\n            [\r\n              105.10190963745116,\r\n              -5.075811896328389\r\n            ],\r\n            [\r\n              105.11444091796874,\r\n              -5.074614977764634\r\n            ],\r\n            [\r\n              105.11521339416504,\r\n              -5.062816661762764\r\n            ],\r\n            [\r\n              105.11289596557617,\r\n              -5.057857884969001\r\n            ],\r\n            [\r\n              105.1164150238037,\r\n              -5.051531114607066\r\n            ],\r\n            [\r\n              105.11615753173828,\r\n              -5.046743247333253\r\n            ],\r\n            [\r\n              105.11581420898438,\r\n              -5.043408818893744\r\n            ],\r\n            [\r\n              105.10465621948242,\r\n              -5.0462302594577\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', 'Panen_1661229774.jpg', '-5.057857884969001', '105.11289596557617', '#16dfbd'),
(9, 'Rejosari (RESA)', '2022-09-01', '170,458', '1,8 ton', '678 kg', '1,6 ton', '2018', '1,9 ton', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.15400886535645,\r\n              -5.300493433610647\r\n            ],\r\n            [\r\n              105.15422344207762,\r\n              -5.301262606144492\r\n            ],\r\n            [\r\n              105.15658378601074,\r\n              -5.304681139145348\r\n            ],\r\n            [\r\n              105.15714168548583,\r\n              -5.304937528357121\r\n            ],\r\n            [\r\n              105.15902996063232,\r\n              -5.304809333764554\r\n            ],\r\n            [\r\n              105.16104698181152,\r\n              -5.304467481387503\r\n            ],\r\n            [\r\n              105.16254901885986,\r\n              -5.303741044457485\r\n            ],\r\n            [\r\n              105.16031742095947,\r\n              -5.302587289928972\r\n            ],\r\n            [\r\n              105.15997409820557,\r\n              -5.301689923804868\r\n            ],\r\n            [\r\n              105.15975952148438,\r\n              -5.3006643609231805\r\n            ],\r\n            [\r\n              105.15881538391112,\r\n              -5.300279774403449\r\n            ],\r\n            [\r\n              105.15752792358398,\r\n              -5.300023383257236\r\n            ],\r\n            [\r\n              105.15718460083006,\r\n              -5.29955333254609\r\n            ],\r\n            [\r\n              105.15684127807616,\r\n              -5.298955085669109\r\n            ],\r\n            [\r\n              105.15619754791258,\r\n              -5.298741425929766\r\n            ],\r\n            [\r\n              105.15538215637207,\r\n              -5.299296941098323\r\n            ],\r\n            [\r\n              105.15551090240477,\r\n              -5.299980651389174\r\n            ],\r\n            [\r\n              105.15400886535645,\r\n              -5.300493433610647\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', 'Panen_1663129415.jpg', '-5.301989045991155', '105.15748500823973', '#d72d2d'),
(10, 'Rejosari (RESA)', '2022-10-01', '98,345', '890 kg', '90 kg', '800', '2019', '900  kg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.16048908233643,\r\n              -5.294233188205579\r\n            ],\r\n            [\r\n              105.16027450561523,\r\n              -5.294895537988681\r\n            ],\r\n            [\r\n              105.15870809555054,\r\n              -5.2962843336170335\r\n            ],\r\n            [\r\n              105.15761375427246,\r\n              -5.2962843336170335\r\n            ],\r\n            [\r\n              105.1570987701416,\r\n              -5.296839850994639\r\n            ],\r\n            [\r\n              105.15729188919067,\r\n              -5.29790815224034\r\n            ],\r\n            [\r\n              105.15862226486206,\r\n              -5.298228642253902\r\n            ],\r\n            [\r\n              105.16091823577881,\r\n              -5.298100446268431\r\n            ],\r\n            [\r\n              105.16194820404053,\r\n              -5.2972778547287644\r\n            ],\r\n            [\r\n              105.16270995140076,\r\n              -5.296369797861474\r\n            ],\r\n            [\r\n              105.16299962997437,\r\n              -5.295664717491426\r\n            ],\r\n            [\r\n              105.1632571220398,\r\n              -5.295045100744719\r\n            ],\r\n            [\r\n              105.16220569610596,\r\n              -5.29451094787842\r\n            ],\r\n            [\r\n              105.16048908233643,\r\n              -5.294233188205579\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', 'Panen_1663129733.jpg', '-5.296444579065664', '105.16046762466429', '#325f9a'),
(13, 'Bekri (BEKI)', '2022-10-06', '454', '454', '454', '454', '2019', '2323', 'tes', 'Panen_1666190167.jpg', '-0.06707666772234068', '105.25846481323241', '#932525');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemeliharaan`
--

CREATE TABLE `tbl_pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pemeliharaan` varchar(30) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `jumlah_tenaga_kerja` varchar(10) NOT NULL,
  `pemeliharaan_geojson` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `warna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemeliharaan`
--

INSERT INTO `tbl_pemeliharaan` (`id_pemeliharaan`, `lokasi`, `tanggal`, `nama_pemeliharaan`, `luas`, `jumlah_tenaga_kerja`, `pemeliharaan_geojson`, `foto`, `latitude`, `longitude`, `warna`) VALUES
(4, 'Rejosari (RESA)', '2022-08-02', 'Pengendalian Gulma', '5 ha', '250', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.17050981521606,\r\n              -5.303420557304781\r\n            ],\r\n            [\r\n              105.17031669616698,\r\n              -5.302651387459345\r\n            ],\r\n            [\r\n              105.1693296432495,\r\n              -5.30109167899755\r\n            ],\r\n            [\r\n              105.16877174377441,\r\n              -5.300066115122322\r\n            ],\r\n            [\r\n              105.16767740249632,\r\n              -5.298463668158172\r\n            ],\r\n            [\r\n              105.16684055328369,\r\n              -5.298741425929766\r\n            ],\r\n            [\r\n              105.16619682312012,\r\n              -5.297844054217695\r\n            ],\r\n            [\r\n              105.16598224639893,\r\n              -5.298356838212771\r\n            ],\r\n            [\r\n              105.16548871994019,\r\n              -5.298826889834371\r\n            ],\r\n            [\r\n              105.16557455062866,\r\n              -5.299638796338358\r\n            ],\r\n            [\r\n              105.16572475433348,\r\n              -5.300279774403449\r\n            ],\r\n            [\r\n              105.16578912734985,\r\n              -5.301177142576937\r\n            ],\r\n            [\r\n              105.16553163528442,\r\n              -5.301625826174664\r\n            ],\r\n            [\r\n              105.16583204269409,\r\n              -5.3022027046069224\r\n            ],\r\n            [\r\n              105.16623973846436,\r\n              -5.30263002161662\r\n            ],\r\n            [\r\n              105.16613245010376,\r\n              -5.303655581233036\r\n            ],\r\n            [\r\n              105.17050981521606,\r\n              -5.303420557304781\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', 'Pemeliharaan_1661106391.jpg', '-5.301006215406332', '105.16759157180786', '#f5d924'),
(5, 'Bekri (BEKI)', '2022-08-04', 'Kastrasi', '5 ha', '344', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.11650085449219,\r\n              -5.051787606498976\r\n            ],\r\n            [\r\n              105.11306762695312,\r\n              -5.057857884969001\r\n            ],\r\n            [\r\n              105.11529922485352,\r\n              -5.062389182501725\r\n            ],\r\n            [\r\n              105.12843132019043,\r\n              -5.055634972694552\r\n            ],\r\n            [\r\n              105.14053344726562,\r\n              -5.05289907019094\r\n            ],\r\n            [\r\n              105.1307487487793,\r\n              -5.046828745273087\r\n            ],\r\n            [\r\n              105.11650085449219,\r\n              -5.051787606498976\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', 'Pemeliharaan_1661230884.jpg', '-5.060404250710668', '105.12352300345343', '#197b79'),
(6, 'Rejosari (RESA)', '2022-09-02', 'Pemupukan', '4 ha', '156', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.16570329666136,\r\n              -5.297117609496196\r\n            ],\r\n            [\r\n              105.16482353210449,\r\n              -5.295429690522688\r\n            ],\r\n            [\r\n              105.16405105590819,\r\n              -5.2951946634645894\r\n            ],\r\n            [\r\n              105.16378283500671,\r\n              -5.295344226148265\r\n            ],\r\n            [\r\n              105.16323566436768,\r\n              -5.295985208668423\r\n            ],\r\n            [\r\n              105.16239881515503,\r\n              -5.29706419440944\r\n            ],\r\n            [\r\n              105.16213059425354,\r\n              -5.297683809131953\r\n            ],\r\n            [\r\n              105.16151905059814,\r\n              -5.298207276258169\r\n            ],\r\n            [\r\n              105.16263484954834,\r\n              -5.299660162284576\r\n            ],\r\n            [\r\n              105.1634931564331,\r\n              -5.300066115122322\r\n            ],\r\n            [\r\n              105.164737701416,\r\n              -5.2995746984952605\r\n            ],\r\n            [\r\n              105.16525268554688,\r\n              -5.299126013407367\r\n            ],\r\n            [\r\n              105.16531705856323,\r\n              -5.298164544264488\r\n            ],\r\n            [\r\n              105.16570329666136,\r\n              -5.297117609496196\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', 'Pemeliharaan_1663772587.jpg', '-5.297683809131953', '105.16381502151489', '#17cf7f'),
(7, 'Rejosari (RESA)', '2022-10-03', 'Sensus Tanaman', '3 ha', '45', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.16227006912231,\r\n              -5.3038051418680645\r\n            ],\r\n            [\r\n              105.16606807708739,\r\n              -5.303655581233036\r\n            ],\r\n            [\r\n              105.1649522781372,\r\n              -5.30277958250014\r\n            ],\r\n            [\r\n              105.16355752944946,\r\n              -5.301647192052132\r\n            ],\r\n            [\r\n              105.16355752944946,\r\n              -5.300536165443214\r\n            ],\r\n            [\r\n              105.16207695007323,\r\n              -5.299211477258755\r\n            ],\r\n            [\r\n              105.16113281249999,\r\n              -5.298164544264488\r\n            ],\r\n            [\r\n              105.16076803207396,\r\n              -5.299126013407367\r\n            ],\r\n            [\r\n              105.16021013259888,\r\n              -5.299425136835508\r\n            ],\r\n            [\r\n              105.16083240509033,\r\n              -5.300856654093234\r\n            ],\r\n            [\r\n              105.16100406646729,\r\n              -5.300942117705164\r\n            ],\r\n            [\r\n              105.16154050827026,\r\n              -5.302843680010564\r\n            ],\r\n            [\r\n              105.16227006912231,\r\n              -5.3038051418680645\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', 'Pemeliharaan_1663772679.jpg', '-5.301283972034542', '105.16231298446655', '#17bdd3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pencurian`
--

CREATE TABLE `tbl_pencurian` (
  `id_pencurian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `objek` varchar(25) NOT NULL,
  `kerugian` varchar(20) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pencurian`
--

INSERT INTO `tbl_pencurian` (`id_pencurian`, `tanggal`, `jumlah`, `objek`, `kerugian`, `lokasi`, `foto`, `latitude`, `longitude`) VALUES
(4, '2022-08-03', '20', 'Buah', '20 juta', 'Rejosari (RESA)', 'Pencurian_1661106992.jpg', '-5.301348069700228', '105.16117572784424'),
(5, '2022-08-06', '34', 'Buah', '21 juta', 'Bekri (BEKI)', 'Pencurian_1661230315.jpg', '-5.063140121584796', '105.11837316195424'),
(6, '2022-09-08', '45', 'Bibit', '21 juta', 'Rejosari (RESA)', 'Pencurian_1663777556.jpg', '-5.29342127460028', '105.158793926239'),
(7, '2022-09-23', '36', 'Buah', '15 juta', 'Rejosari (RESA)', 'Pencurian_1663777659.jpg', '-5.299403770881159', '105.15527486801147');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(25) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `nama_kepala_unit` varchar(30) NOT NULL,
  `luas_tm` varchar(20) NOT NULL,
  `luas_tbm` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `unit_geojson` text NOT NULL,
  `warna` varchar(10) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id_unit`, `nama_unit`, `luas`, `nama_kepala_unit`, `luas_tm`, `luas_tbm`, `alamat`, `foto`, `unit_geojson`, `warna`, `latitude`, `longitude`) VALUES
(26, 'Rejosari (RESA)', '465,67 ha', 'Bambang Supratno', '387,45', '78,22', 'Rejosari Kec. Natar Kabupaten Lampung Selatan Lampung.', 'Rejosari_(RESA)_1661106032.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.17070293426514,\r\n              -5.303270996576561\r\n            ],\r\n            [\r\n              105.1677417755127,\r\n              -5.298613230050703\r\n            ],\r\n            [\r\n              105.16688346862793,\r\n              -5.298912353727144\r\n            ],\r\n            [\r\n              105.1649522781372,\r\n              -5.295451056614437\r\n            ],\r\n            [\r\n              105.16048908233643,\r\n              -5.294254554338688\r\n            ],\r\n            [\r\n              105.15928745269775,\r\n              -5.2921179373733445\r\n            ],\r\n            [\r\n              105.15375137329102,\r\n              -5.296006574740986\r\n            ],\r\n            [\r\n              105.1539659500122,\r\n              -5.300578897272817\r\n            ],\r\n            [\r\n              105.15559673309326,\r\n              -5.303527386374168\r\n            ],\r\n            [\r\n              105.15739917755127,\r\n              -5.305151185952224\r\n            ],\r\n            [\r\n              105.16164779663086,\r\n              -5.304510212944978\r\n            ],\r\n            [\r\n              105.16237735748291,\r\n              -5.303869239271978\r\n            ],\r\n            [\r\n              105.17070293426514,\r\n              -5.303270996576561\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#2070c5', '-5.299425136835508', '105.1605749130249'),
(28, 'Bekri (BEKI)', '570,9 ha', 'Hadi Wibowo', '567 ', '3', 'Bekri, Kec. Bekri, Kabupaten Lampung Tengah, Lampung', 'Bekri_(BEKI)_1661229558.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.10457038879393,\r\n              -5.0462302594577\r\n            ],\r\n            [\r\n              105.10311126708984,\r\n              -5.058541856441048\r\n            ],\r\n            [\r\n              105.10293960571289,\r\n              -5.063842610836396\r\n            ],\r\n            [\r\n              105.10199546813965,\r\n              -5.069741786408922\r\n            ],\r\n            [\r\n              105.10190963745116,\r\n              -5.075811896328389\r\n            ],\r\n            [\r\n              105.13572692871094,\r\n              -5.072648606732766\r\n            ],\r\n            [\r\n              105.13710021972655,\r\n              -5.067262429323169\r\n            ],\r\n            [\r\n              105.1380443572998,\r\n              -5.065552522341462\r\n            ],\r\n            [\r\n              105.13958930969238,\r\n              -5.065210540402264\r\n            ],\r\n            [\r\n              105.14070510864256,\r\n              -5.0553784823257075\r\n            ],\r\n            [\r\n              105.14070510864256,\r\n              -5.050248653625149\r\n            ],\r\n            [\r\n              105.1270580291748,\r\n              -5.043836310676614\r\n            ],\r\n            [\r\n              105.1168441772461,\r\n              -5.04323782210179\r\n            ],\r\n            [\r\n              105.10457038879393,\r\n              -5.0462302594577\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#bc2020', '-5.061943179563751', '105.11837316195424'),
(32, 'Betung Krawo (BEKA)', '778,5 ha', 'Aji Saputra', '567 ', '45', 'Betung Krawo, Kec. Betung, Kab. Banyuasin, Sumatera Selatan', 'Betung_Krawo_(BEKA)_1663780180.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              104.2227029800415,\r\n              -2.7891247254997653\r\n            ],\r\n            [\r\n              104.23476219177245,\r\n              -2.789038996483931\r\n            ],\r\n            [\r\n              104.23429012298584,\r\n              -2.779137253161621\r\n            ],\r\n            [\r\n              104.22914028167725,\r\n              -2.7767368180170613\r\n            ],\r\n            [\r\n              104.2268657684326,\r\n              -2.778794334154044\r\n            ],\r\n            [\r\n              104.22613620758057,\r\n              -2.7775941168431295\r\n            ],\r\n            [\r\n              104.21957015991211,\r\n              -2.7780227660228\r\n            ],\r\n            [\r\n              104.21879768371582,\r\n              -2.783509461770816\r\n            ],\r\n            [\r\n              104.2188835144043,\r\n              -2.786810039879333\r\n            ],\r\n            [\r\n              104.2197847366333,\r\n              -2.788738944879288\r\n            ],\r\n            [\r\n              104.2227029800415,\r\n              -2.7891247254997653\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#c723b2', '-2.783509461770816', '104.22665119171143'),
(34, 'Senabing (SENA)', '564,9 ha', 'Hari Darmawan', '533', '76', 'Senabing, Kec. Lahat, Kab. Lahat, Sumatera Selatan', 'Senabing_(SENA)_1663780058.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              103.59141826629639,\r\n              -3.706071201053863\r\n            ],\r\n            [\r\n              103.59068870544434,\r\n              -3.6983625597430554\r\n            ],\r\n            [\r\n              103.57686996459961,\r\n              -3.691510377849492\r\n            ],\r\n            [\r\n              103.57167720794678,\r\n              -3.6976773439357045\r\n            ],\r\n            [\r\n              103.57154846191406,\r\n              -3.7023025403530525\r\n            ],\r\n            [\r\n              103.57433795928955,\r\n              -3.7063281546080433\r\n            ],\r\n            [\r\n              103.57918739318848,\r\n              -3.710439401319353\r\n            ],\r\n            [\r\n              103.58086109161377,\r\n              -3.712537842788549\r\n            ],\r\n            [\r\n              103.5822343826294,\r\n              -3.7130945713210206\r\n            ],\r\n            [\r\n              103.58575344085693,\r\n              -3.710439401319353\r\n            ],\r\n            [\r\n              103.58708381652832,\r\n              -3.70885486058064\r\n            ],\r\n            [\r\n              103.58712673187256,\r\n              -3.707698572302819\r\n            ],\r\n            [\r\n              103.58957290649413,\r\n              -3.7072703170013357\r\n            ],\r\n            [\r\n              103.59141826629639,\r\n              -3.706071201053863\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#18cda9', '-3.702645146534375', '103.58176231384277'),
(35, 'Sungai Lengi (SULI)', '750,8 ha', 'Tobias Martin', '670', '57', 'Sungai Lengi, Kec. Gunung Megang, Kab. Muara Enim, Sumatera Selatan', 'Sungai_Lengi_(SULI)_1663779936.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              103.82612228393555,\r\n              -3.542719508009539\r\n            ],\r\n            [\r\n              103.82801055908202,\r\n              -3.552828119375588\r\n            ],\r\n            [\r\n              103.83792400360107,\r\n              -3.554841261817068\r\n            ],\r\n            [\r\n              103.84277343749999,\r\n              -3.5508578054994415\r\n            ],\r\n            [\r\n              103.84740829467772,\r\n              -3.550215310934988\r\n            ],\r\n            [\r\n              103.84989738464355,\r\n              -3.544175840191053\r\n            ],\r\n            [\r\n              103.84191513061523,\r\n              -3.5394213354807444\r\n            ],\r\n            [\r\n              103.83431911468506,\r\n              -3.537622327332887\r\n            ],\r\n            [\r\n              103.82612228393555,\r\n              -3.542719508009539\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#40a216', '-3.546060501963652', '103.8367223739624'),
(36, 'Talo Pino (TAPI)', '478,4', 'Syahrul Ramdana', '432', '50', 'Talo Pino, Kec. Semidang Alas Maras, Kab. Seluma, Bengkulu', 'Talo_Pino_(TAPI)_1663779570.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              102.78272997897835,\r\n              -4.119976184065962\r\n            ],\r\n            [\r\n              102.77434290985468,\r\n              -4.120238443238719\r\n            ],\r\n            [\r\n              102.77072764980954,\r\n              -4.124874607800635\r\n            ],\r\n            [\r\n              102.77119256680038,\r\n              -4.130770463069695\r\n            ],\r\n            [\r\n              102.77076127134825,\r\n              -4.132655629110488\r\n            ],\r\n            [\r\n              102.77325752233355,\r\n              -4.1337717278193225\r\n            ],\r\n            [\r\n              102.77687278237732,\r\n              -4.134630264215076\r\n            ],\r\n            [\r\n              102.78304097039438,\r\n              -4.140581159436948\r\n            ],\r\n            [\r\n              102.78858325715237,\r\n              -4.144186975052904\r\n            ],\r\n            [\r\n              102.79787964012542,\r\n              -4.143156743698057\r\n            ],\r\n            [\r\n              102.80295821971578,\r\n              -4.136374353793414\r\n            ],\r\n            [\r\n              102.80175313303312,\r\n              -4.129162635015703\r\n            ],\r\n            [\r\n              102.79856826108823,\r\n              -4.12306696446457\r\n            ],\r\n            [\r\n              102.79150989623332,\r\n              -4.117400524559244\r\n            ],\r\n            [\r\n              102.7857426956848,\r\n              -4.118173223286107\r\n            ],\r\n            [\r\n              102.78272997897835,\r\n              -4.119976184065962\r\n            ]\r\n          ]\r\n        ],\r\n        \"type\": \"Polygon\"\r\n      }\r\n    }\r\n  ]\r\n}', '#bb9716', ' -4.130111724114457', '102.7886471892204'),
(37, 'Padang Ratu (PATU)', '564,5 ha', 'Rafa Sofyan', '505,5', '60 ', 'Padang Ratu, Kec. Padang Ratu, Kab. Lampung Tengah, Lampung', 'Padang_Ratu_(PATU)_1663778688.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              104.9911880493164,\r\n              -5.036568912101656\r\n            ],\r\n            [\r\n              104.97736930847168,\r\n              -5.038791889707319\r\n            ],\r\n            [\r\n              104.96758460998535,\r\n              -5.0503341511028745\r\n            ],\r\n            [\r\n              104.96732711791992,\r\n              -5.062474678376528\r\n            ],\r\n            [\r\n              104.97307777404785,\r\n              -5.066834953001879\r\n            ],\r\n            [\r\n              104.97668266296387,\r\n              -5.0688868367646505\r\n            ],\r\n            [\r\n              104.98852729797363,\r\n              -5.063842610836396\r\n            ],\r\n            [\r\n              104.99359130859375,\r\n              -5.05743040243199\r\n            ],\r\n            [\r\n              105.00432014465332,\r\n              -5.050847135732442\r\n            ],\r\n            [\r\n              105.00320434570312,\r\n              -5.0430668252647735\r\n            ],\r\n            [\r\n              104.99942779541016,\r\n              -5.0373384052101216\r\n            ],\r\n            [\r\n              104.9911880493164,\r\n              -5.036568912101656\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#8b236a', ' -5.051274622613645', ' 104.98389244079588'),
(38, 'Bentayan (BETA)', '548,3 ha', 'Irwan Andika', '512', '34', 'Bentayan, Kec. Tungkal Ilir, Kab. Banyuasin, Sumatera Selatan', 'Bentayan_(BETA)_1663779278.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              104.19521570205688,\r\n              -2.456879741188753\r\n            ],\r\n            [\r\n              104.20021533966063,\r\n              -2.4565796098900203\r\n            ],\r\n            [\r\n              104.20392751693726,\r\n              -2.4508771024079143\r\n            ],\r\n            [\r\n              104.20233964920044,\r\n              -2.448090153820217\r\n            ],\r\n            [\r\n              104.197940826416,\r\n              -2.447811458642571\r\n            ],\r\n            [\r\n              104.19255495071411,\r\n              -2.447961525283889\r\n            ],\r\n            [\r\n              104.19083833694458,\r\n              -2.4509414165376224\r\n            ],\r\n            [\r\n              104.19083833694458,\r\n              -2.4542643090331917\r\n            ],\r\n            [\r\n              104.19240474700928,\r\n              -2.456558171937519\r\n            ],\r\n            [\r\n              104.19521570205688,\r\n              -2.456879741188753\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#9f4832', '-2.4522276984827736', '104.19663190841673'),
(39, 'Betung (BETU)', '650,8 ha', 'Ahmad Putra', '634', '24', 'Betung, Kec. Betung, Kab. Banyuasin, Sumatera Selatan', 'Betung_(BETU)_1663778959.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              104.19738292694092,\r\n              -2.840046649899142\r\n            ],\r\n            [\r\n              104.20210361480713,\r\n              -2.8429184427699283\r\n            ],\r\n            [\r\n              104.20454978942871,\r\n              -2.840775314438223\r\n            ],\r\n            [\r\n              104.20841217041016,\r\n              -2.8373034381004527\r\n            ],\r\n            [\r\n              104.2111587524414,\r\n              -2.831945583789586\r\n            ],\r\n            [\r\n              104.20377731323242,\r\n              -2.8236301448344374\r\n            ],\r\n            [\r\n              104.18871402740477,\r\n              -2.8246588621619\r\n            ],\r\n            [\r\n              104.18549537658691,\r\n              -2.8302739281697464\r\n            ],\r\n            [\r\n              104.18678283691406,\r\n              -2.8393608475600662\r\n            ],\r\n            [\r\n              104.19738292694092,\r\n              -2.840046649899142\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#262cc9', '-2.831945583789586', '104.19755458831787'),
(43, 'Unit Baru', '3', 'Eko Win Kenali', '500', '3', 'Balam', 'Unit_Baru_1666668920.jpg', '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[104.99341964721678,-5.057515898961974],[105.00449180603027,-5.050761638322361],[105.00354766845703,-5.0455462749927555],[105.00140190124512,-5.045888267315346],[104.99668121337889,-5.048025715247532],[104.99290466308594,-5.049137185388834],[104.9919605255127,-5.05289907019094],[104.99341964721678,-5.057515898961974]]]}}]}', '#872626', '-5.049137185388834', '104.99290466308594'),
(44, 'Unit Baru Lagi', '3', 'Tri Sandhika Jaya', '4', '50', 'Balam', 'Unit_Baru_Lagi_1666679507.jpg', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              102.78838942306243,\r\n              -4.129133273612723\r\n            ],\r\n            [\r\n              102.78719274462372,\r\n              -4.129643254306799\r\n            ],\r\n            [\r\n              102.78729065467792,\r\n              -4.130804272962052\r\n            ],\r\n            [\r\n              102.78865051654066,\r\n              -4.131325103208724\r\n            ],\r\n            [\r\n              102.78976016381995,\r\n              -4.13073916915792\r\n            ],\r\n            [\r\n              102.78972752713565,\r\n              -4.129751760795131\r\n            ],\r\n            [\r\n              102.78838942306243,\r\n              -4.129133273612723\r\n            ]\r\n          ]\r\n        ],\r\n        \"type\": \"Polygon\"\r\n      }\r\n    }\r\n  ]\r\n}', '#5d0e0e', '-4.129133273612723', '102.78838942306243');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `asal_unit` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `user`, `pass`, `level`, `nama`, `asal_unit`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `email`, `tgl_bergabung`, `foto`) VALUES
(4, 'Unit Resa', '21270477bbeeb82eb15d945f962d922d', 'Unit', 'Bambang Supratno', 'Rejosari (RESA)', 'Jakarta', '2022-07-05', 'Laki-Laki', 'Rejosari', '081234234578', 'bambangsupratno@gmail.com', '2022-07-05', 'user_1665205525.PNG'),
(11, 'Ops Sawit', 'c747d0fece1954d043dd56ca1fc6a4be', 'Ops sawit', 'Daniel Solikhin', '', 'Bandar lampung', '1977-02-03', 'Laki-Laki', 'Natar', '08979936929', 'danielsolikhin@gmail.com', '2022-07-08', 'user_1663124528.PNG'),
(12, 'Admin PTI', '21232f297a57a5a743894a0e4a801fc3', 'Admin PTI', 'Admin PTI', '', 'Lahat', '2022-07-11', 'Laki-Laki', 'Jakarta', '0897936929', 'fadhilahf@gmail.com', '2022-07-11', 'user_1665205508.PNG'),
(16, 'Unit Beki', '54f4a0b7948cd68fa385dc6cf2c7f97d', 'Unit', 'Hadi Wibowo', 'Bekri (BEKI)', 'Lampung', '2022-08-03', 'Laki-Laki', 'Lampung', '0897936929', 'pajarasdmin@gmail.com', '2022-08-24', 'user_1665205608.PNG'),
(19, 'Unit Patu', 'a610669f0cd77393c8e76abdf5c5c041', 'Unit', 'Rafa Sofyan', 'Padang Ratu (PATU)', 'Lampung', '2022-08-04', 'Laki-Laki', 'Lampung', '0897936920', 'franscdhaniago5@gmail.com', '2022-08-25', 'user_1665205598.PNG'),
(21, 'Unit Beka', 'e50f83d5a0df49e9e5cf360648c043aa', 'Unit', 'Aji Saputra', 'Betung Krawo (BEKA)', 'Lampung', '2022-08-31', 'Laki-Laki', 'Pringsewu', '0897936926', 'pajaffr@gmail.com', '2022-09-04', 'user_1665205581.PNG'),
(22, 'Unit Betu', 'cc1c20f2fd1232bf86fa43757a22cc99', 'Unit', 'Ahmad Putra', 'Betung (BETU)', 'Jakarta', '2022-09-09', 'Laki-Laki', 'Teluk', '0897936920', 'franschanisago5@gmail.com', '2022-09-04', 'user_1665205570.PNG'),
(23, 'Unit Beta', 'c8842bdd11fc34d7918aa374b9328c27', 'Unit', 'Irwan Andika', 'Bentayan (BETA)', 'Kotabaru', '2022-09-08', 'Laki-Laki', 'Sukarame', '0897636920', 'sbd58@email.com', '2022-09-04', 'user_1665205561.PNG'),
(24, 'Unit Suli', '2927f3bb2421679594bc0b72e34e8e72', 'Unit', 'Tobias Martin', 'Sungai Lengi (SULI)', 'Ambon', '2022-09-15', 'Perempuan', 'Rajabasa', '0897536929', 'sbd48@email.com', '2022-09-04', 'user_1665205553.PNG'),
(25, 'Unit Sena', '03701f820d4e7958dd0a78a87406b596', 'Unit', 'Hari Darmawan', 'Senabing (SENA)', 'Palembang', '2022-09-23', 'Laki-Laki', 'Kemiling', '0897936929', 'sbd83@email.com', '2022-09-04', 'user_1665205544.PNG'),
(26, 'Unit Tapi', 'a1a3e6352fd45c202f77506547b33273', 'Unit', 'Syahrul Ramdana', 'Talo Pino (TAPI)', 'Palembang', '2022-09-03', 'Laki-Laki', 'Pesawaran', '0897936929', 'sbd89@email.com', '2022-09-04', 'user_1665205535.PNG'),
(28, 'tes unit', 'b25300e9992259cef5b2c46738444492', 'Unit', 'tes unit', 'test unit', 'tes unit', '2022-09-30', 'Laki-Laki', 'tes unit', '0897936929', 'pajaradmidn@gmail.com', '2022-10-20', 'user_1666235873.jpg'),
(29, 'Pak Tri', 'ba77257a3f68fe2475d63150d3164303', 'Unit', 'Tri Sandhika Jaya', 'Unit Baru Lagi', 'Lampung', '2022-10-25', 'Laki-Laki', 'Balam', '0897936920', 'franschaniffago5@gmail.co', '2022-10-25', 'user_1666679564.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bencana_alam`
--
ALTER TABLE `tbl_bencana_alam`
  ADD PRIMARY KEY (`id_bencana`);

--
-- Indexes for table `tbl_jalan`
--
ALTER TABLE `tbl_jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indexes for table `tbl_panen`
--
ALTER TABLE `tbl_panen`
  ADD PRIMARY KEY (`id_panen`);

--
-- Indexes for table `tbl_pemeliharaan`
--
ALTER TABLE `tbl_pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indexes for table `tbl_pencurian`
--
ALTER TABLE `tbl_pencurian`
  ADD PRIMARY KEY (`id_pencurian`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bencana_alam`
--
ALTER TABLE `tbl_bencana_alam`
  MODIFY `id_bencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_jalan`
--
ALTER TABLE `tbl_jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_panen`
--
ALTER TABLE `tbl_panen`
  MODIFY `id_panen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pemeliharaan`
--
ALTER TABLE `tbl_pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pencurian`
--
ALTER TABLE `tbl_pencurian`
  MODIFY `id_pencurian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
