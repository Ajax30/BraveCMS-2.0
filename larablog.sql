-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2023 at 07:40 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `articles_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=302 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `slug`, `short_description`, `content`, `featured`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Est fugit', 'est-fugit', 'Error reiciendis voluptas totam incidunt.', 'Omnis inventore dolorem et at. Voluptatem quia a impedit dolore non sequi cum. Aut eum adipisci nemo consequatur rerum. Nostrum animi qui aut quos cum praesentium. Aliquid assumenda ea vero laboriosam qui tempora accusantium quos.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(2, 1, 1, 'Quo eius unde', 'quo-eius-unde', 'Recusandae ullam adipisci ut aliquid aut.', 'Dignissimos quia aut est voluptatem commodi. Quisquam ut consequatur minus et beatae commodi nihil accusamus. Aut provident tempora veritatis. Hic aut vel placeat voluptas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(3, 1, 1, 'Accusamus laudantium nam', 'accusamus-laudantium-nam', 'Atque distinctio aut ipsa reprehenderit.', 'Qui suscipit consequatur odit eos optio perspiciatis qui alias. Tenetur ea sunt dicta est aperiam ullam vel. Et vitae cum qui optio. Ab accusamus laboriosam nihil reprehenderit. Quia impedit ut consectetur pariatur. Molestias est animi placeat nostrum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(4, 2, 1, 'Nam nobis velit', 'nam-nobis-velit', 'Quidem dolores dicta quia minima eos. Voluptatem ipsam voluptatem rerum sed rerum.', 'Sed et quis laudantium id rerum consequuntur laudantium. Ut repellendus perferendis qui corporis quod cumque minus. Recusandae harum exercitationem vitae labore. Ut commodi nobis unde quia.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(5, 1, 1, 'Incidunt commodi aut', 'incidunt-commodi-aut', 'Reiciendis natus fugiat temporibus quam ipsa. Nemo harum voluptate provident et nesciunt qui qui.', 'Consectetur reprehenderit qui unde laudantium velit ut eos. In aspernatur mollitia sed consequatur iure unde qui. Eius nesciunt perspiciatis voluptatem. Qui optio consequatur delectus laboriosam. Quae voluptas saepe aspernatur. Quia inventore suscipit id rem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(6, 1, 1, 'Enim consequatur nobis', 'enim-consequatur-nobis', 'Qui molestiae doloremque consequatur tenetur nemo iure. Dolorum ut magnam aut aut non dolor sapiente enim.', 'Eligendi aut vel dicta rerum et dolorum ratione. Aut corrupti odio eaque maiores voluptatibus. Modi quisquam atque maiores iusto veritatis. Praesentium optio et ut aliquam qui officia et. Adipisci nihil soluta vel quia ipsum. Deserunt voluptatibus sint officiis odit doloremque voluptas dolore.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(7, 1, 1, 'Quia illum mollitia', 'quia-illum-mollitia', 'Illo sit commodi ab quam. Eius omnis pariatur et sunt sit esse dolores voluptatum.', 'Sed animi quisquam ipsam ipsum quo dignissimos sequi. Perspiciatis aut sit quisquam nobis non. Reiciendis delectus doloremque non autem blanditiis quis est. Ipsam officiis eveniet eos debitis itaque tempore reprehenderit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(8, 1, 1, 'Voluptas doloribus', 'voluptas-doloribus', 'Doloribus maxime tempore sed et natus reiciendis. Illo corporis modi rerum a quis.', 'Aut magnam vel doloribus sunt totam rerum dolor. Sunt illo dolor minus nihil aut. Est placeat delectus hic sit ducimus eaque omnis. Pariatur earum sequi ex dicta eum qui illo. Et laborum itaque dolore reiciendis sunt. Id ullam minima corrupti dolore.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(9, 1, 1, 'Molestiae illo sint', 'molestiae-illo-sint', 'Ut modi quos et illum et tempora possimus.', 'Natus fugit at eum qui inventore quasi. Voluptas dolorum quas quod non et. Possimus ipsum debitis qui nobis voluptatum veniam nam. Et qui et rerum vitae.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(10, 2, 1, 'Impedit repellendus aut', 'impedit-repellendus-aut', 'Amet voluptatem est quibusdam. Eveniet sapiente alias quisquam et.', 'Fugiat dolorem sit facilis nihil aliquid perferendis temporibus. Architecto autem harum quod rerum et possimus. Ipsam sed assumenda sunt dignissimos sunt illo corrupti. Voluptatem accusamus incidunt et consequatur quasi iste. Est vel quisquam vel expedita qui enim. Est voluptatum minus omnis excepturi omnis. Rerum sed corporis voluptatum voluptatem perspiciatis libero.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(11, 2, 1, 'Omnis pariatur dolorem', 'omnis-pariatur-dolorem', 'In ipsum qui mollitia.', 'Accusamus dolorum nemo nihil itaque. Ea et quasi earum minima repellat. Quas aut eum veniam aspernatur dicta ut sed. Odit eveniet eos minima consectetur. Cumque quo et ad ea dolores earum rem odio. Tempore corporis voluptate ab maxime qui dolorum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(12, 1, 1, 'Aut dignissimos', 'aut-dignissimos', 'Nulla expedita iste quo similique.', 'Maiores amet est optio at blanditiis explicabo sapiente. Libero vero illum quasi id dolor. Necessitatibus iste ratione perspiciatis qui nostrum nihil ut. Qui quia illo officia.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(13, 1, 1, 'Enim rem', 'enim-rem', 'Quibusdam aut temporibus neque repellendus sit.', 'Explicabo repellendus eum voluptates. Atque quibusdam qui consequatur sint qui voluptatem. Ea deleniti enim accusantium doloremque dolor. Veritatis praesentium sapiente enim quo mollitia sed. Nihil odio eos quasi voluptatem. Qui blanditiis quis velit omnis consequatur qui.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(14, 1, 1, 'Ut et ut', 'ut-et-ut', 'Perferendis iste quidem delectus. Voluptas sunt rerum adipisci eos ad.', 'Sint sapiente molestias rerum necessitatibus. Veritatis placeat ratione commodi. Ex sequi sint quia neque accusantium et. Architecto quo et quo deserunt. Aliquid iure sint deserunt et quisquam aliquid atque. A praesentium id et perspiciatis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(15, 2, 1, 'Ad occaecati reprehenderit', 'ad-occaecati-reprehenderit', 'Neque sit consectetur omnis laborum nulla aut molestiae.', 'Veritatis sunt aut optio qui. Voluptatem eaque occaecati voluptatibus quis veritatis laborum. Quis rerum eligendi molestiae sapiente. Doloribus error rerum fuga. Adipisci accusantium voluptatem qui consectetur repellat accusantium voluptatem. Quisquam dolores asperiores et velit magnam et qui.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(16, 1, 1, 'Dicta id voluptas', 'dicta-id-voluptas', 'Est libero explicabo eum itaque corporis aut nam.', 'In unde perferendis eligendi dignissimos minima debitis fugiat. Iusto et eligendi deserunt commodi aut qui pariatur. Repellendus explicabo eligendi fugiat ad. Voluptatum voluptates optio culpa qui.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(17, 2, 1, 'Eaque delectus', 'eaque-delectus', 'Laudantium aut cumque vel a voluptas rem ad. Adipisci dolor odio optio et id.', 'Nam ex ea totam vitae. Dolores maxime distinctio totam natus. Temporibus minus tenetur enim possimus quia voluptatem. Beatae doloremque possimus sunt est commodi quae. Accusamus animi labore aut aut et eveniet voluptatibus ratione.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(18, 2, 1, 'At culpa nulla', 'at-culpa-nulla', 'Est velit aut quod deserunt.', 'Voluptatem officiis eum accusamus quas atque est. Eos sit sint occaecati id quo voluptas modi. Mollitia culpa ut culpa nemo est necessitatibus. Aut provident velit aspernatur adipisci error libero sed.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(19, 1, 1, 'Asperiores quis', 'asperiores-quis', 'Qui eum ea quo quia consequatur nesciunt.', 'Et sint doloribus qui et excepturi. Nulla rerum voluptates hic ipsam maxime dolor occaecati. Molestiae pariatur sapiente in consequuntur cupiditate aut. Facilis quidem voluptatem perspiciatis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(20, 1, 1, 'Nemo modi', 'nemo-modi', 'Architecto consequuntur aperiam quia.', 'Illo eaque fugiat ut nihil qui. Dolorem quam cumque perferendis eum. Possimus consequuntur illo maxime labore. Qui vel nihil eaque dolorem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(21, 2, 1, 'Provident molestiae autem', 'provident-molestiae-autem', 'Et quis minus numquam blanditiis placeat nesciunt.', 'Iste consectetur quidem doloremque rerum. Blanditiis debitis quibusdam sint repellat. Fugit atque harum perspiciatis temporibus ut ut. Qui voluptas ullam ratione nisi dicta.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(22, 1, 1, 'Occaecati animi quis', 'occaecati-animi-quis', 'Quam asperiores harum pariatur ea molestiae et amet.', 'Incidunt dolorem quibusdam sint odio occaecati velit iure qui. Sit qui iste natus at illo eveniet ut. Quidem minima fugiat debitis exercitationem. Aut at facilis ea nihil. Sit vel modi laborum est. Et aspernatur architecto et dolores.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(23, 1, 1, 'Et ratione', 'et-ratione', 'Cum possimus est dolorem numquam.', 'Odit omnis perferendis magni quos. Nesciunt debitis ut voluptatum. Quia eaque rem eaque dolorem. Totam voluptatem autem nemo quo dignissimos esse et. Asperiores quas enim aut cum corrupti magni sunt accusantium. Dicta quis aliquid modi ut consequuntur totam fuga. Voluptates suscipit blanditiis quasi laboriosam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(24, 1, 1, 'Possimus tempore quod', 'possimus-tempore-quod', 'Unde eum voluptatum iusto voluptas et et.', 'Vel nostrum quam atque cumque et sed ut. Esse in quaerat ducimus sit et facilis ut illum. Tempora nam aliquam aut quia in. Sit dicta quo occaecati eligendi deleniti sit odio ipsam. Molestias ipsam nostrum dolores veniam. Eos asperiores numquam error sit eum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(25, 1, 1, 'Molestiae enim in', 'molestiae-enim-in', 'Iure possimus et qui. Dolorem non enim omnis dolores quo recusandae dolor.', 'Dignissimos pariatur dolor accusantium omnis ipsum sit omnis. Sit maiores omnis non distinctio non ex facilis. Nobis dolor possimus nobis voluptas exercitationem quisquam repellat explicabo. Vitae hic eos eligendi sequi recusandae rerum. Quidem qui voluptatum eius tempora rem nam. Assumenda hic quae suscipit cumque qui sunt. Sequi earum minus adipisci assumenda ut accusantium culpa.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(26, 1, 1, 'Ut laborum dolor', 'ut-laborum-dolor', 'Nobis occaecati ut rem. Eius quisquam dolorem adipisci odio sit repudiandae sit aperiam.', 'Voluptatibus dicta autem rem quod nam nostrum. Corrupti molestiae officiis provident eveniet et et. Consectetur inventore non et rerum quisquam reprehenderit ipsum. Ut necessitatibus aut molestias accusamus voluptatem commodi. Voluptas eum provident minus fuga impedit earum. Eaque iure perferendis molestiae quia.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(27, 2, 1, 'Quidem exercitationem', 'quidem-exercitationem', 'Et recusandae commodi eos laboriosam magnam tempore voluptas. Ipsam quibusdam est libero sunt nam doloribus.', 'Quasi quo ex accusantium modi soluta ea consequatur. Exercitationem recusandae ducimus quae iste exercitationem nobis. Est aut beatae quo ut sit sapiente. Debitis in quae impedit ea culpa.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(28, 2, 1, 'Totam dolore', 'totam-dolore', 'Assumenda temporibus quis numquam. Sapiente ipsam amet rerum.', 'At dolores non aut quis aut eos. Asperiores consectetur commodi hic quis et quia. Veritatis facere aut et aperiam ad. Quia doloribus illum in eveniet nulla modi laborum. Aperiam aut consequatur cupiditate eveniet eum qui cupiditate eum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(29, 2, 1, 'Quis et', 'quis-et', 'Hic esse dolorem quia et omnis cupiditate ea. Voluptates dolorem consequatur id sit est aliquam.', 'Modi aut laboriosam numquam dignissimos ducimus commodi est. Eos consequatur sit quia sapiente illo fugit explicabo quis. Omnis quia qui explicabo assumenda. Rem eum mollitia reprehenderit sunt.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(30, 1, 1, 'Doloribus dolores', 'doloribus-dolores', 'Ipsa soluta cumque eos laudantium aspernatur corrupti. Enim magni unde sequi animi.', 'Esse optio fugiat est facere. Id sapiente modi architecto neque voluptatem culpa et. Delectus minus doloribus quasi qui. Maiores aut neque corporis voluptatem ut sunt. Quia non aut est.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(31, 2, 1, 'Mollitia ea doloribus', 'mollitia-ea-doloribus', 'Quia quo qui aut voluptate. Voluptatum quam rerum neque repudiandae tenetur neque vel.', 'Dolore debitis minus eius beatae laudantium totam et veniam. Sit molestiae eum perferendis. Non eum iusto autem doloribus dignissimos aut officia. Excepturi repellendus nobis nisi blanditiis eius aliquid soluta aut. Dolorem qui sint officia.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(32, 1, 1, 'Suscipit veniam', 'suscipit-veniam', 'Quis consequatur porro non ex.', 'Debitis incidunt vel officiis perferendis vero sint qui. Recusandae numquam consequatur id reprehenderit porro laboriosam. Voluptatem aliquam perspiciatis molestiae est ratione. Commodi voluptas sapiente provident molestiae nemo fugiat.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(33, 2, 1, 'Et et', 'et-et', 'Sapiente quod ut quia praesentium.', 'Excepturi perferendis deleniti facere inventore. Aliquam fugiat architecto unde quis vel maiores iste. Et pariatur atque in ipsam alias nulla. Sit voluptatem doloremque cumque temporibus. Fuga quam sint odit et assumenda voluptatem saepe dolor. Praesentium in totam necessitatibus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(34, 1, 1, 'Quo id', 'quo-id', 'Possimus vel rerum doloremque magni eligendi sed nihil.', 'Rerum velit porro praesentium explicabo natus fugit omnis. Ipsa non vel laboriosam libero consequatur non blanditiis. Quo ut ducimus qui velit qui. Ut voluptas fugiat dicta. Eius necessitatibus et optio omnis. Deleniti est animi eum sit exercitationem provident molestias ullam. Soluta excepturi eveniet accusamus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(35, 2, 1, 'Cum omnis sit', 'cum-omnis-sit', 'Illum sint veritatis et in quis minima porro.', 'Delectus molestiae impedit et voluptatem consequatur officia dignissimos qui. Reprehenderit aperiam nam qui consectetur aspernatur. Rerum consequatur provident quasi laboriosam dicta. Velit porro officiis et quibusdam. Voluptatem aut aut rerum commodi non necessitatibus. Et eum nihil odit ab.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(36, 2, 1, 'Esse provident minus', 'esse-provident-minus', 'Unde inventore dolore harum dolores.', 'Debitis veritatis dolores minima blanditiis minus ea atque. Cupiditate et aut saepe non quia qui. Laboriosam impedit harum est. Dolorum illo fugiat corrupti quibusdam rerum. Rem minus iure et eius. Aut ratione et ut. Illo in et molestiae inventore beatae dolor.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(37, 1, 1, 'Delectus autem ad', 'delectus-autem-ad', 'Dolore nemo dolores dolor quae enim et. Sed fuga illo commodi est quia voluptatem aut.', 'Pariatur quae explicabo dolorem et et commodi. Rerum eveniet tenetur dolores corrupti nihil. Incidunt nisi eos voluptas quia. Labore qui quae dolores quam odio quis ut. Velit id quia debitis nihil aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(38, 1, 1, 'Quia ab nostrum', 'quia-ab-nostrum', 'Aliquam ratione asperiores eveniet aliquid harum nesciunt. Dolor est et eveniet sit ut in.', 'Reprehenderit quod aut dolores corrupti dolorem odio modi doloribus. Id voluptate quas eum soluta. Totam id aut velit dolores ipsum iusto. Sunt velit eos dicta quaerat. Qui tempore voluptas qui.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(39, 2, 1, 'Nam rerum aliquid', 'nam-rerum-aliquid', 'Veritatis sequi unde sed ad iusto. Eum velit dolores molestiae in voluptatem aut magnam.', 'Earum tenetur veniam rem tenetur. Sapiente ut magni quidem ipsam. Modi molestiae vitae debitis sequi nesciunt molestiae officia. Odit cum nihil dolores et possimus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(40, 2, 1, 'Nihil omnis', 'nihil-omnis', 'Vel nostrum nulla quisquam praesentium.', 'Similique doloremque ut veritatis deserunt et et eius non. Provident repudiandae hic molestiae atque ipsa sunt optio. Ut porro suscipit quia. Ipsam nisi dignissimos tempora unde debitis accusantium non.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(41, 1, 1, 'Ut exercitationem et', 'ut-exercitationem-et', 'Quo laborum ut consequatur et. Repellat est maiores ipsam repudiandae expedita non et.', 'Quisquam qui quia et a a. Ut iure architecto dolorem amet nostrum. Distinctio saepe iste provident est eligendi. Incidunt ut id assumenda quia quidem consequatur saepe blanditiis. Ut dolor dolorem aspernatur veritatis in odio dolorum. Quod perspiciatis et eum qui sed.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(42, 2, 1, 'Asperiores impedit', 'asperiores-impedit', 'Sed animi totam consequatur eum sint.', 'Officia non perspiciatis est a voluptatem quae. Optio tempora id magnam. Nisi saepe cum quia amet omnis. Non facere praesentium omnis voluptas dolore alias. Enim quis dignissimos praesentium earum voluptatem debitis. Suscipit in aut quibusdam laborum. Harum exercitationem atque suscipit aliquam quam quod sit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(43, 1, 1, 'Voluptatum tempore', 'voluptatum-tempore', 'Totam quod debitis quos aut dolorem quo praesentium. Veritatis repellendus nihil consequuntur sed.', 'Aut vel ad pariatur deserunt officiis et qui. Et eum voluptatem quo exercitationem animi totam. Sapiente aut aspernatur non tempore quia veniam reiciendis. Quo officia nesciunt aut voluptatem ratione ipsum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(44, 1, 1, 'Autem dignissimos', 'autem-dignissimos', 'Est consectetur inventore magnam quae rerum at repellendus.', 'Quia eius et expedita minus ut et. Doloremque tempore omnis a quo est quod unde. Ratione nobis sit atque nam explicabo molestiae hic. Aut est distinctio sed excepturi. Et recusandae ut nobis adipisci non perferendis aut. Fuga est et sequi odit quasi consequatur at et. Possimus repellat eveniet ad atque ad neque facere similique.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(45, 1, 1, 'Tempora sit culpa', 'tempora-sit-culpa', 'Accusantium dicta alias aut aut voluptas explicabo.', 'Sunt velit hic est iste repellendus iusto blanditiis qui. Distinctio quasi vitae corrupti assumenda. Enim voluptas officiis qui occaecati sapiente aut maxime expedita. Blanditiis enim ut et odit consequuntur sit fugiat. Ut ipsum voluptates ab aliquid dolore alias sint illo. Explicabo quaerat quas corrupti aut quidem qui voluptates. Sequi impedit quas sed sint sunt veritatis expedita.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(46, 1, 1, 'Et ab', 'et-ab', 'Sed accusamus quidem nostrum eos excepturi provident laboriosam error.', 'Iusto velit pariatur rem velit eum libero fugiat. Sapiente optio error vel illo eius. Voluptatem aut dolorem hic ut autem ipsa. Ea maxime voluptatem architecto laudantium. Qui officiis itaque rerum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(47, 2, 1, 'Voluptatibus quod', 'voluptatibus-quod', 'Delectus omnis quis et consectetur dolorum architecto eius.', 'Pariatur ut voluptas ut. Enim sed consectetur dolor consectetur expedita corporis. Est qui dolor repellat ipsa qui. Voluptas voluptatem hic a et. Praesentium magni delectus ut temporibus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(48, 1, 1, 'Qui voluptatem odio', 'qui-voluptatem-odio', 'Quidem et quos placeat quibusdam occaecati.', 'Aliquid autem quaerat reiciendis. Ut voluptatem quas eveniet nobis aut. Autem est omnis quaerat repellat eaque facere magnam. Et cumque et quas rerum ad non praesentium. Aut ipsum unde consequuntur veritatis hic.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(49, 2, 1, 'Dignissimos numquam', 'dignissimos-numquam', 'Eligendi perferendis quia tempore aperiam. Et maxime placeat magnam dolor.', 'Libero aut nam molestiae at vitae. Ullam est minima ipsum earum officia vel. Inventore cum tempore dolorum sed et. Unde dolorem quas ut dolores omnis corporis aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(50, 1, 1, 'Ipsa tempore', 'ipsa-tempore', 'Inventore expedita facere natus ut nisi ea dolorum.', 'Sequi at explicabo odio dolores dolorem. Vel cumque accusantium provident et et animi. Illum eaque ut tenetur veritatis. Maxime ipsa nihil aut et modi. Rerum ullam sed consequatur deserunt molestiae maxime asperiores ullam. Saepe minima quibusdam quia corrupti quo vel laborum qui.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(51, 2, 1, 'Et illo', 'et-illo', 'Impedit rem libero illum est quod.', 'Qui sint dolor nisi tempora quo tempora. Necessitatibus ut autem beatae et eos. Ab iusto ratione ut beatae ut aut. Et ullam similique consequuntur in eaque totam nam. Occaecati ullam debitis iste culpa quod nihil et. At eius officiis nostrum fuga cum. Sunt inventore provident enim consequatur qui quia reiciendis nemo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(52, 2, 1, 'Porro culpa eius', 'porro-culpa-eius', 'Accusamus voluptas dolor deleniti et labore voluptas. Eligendi placeat aut sint dolorem.', 'Ad sed possimus est nulla itaque hic ut. Dicta voluptatem non beatae quam sint. Non tempore voluptatem quo aperiam aperiam eius perferendis. Quia illum dolorum itaque asperiores tempore magni aperiam consequatur. Sit quibusdam expedita fugiat fugit veritatis. Accusamus accusantium commodi rerum inventore cumque itaque consequatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(53, 1, 1, 'Sit aut', 'sit-aut', 'Explicabo accusamus provident consequatur omnis enim aut. Ut voluptatem et illo voluptatem maiores est.', 'Magni qui suscipit laborum rerum non. Labore voluptas dolor eveniet veritatis veritatis ab error ipsum. Eos cupiditate et error cupiditate animi. Enim modi at sed qui.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(54, 2, 1, 'Quo corrupti', 'quo-corrupti', 'Eum amet cumque non incidunt nesciunt omnis. Inventore dolores id quis placeat quibusdam.', 'Autem quasi at esse dolores. Tenetur ab ut aut impedit harum. Quia facere dolorem omnis quia ab minus. Itaque consectetur aut eum cumque. Consequuntur rerum vel non quasi. Et quibusdam explicabo aut dolorem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(55, 2, 1, 'Consectetur pariatur', 'consectetur-pariatur', 'Esse distinctio quae omnis quo. Et omnis est qui molestiae accusantium aliquam voluptatum.', 'Cum laudantium voluptatibus fugit libero quidem dolores sit. Voluptas dolorum provident quia. Inventore facilis explicabo optio rerum non eaque. Dolorem eligendi aut sequi ex ipsam illum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(56, 1, 1, 'Voluptas nostrum', 'voluptas-nostrum', 'Et aut sunt nesciunt a nam quo fugiat.', 'Sed dolorem quasi quas ut repellendus vel. Amet in voluptatem odit et libero dolor ut ipsa. Quidem ut minus qui illo nam. Quidem maxime expedita cupiditate aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(57, 1, 1, 'Voluptatem aut', 'voluptatem-aut', 'Ipsa mollitia eaque cum in aut consequatur. Voluptas magni et consectetur deserunt sint.', 'Quia nemo eum ex itaque provident esse fuga. Exercitationem commodi atque dolor voluptatem facilis sint. Dolor corrupti possimus neque qui animi quam. Voluptatibus odio praesentium eos fugiat nostrum necessitatibus. Tempore quo placeat architecto minus odio. Dolor sint sapiente ut nesciunt. Qui iure est sit facere iusto a voluptatibus est. Voluptas animi consequuntur porro quo cupiditate dicta nihil.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(58, 1, 1, 'Aut voluptatem', 'aut-voluptatem', 'Blanditiis est qui maxime officia sit eos quia voluptate.', 'Non et hic necessitatibus suscipit cum vel. Ratione quos voluptatum sequi et labore id. Quia eos fugit id excepturi dignissimos voluptas repellat. In ut vel quis. Eaque earum culpa facilis ipsa eius eos est. Hic dolore quia repellat vitae voluptatum deserunt.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(59, 2, 1, 'Illum reiciendis cumque', 'illum-reiciendis-cumque', 'Architecto aut ullam aut maxime vel.', 'Perferendis eos sed aliquam expedita. Tempora et aut placeat doloremque consequatur voluptate pariatur. Et consequuntur aut velit fuga. Dignissimos minus est impedit expedita.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(60, 1, 1, 'Dicta possimus', 'dicta-possimus', 'Corporis aut alias et esse aliquam sint non.', 'Corrupti quibusdam et asperiores a ducimus. At unde blanditiis rerum vel est est. Nihil in et cum inventore. Quam optio iure sunt reprehenderit optio aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(61, 1, 1, 'Sapiente vel', 'sapiente-vel', 'Explicabo doloremque illum impedit omnis praesentium.', 'At assumenda saepe quia consectetur. Ut ab ducimus et sed voluptatem. Consequatur perferendis accusamus repellat incidunt. Corporis rerum quibusdam optio quo et perspiciatis. Illo ullam minima consequatur adipisci fugiat id. Vel dicta explicabo in omnis temporibus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(62, 1, 1, 'Perspiciatis mollitia', 'perspiciatis-mollitia', 'Error veritatis ipsum excepturi. Molestiae vel itaque ducimus neque ut quo.', 'Provident praesentium maxime soluta sit rerum. Qui et aperiam aut eos dolore. Repellendus ex quo sunt non ea. Nobis est vel mollitia hic accusantium architecto voluptatem. Laudantium quo nobis sit ipsum molestias. Omnis praesentium et ut adipisci.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(63, 1, 1, 'Animi ut minus', 'animi-ut-minus', 'Odio explicabo et sint at veritatis non sunt.', 'Perferendis ut et molestiae qui. Qui aut esse est mollitia saepe molestiae. Id aspernatur minima vitae cum laudantium. Quidem laboriosam perspiciatis perferendis sapiente qui. Et qui maiores rerum non inventore. In commodi qui aspernatur aspernatur. Sed accusamus a non asperiores temporibus quo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(64, 2, 1, 'Nam doloremque omnis', 'nam-doloremque-omnis', 'Est accusantium nemo dignissimos autem. Qui possimus deserunt fugiat voluptas et.', 'Vero quia unde quae nesciunt qui illum fugiat. Rerum sit iusto ut. Quibusdam quis exercitationem eum laborum eaque iure placeat. Sint voluptatem recusandae odio ea culpa. Sapiente tempore id libero cum ex quod quos.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(65, 1, 1, 'Eveniet aut', 'eveniet-aut', 'Fugiat molestias consequatur corporis voluptas.', 'Quia non nulla consequatur et odio. Voluptatem fuga et sunt. Possimus et aliquam ducimus sint. Asperiores ipsa et consequatur dolorem. Occaecati velit vel tenetur blanditiis et porro.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(66, 1, 1, 'Qui maiores itaque', 'qui-maiores-itaque', 'Aut dolores voluptatem quis qui. Facere ut ipsam sit aliquid iure libero aut.', 'Aut minus quo omnis. Pariatur pariatur ducimus ratione doloremque atque fugiat consequatur. Sit est et odit. Mollitia et in dicta soluta.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(67, 2, 1, 'Cumque voluptatem', 'cumque-voluptatem', 'Pariatur velit placeat culpa nobis aliquid.', 'Et officiis est ipsa dolor dignissimos. Porro eveniet qui voluptate enim. Expedita hic illo quos vitae corrupti consequuntur quia sed. Placeat dolorem quis nobis eligendi. Eos fuga veniam odio ipsum qui similique voluptatum. Libero ipsa id quis error enim.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(68, 1, 1, 'Repellendus odit', 'repellendus-odit', 'Ratione a necessitatibus dolorem occaecati dignissimos. Nihil cum saepe qui est necessitatibus.', 'Ducimus sed exercitationem provident aut. Quis ullam quasi suscipit soluta odit quos nemo. Autem ipsam quia necessitatibus molestiae quia nulla ut. Dolor ea et delectus repellat omnis voluptas facere. Est est ut est et blanditiis voluptates neque natus. Asperiores pariatur alias consequuntur et reiciendis ut et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(69, 1, 1, 'Deserunt fugit officiis', 'deserunt-fugit-officiis', 'Reprehenderit quibusdam tempora et quia necessitatibus veritatis.', 'At rerum repudiandae asperiores quia. Vero sapiente et non blanditiis non et omnis. Quod harum porro consequuntur voluptates recusandae voluptas mollitia. Adipisci minima earum facere sit. Et magni corrupti tenetur maxime.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(70, 1, 1, 'Quia dolor quasi', 'quia-dolor-quasi', 'Quo omnis nam rerum quis amet sit ut aliquid.', 'Ratione in suscipit vitae eos non fuga. Neque dolorum labore delectus non expedita veritatis quisquam. Quia aut eveniet veritatis ad. Voluptatem impedit exercitationem iure reiciendis. Quis veritatis illo et quidem voluptas odit. Aut libero doloribus quo dolores.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(71, 2, 1, 'Quia sunt in', 'quia-sunt-in', 'Earum fugiat a ipsam. Aperiam et ut tenetur voluptas.', 'Non aut eum ut placeat recusandae nam nobis. Voluptates quibusdam delectus veritatis modi iusto enim. Iste aspernatur tempora eveniet placeat facere quos. In possimus eos nobis qui dolor. Quos rerum omnis tempora cumque veritatis in sed. Vero nisi amet explicabo maiores magnam ipsa necessitatibus sit. Quae repudiandae possimus consequatur quibusdam eius modi recusandae.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(72, 2, 1, 'Dolore voluptatem voluptates', 'dolore-voluptatem-voluptates', 'Ab beatae repellat aliquid dolores voluptatum. Amet rem voluptatem sit modi eos rem eligendi dignissimos.', 'Et deserunt alias totam veniam magni. Est iure mollitia sit pariatur qui ipsam non. Consequuntur aut molestiae nisi voluptas. Nulla blanditiis non voluptas enim. Ad et vel id quo deserunt sequi. Tenetur deserunt aspernatur voluptatem ex. Vel nam nemo sit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(73, 2, 1, 'Ab et expedita', 'ab-et-expedita', 'Exercitationem sit dolores quia autem omnis.', 'Omnis voluptate velit sit. Eligendi voluptates voluptatem perferendis enim possimus optio. Consequatur ea est reiciendis quisquam assumenda. Ipsum dolores ea voluptatem veniam veniam. Magni velit voluptas iure perferendis eum corporis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(74, 2, 1, 'Illo impedit pariatur', 'illo-impedit-pariatur', 'Alias provident quo rerum aspernatur voluptas.', 'Voluptas nisi est ullam voluptates repudiandae eum sed. Eveniet architecto unde occaecati beatae praesentium ipsum inventore pariatur. Reiciendis soluta quia blanditiis earum delectus et. Ut magni libero sint. Corporis libero explicabo alias non. Dicta iusto dolor iure omnis omnis facilis. Sint repellendus natus labore tenetur enim quos incidunt.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(75, 2, 1, 'Expedita placeat sunt', 'expedita-placeat-sunt', 'Natus ut placeat tempore suscipit occaecati. Voluptatem nostrum exercitationem quis iste minus repudiandae earum veniam.', 'Molestiae nesciunt est optio rerum atque. Incidunt voluptatem velit reiciendis quo. Sed labore quis soluta nesciunt nesciunt nostrum. Aut eum eveniet nemo quia voluptas est id. Vel aliquid voluptas sed rerum consequatur. Autem ipsa numquam sed natus natus aut non. Neque dicta iste quod rerum iure.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(76, 1, 1, 'Sint culpa', 'sint-culpa', 'At neque reiciendis sit voluptatem esse. In aut fugit ut id.', 'Dolores quia debitis voluptas et sunt placeat deserunt. Ut enim sint eum nemo sit explicabo. Occaecati et sequi et repudiandae. Nisi amet sint aspernatur placeat fugit. Autem deleniti aliquid eligendi qui. Quis id dolorem ipsum nesciunt hic fugiat.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(77, 2, 1, 'Aut voluptatum consequatur', 'aut-voluptatum-consequatur', 'Quis est labore nam sunt. Aperiam nisi expedita consequuntur repellat ab.', 'Voluptas nobis ipsum nemo aut. Dolores nobis veniam totam sed hic. Minus consequatur delectus delectus eum necessitatibus quos. Mollitia maxime est consequatur quod. Reiciendis et consequatur voluptatem at provident quo dolor. Consequatur eos at expedita doloribus laboriosam eaque.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(78, 1, 1, 'Culpa dolore', 'culpa-dolore', 'Unde excepturi fugit laudantium impedit eveniet enim.', 'Et quis accusantium at. Tempore perspiciatis ut voluptatem est. Quo nisi reiciendis consequuntur sit. Quos similique voluptatem ipsa atque.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(79, 1, 1, 'Id et quasi', 'id-et-quasi', 'Odio labore eos vero molestiae.', 'Ea fugit nemo dolores labore fugit voluptate porro accusamus. Vel neque nisi veritatis id nemo non. Minima voluptates eos adipisci id et. Eligendi repellendus iusto expedita aut. Repellendus occaecati blanditiis omnis molestiae. Necessitatibus vel id nihil omnis distinctio ab enim. Aut veritatis exercitationem ex ab.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(80, 1, 1, 'Ut minus accusamus', 'ut-minus-accusamus', 'Id tenetur sed ab eos consequuntur doloribus possimus.', 'Quas tempore consequatur ducimus a illo et. Rerum beatae veniam temporibus ratione molestiae natus tempora. Corporis numquam unde aperiam voluptas. Quia illum et ullam suscipit ut. Et deleniti consequatur cum exercitationem eveniet quisquam delectus. Natus dolor nemo optio eius nulla minus. Autem dignissimos distinctio et molestiae ex ut nesciunt.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(81, 2, 1, 'Eaque velit officiis', 'eaque-velit-officiis', 'Autem et est molestias qui laudantium nesciunt.', 'Similique vitae est rerum rerum impedit est at nostrum. Sint exercitationem dolorem sint velit eaque sit deleniti nihil. Vel et voluptas enim aliquid eveniet laborum. Non et magnam voluptas ea ea sed odit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(82, 1, 1, 'Temporibus consequuntur', 'temporibus-consequuntur', 'Quisquam quas excepturi quibusdam qui nobis nemo commodi veritatis.', 'Qui ut sit numquam ut quod exercitationem error. Sit quaerat non corporis facere repudiandae eaque veniam. Cumque rerum nemo esse sed asperiores ullam repellendus. Vel ea quidem dolorem beatae. Numquam et id exercitationem deleniti. Et quia quaerat vitae facere. Quod consequatur labore commodi aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(83, 1, 1, 'In ad similique', 'in-ad-similique', 'Veniam soluta velit ducimus eum. Inventore enim qui quaerat sit autem.', 'Exercitationem dignissimos voluptatibus ipsam maiores sit blanditiis ex. Similique voluptatem molestiae culpa impedit laboriosam. Est in laboriosam natus tenetur et. Unde recusandae fugiat architecto omnis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(84, 1, 1, 'Perspiciatis est', 'perspiciatis-est', 'Nihil quia rerum dignissimos soluta.', 'Ipsam eveniet qui unde a voluptatem autem. Quidem ut officia aut voluptates fuga commodi. Et magnam perferendis explicabo iusto sint. Molestiae doloremque vel aut eaque qui et distinctio illo. Voluptas id dicta reiciendis. Velit veritatis in et quasi ipsa. Dicta quas quibusdam quibusdam voluptas culpa nostrum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(85, 1, 1, 'Pariatur in accusantium', 'pariatur-in-accusantium', 'Vero quam quam dolor voluptatum non rerum quod.', 'Libero debitis occaecati in. Illum sit dolor quam deserunt. Ipsam sunt repellat numquam non. Quia repellat ea facere sint sed nulla quia.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(86, 1, 1, 'Quis laboriosam nam', 'quis-laboriosam-nam', 'Omnis fuga et corporis beatae atque ut qui. Eum non et autem debitis ratione natus quo dolore.', 'Dolorem a qui veniam. Nihil sint est nemo necessitatibus. Ut tempore odio non sit provident. Consequuntur iste voluptatem ducimus eius.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(87, 1, 1, 'Aut a', 'aut-a', 'Alias magni eos sit laborum quo. Ipsa reprehenderit quia tempora modi.', 'Doloribus voluptatem tempora consequatur et. Quidem quia rerum doloremque vel nam quas voluptatibus. Iste ipsum est similique consequatur inventore hic ipsum. Qui magnam molestiae quia aspernatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(88, 1, 1, 'Doloremque tenetur asperiores', 'doloremque-tenetur-asperiores', 'Omnis neque et mollitia ut fugit. Nisi aut atque ipsa neque aut sit veniam.', 'Omnis aliquid maiores iure. Enim reprehenderit autem asperiores laudantium ab sapiente. Eum quis reiciendis dolorum. Ut rerum voluptas esse et animi quaerat. Est in et qui corrupti reprehenderit a.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(89, 2, 1, 'Ullam non similique', 'ullam-non-similique', 'Aut cumque ad odio veritatis est quia expedita.', 'Porro sed quia ad eum libero. Non distinctio doloribus nostrum dolorum ex sunt aperiam. Quae vel recusandae perspiciatis quia recusandae. Nulla incidunt molestiae debitis autem ullam et quam. Dolore excepturi qui voluptates quo. Et deserunt aut dolor quae doloremque iure laborum tenetur. Maxime aliquam qui labore.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(90, 1, 1, 'Doloremque a', 'doloremque-a', 'Iure quia voluptas voluptas quam.', 'Ea ut nam temporibus est sit iusto. Dolor at expedita odit quaerat ea corporis. Molestias rerum dolores eligendi deserunt iste qui quam. Laboriosam quia sapiente sunt quaerat. Voluptas enim vero cum in. Et quam magnam culpa sed eum optio. Nihil omnis quia et eum quis corrupti aspernatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(91, 2, 1, 'Eum quae hic', 'eum-quae-hic', 'Esse et modi et nam molestias aut aliquid consectetur.', 'Id sunt fuga nobis fuga autem rerum vel. Labore ullam est officiis rerum. Sed culpa id nobis repudiandae totam. Officia illum earum consectetur. Omnis sint unde libero sed. Culpa quisquam fuga libero tempore. Suscipit ea provident vero animi facere.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(92, 2, 1, 'Repellat pariatur occaecati', 'repellat-pariatur-occaecati', 'Exercitationem eius minus distinctio culpa sed qui nemo. Rerum repudiandae dolorem est voluptas cumque.', 'Pariatur deleniti sint voluptatem similique. Et quasi repudiandae sit nisi provident. Ad rerum ut quo qui facilis ratione distinctio. Quibusdam sed soluta qui facere quos. Qui et fugit sit modi. Quia id laborum aut voluptate omnis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(93, 1, 1, 'Provident iste', 'provident-iste', 'Quidem debitis dolore sit sint tenetur. Assumenda sapiente et rerum laboriosam et.', 'Dignissimos provident velit quia. Enim voluptas harum reprehenderit nulla. Quia et corrupti similique. Et sapiente similique laudantium porro. Quaerat nobis cupiditate eaque et eveniet. Voluptatibus voluptatem qui eum quia reiciendis omnis dignissimos.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(94, 1, 1, 'Dicta omnis', 'dicta-omnis', 'Nisi odit reiciendis ut ut. Libero dolorem quia et et harum.', 'Fugiat aliquam non aut voluptate ut. Dolores aut dolores provident nobis. Mollitia laborum molestiae amet beatae quae. Voluptates est qui ab facilis et voluptatum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(95, 1, 1, 'Id eveniet', 'id-eveniet', 'Atque quasi aperiam labore eos. Iure quis assumenda animi ut.', 'Quia debitis et tenetur consequuntur voluptate. Amet dolorem assumenda eligendi dolore qui. Velit placeat dolorum odio qui. Sit voluptas aut autem nulla iusto.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(96, 2, 1, 'Deleniti rerum', 'deleniti-rerum', 'Eos rerum ut enim similique impedit aliquam placeat. Atque nihil dolor culpa rerum.', 'Architecto ut quaerat iste delectus. Quia commodi vel molestiae sint unde et. Perspiciatis iste a reprehenderit iure nesciunt delectus ut. Ut in rerum quia debitis aut. Quos vero doloremque rerum nesciunt autem enim. Consequuntur ipsum voluptas excepturi omnis quod iste. Ducimus unde totam vitae quo eligendi autem voluptas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(97, 2, 1, 'Est quaerat', 'est-quaerat', 'Et quaerat aut et unde rerum magnam eum.', 'Dicta est aut labore sint temporibus. Ea eos est neque earum dolorem eum voluptates aut. Sit praesentium quis fugiat dolorum non tempore id. Ab fugit incidunt neque aut animi rerum. Eos et et qui ex.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(98, 2, 1, 'Et sunt fugit', 'et-sunt-fugit', 'Dolorum officiis quia aut eius voluptatem ut.', 'Sed quas et voluptas et similique molestias quam. Veniam distinctio architecto in nihil dolor atque quasi. Dicta aut asperiores ea sequi. Enim ab nemo accusantium nulla eum pariatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(99, 1, 1, 'Alias dolorem eos', 'alias-dolorem-eos', 'Vel veritatis repudiandae tempore excepturi non. Dolores voluptatibus aut asperiores impedit nihil soluta.', 'Sequi ea cum tempora. Officia cumque aut nisi numquam et voluptas. Earum unde eveniet consectetur non quas pariatur eos est. Ipsum tempora ipsa velit repellat a quis aut. Eum facilis sunt sed sunt vel.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(100, 1, 1, 'Perspiciatis eius in', 'perspiciatis-eius-in', 'Harum repellat consequuntur rem voluptas.', 'Consequuntur minima neque assumenda vel velit. Qui odit in enim qui magni et debitis vel. Sint labore molestiae totam praesentium ut. Beatae quo dolor nesciunt temporibus omnis alias quo ipsam. Nulla rerum quasi non molestias quas explicabo cumque temporibus. Aut delectus fugit enim.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(101, 1, 1, 'Odit quae qui', 'odit-quae-qui', 'Magni omnis quis eum. Sit iure iste perferendis est nesciunt sint.', 'In perspiciatis eos est dolorem quia nesciunt commodi. Officia vitae minima quia quis. Ex ad possimus quam in est. Tempora aut cum quidem. Aliquam molestias distinctio accusamus autem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(102, 1, 1, 'Voluptas atque', 'voluptas-atque', 'Omnis qui in autem aut beatae nemo. Saepe pariatur quia voluptatibus.', 'Dolorem officiis itaque ea veniam assumenda deleniti quisquam. Rerum molestiae aut quis soluta dolor maiores minus. Qui labore commodi veritatis quis ea quos autem. Ab quis qui ut est voluptate. Vitae numquam facere tempore in tenetur fuga voluptatibus. Voluptate velit praesentium eveniet officia id sed. Ut maxime dicta aut sed id.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(103, 1, 1, 'Amet eligendi eum', 'amet-eligendi-eum', 'Sunt quis qui voluptate unde.', 'Et aut rerum aspernatur iure molestias sit. Minima sequi provident sit eum. Nihil maxime ea qui. Blanditiis voluptatem officia sequi sequi dolorem. Optio aut id rerum quia aliquid et ducimus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(104, 2, 1, 'Blanditiis vitae sit', 'blanditiis-vitae-sit', 'Nulla amet aut adipisci totam fugiat.', 'Velit rem quas incidunt corporis ratione. Enim nisi maxime et veniam aspernatur fugit. Ipsa a dolorem omnis nam et quam. Amet aliquid esse consequatur cupiditate provident. Ut soluta alias ut quia.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(105, 1, 1, 'Alias sed beatae', 'alias-sed-beatae', 'Qui sunt dicta quam amet. Et non est molestias veniam.', 'Voluptatem tenetur laboriosam ab et vel est qui. Esse quo quam veniam optio. Veritatis minus consequatur ut deserunt nam possimus. Et nulla et qui perspiciatis blanditiis. At libero exercitationem quo labore officiis harum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(106, 2, 1, 'Impedit quas', 'impedit-quas', 'Sint natus consectetur mollitia aut consectetur.', 'Ipsum eos distinctio aut iure nihil. Qui accusantium voluptatibus quia facilis. Aut reiciendis hic numquam et fugit quidem accusantium. Illum dolores eum eligendi quaerat consequuntur vero rerum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(107, 2, 1, 'Aut accusamus omnis', 'aut-accusamus-omnis', 'Cum temporibus voluptas consectetur.', 'Aut quasi qui eos officia iste illo sed. Inventore aliquam alias qui quis inventore totam. Suscipit repellendus ea autem dignissimos nobis aliquam ab. Deleniti maiores cum aut quis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(108, 1, 1, 'Laborum voluptatibus rerum', 'laborum-voluptatibus-rerum', 'Sit provident minima pariatur eaque unde voluptas. Ducimus corporis qui qui quia ratione.', 'Dolorem similique est ipsum. Qui deserunt hic quas soluta tempora sit quis. Consectetur expedita rerum amet dolorem et. Sunt tempora sequi nobis esse. Eos ut inventore impedit culpa dolorem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(109, 2, 1, 'Et veritatis', 'et-veritatis', 'Voluptatem ut molestias aliquid sint.', 'Dolorum iure ea sed eveniet. Deserunt fugiat voluptatem consequatur rerum autem est eum. Vero occaecati et vitae est error. Vel nisi culpa dolores qui. Dolor fuga sed eaque voluptatum est ratione atque. Voluptatem illo quia qui nulla non.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(110, 2, 1, 'Veniam non sit', 'veniam-non-sit', 'Minima similique est odio sint quaerat.', 'Dolores fugit sit omnis dolor totam quis. A cupiditate aut maiores placeat. Molestiae aut amet enim deleniti quisquam. Est enim velit esse tempore commodi illo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(111, 1, 1, 'Atque quae', 'atque-quae', 'Maxime cupiditate laboriosam sit nam voluptatem quas et esse.', 'Odio vel tempora eveniet quam veniam earum qui. Excepturi optio nostrum vitae. Nesciunt voluptatem id error rerum in nostrum. Et saepe id voluptatem veniam. Nihil ratione quisquam accusantium ea. Ut sed qui fugiat ipsum officiis laudantium consequatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(112, 1, 1, 'Voluptas sed', 'voluptas-sed', 'Ea consequatur atque aut maiores.', 'Illo quo dignissimos iure recusandae nesciunt. Consectetur est magni natus facilis ea debitis quia. Non dolorem quos fugiat autem consequuntur deleniti. Id similique dolorum facere amet ea. Repellendus magnam fuga commodi saepe. Et voluptatem perspiciatis excepturi eos.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(113, 2, 1, 'Nam veniam consequatur', 'nam-veniam-consequatur', 'Tenetur aperiam provident et accusantium est aspernatur.', 'Fuga quis est incidunt sint et cum. Exercitationem ea sed perferendis ut sint odio. Qui et est voluptas facere. Error officia voluptatem pariatur ut veritatis tenetur. A expedita occaecati odit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(114, 2, 1, 'Veniam error', 'veniam-error', 'Qui voluptate dolore excepturi earum consequatur quisquam.', 'Vitae officia dolorum alias quod voluptatem quo reprehenderit. Unde quo odio aut et. Nam et odit minima ab. Nisi vel cumque eum ea. Blanditiis qui voluptatem facere accusantium ipsum. Porro porro ut atque molestiae iste consequatur recusandae voluptatum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(115, 1, 1, 'Quia esse ad', 'quia-esse-ad', 'Quasi est quae voluptas quibusdam voluptatem.', 'Tempora praesentium accusantium excepturi error qui architecto. Ea id voluptate qui. Similique debitis omnis dolorem ab. Sit et molestiae quia consequatur laboriosam dolore. Ut omnis at consequuntur sit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(116, 2, 1, 'Sit possimus', 'sit-possimus', 'Deserunt maxime voluptatibus vel eligendi. Voluptatum nemo possimus aliquid.', 'Nihil quidem nobis perferendis quia qui minus. Nihil facilis neque et quos mollitia. Possimus id nisi unde voluptatem. Non repellat deleniti quod eum vitae tenetur adipisci. Non impedit necessitatibus minima fugit autem omnis et amet. Voluptas optio consequatur aliquam quasi. Pariatur aut officia omnis rem necessitatibus in perferendis rem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(117, 1, 1, 'Voluptatem asperiores quia', 'voluptatem-asperiores-quia', 'Quia sed consectetur dolores quod aperiam dolorem.', 'Rerum est nostrum corporis. Exercitationem totam voluptate officia consequatur officia expedita. Aut vero natus non. Nobis atque ipsam sed recusandae vero.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52');
INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `slug`, `short_description`, `content`, `featured`, `image`, `created_at`, `updated_at`) VALUES
(118, 1, 1, 'Odio maxime', 'odio-maxime', 'Et non perspiciatis placeat perferendis.', 'Esse et consequatur nostrum et commodi. Qui molestiae voluptatem quisquam suscipit asperiores enim. Doloremque saepe et suscipit in assumenda veniam tempora. Laboriosam molestiae necessitatibus sed cumque illo commodi nulla. Non aut aut sed aut molestiae recusandae. Maiores cumque eveniet tempore nulla quisquam molestiae doloremque. Nisi aliquam accusantium vero quis incidunt debitis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(119, 1, 1, 'Voluptatem excepturi', 'voluptatem-excepturi', 'Provident porro maxime aut molestiae illum quod ut. Dolor cupiditate fugit dignissimos.', 'Quos ut ut aliquid unde numquam commodi voluptatem. Sit consectetur cumque aspernatur nam. Sint dignissimos ut deleniti voluptas quia recusandae. Dolorem sunt doloribus quaerat iste laboriosam. Placeat quo praesentium repellendus laborum minima sunt aliquam. Eveniet sint aut et autem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(120, 2, 1, 'Consectetur occaecati', 'consectetur-occaecati', 'Vel ut rerum voluptatem reiciendis quas expedita. Ea necessitatibus est voluptas qui.', 'Facilis incidunt dolorum recusandae eos optio. Aperiam est et temporibus aspernatur vero in sed maiores. Qui rerum corporis minus assumenda saepe ut dolorum dignissimos. Tempora quia quia impedit eos. Ut officiis debitis et officiis esse. Tempore aspernatur optio corrupti qui.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(121, 1, 1, 'Iusto molestias reiciendis', 'iusto-molestias-reiciendis', 'Vitae corrupti esse est alias molestiae. Voluptatem perspiciatis fugit et molestiae.', 'Corporis sequi alias illum similique id quam fuga. Exercitationem pariatur in rerum minima. Blanditiis distinctio consequatur delectus omnis. Aut dolor et dolorem aut aut. Quasi deleniti labore enim et aliquid voluptate a. Similique velit officiis similique aut culpa vel nemo fugiat. Quis laboriosam odit consequatur porro sit eum ad quo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(122, 2, 1, 'Esse reprehenderit id', 'esse-reprehenderit-id', 'Doloremque distinctio est facere similique consequatur sed. Aspernatur quia quaerat aut corporis autem qui quidem reprehenderit.', 'Inventore atque sit necessitatibus. Ut earum pariatur atque pariatur. Et voluptatem vel adipisci rerum quidem soluta. Recusandae saepe dolores officiis. Consequatur eaque soluta nemo deserunt eligendi ducimus ut. Esse est maxime exercitationem voluptas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(123, 2, 1, 'Nemo id', 'nemo-id', 'Earum reprehenderit unde temporibus dolore sed aut quisquam in.', 'Unde consequatur laborum qui rerum alias similique. Quibusdam facere nihil natus ut temporibus amet culpa cumque. Adipisci in vero qui vel qui a dolores. Omnis sit nostrum optio ea. Voluptas explicabo necessitatibus temporibus assumenda exercitationem reiciendis beatae. Quis et nihil illo assumenda. Assumenda eum et hic ullam id.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(124, 1, 1, 'Totam voluptatem', 'totam-voluptatem', 'Ea atque repellat excepturi fugit.', 'Sit sapiente rerum aut aperiam officia corrupti. Porro maiores voluptate est dolores non doloribus. Dicta amet tenetur maiores similique beatae autem assumenda dolores. Totam in sint ut eos minus consequatur. Nam beatae rerum nihil blanditiis laudantium explicabo molestiae. Accusantium aliquid et in quo non inventore fuga et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(125, 2, 1, 'Velit magni iste', 'velit-magni-iste', 'Numquam velit asperiores omnis odio omnis fugit enim recusandae.', 'Officia ex pariatur nobis accusantium possimus occaecati et. Consequatur explicabo qui est autem nemo quia. Officiis quod sint veniam est. Consectetur quas eos quod. Laboriosam aut hic quis provident sint numquam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(126, 2, 1, 'Sint maxime', 'sint-maxime', 'Consequatur architecto facere iusto quis.', 'Beatae autem qui explicabo quae qui. Aut voluptas molestiae ut et voluptatibus ut non. Omnis aut id eum accusamus doloremque magni unde. Sed sunt quibusdam excepturi. Fugiat sed magnam voluptas dolorem sint. Sint quos repudiandae et aut vitae.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(127, 1, 1, 'A non minus', 'a-non-minus', 'Eum quae vel rem. Nihil debitis a maiores.', 'Molestias libero vitae ad quia rerum qui et. Est aut recusandae sed quia explicabo debitis voluptatem. Dolores quia veniam blanditiis deserunt. Exercitationem dolor aut praesentium at velit. Autem ratione deserunt itaque. Aut consequatur aperiam aut odit facere animi. Assumenda ut quis nesciunt aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(128, 2, 1, 'Quia pariatur', 'quia-pariatur', 'Incidunt animi dolorem excepturi aliquam aut. Minus at nostrum dolor sed.', 'Enim fuga numquam quisquam laboriosam aut laboriosam possimus neque. Nihil dolorum animi eos id sunt nesciunt sunt. Dolorem dolorem et aut dolor. Atque consequatur ut ratione qui doloribus eum. Aut totam placeat eum aut magni quam repudiandae ad.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(129, 1, 1, 'Quibusdam consequatur beatae', 'quibusdam-consequatur-beatae', 'Molestiae perspiciatis soluta qui cum fuga in. Aut perspiciatis iure ut nihil at qui quaerat veritatis.', 'Nostrum ex quasi est assumenda exercitationem. Et placeat in aliquid sed ipsa. Voluptates reiciendis officia omnis vel eveniet. Vitae quia enim velit. Magnam blanditiis eos nulla laboriosam dignissimos quo. Ipsum iure at fuga molestiae eius ea eveniet. Occaecati optio dolorum nulla nisi ipsa.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(130, 2, 1, 'Sint corrupti', 'sint-corrupti', 'Dolorem doloremque nesciunt vitae atque sit.', 'Non nam voluptas voluptatem molestiae ut porro. Voluptatem distinctio atque voluptates. Facilis omnis rem corrupti ut. Enim autem at magnam consequatur. Et recusandae voluptas est dignissimos consequatur. Amet quos sunt rerum velit in earum nostrum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(131, 2, 1, 'Reprehenderit aliquid corrupti', 'reprehenderit-aliquid-corrupti', 'Placeat ullam aut rem officia aliquid delectus voluptatem.', 'Atque et dolores quia modi. Consequuntur consequatur nobis nesciunt ratione quis id. Vel ullam cum magnam repellat. Hic neque impedit et rerum facere. Nostrum quia rem omnis facilis. Id magnam aut necessitatibus nemo. Unde error dolorum beatae quis praesentium quis tempora.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(132, 1, 1, 'Error nisi', 'error-nisi', 'Quo ullam commodi minima. Fugiat qui praesentium et sunt libero.', 'Eum odit maxime similique. Ab doloremque corrupti aliquid vero et. Aspernatur quod aliquam voluptatum quidem perferendis unde. Tempore sequi aspernatur omnis laborum necessitatibus qui necessitatibus. Quis et officia beatae culpa quam et eius.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(133, 2, 1, 'Et quis', 'et-quis', 'Similique eveniet deleniti neque assumenda. Quo magni laboriosam quia perspiciatis.', 'Corrupti assumenda quos accusantium et sed. Non fugit voluptate asperiores id tempora dolorem. In neque nisi dolores. Est unde saepe minus soluta accusantium odit veniam. Quibusdam ut aliquid nesciunt numquam vel eos.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(134, 1, 1, 'Corporis consequuntur', 'corporis-consequuntur', 'Ut dolorem explicabo provident quae architecto animi impedit et.', 'Id cumque iure optio voluptatem ea est sed. Autem dolor ut autem dolores unde animi. Est sunt quod quidem aspernatur autem sint. Minima aut optio incidunt.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(135, 1, 1, 'Nulla molestias', 'nulla-molestias', 'Aperiam et doloremque aut alias cupiditate.', 'Sint cupiditate soluta provident. Qui et et asperiores fuga. Quia qui occaecati blanditiis. Fugit qui libero fugit perspiciatis. Qui adipisci vel quia voluptatibus dolorem veritatis facere. Magnam delectus distinctio in dolorum. Et delectus et repellat nihil dolorem totam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(136, 1, 1, 'Rem tempora culpa', 'rem-tempora-culpa', 'Fugit pariatur modi id itaque. Quod laboriosam consequatur et sint voluptas.', 'Earum aut porro deleniti et officiis corrupti. Voluptatum labore saepe voluptates ab molestiae sit officia voluptatibus. Sunt quos aut quia laboriosam deleniti magnam tenetur. Quo aspernatur et aperiam sed expedita est ut. Velit rem non sit et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(137, 1, 1, 'Facilis eum rem', 'facilis-eum-rem', 'Veritatis quos quas veritatis molestiae nihil illum aliquid quae.', 'Aut dolor vero debitis saepe occaecati. Ipsam et libero quia ut. Accusantium est eligendi quia sint. Excepturi ut voluptates magni velit voluptates eligendi cum. Omnis assumenda perferendis iste beatae voluptas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(138, 1, 1, 'Sit porro vel', 'sit-porro-vel', 'Fugit qui optio placeat.', 'Ratione odio officiis ut quis. Facere optio minus nisi unde suscipit aut. Id beatae fugiat et aut ea quia ut exercitationem. Maxime hic accusantium magni quo. Vero quo consequatur excepturi animi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(139, 2, 1, 'Porro rerum', 'porro-rerum', 'Mollitia tempora iure deserunt pariatur.', 'Est et impedit architecto aut recusandae in. Iusto adipisci molestiae id. Sit ut tempore qui et dolor molestiae. Fugiat voluptas alias ut qui suscipit dicta. Qui quasi voluptas qui qui et. Sed qui occaecati beatae aut quas ab. Minima beatae dolor quo velit ullam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(140, 2, 1, 'Qui nihil', 'qui-nihil', 'Incidunt sint sunt enim dolor ut quo et.', 'Expedita molestias voluptatum consequatur. Adipisci voluptatibus consequuntur dicta alias ut. Expedita libero eos aliquam minima. Placeat delectus itaque sapiente ut labore perspiciatis. Repudiandae minus et eligendi sint voluptatem exercitationem. Totam sit autem libero in quas reprehenderit odit. Sunt ut minima delectus error velit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(141, 2, 1, 'Similique in', 'similique-in', 'Beatae possimus vitae qui ducimus. Quis tempore reprehenderit sint et omnis.', 'Alias voluptatibus perspiciatis autem tempora. Voluptatem ipsum dolores dolores sed. Dolor quis reiciendis reiciendis quasi voluptas qui aperiam. Qui officiis voluptatem reprehenderit eligendi iste ipsam. Et amet autem hic. Ipsam consequatur consequuntur vel voluptas dolor. Laboriosam impedit qui ut adipisci.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(142, 1, 1, 'Quis id voluptatibus', 'quis-id-voluptatibus', 'Ducimus voluptas ut quae quia est doloribus consequatur. Quos ea quam omnis.', 'Dolor corporis laudantium voluptas ut quam vero unde quia. Aperiam est mollitia dignissimos voluptas similique et. Repellat est sed recusandae et consequuntur temporibus. Dignissimos dignissimos minus et consequatur ut quia. Labore asperiores sit perspiciatis laboriosam. Ut minima quidem ipsam et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(143, 1, 1, 'Laboriosam qui excepturi', 'laboriosam-qui-excepturi', 'Est ea asperiores et molestias nesciunt.', 'Nisi nostrum cum atque aut porro ipsa laborum est. Dolorum voluptatem ut error non ut eum ab. Praesentium perspiciatis ratione omnis nesciunt consequuntur. Explicabo quam qui doloremque velit modi nemo. Vitae qui possimus ratione ipsa consequatur. Occaecati tenetur consequatur optio facere aliquid praesentium.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(144, 2, 1, 'Exercitationem nisi illo', 'exercitationem-nisi-illo', 'Est ea modi suscipit sed explicabo. Repellendus laborum nam nobis eligendi sit nemo.', 'Sint iusto veniam repellendus quod rerum. Nesciunt perspiciatis ut in. Culpa ea et quia dicta fuga. Ut quia placeat beatae odio et corporis recusandae. Aliquam vel et autem illo qui quia. Doloremque reprehenderit quidem voluptatem dignissimos nostrum magni.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(145, 2, 1, 'Consequatur suscipit at', 'consequatur-suscipit-at', 'Aliquam nulla rerum vitae laborum distinctio ut porro. Ut iure quia ipsa nisi.', 'Ut sed et est tenetur aperiam et rerum. Blanditiis repudiandae aspernatur exercitationem vero sint nisi blanditiis minima. Quisquam nesciunt vel tempore est qui. Aut voluptatum magni minus rerum ut architecto labore quo. Ut beatae eum ullam est aut. Voluptatem officia ut ratione doloremque.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(146, 2, 1, 'Culpa voluptatem architecto', 'culpa-voluptatem-architecto', 'Provident et voluptatum natus dicta fugit.', 'Ut voluptatem eum repellat. Error atque enim ut aliquid eveniet consequatur. Fugit eum asperiores totam consequuntur ratione doloribus. Quaerat repudiandae ut qui unde earum id quidem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(147, 1, 1, 'Rerum consectetur iusto', 'rerum-consectetur-iusto', 'Nisi ducimus ab aut facilis.', 'Quidem qui in omnis nihil. Omnis saepe earum sed sint voluptatibus nemo eum. Numquam blanditiis necessitatibus perferendis. Qui consectetur ipsa qui possimus perferendis occaecati. Impedit sed placeat officiis exercitationem. Ut id dolores animi modi. Dolor amet eaque eum animi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(148, 2, 1, 'Fuga aliquam sit', 'fuga-aliquam-sit', 'Quod omnis perferendis est et sed voluptatem. Rerum repellendus sed aliquid.', 'Commodi repudiandae quibusdam veniam omnis tempora. Veritatis voluptatum sunt doloribus fuga facilis dolorum. Praesentium cumque dolor quas consequatur ut debitis nostrum. Autem et unde dolor animi ut. Deleniti suscipit qui quo minima.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(149, 1, 1, 'Quidem recusandae', 'quidem-recusandae', 'Distinctio fuga nam hic praesentium eos temporibus. Et sint perspiciatis commodi occaecati.', 'Unde enim enim rerum voluptatem quos. Voluptate aut enim esse eos quidem voluptas. Nihil delectus dolore at neque qui doloremque consequatur. Sunt qui voluptatem id odit excepturi quia molestiae. Suscipit dicta dolores praesentium sequi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(150, 2, 1, 'Eum quibusdam neque', 'eum-quibusdam-neque', 'Consequatur aut voluptas repudiandae vitae quasi. Velit fugit laudantium minus quasi amet.', 'Quia eum molestias quo modi modi neque. Ut et non ratione. Nesciunt facere sit est qui explicabo fugit ratione. Dolores aperiam et libero. Mollitia architecto nobis beatae consequatur perferendis voluptatibus voluptatum. Non aliquid ratione sed. Fuga hic eaque recusandae eos voluptatem dolor aliquam. In distinctio neque est mollitia.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(151, 2, 1, 'Expedita saepe', 'expedita-saepe', 'Non fuga laudantium tempora omnis ut placeat. Repellat excepturi velit in in.', 'Perferendis nihil unde incidunt dolore et et reprehenderit. Commodi quam reiciendis ducimus enim et reprehenderit. Omnis ut voluptatum distinctio vero delectus. Nisi ut non incidunt et. Deserunt perferendis placeat esse minus. Cum sit deleniti laboriosam cum consequuntur provident ut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(152, 1, 1, 'Ut sapiente', 'ut-sapiente', 'Harum aut aspernatur officia ut et beatae rem. Dignissimos et ducimus quo neque rerum iure autem.', 'Et architecto voluptas explicabo necessitatibus. Culpa dolorem corrupti laboriosam voluptatem maiores totam illo a. Facere atque provident sit quod. Laboriosam voluptatem porro at est sunt aut. Molestiae nulla fugit modi distinctio molestiae deserunt.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(153, 1, 1, 'Velit quis', 'velit-quis', 'Libero ab amet neque et facilis sunt.', 'Quia ad quas error magnam occaecati ratione qui. Facere non sint velit est error ut. Beatae quisquam enim pariatur. Delectus illum et adipisci eos. Doloremque ut deleniti veritatis aspernatur culpa. Dolorem et exercitationem aut similique necessitatibus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(154, 2, 1, 'Labore ut quam', 'labore-ut-quam', 'Sit rerum vel quia maiores sed omnis facere.', 'Est distinctio qui molestiae cupiditate. Ut voluptas incidunt non. Dolorem omnis illum quam perferendis et. Vitae non ut earum sapiente dignissimos illum quos.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(155, 2, 1, 'Enim ut et', 'enim-ut-et', 'Id enim saepe hic maiores.', 'Sint ducimus rerum laborum omnis dignissimos ducimus voluptas. Sequi totam quam aspernatur rerum voluptates eos. Officiis sint eveniet quia aut. Consequuntur accusamus et veritatis qui similique dolor. Officiis nam id autem laudantium eligendi. Veniam qui debitis officia autem aperiam suscipit qui. Sit dolor iusto suscipit molestiae dolor.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(156, 1, 1, 'Quod soluta eaque', 'quod-soluta-eaque', 'Illum illo est quod quidem.', 'Explicabo at deserunt voluptatibus vero dicta facere. Repellat rem earum labore dolore voluptas eveniet. Id non est pariatur omnis. Asperiores non velit cupiditate aut iure. Voluptas autem eaque quo maiores sed. A vero consequatur omnis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(157, 2, 1, 'Molestiae dicta', 'molestiae-dicta', 'Qui corporis minus velit velit. Autem voluptatem aut impedit ut.', 'Eum temporibus officia sit nihil blanditiis praesentium. Perspiciatis beatae labore possimus in esse vel. Sit veniam in velit est repudiandae. Fugiat suscipit dolorem et quia tenetur. Molestiae culpa ipsum praesentium qui eos autem at.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(158, 2, 1, 'Iusto tempore', 'iusto-tempore', 'Omnis beatae rem labore maxime. Velit harum molestias aliquid maiores.', 'Alias qui est quis illo. Saepe magnam officiis nemo dolore autem voluptatem veniam. Ullam deleniti minima est ut blanditiis. Corrupti doloremque et quidem praesentium in. Repellat dolor perferendis non culpa. Doloribus tempora debitis totam minus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(159, 1, 1, 'Delectus dolor iste', 'delectus-dolor-iste', 'Est excepturi libero quas vel est vel.', 'Libero dolores odio est qui qui rerum. Atque alias sunt unde minus maiores. Sapiente pariatur dolor voluptatem commodi. Est reprehenderit non incidunt voluptas ducimus hic sunt.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(160, 1, 1, 'Quo corporis', 'quo-corporis', 'Ea et aut pariatur pariatur.', 'Non earum rerum enim nihil totam. Nobis nihil commodi odio sunt eos dolore. Dicta quo ut non reiciendis ea et reprehenderit. Fuga fugiat impedit eius corporis a qui voluptatum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(161, 2, 1, 'Velit nam fugiat', 'velit-nam-fugiat', 'Temporibus impedit praesentium eveniet et nobis. Voluptas ut praesentium ullam quia tempora rerum ut beatae.', 'Qui voluptatem voluptatem doloremque non. Quaerat cum sit officiis est molestiae aperiam dolorem sit. Est veritatis neque enim et at laboriosam. Dolores esse voluptate est quod laborum consequatur. Veritatis nemo vitae unde. Eligendi ea voluptas nostrum provident quas voluptatum dolores. Veniam et velit perferendis et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(162, 1, 1, 'Quis eos possimus', 'quis-eos-possimus', 'Magnam optio illum quaerat enim.', 'Sed excepturi dolorem quis error dignissimos earum et. Cum fugiat cupiditate dolor quos. Recusandae maxime alias pariatur et pariatur. Nihil optio voluptas voluptate voluptatem quia. Rem fuga aut nesciunt veritatis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(163, 1, 1, 'Sit aspernatur minus', 'sit-aspernatur-minus', 'Aperiam qui voluptates excepturi inventore est.', 'Eos harum quasi natus provident. Et molestias et quibusdam repellat. Doloribus sit iusto pariatur veniam illo. At impedit quas enim qui eaque quam. Deleniti quam exercitationem minus perferendis corrupti ab.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(164, 2, 1, 'Officiis fugit recusandae', 'officiis-fugit-recusandae', 'Omnis vitae est eligendi laborum ab magni qui iure.', 'Numquam odio qui voluptatem quia facilis sit. Expedita adipisci pariatur perspiciatis maiores quis hic sint possimus. Fugit nihil harum maiores officia. Eaque dolorem sed et sit. Cupiditate perspiciatis consequatur rerum animi autem. Sequi minima qui corporis et eligendi. Placeat saepe vitae recusandae nesciunt quia aliquid sit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(165, 1, 1, 'Enim commodi mollitia', 'enim-commodi-mollitia', 'Molestiae sed ut sequi et. Porro iste ut ut dolores iure atque tenetur.', 'Dolores dolorem corporis sint laudantium. Excepturi ab dolores voluptas. Qui cum voluptates magni enim qui. Molestiae et ut quos sunt quam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(166, 2, 1, 'Optio quia', 'optio-quia', 'Quos temporibus ipsam non exercitationem tempora quam sapiente. Sed itaque illum non delectus et et omnis voluptas.', 'Id ipsam id enim dolores voluptatibus consectetur. Doloribus aliquid saepe rerum. Maxime dolor eveniet et qui omnis autem cupiditate. Perferendis consequatur consequatur qui eos reprehenderit. Aut magni quas ipsam velit vitae eum. Eaque nihil itaque deserunt numquam aliquid.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(167, 1, 1, 'Omnis atque', 'omnis-atque', 'Aut rerum pariatur odit maiores neque perspiciatis.', 'Possimus vel eum non error eligendi. Maxime laboriosam omnis aut mollitia excepturi voluptas repellat. Accusamus autem harum esse voluptatibus cum. Ut quo omnis harum ex reprehenderit quos veritatis voluptatem. Architecto laudantium quisquam nulla enim sit quisquam aliquid. Ipsam hic sit nihil laudantium. Aut temporibus rem odit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(168, 1, 1, 'Omnis repellendus', 'omnis-repellendus', 'Sunt repellendus deserunt corporis commodi. Corporis qui in quod mollitia fugiat qui assumenda.', 'Nemo sit dolores veritatis aperiam ab accusantium blanditiis. Eveniet asperiores et quam a saepe sed quae modi. Quidem in similique quo natus culpa. Assumenda porro consequatur aut at et est minima. Quasi et asperiores natus delectus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(169, 1, 1, 'At molestiae', 'at-molestiae', 'Nobis qui aut id illo. Sint numquam sed ullam asperiores ut saepe et.', 'Consequuntur tenetur sint repellendus. Soluta quis ex et quod. Molestias ut nam deleniti quibusdam velit. Enim odio perferendis velit eveniet. Vitae porro modi cumque mollitia necessitatibus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(170, 1, 1, 'Deserunt hic', 'deserunt-hic', 'Minus nam deleniti quam.', 'Aut nihil aliquid eos praesentium. Dolor quia harum commodi est et voluptatem. Non sed illum dignissimos voluptatum incidunt. Dolores illo reprehenderit tempora rem. Quia aut dolorum officiis itaque doloremque quia. Voluptatibus sequi ut doloremque molestias eum cumque. Iure aut et enim.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(171, 1, 1, 'Voluptatibus aut', 'voluptatibus-aut', 'Quae dolor quia iste beatae.', 'Voluptatibus eius voluptas modi ea expedita tenetur et. Id architecto nam nulla et quisquam dolores. Est sint et sint temporibus quae. Quia qui molestiae ut ipsam et qui. Eos officia expedita dolores molestiae. Odio eos nobis dicta consequatur. Voluptatibus voluptatibus doloribus possimus amet porro.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(172, 1, 1, 'Quibusdam doloribus', 'quibusdam-doloribus', 'Accusantium doloremque et nisi. Inventore et suscipit illo sed et pariatur consequatur asperiores.', 'Qui ut id assumenda et et laborum autem nam. Nihil officia occaecati in quos recusandae quam. Aut dolor asperiores impedit laborum exercitationem. Dolores dolores deserunt ratione odit voluptas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(173, 1, 1, 'Accusamus consequatur', 'accusamus-consequatur', 'Aut error possimus esse blanditiis amet sit vel. Doloremque et quam laudantium iste ut quisquam.', 'Magnam non culpa id expedita error nulla et libero. Debitis aut incidunt eligendi neque. Eius illo tempore magni et impedit et voluptatem quis. Et aliquam nemo rerum a earum molestiae nihil dolores. Exercitationem nam sit nemo itaque quia assumenda. Nulla quaerat iusto doloremque neque non hic.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(174, 2, 1, 'Iure eius unde', 'iure-eius-unde', 'Ut architecto nobis tempore sit est. Maiores sed voluptas autem eum rerum totam.', 'Quibusdam autem dicta ut nisi hic quaerat. Impedit minus rerum nihil sed incidunt autem. Maxime quam fugit vel. Laboriosam voluptatem quo sint non.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(175, 2, 1, 'Quidem earum', 'quidem-earum', 'Et aut et rerum eveniet voluptatem quasi ab. Veritatis optio molestias velit nihil.', 'Distinctio repellat id officia facilis laboriosam. Error quasi quia facilis debitis repellat explicabo. Corporis similique non placeat mollitia quaerat ea eius consequatur. Distinctio atque et cumque sit. Ut velit magni id et debitis ipsum. Placeat ut et sint cupiditate. Illum et aut incidunt vitae ut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(176, 1, 1, 'Aut numquam quisquam', 'aut-numquam-quisquam', 'Unde sed voluptatem aliquam.', 'Deleniti delectus repellendus ratione quibusdam non voluptate. Soluta fuga iste ullam molestiae ut. Enim molestias voluptate ut quia animi libero consequatur. Sunt eos veritatis impedit neque. Tempora dolor sapiente cum molestiae sit doloribus ab. Deleniti quos et voluptatem saepe delectus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(177, 1, 1, 'Aut et quis', 'aut-et-quis', 'Magni accusantium aut eaque dolor qui sunt aliquid exercitationem.', 'Culpa qui accusantium maxime doloribus sequi. Minus at ut veritatis distinctio nemo. Illo rem assumenda rem fugiat. Quaerat mollitia impedit dolores sit voluptatum omnis. Tempora aut asperiores perspiciatis saepe deserunt.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(178, 1, 1, 'Voluptatem ratione non', 'voluptatem-ratione-non', 'Amet ullam porro mollitia eius iste doloribus.', 'Est ipsam molestiae facere ut. A et et hic minus ut. Molestiae aut officia molestiae rem. Mollitia asperiores quis natus autem dolor fugit et. Sit et totam error accusantium est.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(179, 2, 1, 'Blanditiis nisi ducimus', 'blanditiis-nisi-ducimus', 'Non inventore saepe nihil voluptates et et. Est voluptatum ex iste illo et adipisci.', 'Dolores consequatur autem est quasi et similique. Doloremque qui nulla iusto iusto laudantium quaerat in dignissimos. Placeat ad ipsam error reprehenderit quam in. Enim maxime nesciunt sapiente. Libero sed eaque omnis illum. Exercitationem quia rerum necessitatibus quae et eaque iste.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(180, 1, 1, 'Modi eveniet', 'modi-eveniet', 'Iusto dolor magnam sint enim quia qui quis libero. Autem impedit accusantium et omnis ut dolores adipisci.', 'Unde assumenda voluptatum autem porro eos sint voluptatem. Illum quidem nisi quidem quis. Quis qui aspernatur suscipit eum occaecati vitae et. At voluptate nam ratione cumque provident iste aut. Dicta ut voluptates non reprehenderit maiores. Porro nihil velit enim nisi et expedita eos.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(181, 2, 1, 'Rerum et aut', 'rerum-et-aut', 'Odit quidem recusandae et voluptatibus animi porro qui.', 'Qui alias itaque rerum adipisci qui recusandae. Laudantium et sunt veritatis dolores magni. Cumque qui sed tempora quaerat et perferendis est. Perferendis modi esse et. Ut earum praesentium amet blanditiis. Nobis quo aut ex magnam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(182, 2, 1, 'Earum voluptatibus', 'earum-voluptatibus', 'Rem earum ipsum ipsa excepturi voluptatem molestias. Blanditiis alias dolores ullam dolores dolores.', 'Vitae ipsam nostrum iusto modi repellat. Odit aliquam nisi non animi tenetur placeat. Possimus placeat eligendi non. Omnis ut eos atque ullam rerum vitae. Quasi praesentium repellat rerum in officia. Excepturi voluptas mollitia ad et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(183, 1, 1, 'Id dolorem', 'id-dolorem', 'Et natus molestiae et consectetur commodi sed laudantium. Omnis quia expedita delectus consequatur.', 'Autem qui et sit voluptates tenetur eum unde cupiditate. Expedita quis facere dolorem vel provident. Incidunt explicabo quasi distinctio nostrum ut eos. Quia expedita atque atque cumque.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(184, 1, 1, 'Nobis itaque', 'nobis-itaque', 'Nihil illo facilis corrupti quos sunt et.', 'Illo et veritatis maiores est enim vel et quis. Nisi et ea amet excepturi in porro est. Quia dolorum perferendis ea occaecati facilis sunt minus laboriosam. Praesentium atque dolores modi laborum ea culpa. Et facere numquam corporis ipsa id qui. Est consequatur tempora quo earum. Natus voluptatem unde libero sed.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(185, 1, 1, 'Vitae vero impedit', 'vitae-vero-impedit', 'Rerum adipisci et eaque voluptas ullam accusantium. Animi corporis voluptatem laudantium sunt rerum enim.', 'Eum consequatur veritatis commodi quis voluptates. Libero possimus eius pariatur et. Maiores ut iusto harum. Eveniet deleniti qui dolorem optio.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(186, 1, 1, 'Velit consequatur aperiam', 'velit-consequatur-aperiam', 'Provident aut et laudantium.', 'Consequatur eos labore cupiditate suscipit omnis. Molestias praesentium aut et ut ut voluptates sunt. Eveniet impedit quo atque cumque quod consequuntur omnis. Dignissimos laboriosam sint perferendis explicabo excepturi voluptatibus ullam. Illo ut rerum rerum. Ut sint itaque culpa et nemo blanditiis expedita et. Velit et voluptas sunt voluptate omnis eum quas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(187, 2, 1, 'Non et atque', 'non-et-atque', 'Est ut et velit magni atque.', 'Omnis voluptatem nostrum sunt dolore voluptatum est. Aut voluptatem ipsum sequi amet. Ipsum laudantium praesentium aliquid in voluptate voluptas quas possimus. Atque earum deleniti et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(188, 1, 1, 'Est quisquam', 'est-quisquam', 'Beatae dolorem qui quas iste. Sed qui laboriosam placeat sapiente.', 'Ut ea neque eos quisquam modi repudiandae. Qui ut laborum eaque fuga ut. Est eaque hic laboriosam architecto hic cumque qui. Quis officia et nemo possimus aut a. Labore cumque repudiandae ipsam porro neque doloremque illum est.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(189, 2, 1, 'Quia harum aut', 'quia-harum-aut', 'Quis delectus voluptatem sint cumque impedit sed.', 'Molestiae sed vitae ut suscipit neque occaecati. Vero est iusto iste ex aut asperiores sunt. Nemo et quam repellat aut alias quaerat. Sed nihil odit qui dolorem non. Porro sint numquam minus inventore rerum voluptates.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(190, 2, 1, 'Ex vero cum', 'ex-vero-cum', 'Distinctio ea reprehenderit soluta excepturi et et laudantium. Est laboriosam sed nobis nesciunt magni eum.', 'Sit est id aut natus nesciunt provident tempore. Velit ipsum eos quia. Veniam et quaerat libero. Asperiores blanditiis totam mollitia impedit in officia odit. Perferendis eius est illo corrupti voluptate iste. Voluptatem et animi eos.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(191, 1, 1, 'Eos eius quas', 'eos-eius-quas', 'Harum hic et esse consectetur.', 'Maiores sed asperiores est adipisci maxime doloremque. Dignissimos ut eos molestiae est doloremque omnis omnis et. Consequatur a repellendus est harum dolorem laboriosam voluptatem. Ad sed sint ut accusamus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(192, 2, 1, 'Est sunt consequatur', 'est-sunt-consequatur', 'Perferendis beatae soluta saepe aliquid ut sunt. Iusto id blanditiis voluptatem magni.', 'Beatae hic deleniti hic sed corrupti sit. Quo ab quis assumenda non nihil possimus. Iure maxime expedita maiores voluptates. Quidem ipsum accusamus corrupti nisi cupiditate nihil.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(193, 2, 1, 'Qui facilis', 'qui-facilis', 'Quas aut deserunt aliquid maiores aspernatur. Magni dolorum aut voluptas laborum.', 'Pariatur nemo dolorum reprehenderit corporis qui aspernatur. Eos aut porro illo dolores rerum praesentium est temporibus. Quis laboriosam quo atque quisquam. Consequatur dolorum ut fuga voluptas illo ea qui.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(194, 2, 1, 'Illum autem sint', 'illum-autem-sint', 'Porro consectetur illum distinctio dignissimos.', 'Aspernatur odit repellat assumenda sed sunt. Itaque facilis earum velit voluptatem qui corporis ducimus. Ducimus tenetur autem at quidem. Esse in eos ut dolor debitis quia. Dolorem rerum adipisci enim accusantium commodi perferendis. Animi est sit ut qui. Expedita sequi et est.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(195, 1, 1, 'Cumque illum', 'cumque-illum', 'Reprehenderit ipsam at et labore omnis. Possimus nostrum debitis perferendis et.', 'Velit repellat labore magnam cum delectus. Sit possimus neque hic quasi. Corrupti quo sapiente praesentium beatae rerum. Harum odit quod quaerat et quae. Soluta et quo earum illum nisi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(196, 2, 1, 'Explicabo repudiandae', 'explicabo-repudiandae', 'Aperiam veritatis temporibus non est dolorem. Voluptatibus expedita tempore quos aut iste eaque deleniti.', 'Voluptates ut officiis labore placeat nihil iste. Autem libero possimus accusamus sit et. Nemo ut tempore laudantium occaecati excepturi. Voluptatem alias quaerat dolorem officiis voluptatem error. Ducimus tempora quibusdam ea explicabo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(197, 2, 1, 'Ut fugit', 'ut-fugit', 'Nihil vitae doloribus adipisci quidem incidunt aut.', 'Accusamus eveniet et voluptate sunt. Eveniet repellat ut error est aut nostrum. Molestias sapiente et sint ullam. Provident consectetur autem dolorem sunt. Ullam dolor quia dolorum. Atque doloremque nulla numquam repellendus in quod unde.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(198, 2, 1, 'Voluptatem eos inventore', 'voluptatem-eos-inventore', 'Et doloribus fugit temporibus corrupti.', 'Esse minima impedit sint numquam. Commodi veniam necessitatibus voluptatem. Blanditiis inventore perferendis molestias est ut. Magnam expedita et veniam ratione.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(199, 2, 1, 'Nostrum maxime inventore', 'nostrum-maxime-inventore', 'Sunt minus exercitationem reprehenderit eaque. Vero maiores culpa quasi accusamus.', 'Consectetur qui perferendis et non autem id et. Autem reiciendis quos ullam nesciunt. Quam doloremque qui iste asperiores eum ratione voluptatibus saepe. Et corporis in blanditiis voluptates non.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(200, 2, 1, 'Libero cupiditate temporibus', 'libero-cupiditate-temporibus', 'Doloremque et soluta dolorum.', 'Sequi exercitationem eos omnis repellendus laboriosam et. Id aut molestiae ab. Sunt voluptatibus dolorem ut tenetur error. Non voluptatem velit nihil perspiciatis omnis id temporibus eligendi. Quidem repellat sed ipsa quasi hic commodi eum. In consectetur quis laboriosam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(201, 1, 1, 'Molestiae doloremque quibusdam', 'molestiae-doloremque-quibusdam', 'Eligendi fugiat nihil hic quo adipisci dolor repellendus. Quo quia consectetur hic voluptatibus.', 'Consequatur perspiciatis qui repellat eum ex ducimus sed. Culpa perferendis voluptas in in expedita. Quia voluptatem repellat est aut illo enim. Ex autem veritatis odio id maiores. Non distinctio in quaerat voluptates rerum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(202, 2, 1, 'Architecto impedit quidem', 'architecto-impedit-quidem', 'Illo sint eos laboriosam qui ut.', 'Adipisci nam et iste cupiditate dolor. Id accusantium tempora totam iste temporibus. Qui quisquam voluptatum ratione quidem ut nostrum praesentium. Excepturi ut hic est aut sit pariatur. Voluptas impedit harum nulla id et ea.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(203, 2, 1, 'Id ducimus quo', 'id-ducimus-quo', 'Molestiae corrupti quod explicabo qui. Odio consequuntur sed ut adipisci non sequi ut.', 'Cupiditate expedita unde adipisci mollitia iste facere. Facere iure debitis officiis. Molestiae alias consequatur et sequi praesentium id. Consequuntur officia et modi explicabo aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(204, 2, 1, 'Et aspernatur quidem', 'et-aspernatur-quidem', 'Porro quo et architecto. Reiciendis atque eveniet consequatur repellat consequatur enim.', 'Aut voluptas labore quaerat ex. Qui quia corrupti odio voluptates enim neque. Dolore in iure dolor commodi molestiae. Cum voluptas et est magni delectus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(205, 1, 1, 'Eius laboriosam', 'eius-laboriosam', 'Quidem ea veritatis nesciunt ullam. Officia reprehenderit expedita consequatur doloremque laudantium.', 'Iste consequatur nihil sed quidem odio aliquid. Laborum repudiandae sequi nesciunt repudiandae quas. Odio adipisci voluptate ut est est. Molestiae eligendi possimus tenetur sapiente autem excepturi eos. Illum aut ullam quae at ut non. Nesciunt vel ut ut voluptatem quia doloremque. Similique nihil rem possimus magnam ullam iure.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(206, 2, 1, 'Reprehenderit dolor', 'reprehenderit-dolor', 'Aut enim eos voluptas repudiandae. Officiis est et repellat officia.', 'Eligendi mollitia corrupti architecto beatae perferendis quia placeat. Voluptas eum provident explicabo. Cupiditate tempore quo et aut dolores consequatur aut. Neque sit quis voluptatem ipsum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(207, 2, 1, 'Hic nobis est', 'hic-nobis-est', 'Eaque magni veritatis architecto sit quidem. Nihil ipsa quia ipsa suscipit enim nisi.', 'Qui rerum optio soluta consectetur perspiciatis velit voluptate. Consequatur qui voluptatem consequatur enim aut vel vero. Sed et laborum numquam esse rerum. Temporibus quis autem adipisci quas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(208, 2, 1, 'Temporibus vero et', 'temporibus-vero-et', 'Modi et ducimus voluptatem mollitia. Quaerat ut asperiores voluptate aut velit modi.', 'Sed voluptas ut corporis rerum iste tenetur vel occaecati. Quia et rerum ea nostrum ea. Autem aperiam doloribus dolores asperiores error occaecati minima. Similique ad labore voluptas facere assumenda commodi dolore. Voluptatem in recusandae id sit laborum. Et ut reprehenderit consequatur quibusdam cupiditate ipsam minus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(209, 1, 1, 'Et natus distinctio', 'et-natus-distinctio', 'Aut omnis distinctio sint sed. Dolore ea aut omnis laudantium sunt cumque reiciendis.', 'Ut numquam eos neque blanditiis. Itaque atque quidem eveniet. Nostrum dolorum eveniet officiis adipisci temporibus quis. Magnam quam nesciunt consequatur labore fuga.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(210, 1, 1, 'Omnis ut ea', 'omnis-ut-ea', 'Et autem nisi excepturi sit voluptatem.', 'Ipsam cumque molestias quia eligendi. Et ab eos aut architecto dicta. Est laborum consectetur eos. Est molestiae natus ut voluptate enim.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(211, 2, 1, 'Animi praesentium', 'animi-praesentium', 'Laudantium nesciunt vel architecto voluptatem architecto.', 'Facere et saepe architecto enim error. Corrupti et et reiciendis autem quis suscipit ullam. Sint placeat distinctio nostrum ut iusto. Aut voluptate est perferendis voluptatem nisi qui ullam ratione.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(212, 1, 1, 'Aspernatur odio nisi', 'aspernatur-odio-nisi', 'Sed soluta repellat aut corrupti iusto dicta. Vel iusto ratione eum.', 'Provident voluptatem quia explicabo aperiam corrupti doloribus. Ad exercitationem id et accusantium qui est laboriosam. Dolores non accusantium rerum dignissimos. Temporibus sapiente qui illum aut. Eum aut nostrum quam aut iusto tempore. Perferendis alias nobis deleniti quasi explicabo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(213, 1, 1, 'Magni placeat', 'magni-placeat', 'Vitae excepturi ab error dolore ut ea. Possimus in accusamus eius id occaecati tempora aperiam.', 'Dolorem voluptatem aperiam sit laudantium. Sed eaque vel repudiandae ut sint vel. Aut tenetur sapiente et mollitia. Architecto voluptatem temporibus modi occaecati. Hic dignissimos nihil velit voluptas. Velit quia culpa rem nemo a quia eius. Optio dicta quis porro et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(214, 1, 1, 'Provident illo', 'provident-illo', 'Totam repudiandae est consequatur ab molestiae voluptatem et voluptas.', 'Voluptas commodi voluptatem minus sapiente. Eos a et non consectetur atque vero. Sint et et vel animi in in enim molestiae. Est magni quam qui aut aut ut dolorum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(215, 2, 1, 'Ducimus voluptatibus', 'ducimus-voluptatibus', 'Eligendi quo ab et.', 'Eius deserunt similique impedit id aut. Optio vero ut sit. Odio quis soluta necessitatibus quibusdam maiores magni aut. Eum mollitia nam voluptatum quo. Mollitia soluta id quia illum ipsa. Eum repellendus aut assumenda deleniti aliquid sit sit. Quis harum et quis delectus libero sapiente praesentium.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(216, 2, 1, 'Inventore possimus consequuntur', 'inventore-possimus-consequuntur', 'Omnis autem est non sunt. Ipsum rerum aut reiciendis neque quibusdam quas.', 'Quia cumque quos iste quis maxime. Numquam consequuntur iste voluptate dolore omnis quibusdam. Ut est vero saepe est pariatur aperiam. Aliquid quo earum nihil qui quia. Impedit ea in adipisci repudiandae ratione debitis voluptatem. Omnis tempora voluptate ut ad debitis. Eveniet voluptatibus iusto veritatis quae similique praesentium fuga et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(217, 2, 1, 'Sapiente sunt', 'sapiente-sunt', 'Ducimus quam hic qui necessitatibus officiis illum vel. Ut maiores quisquam impedit tenetur aut.', 'Eligendi commodi eos eum aut. Consequatur architecto necessitatibus perferendis consectetur amet. Laudantium voluptas delectus dolores numquam iure labore consequuntur. Voluptas est expedita libero et earum eum enim.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(218, 1, 1, 'Et ut', 'et-ut', 'Et rerum nobis quia unde. Fugiat atque eum adipisci perferendis distinctio.', 'Enim quam earum impedit harum quidem. Distinctio architecto esse voluptates unde autem. Ipsam impedit omnis praesentium corporis. Natus excepturi unde sequi placeat. Quam harum voluptas voluptatem ex porro.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(219, 2, 1, 'Velit non', 'velit-non', 'Laborum qui saepe voluptatem quis voluptatem nemo neque.', 'Quidem veritatis provident cum. Magnam odit sunt nihil aut praesentium natus inventore. In omnis soluta consequatur. Quis omnis ratione nulla recusandae.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(220, 1, 1, 'Nostrum minus necessitatibus', 'nostrum-minus-necessitatibus', 'Quia vel nostrum optio non.', 'Cum aliquam quia sit sunt qui quos mollitia est. Dolor cupiditate nihil atque perferendis. Sit et vel ratione id laudantium dolores. Placeat iste id qui veritatis reprehenderit eligendi voluptatem. Cupiditate est quia vel harum accusamus alias amet. Ut ut est vel ut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(221, 1, 1, 'Illo consectetur', 'illo-consectetur', 'Sit temporibus eos magnam impedit provident.', 'Consequatur quod ut ab eaque cum. Ut est recusandae officiis et veritatis. Eum quos harum dolorem rerum. Voluptates velit et hic non repellat dicta qui. Unde impedit sit culpa et. Ea ut numquam rerum atque.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(222, 2, 1, 'Dolorem fuga dolor', 'dolorem-fuga-dolor', 'Harum magnam autem corrupti est. Suscipit dolorum deleniti temporibus numquam totam quo id unde.', 'Neque aut voluptas et tempore eum iste atque. Qui occaecati qui asperiores nam porro et voluptatem. Quidem sed sit ducimus qui. Non asperiores et eius aut provident. Quia quos inventore dolores repellat et dolorem ut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(223, 1, 1, 'Inventore dolor tempore', 'inventore-dolor-tempore', 'Cum id illo voluptatum sint distinctio. Et rem repudiandae accusantium necessitatibus.', 'Rerum est repellat deserunt natus illo dolor repellat. Tempora quisquam earum omnis ea. Sint aut aliquid expedita culpa. Quo est inventore consequatur nihil fugit unde. Vel asperiores ad esse praesentium vel. Eos veniam id minima adipisci voluptas est.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(224, 2, 1, 'Et assumenda sunt', 'et-assumenda-sunt', 'Reprehenderit accusamus nobis aut iste.', 'Labore fugiat voluptates ratione accusamus. Et soluta minima ut amet et nemo. Rem velit quia ut vel quia molestias. Odit veritatis omnis inventore. Aliquam dolore non ut eum excepturi. Accusamus et repellendus non ut corporis repudiandae. Similique ipsam enim deleniti ipsam vel fugit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(225, 1, 1, 'Qui qui ad', 'qui-qui-ad', 'Ut aut cumque error recusandae ipsam laudantium. Ea ut consequatur aliquam quod dignissimos.', 'Rerum et placeat possimus adipisci omnis cupiditate repudiandae. Qui consequatur nostrum alias facilis dolorum libero nesciunt occaecati. Ducimus ad quia molestias sit quasi amet totam. Accusantium qui necessitatibus ipsam quia. Rerum occaecati corporis ut enim ut rerum. Quia ut quam iste laboriosam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(226, 2, 1, 'Rerum quo nulla', 'rerum-quo-nulla', 'Id delectus labore dicta voluptatem consequuntur et.', 'Fuga libero dolore quis veniam. Et temporibus omnis molestiae rerum quibusdam illum a. Nostrum suscipit modi aut. Excepturi omnis odio porro reiciendis et officiis. Accusantium molestiae sed quia rerum eum. Molestias molestias ad recusandae sit in aut. Quia dolores dolores id reprehenderit saepe. Perspiciatis eos est impedit soluta optio consequatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(227, 2, 1, 'Velit debitis', 'velit-debitis', 'Deleniti quas quam aperiam eligendi. Vitae officia accusamus dolor est placeat cumque cumque non.', 'Laudantium at quis laborum consequatur voluptas est sunt. Earum est id maiores ut sapiente numquam corporis. Aliquam debitis sit soluta voluptatibus cumque culpa. Velit voluptatem quo incidunt deleniti eos doloribus atque. Voluptatem quia suscipit necessitatibus voluptatibus nam. Earum blanditiis similique consequatur ut soluta expedita.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(228, 2, 1, 'Dolorem suscipit molestias', 'dolorem-suscipit-molestias', 'Perspiciatis illum est aspernatur officiis voluptas possimus.', 'Fuga earum est voluptates voluptas aut. Consequatur natus reprehenderit corrupti. Odio aliquid est doloribus. Inventore doloremque quae magni itaque consequuntur unde est. Quam quia odit quas sit facere. Quia eum a omnis voluptatem voluptatem. Fugit voluptatem nobis ratione sit in nostrum ut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(229, 1, 1, 'Debitis delectus', 'debitis-delectus', 'Magnam provident quis vel quam ipsam reprehenderit et.', 'Ex voluptas exercitationem eum explicabo natus voluptates. Quisquam est atque quis perspiciatis dicta. Est sit velit quia odio dolorem sed quidem. Iure at laborum ullam sit. Rerum ea praesentium modi laborum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(230, 1, 1, 'Perferendis modi dolores', 'perferendis-modi-dolores', 'Est quis sit amet earum officia quaerat quia aut. Consequatur iste sit eos quod laboriosam adipisci excepturi.', 'Reiciendis architecto aut dignissimos et excepturi corporis odit. Consequatur culpa aliquid qui et occaecati et quam. Dolorem modi praesentium sed quis qui. Ducimus voluptas eos maiores eos vel eos et. Non omnis non qui consequatur. Quo non ullam quibusdam omnis nihil. Ipsa laborum eligendi et veritatis nobis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52');
INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `slug`, `short_description`, `content`, `featured`, `image`, `created_at`, `updated_at`) VALUES
(231, 2, 1, 'Et consectetur', 'et-consectetur', 'Est molestiae vero omnis voluptate aut ut porro.', 'Tenetur expedita ut laudantium nesciunt. Explicabo repudiandae ut numquam quos. Fugit qui qui sit qui vel facere distinctio. Aspernatur in sit dicta natus optio esse ea. Omnis odio fuga iusto consequatur dolores aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(232, 1, 1, 'Sed iusto', 'sed-iusto', 'Ducimus quidem totam dignissimos ut ipsa aliquam.', 'Est officiis facilis expedita saepe iusto. Ratione qui eius pariatur impedit illum ratione quia minima. Est qui rerum omnis et vel est culpa. Quaerat beatae omnis ipsa. Sit veritatis animi dignissimos velit. Ratione et repellendus ipsam veniam accusamus est earum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(233, 1, 1, 'Iusto sunt atque', 'iusto-sunt-atque', 'Eaque aut expedita fugit eveniet. Debitis molestias eos voluptas pariatur vel expedita.', 'Illum animi dolor et ut. Et voluptatibus non quo rerum omnis. Expedita ipsum sint quisquam. Quod odio et sunt. Aut eos ea sit doloremque. Veritatis nobis fugit laborum dolorem architecto.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(234, 1, 1, 'Est iure est', 'est-iure-est', 'Dolor iste maiores magni magnam necessitatibus id. Quos soluta asperiores ratione commodi ea.', 'Voluptatem facilis vel nobis. Est rem dicta magni voluptas praesentium odio voluptas. Repudiandae earum qui consequatur nobis. Suscipit mollitia consequuntur pariatur sunt aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(235, 2, 1, 'Temporibus commodi vel', 'temporibus-commodi-vel', 'Blanditiis nihil non iusto adipisci rerum vero. Autem eius iure unde voluptatibus et et ratione.', 'Est voluptatibus molestiae sed molestias commodi iusto provident. Error laudantium totam fuga eos fuga. Qui veniam a alias ratione et voluptatem excepturi. Officia molestias nulla ipsum dolores minima.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(236, 1, 1, 'Assumenda sed', 'assumenda-sed', 'Adipisci harum qui quasi voluptatem. Nihil voluptas aperiam ut optio quis vel omnis.', 'Voluptatem tempore commodi dolorem ipsam veniam tempora recusandae. Esse et at in. Similique aliquam iure dolorem quia soluta officiis. Error fuga sunt alias suscipit totam dolorum modi excepturi. In error ea asperiores repellendus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(237, 2, 1, 'Praesentium nam', 'praesentium-nam', 'Libero sint esse hic et nihil voluptas ut.', 'Dolor officiis qui quas. Ipsa praesentium consequatur esse eligendi. Sint ut dolores laudantium sequi ut. Qui molestiae sint non quod possimus minus et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(238, 1, 1, 'Tempore earum sint', 'tempore-earum-sint', 'Quis deserunt animi dolor earum. Voluptatibus magnam odit omnis iure.', 'Et expedita minus fuga laborum illum. Nobis qui ipsam dolor dolorum dolore. Harum in perspiciatis quo et. Error hic non nisi facilis consectetur. Harum enim cupiditate alias ea iusto.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(239, 2, 1, 'Nam eos', 'nam-eos', 'Qui unde ex ducimus aspernatur saepe quam. Id magni ipsum occaecati accusantium id aliquam.', 'Sit sed rerum illo corrupti ut autem sequi. Pariatur ut in minus id ut. Ea vitae illo atque odit mollitia modi et nihil. Sequi qui exercitationem saepe adipisci.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(240, 2, 1, 'Repudiandae et porro', 'repudiandae-et-porro', 'Harum aut alias architecto porro nisi sapiente vitae minima. Aliquid natus qui sunt maiores eius.', 'Possimus expedita sunt eum et labore sequi. Ut soluta ea eveniet. Quasi possimus temporibus error. Architecto eius nam vero repudiandae consequatur. Soluta ratione deleniti molestiae in pariatur amet nostrum. Dolores et omnis illum quas sequi. Cum doloremque velit sunt quod sit quis minus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(241, 1, 1, 'Numquam est', 'numquam-est', 'Quia rem vero omnis dolorum eaque dolores. Similique deserunt maxime soluta velit praesentium velit omnis.', 'Ut maxime nisi est. Quia fugiat neque voluptates ut perferendis ut laborum explicabo. Sequi sit sit vero natus dolorem dolorum aliquam. Assumenda exercitationem dicta voluptatem omnis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(242, 1, 1, 'Dolorem laboriosam', 'dolorem-laboriosam', 'Non et nisi sit repellendus voluptatem.', 'Sunt quam quis ex aut aspernatur rerum similique eum. Laborum voluptatum ut nemo sed officiis aut sunt odit. Quia qui qui est molestiae modi. Quod dolor est corrupti aspernatur praesentium ipsum. Odit est rerum ut voluptates omnis eius repellat. Ipsam illum reprehenderit et sint pariatur laborum corporis molestiae. Facere voluptas alias eos at.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(243, 2, 1, 'Magnam quos autem', 'magnam-quos-autem', 'Et mollitia quo maiores enim dolorem.', 'Sunt quia at fugit sed. Repudiandae sit tenetur impedit. Nostrum aut commodi accusantium ut nemo. Delectus optio id magni sit quod doloremque rerum. Voluptatem sed delectus delectus exercitationem. Molestias rem consequatur architecto. Sapiente earum voluptatibus corrupti. Molestiae sint numquam sit sed iusto sint.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(244, 1, 1, 'Aspernatur et', 'aspernatur-et', 'Ducimus autem quia quia laudantium laborum.', 'Voluptatem itaque fuga ab provident eligendi vel. Est molestiae aut autem sit magni minus quia incidunt. Itaque quidem voluptatum sint neque exercitationem. Quibusdam possimus necessitatibus porro est id corrupti mollitia laborum. Omnis id facere consequuntur id odio. Dignissimos dolores placeat qui iusto rem. Omnis numquam voluptatum est est.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(245, 1, 1, 'Saepe vel molestiae', 'saepe-vel-molestiae', 'Sit autem ducimus rerum nisi.', 'Rerum delectus eum voluptatibus eum. Officiis et repellendus minima vel repellat non. Dolorum ab rerum aut. Aut aliquid hic numquam placeat corrupti quis vel. Doloribus veniam inventore temporibus blanditiis officiis veritatis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(246, 2, 1, 'Quisquam eos velit', 'quisquam-eos-velit', 'Quo repellendus sint corrupti quia suscipit nesciunt quos.', 'Et illum optio ipsam dolores aut omnis ducimus. Fugiat beatae quo exercitationem et et doloribus quod. Itaque consequuntur non est quo. Sed occaecati sequi reiciendis porro consequatur est dolores laborum. Sed quisquam hic molestiae.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(247, 1, 1, 'Quia dolore nemo', 'quia-dolore-nemo', 'Eos quia sit provident voluptas qui beatae aspernatur autem.', 'Ut et sit doloribus omnis. Corporis quaerat asperiores magni et ipsam autem omnis. Incidunt repellat necessitatibus eligendi qui excepturi consequatur. Quia porro consequuntur ut vero eaque. Iusto esse neque aspernatur ut ea a consequatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(248, 2, 1, 'Officiis nobis', 'officiis-nobis', 'Maxime illum sapiente velit soluta quam. A autem mollitia magni non libero velit.', 'Deleniti explicabo necessitatibus qui numquam explicabo aliquam. Iste nostrum accusamus sed nulla excepturi eum. Et veniam et beatae ut sit harum. Eligendi adipisci dolorem eum quia assumenda qui. Cupiditate qui et a cupiditate.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(249, 2, 1, 'Error vitae', 'error-vitae', 'Quaerat saepe est magnam nihil numquam doloremque qui eaque. Consequatur ex quos in odit perspiciatis.', 'Amet iste est in placeat optio aut. Nostrum praesentium quo earum sed fuga. Reiciendis hic voluptatem vero laudantium eos. Excepturi porro dolor quis adipisci. Sit quia aut rerum unde aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(250, 2, 1, 'Maiores omnis eligendi', 'maiores-omnis-eligendi', 'Qui quis perspiciatis omnis qui recusandae. Aut dicta eos doloremque architecto.', 'Voluptatum velit et et nulla dignissimos debitis. Dicta odio ut nemo. Iusto eum est adipisci ut possimus. Eos aut vel error eos rem sapiente impedit. Laboriosam sed rerum quia. Est voluptatem neque quia repudiandae est voluptatem tenetur itaque.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(251, 2, 1, 'Qui quo commodi', 'qui-quo-commodi', 'Nobis et sequi impedit itaque consequatur eos voluptatum. Eveniet ullam inventore sint sit asperiores.', 'Molestiae accusamus et dolor quos ipsa quidem voluptates. Voluptatem soluta consequuntur magnam et. Quibusdam esse placeat rerum. Sit autem animi sed quas consequatur et. Voluptatibus iste facilis ex.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(252, 1, 1, 'Est ea', 'est-ea', 'Et enim et saepe ut doloribus. Accusantium inventore culpa aut quaerat delectus autem ullam.', 'Quas recusandae ad culpa iure cumque. Nam beatae omnis repellat consequuntur saepe ad dolor. Totam dignissimos blanditiis sunt et recusandae id qui nam. Rerum iusto earum doloremque quia. Dignissimos soluta nihil dolorum atque possimus doloribus aut. Consequatur ipsa atque aut aliquid itaque ratione quas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(253, 1, 1, 'Omnis commodi', 'omnis-commodi', 'Aliquam amet labore voluptas nihil voluptas dicta molestiae quo. Omnis cumque quia quae enim nesciunt.', 'Quas totam animi non non et et facilis. Alias quae mollitia ut officia. Sapiente non maiores molestiae qui nemo iste accusamus. Tempore tempora recusandae et quia ullam. Ipsam sit nobis adipisci modi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(254, 1, 1, 'Eos voluptatem dignissimos', 'eos-voluptatem-dignissimos', 'Itaque est neque quo ratione ab totam. Praesentium quasi eum ad a.', 'Voluptatum dolorem consectetur vitae saepe. Temporibus porro ut repellat autem maiores. Nostrum et quibusdam laudantium facilis. Veniam unde non error asperiores in recusandae repellat. Vel voluptatem repellendus harum cumque rem dolor. Itaque nesciunt est veritatis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(255, 2, 1, 'A qui', 'a-qui', 'Et voluptatem qui sit nesciunt consequatur voluptas non. Nulla dolorem provident quae accusantium.', 'Vitae rerum ab harum blanditiis. Vero quas debitis porro voluptatibus fuga quisquam sed nostrum. Eos vel ipsum vel soluta. Facere ipsam vel sed est. Sunt quia voluptatem explicabo quia. Quam temporibus amet amet numquam facere. Quo nobis et sint.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(256, 2, 1, 'Consequuntur quasi laborum', 'consequuntur-quasi-laborum', 'Nam iusto vero error eos. Ducimus corrupti debitis et occaecati dignissimos.', 'Beatae odit consequatur animi aperiam dolore distinctio et. Ea sunt eius nemo repudiandae itaque doloribus rerum. Sunt nesciunt natus minima iusto. Nihil doloremque repudiandae hic culpa tempora iste voluptatem. Et rerum consequuntur reprehenderit nostrum facilis. Qui soluta et accusantium id provident distinctio tempora commodi. Distinctio quam nesciunt eveniet suscipit quas qui vitae.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(257, 2, 1, 'Tempora dolor', 'tempora-dolor', 'Quidem officiis id fuga incidunt quos perspiciatis.', 'Et quia nisi minima similique. Ducimus ratione at esse vitae delectus eum. Et perferendis amet rerum cupiditate. Sed natus eaque consequatur ut omnis dolore nisi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(258, 2, 1, 'Odio voluptate aut', 'odio-voluptate-aut', 'Veritatis rerum ex unde est tempore voluptatibus. Vitae officiis qui et cupiditate unde expedita dolorum.', 'Perspiciatis aspernatur quia libero officiis nostrum. Tenetur ea iste eum ut inventore in. Nihil suscipit totam inventore aut impedit aut iusto. Error quibusdam aliquid laudantium. Delectus vitae magnam quo impedit facere. Pariatur odit non iste est dolores suscipit. Molestiae nesciunt enim totam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(259, 2, 1, 'Consequuntur minus', 'consequuntur-minus', 'Non nesciunt omnis eaque aut. Minus iure eum corrupti qui sapiente suscipit.', 'Odio nihil accusantium occaecati iste. Officiis asperiores aut non repudiandae at ut. Velit vel enim velit ad itaque. Et dolores libero consequatur eos. Quia laudantium rerum quaerat magni molestias iure soluta. Illo qui pariatur cum et sint delectus. Amet ipsa nostrum unde blanditiis beatae vitae est.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(260, 1, 1, 'Rerum sed accusantium', 'rerum-sed-accusantium', 'Fuga occaecati illo esse qui aut. Nesciunt occaecati voluptatibus dolorem mollitia quaerat quos quo voluptatem.', 'Quibusdam voluptates velit et qui incidunt sunt est. Voluptas atque molestiae quo ratione nesciunt quibusdam. Quo odio qui laborum quia. Eum saepe sapiente cum libero veniam et et. Aspernatur mollitia alias earum odit. Adipisci aut et temporibus expedita voluptatem unde.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(261, 1, 1, 'Doloremque vitae et', 'doloremque-vitae-et', 'Provident iure magnam architecto.', 'Quia et quae fuga laudantium ea magnam voluptate. Vel vitae repellat optio. Sint deleniti quas eos consectetur minus odio. Nesciunt in rerum error autem consequatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(262, 1, 1, 'Ea dolores', 'ea-dolores', 'Harum eveniet nam quo saepe autem exercitationem itaque. Delectus ab architecto officiis veritatis.', 'Distinctio inventore ducimus doloremque delectus. Quibusdam eum dolorum odio. Quidem saepe ullam sit hic rem omnis magnam. Officiis tempora autem voluptatem fugit accusantium.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(263, 2, 1, 'Ad optio', 'ad-optio', 'Sed doloremque quas a explicabo quibusdam et eaque. Ut magni quaerat sed doloribus.', 'Voluptatem quos aliquam similique est est et. Velit qui aspernatur doloribus occaecati sit facilis. Voluptatum asperiores sapiente neque minima qui sit consequuntur. Nisi dolor nihil ab quia. Quia itaque omnis accusantium accusantium eligendi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(264, 1, 1, 'Voluptatibus nisi occaecati', 'voluptatibus-nisi-occaecati', 'Quia eos vel similique accusamus. Et quia officia necessitatibus adipisci hic eius animi nihil.', 'Suscipit ut tempore commodi. Voluptas et aliquam ratione assumenda. Mollitia aut et voluptatem rem molestiae. Consequatur quasi quia non consequatur quas minus. Iusto vel omnis quam consectetur non. Iste et consectetur est. Alias dolores ea itaque ea dolorem fugiat aut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(265, 2, 1, 'Neque veritatis voluptatem', 'neque-veritatis-voluptatem', 'Ratione et et eum incidunt ut consequatur et. Et pariatur dolor consequatur pariatur.', 'Qui culpa sapiente molestiae assumenda libero quae et. Deleniti qui sunt voluptatem fuga. Expedita inventore consequatur inventore voluptatum. Pariatur nihil nisi excepturi incidunt quis repellat. Occaecati recusandae ea id corrupti deleniti.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(266, 2, 1, 'Molestias sed', 'molestias-sed', 'At ut et recusandae maxime.', 'Consequuntur nostrum ad libero impedit. Quo mollitia error et autem. Nihil rem ut aut sit exercitationem molestiae. Fugiat aut nisi accusamus quia voluptatem ducimus. Dicta sunt ipsum quis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(267, 1, 1, 'Quo nulla', 'quo-nulla', 'Qui non explicabo est inventore quaerat. Qui deleniti beatae ipsam non.', 'Saepe voluptatem laudantium aut totam fugit aut. Ut qui nam facilis odit. Placeat est harum placeat voluptatem quis expedita. Ab veritatis expedita cumque voluptatibus commodi quia amet.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(268, 2, 1, 'Voluptatum sit accusantium', 'voluptatum-sit-accusantium', 'Magni illum voluptatem non. Officia unde nisi consequatur eos sed.', 'Sapiente quod illo modi. Ex possimus voluptatibus architecto quia modi adipisci. Magnam sequi architecto et voluptatum illum aliquam natus veritatis. Voluptatibus aut est praesentium animi sunt error aut sint. Iste nesciunt quo in voluptatem. Laborum qui aut ut animi. Quos aut velit nihil modi qui quibusdam.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(269, 1, 1, 'Ut aperiam', 'ut-aperiam', 'Reiciendis qui qui qui molestiae ut vitae dolores. Mollitia odio aut reiciendis aut.', 'Nihil ea neque eius ipsum illum. Et consectetur aut rerum debitis voluptatem. Fugit facilis excepturi impedit officia eius aut qui ut. Vero expedita tempora molestiae odit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(270, 2, 1, 'Ipsum quasi voluptas', 'ipsum-quasi-voluptas', 'Saepe alias sequi voluptas cumque quidem non alias. Quibusdam nam ullam est suscipit facere corrupti qui.', 'Velit delectus animi dolor harum eos. Ad quia culpa non in aspernatur. Praesentium est magnam veniam. Dolorem vel ut sunt maxime consequuntur nesciunt labore sit. Blanditiis veritatis labore temporibus quasi. Libero qui corrupti magni quos alias esse dolore voluptas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(271, 2, 1, 'Possimus dolorum', 'possimus-dolorum', 'Esse tempora occaecati earum nihil.', 'Quibusdam consectetur labore debitis vitae ut a aperiam aspernatur. Facilis suscipit et officia autem dolores. Atque reprehenderit explicabo et labore quia sequi. A vero vitae minus sit est hic rerum. Dicta debitis possimus omnis nemo. Commodi et voluptatem voluptatem.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(272, 1, 1, 'Veniam occaecati', 'veniam-occaecati', 'Voluptatem deserunt voluptatem est. Et consequatur quidem harum a ex.', 'Pariatur dolorum hic ea enim tempora. Quis praesentium aut quisquam qui. Omnis unde repudiandae aut aperiam. Optio ea recusandae cupiditate quaerat ipsa error odio.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(273, 1, 1, 'Non facilis', 'non-facilis', 'Labore eum molestiae nisi nulla. Eos enim tempore nihil nihil.', 'Omnis et aliquam illo possimus qui animi nisi odit. Facilis ratione iste harum fugit. Voluptas dolorem praesentium nihil eligendi. Omnis consequatur atque illo quasi ducimus soluta. Et eos consequatur vel unde. Eum doloremque hic tempora velit suscipit. Culpa nam est sed similique iusto pariatur. Excepturi aperiam velit voluptatem repellat et enim voluptatum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(274, 2, 1, 'Voluptatibus veritatis', 'voluptatibus-veritatis', 'Tempora aut enim ut dolores earum aspernatur dolores. Consectetur aut ut ut officia aut distinctio.', 'Sed veritatis ea incidunt et perspiciatis repellat quia est. Culpa dolorem aut nostrum. Dolores quibusdam eveniet optio sint sed. Distinctio qui placeat porro nulla. Tempora saepe accusamus occaecati sit quo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(275, 1, 1, 'Dignissimos sit', 'dignissimos-sit', 'Similique totam ratione est molestiae eos.', 'Ex et aut voluptatem voluptas eos. Praesentium dolorem quia ipsam eligendi voluptatibus et. Officia quia quisquam vitae quasi dolores magnam sed. Enim consequatur eos omnis sed quaerat.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(276, 1, 1, 'Earum quia sint', 'earum-quia-sint', 'Maiores ipsum nobis reprehenderit rerum illum mollitia.', 'Voluptate autem officia quos aut. Repellendus quia maiores mollitia ea molestias nobis eius. Voluptate illum consequuntur fuga nobis ut. Tempore ea animi vel. Distinctio eum aut autem harum placeat repellat omnis. Consequatur ut numquam similique ad.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(277, 2, 1, 'Quod omnis', 'quod-omnis', 'Qui quas minima consequatur. Molestiae recusandae impedit at voluptatem eum.', 'Iure dicta deleniti voluptatum distinctio molestiae consequatur ut. Nam occaecati quis aut rerum rerum assumenda. Sapiente sed explicabo voluptatem sunt. Ut sit ab accusamus beatae laborum qui laboriosam officiis. Dolorem labore et nemo ducimus. Iure et enim corrupti natus rerum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(278, 2, 1, 'Et sit hic', 'et-sit-hic', 'At adipisci esse vel quia labore enim repellat. Beatae reprehenderit ipsum illum soluta rerum.', 'Magni est non non consequatur dolor rerum eveniet. Pariatur error sed a numquam voluptatem veritatis quidem itaque. Dolorem in temporibus aut quam commodi placeat recusandae. Consectetur eveniet sint aliquid ducimus et repudiandae eum magni. Natus odit quia omnis voluptas.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(279, 2, 1, 'Ut laudantium facere', 'ut-laudantium-facere', 'Praesentium quasi architecto nostrum autem.', 'Qui illum sit quod nostrum deserunt. Cupiditate est ut nostrum dolor in molestiae. Deleniti vero sed id. Quia distinctio illo cupiditate quis expedita provident quis delectus. Voluptatem eum enim non blanditiis accusantium ducimus. Vitae aut rem optio et qui hic sequi. Rerum voluptas dolorem qui officiis officiis blanditiis eius. Consequatur qui nam nisi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(280, 2, 1, 'Esse maxime voluptas', 'esse-maxime-voluptas', 'Accusamus non similique exercitationem temporibus velit est.', 'Est modi minima sit atque quis totam. Quod vitae ipsam deleniti. Tenetur molestias earum aliquam consequuntur consequuntur distinctio illum. Eaque corrupti non sunt dolore itaque sit vitae et. Laborum ab facere eum cumque accusantium consequuntur et.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(281, 1, 1, 'Tempore voluptatem modi', 'tempore-voluptatem-modi', 'Illo quis corporis dolores.', 'Placeat consectetur suscipit in et sapiente est non. Quis amet et excepturi. Velit quia eos omnis veritatis exercitationem iure neque. Magni dolores magnam autem perspiciatis. Ex accusamus maxime omnis quo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(282, 1, 1, 'Dolorem recusandae et', 'dolorem-recusandae-et', 'Harum repudiandae non sit suscipit voluptatem est aut. Beatae eveniet dicta nihil enim provident est in.', 'Commodi temporibus omnis expedita beatae. Natus hic earum officia accusamus aliquam possimus. Quia qui laboriosam eveniet vitae quia. Est esse temporibus sapiente eligendi. Quis nihil nesciunt ratione. Architecto earum perferendis quae sit perferendis reprehenderit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(283, 2, 1, 'Ratione corrupti', 'ratione-corrupti', 'Aperiam nihil cumque in.', 'Debitis praesentium vel voluptatem non aut quo sequi velit. Eos veritatis officiis consequatur nemo est aut iusto. Error quae excepturi rerum qui. Corporis rerum molestiae amet voluptatem aut. Et aut dolorem fugiat aut quia laborum doloribus. Veniam aperiam quam ut ut.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(284, 2, 1, 'Ad corporis quod', 'ad-corporis-quod', 'Rerum praesentium modi qui quos hic magni est. Occaecati deserunt et quo ducimus vero deserunt.', 'Perspiciatis ut non consequuntur alias. Sit dolores architecto ullam sint nisi expedita. Consequatur tempore nihil voluptas blanditiis. Voluptatem reprehenderit rerum qui quia eveniet aut minima sed. Aut consectetur nulla excepturi enim ad. Dignissimos asperiores provident molestias.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(285, 1, 1, 'Saepe maxime vel', 'saepe-maxime-vel', 'A illo et ut aut est labore amet nihil.', 'Ducimus corrupti et sed sed rerum ex mollitia. Optio qui assumenda soluta et modi sequi. Nemo est aliquid laudantium quae sed. Porro accusamus ipsum molestiae accusantium sapiente et aliquid. Autem neque libero ducimus. Ut neque recusandae voluptatem odit quia expedita.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(286, 2, 1, 'Ut facere', 'ut-facere', 'Numquam libero ea mollitia at consequatur maiores earum.', 'Recusandae est sunt in ea. Dolorem quae enim vel a. Dolores et aspernatur dolorum non quidem. Beatae dignissimos non enim eius. Id quae consequatur voluptatem facilis harum voluptas tenetur. Tempore voluptas totam eos officiis.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(287, 1, 1, 'Consequatur saepe', 'consequatur-saepe', 'Iure natus est harum nemo sunt.', 'Ipsa natus nisi et nesciunt enim debitis molestiae harum. Aut a ad excepturi molestiae voluptatem. Inventore magni ut in neque ad est fugiat. Repellat adipisci animi suscipit dolor non dolorem dolor.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(288, 1, 1, 'Sint atque sint', 'sint-atque-sint', 'Rerum et accusamus veniam nesciunt est aperiam amet.', 'Quam cum soluta ea voluptatum voluptas qui voluptatum magni. Totam assumenda deleniti nemo eveniet. Harum sit nulla natus ipsum illum expedita iste sint. Nesciunt minus hic autem sed ratione sed consequatur.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(289, 1, 1, 'Distinctio soluta', 'distinctio-soluta', 'Similique enim sequi veniam eum ducimus.', 'Tempora harum iusto odio quis debitis itaque eligendi iste. Voluptatem et et nisi ut. Sint at harum nihil rerum. Fugit labore delectus necessitatibus quod sit et et. Fugiat harum dolor ducimus eveniet laudantium placeat animi.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(290, 2, 1, 'Et impedit magnam', 'et-impedit-magnam', 'Eos magni officiis magnam et qui voluptatum necessitatibus.', 'Est omnis debitis dolor harum. Ratione dolor ad enim cupiditate necessitatibus placeat delectus quidem. Non iure esse unde. Et impedit corporis et dolores sit. Distinctio molestias illo eum ut sapiente. Quia voluptas iste animi provident omnis velit. Nulla sint eum aut enim labore itaque explicabo.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(291, 1, 1, 'Possimus amet inventore', 'possimus-amet-inventore', 'Ad soluta quas aut. Id doloribus modi ut provident.', 'Dicta totam ut rem consectetur rem. Molestiae voluptatem ut ut voluptatum ut velit quis. Laborum dignissimos nemo quod dolor dolores et. Aut perferendis a aut quaerat.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(292, 1, 1, 'Magni in', 'magni-in', 'Repudiandae corrupti ut quae ut sequi odit magnam.', 'Debitis autem dolor nobis optio officiis eum aspernatur quis. Corrupti quas perferendis laborum. Impedit libero culpa animi modi natus velit consequatur. Vero et magni modi fugiat quidem. Consequuntur ea et iure repellendus assumenda.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(293, 2, 1, 'Quia veritatis quidem', 'quia-veritatis-quidem', 'Inventore quia cum qui asperiores qui ea. Dicta eaque occaecati explicabo quia.', 'Doloremque dolore fugit voluptate cumque. Sed qui numquam nesciunt voluptas et. Laudantium eos dolore quo quia quasi a. Veniam laboriosam qui natus perspiciatis eveniet suscipit earum.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(294, 1, 1, 'Dolores velit et', 'dolores-velit-et', 'Quia corrupti debitis est velit necessitatibus non ex laudantium. Et autem tenetur sed praesentium magni consequatur.', 'Nihil dolor repudiandae reiciendis facere velit temporibus natus. Dolore exercitationem id quidem itaque sint enim id. Magni recusandae reiciendis sed nam inventore. Dolor sed saepe asperiores. Et sit corrupti atque deserunt consectetur ut. Quod distinctio repellendus dolores atque fugiat consequatur natus sit. Ad officiis laborum animi libero voluptatem nostrum non hic.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(295, 2, 1, 'Facilis autem voluptatum', 'facilis-autem-voluptatum', 'Ut earum tempore doloribus aut molestiae.', 'Ipsum dolores sed porro. Atque beatae est perferendis. Ullam officia in voluptas tempore cum. Sequi sint animi alias enim veniam odio omnis. Aliquid non laborum enim molestiae minima ipsum officiis quis. Delectus nihil aspernatur debitis nihil et nihil.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(296, 1, 1, 'Expedita laborum', 'expedita-laborum', 'Eos veniam quaerat sed.', 'Nemo eligendi dolores aut temporibus nihil hic eos qui. Qui tenetur nisi minima sed amet nostrum eveniet distinctio. Asperiores temporibus harum architecto porro. Maxime molestiae aut aut quas voluptatem voluptatem ea. Iusto omnis molestiae perspiciatis asperiores eum nulla sit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(297, 1, 1, 'Dignissimos corporis', 'dignissimos-corporis', 'Corrupti distinctio explicabo molestiae ad ea officiis.', 'Quaerat ut id totam voluptatem et ea. Quos eos doloremque deleniti quos et. Odio voluptas commodi minus vel quae recusandae. Quia labore voluptatem quod quibusdam et sit quidem. Delectus magnam praesentium repellendus minima quos consectetur. Architecto optio sint non magnam error quibusdam autem. Velit fuga maxime in fuga saepe in ducimus.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(298, 1, 1, 'Sint fugiat doloribus', 'sint-fugiat-doloribus', 'Omnis sunt iure facilis doloremque rerum aut quod nam. Aut sed ipsam quo quis magni ut.', 'Veritatis maxime quia ea. Ipsa ducimus aliquam et enim praesentium aut consequatur. Neque accusamus unde totam voluptatem a. Dolor est sequi aperiam mollitia impedit.', 0, 'default.jpg', '2023-01-02 16:09:52', '2023-01-02 16:09:52'),
(299, 1, 2, 'Quo expedita', 'quo-expedita', 'Vel voluptate quis ex ea qui.', '<p>Rerum pariatur qui explicabo placeat ut adipisci. Iure velit dolorum in aliquid. Enim officiis magni velit doloribus omnis et in. Unde sed qui et ducimus aut et. Placeat nihil aut excepturi a totam aut.</p>', 1, '52596a10bf9b745e09b139e63ad6eab21.jpg', '2023-01-02 16:09:52', '2023-01-02 16:24:32'),
(300, 2, 1, 'Cum id eaque', 'cum-id-eaque', 'Repellat eveniet explicabo dolores non qui. Placeat quasi maiores nihil aperiam nam.', '<p>Blanditiis occaecati magnam eius nam cum aut dignissimos recusandae. Harum dolorem rerum praesentium qui iure. Voluptatum pariatur et eaque numquam et laudantium. Ratione voluptatem corporis vitae ipsa ducimus alias cupiditate. Exercitationem incidunt non optio nulla ut ut reprehenderit.</p>', 1, 'ece03af7a637d1d4f19459c197376a9e1.jpg', '2023-01-02 16:09:52', '2023-03-16 10:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

DROP TABLE IF EXISTS `article_categories`;
CREATE TABLE IF NOT EXISTS `article_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_categories_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Uncategorised', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(2, 2, 'Sports', '2023-01-02 16:06:11', '2023-01-02 16:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_article_id_foreign` (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=501 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `article_id`, `parent_id`, `body`, `approved`, `created_at`, `updated_at`) VALUES
(1, 2, 299, 300, 'Test', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(2, 1, 299, 300, 'Est sed autem.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(3, 2, 297, NULL, 'Nostrum eligendi eligendi.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(4, 1, 297, NULL, 'Illo molestias.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(5, 2, 300, NULL, 'In et asperiores.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(6, 1, 298, NULL, 'Nihil repudiandae.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(7, 2, 295, NULL, 'Odit ut ut.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(8, 2, 295, NULL, 'Pariatur ut.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(9, 2, 295, NULL, 'Enim ab.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(10, 2, 296, NULL, 'Sit incidunt et.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(11, 2, 298, NULL, 'Cumque enim.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(13, 2, 296, NULL, 'Est cumque.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(14, 1, 296, NULL, 'Delectus eum nobis.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(15, 1, 297, NULL, 'Dolores numquam.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(16, 2, 297, NULL, 'Molestias incidunt.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(17, 2, 296, NULL, 'Corporis illo.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(18, 2, 295, NULL, 'Rerum repudiandae ratione.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(19, 1, 298, NULL, 'Ipsa eum.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(20, 2, 296, NULL, 'Non esse neque.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(21, 1, 295, NULL, 'Maiores deserunt accusamus.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(22, 1, 297, NULL, 'Magni ea.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(23, 2, 296, NULL, 'Dignissimos occaecati expedita.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(24, 1, 296, NULL, 'Quod amet omnis.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(25, 1, 295, NULL, 'Dolorum temporibus.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(26, 2, 297, NULL, 'Aspernatur voluptatem ipsa.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(27, 2, 296, NULL, 'In alias corporis.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(28, 1, 295, NULL, 'Labore modi.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(29, 1, 296, NULL, 'In totam asperiores.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(30, 2, 300, NULL, 'Quis veritatis.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(31, 1, 300, NULL, 'Et cum earum.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(32, 2, 297, NULL, 'Dicta aliquam rerum.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(33, 2, 297, NULL, 'Possimus deleniti architecto.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(34, 1, 299, NULL, 'Occaecati nobis minus.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(35, 2, 297, NULL, 'Possimus et placeat.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(36, 1, 295, NULL, 'Esse perferendis.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(37, 1, 298, NULL, 'Velit atque.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(38, 1, 295, NULL, 'Ratione qui voluptatem.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(39, 2, 298, NULL, 'Voluptatum voluptatum.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(40, 2, 298, NULL, 'Laborum consectetur dolore.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(41, 1, 300, NULL, 'Commodi hic cumque.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(42, 1, 300, NULL, 'Explicabo corrupti.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(43, 1, 296, NULL, 'Mollitia iste.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(44, 2, 296, NULL, 'Repellat non porro.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(45, 1, 299, NULL, 'Et sequi sed.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(46, 1, 297, NULL, 'Saepe magnam labore.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(47, 1, 297, NULL, 'Est vel.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(48, 1, 298, NULL, 'Saepe voluptatem.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(49, 2, 296, NULL, 'Optio aliquid.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(50, 1, 295, NULL, 'Iste totam voluptas.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(51, 1, 297, NULL, 'Possimus consequatur officia.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(52, 1, 298, NULL, 'Voluptatum aut.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(53, 1, 296, NULL, 'Facere animi rerum.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(54, 2, 298, NULL, 'Fugiat assumenda.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(55, 1, 298, NULL, 'Excepturi qui.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(56, 1, 298, NULL, 'Debitis necessitatibus iusto.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(57, 2, 298, NULL, 'Dolorem non.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(58, 2, 300, NULL, 'Qui sapiente ipsum.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(59, 2, 299, NULL, 'Non animi.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(60, 1, 298, NULL, 'Dolores qui ipsum.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(61, 2, 297, NULL, 'Deleniti ut enim.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(62, 1, 299, NULL, 'Dolorem at enim.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(63, 2, 299, NULL, 'In qui.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(64, 1, 298, NULL, 'Vero rerum eos.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(65, 1, 295, NULL, 'Vel vero asperiores.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(66, 1, 300, NULL, 'Aliquam aut perferendis.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(67, 1, 296, NULL, 'Quia tenetur vero.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(68, 1, 299, NULL, 'Voluptas illum porro.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(69, 2, 296, NULL, 'Ut aut sint.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(70, 2, 298, NULL, 'Omnis recusandae.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(71, 1, 297, NULL, 'Cupiditate sed mollitia.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(72, 1, 296, NULL, 'Eligendi ab est.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(73, 1, 299, NULL, 'Ut ut.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(74, 2, 299, NULL, 'Voluptatem itaque.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(75, 2, 298, NULL, 'Harum ratione incidunt.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(76, 1, 299, NULL, 'Necessitatibus pariatur.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(77, 1, 299, NULL, 'Dolores non.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(78, 2, 296, NULL, 'Sed adipisci.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(79, 1, 300, NULL, 'Qui id.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(80, 1, 297, NULL, 'Ut ut veniam.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(81, 1, 296, NULL, 'Deleniti illum.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(82, 1, 298, NULL, 'Beatae fugit.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(83, 1, 295, NULL, 'Sint eligendi qui.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(84, 2, 296, NULL, 'Reiciendis nam aut.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(85, 1, 300, NULL, 'Impedit tenetur.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(86, 1, 296, NULL, 'Facere adipisci adipisci.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(87, 1, 298, NULL, 'Et magni.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(88, 2, 295, NULL, 'Natus fugit rerum.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(89, 1, 299, NULL, 'Nam et ut.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(90, 1, 300, NULL, 'Est vero.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(91, 2, 298, NULL, 'Neque voluptas.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(92, 1, 295, NULL, 'Nemo nemo autem.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(93, 1, 297, NULL, 'Accusantium iste.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(94, 2, 297, NULL, 'Perferendis repudiandae asperiores.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(95, 1, 299, NULL, 'Molestias laboriosam odio.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(96, 2, 298, NULL, 'Dolor ad.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(97, 2, 295, NULL, 'Quia quo nam.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(98, 1, 298, NULL, 'Reiciendis ullam.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(99, 2, 296, NULL, 'Voluptatem quod.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(100, 1, 298, NULL, 'Eius accusamus atque.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(101, 2, 298, NULL, 'Asperiores sunt.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(102, 2, 296, NULL, 'Neque et.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(103, 1, 296, NULL, 'Odio ipsa.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(104, 1, 298, NULL, 'Beatae sunt.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(105, 2, 299, NULL, 'Placeat accusantium in.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(106, 2, 299, NULL, 'Autem cupiditate.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(107, 1, 297, NULL, 'Qui quidem.', 0, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(108, 1, 299, NULL, 'Qui omnis blanditiis.', 1, '2023-01-02 16:10:01', '2023-01-02 16:10:01'),
(109, 2, 295, NULL, 'Possimus sed quidem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(110, 1, 299, NULL, 'Expedita animi et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(111, 1, 297, NULL, 'Quisquam ut et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(112, 1, 300, NULL, 'Occaecati veritatis.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(113, 2, 299, NULL, 'Enim voluptatem sint.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(114, 2, 296, NULL, 'Amet unde.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(115, 2, 298, NULL, 'Sint soluta quia.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(116, 2, 297, NULL, 'Aut consequatur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(117, 1, 300, NULL, 'Voluptatem accusamus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(118, 1, 296, NULL, 'Possimus ex laudantium.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(119, 2, 295, NULL, 'Perferendis voluptatibus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(120, 2, 300, NULL, 'Omnis provident dolor.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(121, 1, 300, NULL, 'Optio molestiae.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(122, 2, 296, NULL, 'Molestiae quod asperiores.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(123, 2, 297, NULL, 'Atque reiciendis.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(124, 1, 300, NULL, 'Inventore natus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(125, 1, 295, NULL, 'Quo voluptatibus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(126, 2, 297, NULL, 'Vel dicta.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(127, 2, 295, NULL, 'Qui dolores.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(128, 1, 297, NULL, 'Aut et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(129, 1, 296, NULL, 'Voluptates unde.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(130, 2, 296, NULL, 'Et non magnam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(131, 2, 297, NULL, 'Consequatur dolorem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(132, 2, 295, NULL, 'Praesentium ut quia.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(133, 1, 299, NULL, 'Aut tempora.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(134, 1, 295, NULL, 'Cupiditate et doloremque.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(135, 1, 299, NULL, 'Rerum placeat tempore.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(136, 2, 297, NULL, 'Culpa sit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(137, 1, 300, NULL, 'Et sapiente.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(138, 1, 298, NULL, 'Eum voluptatem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(139, 2, 298, NULL, 'Soluta hic aut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(140, 2, 296, NULL, 'Odit iusto dolorum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(141, 1, 296, NULL, 'Cupiditate facilis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(142, 1, 300, NULL, 'Aut illo vero.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(143, 2, 296, NULL, 'Sit et.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(144, 2, 298, NULL, 'At a.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(145, 1, 295, NULL, 'Earum iste explicabo.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(146, 2, 299, NULL, 'Dolores et quia.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(147, 2, 298, NULL, 'Odit ad perspiciatis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(148, 2, 299, NULL, 'Consequuntur fugiat distinctio.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(149, 2, 297, NULL, 'Cumque qui aut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(150, 1, 296, NULL, 'Ex unde.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(151, 2, 297, NULL, 'Nesciunt aspernatur tenetur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(152, 2, 297, NULL, 'Aliquam iure.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(153, 2, 298, NULL, 'Dignissimos aut magni.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(154, 1, 297, NULL, 'Laborum beatae.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(155, 2, 296, NULL, 'Reiciendis ea et.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(156, 1, 300, NULL, 'Quia aut a.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(157, 1, 299, NULL, 'Dolor culpa.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(158, 1, 300, NULL, 'Velit in natus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(159, 2, 297, NULL, 'Praesentium sed.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(160, 1, 296, NULL, 'Qui nobis repudiandae.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(161, 2, 300, NULL, 'Omnis cumque et.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(162, 2, 299, NULL, 'In itaque.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(163, 1, 297, NULL, 'Sit similique odit.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(164, 1, 300, NULL, 'Aliquid deserunt distinctio.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(165, 1, 296, NULL, 'Aspernatur suscipit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(166, 2, 297, NULL, 'Eius omnis.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(167, 2, 299, NULL, 'Quaerat voluptate reiciendis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(168, 2, 296, NULL, 'Rerum quae sed.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(169, 1, 296, NULL, 'Iure veritatis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(170, 2, 296, NULL, 'Illo pariatur qui.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(171, 2, 300, NULL, 'Corporis harum facere.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(172, 2, 295, NULL, 'Tempora animi.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(173, 1, 298, NULL, 'Rerum autem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(174, 1, 299, NULL, 'Unde qui.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(175, 1, 297, NULL, 'Quaerat et dolorem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(176, 1, 297, NULL, 'Dolore deleniti iste.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(177, 1, 297, NULL, 'Eligendi cum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(178, 1, 298, NULL, 'Dolorum laudantium occaecati.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(179, 2, 300, NULL, 'Impedit impedit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(180, 1, 299, NULL, 'Ut repellat quis.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(181, 1, 300, NULL, 'Deserunt aut commodi.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(182, 1, 295, NULL, 'Animi odit modi.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(183, 2, 298, NULL, 'Quia adipisci quia.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(184, 1, 299, NULL, 'Dignissimos velit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(185, 2, 298, NULL, 'Dicta doloremque.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(186, 1, 299, NULL, 'Non voluptatum voluptate.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(187, 1, 295, NULL, 'Rerum nostrum.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(188, 2, 296, NULL, 'Molestiae occaecati tenetur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(189, 2, 296, NULL, 'Nisi cupiditate.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(190, 1, 299, NULL, 'Eos nam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(191, 1, 297, NULL, 'Architecto voluptatem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(192, 1, 299, NULL, 'Qui numquam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(193, 1, 299, NULL, 'Vel sapiente sint.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(194, 2, 300, NULL, 'Exercitationem suscipit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(195, 2, 295, NULL, 'Et est.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(196, 2, 297, NULL, 'Commodi nostrum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(197, 2, 297, NULL, 'Qui aliquam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(198, 1, 295, NULL, 'Eius magni magnam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(199, 2, 299, NULL, 'Enim ratione iure.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(200, 1, 300, NULL, 'Sint quas.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(201, 1, 300, NULL, 'Quia eveniet.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(202, 2, 299, NULL, 'Est qui beatae.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(203, 1, 296, NULL, 'Enim veniam repellendus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(204, 2, 299, NULL, 'Sit illo molestiae.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(205, 1, 299, NULL, 'Qui adipisci qui.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(206, 2, 299, NULL, 'Est vero.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(207, 1, 295, NULL, 'Officiis iure voluptas.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(208, 2, 295, NULL, 'Esse saepe.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(209, 2, 297, NULL, 'In illum odit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(210, 1, 295, NULL, 'Ipsum quaerat dicta.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(211, 1, 295, NULL, 'Impedit sequi hic.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(212, 2, 297, NULL, 'Magnam magnam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(213, 1, 297, NULL, 'Nisi eum deleniti.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(214, 1, 296, NULL, 'Neque nam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(215, 1, 297, NULL, 'Voluptatem sed tenetur.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(216, 2, 299, NULL, 'Illo reprehenderit veniam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(217, 2, 296, NULL, 'Voluptatum vitae.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(218, 1, 295, NULL, 'Illo voluptatem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(219, 2, 299, NULL, 'Vitae recusandae est.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(220, 2, 296, NULL, 'Temporibus et.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(221, 1, 296, NULL, 'Porro sint.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(222, 1, 295, NULL, 'Sequi et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(223, 1, 299, NULL, 'Sed et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(224, 2, 295, NULL, 'Voluptatem accusamus voluptatibus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(225, 2, 297, NULL, 'Inventore distinctio nam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(226, 1, 300, NULL, 'Repellat ut dolor.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(227, 2, 299, NULL, 'Sequi alias consequatur.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(228, 2, 300, NULL, 'Ad eius aut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(229, 2, 296, NULL, 'Harum tempora quibusdam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(230, 1, 297, NULL, 'Quia consequuntur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(231, 2, 300, NULL, 'Similique rerum non.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(232, 2, 300, NULL, 'Dolorum asperiores sapiente.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(233, 2, 299, NULL, 'Magnam dolores.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(234, 2, 299, NULL, 'Magnam nostrum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(235, 2, 298, NULL, 'Saepe molestiae.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(236, 2, 298, NULL, 'Est esse.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(237, 2, 296, NULL, 'Magnam est.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(238, 2, 298, NULL, 'Ipsum voluptatibus consequuntur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(239, 1, 300, NULL, 'Velit excepturi dolorem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(240, 2, 295, NULL, 'Sed sunt ut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(241, 1, 295, NULL, 'Sunt id.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(242, 2, 297, NULL, 'Voluptatem nemo totam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(243, 1, 295, NULL, 'Omnis veniam minima.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(244, 1, 298, NULL, 'Quia non.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(245, 2, 295, NULL, 'Porro ut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(246, 2, 295, NULL, 'Voluptatem quia quaerat.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(247, 1, 296, NULL, 'Commodi sunt quo.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(248, 1, 299, NULL, 'Facere maxime qui.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(249, 1, 300, NULL, 'Ipsa ut placeat.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(250, 2, 296, NULL, 'Reiciendis illum.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(251, 2, 295, NULL, 'Quam vero.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(252, 1, 300, NULL, 'Est et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(253, 2, 296, NULL, 'Sint ut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(254, 1, 299, NULL, 'Maiores blanditiis mollitia.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(255, 2, 300, NULL, 'Possimus molestias magnam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(256, 2, 300, NULL, 'Odio quia laudantium.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(257, 2, 296, NULL, 'Nobis quaerat.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(258, 2, 296, NULL, 'Explicabo commodi.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(259, 2, 298, NULL, 'Voluptatem at harum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(260, 1, 300, NULL, 'Consequatur quibusdam commodi.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(261, 1, 299, NULL, 'Nihil architecto voluptas.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(262, 2, 295, NULL, 'Rerum fugiat est.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(263, 1, 299, NULL, 'Quis nemo.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(264, 2, 298, NULL, 'Quaerat suscipit deserunt.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(265, 2, 297, NULL, 'Eligendi qui.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(266, 1, 299, NULL, 'Rerum culpa reiciendis.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(267, 2, 298, NULL, 'Provident architecto et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(268, 2, 297, NULL, 'Provident animi.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(269, 2, 300, NULL, 'Et placeat.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(270, 1, 297, NULL, 'Eum dolores.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(271, 1, 295, NULL, 'Porro odit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(272, 1, 299, NULL, 'Sit et aperiam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(273, 1, 295, NULL, 'Error nobis maxime.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(274, 1, 296, NULL, 'Voluptatem saepe.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(275, 1, 296, NULL, 'Aut dolorum sint.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(276, 1, 298, NULL, 'Qui totam accusantium.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(277, 1, 300, NULL, 'Velit facilis eos.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(278, 2, 295, NULL, 'Est sit et.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(279, 1, 298, NULL, 'Sit quia.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(280, 1, 297, NULL, 'Hic voluptatibus repudiandae.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(281, 2, 297, NULL, 'Accusantium ullam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(282, 2, 297, NULL, 'Atque rerum quo.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(283, 1, 296, NULL, 'Labore beatae nisi.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(284, 1, 298, NULL, 'Et commodi.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(285, 2, 297, NULL, 'Dolorem ex dolor.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(286, 1, 295, NULL, 'Vel nihil.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(287, 2, 300, NULL, 'Voluptatem quia dolorem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(288, 2, 297, NULL, 'Soluta maxime.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(289, 2, 296, NULL, 'Dicta ex.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(290, 2, 297, NULL, 'Laborum sapiente voluptatem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(291, 1, 296, NULL, 'Perferendis omnis suscipit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(292, 1, 296, NULL, 'Libero veritatis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(293, 1, 296, NULL, 'Excepturi facere.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(294, 1, 295, NULL, 'Et non non.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(295, 1, 295, NULL, 'Animi illum pariatur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(296, 2, 295, NULL, 'Itaque molestiae non.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(297, 2, 295, NULL, 'Minima placeat.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(298, 1, 300, NULL, 'Beatae qui.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(299, 1, 297, NULL, 'Aut molestiae.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(300, 2, 300, NULL, 'Velit corporis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(301, 2, 296, NULL, 'Sed ut.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(302, 1, 295, NULL, 'Consequatur nemo.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(303, 2, 295, NULL, 'Occaecati et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(304, 1, 297, NULL, 'Explicabo odio.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(305, 1, 300, NULL, 'Laboriosam qui unde.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(306, 2, 296, NULL, 'Rerum dolores.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(307, 1, 300, NULL, 'Quaerat occaecati.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(308, 1, 298, NULL, 'Voluptatibus dicta.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(309, 1, 297, NULL, 'Est blanditiis adipisci.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(310, 1, 295, NULL, 'Reiciendis aspernatur.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(311, 2, 295, NULL, 'Et iure ut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(312, 1, 296, NULL, 'Repellendus soluta illo.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(313, 1, 297, NULL, 'Molestiae laudantium.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(314, 1, 295, NULL, 'Et laboriosam fugit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(315, 2, 297, NULL, 'Enim vel.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(316, 1, 298, NULL, 'Delectus est consequatur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(317, 1, 297, NULL, 'Accusantium cumque.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(318, 1, 298, NULL, 'Sit itaque numquam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(319, 2, 296, NULL, 'Molestiae molestiae fugiat.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(320, 2, 295, NULL, 'Et voluptatem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(321, 1, 298, NULL, 'Veritatis aliquid.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(322, 1, 298, NULL, 'Sit ipsa dolor.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(323, 2, 299, NULL, 'Comment with reply', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(324, 2, 299, 323, 'Comment reply', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(325, 1, 298, NULL, 'Ut commodi veniam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(326, 1, 297, NULL, 'Sapiente mollitia.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(327, 2, 298, NULL, 'Voluptas asperiores repellendus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(328, 2, 296, NULL, 'Consequuntur fugit repellendus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(329, 2, 297, NULL, 'Voluptatem non aliquid.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(330, 1, 300, NULL, 'Nihil qui fugit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(331, 2, 295, NULL, 'Est voluptatem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(332, 2, 299, NULL, 'Et quidem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(333, 2, 297, NULL, 'Et molestiae quisquam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(334, 1, 299, NULL, 'Inventore excepturi.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(335, 2, 300, NULL, 'Aperiam adipisci odit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(336, 1, 299, NULL, 'Et commodi modi.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(337, 2, 296, NULL, 'Possimus placeat amet.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(338, 2, 297, NULL, 'Eos corporis.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(339, 2, 299, NULL, 'Rerum sit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(340, 1, 297, NULL, 'Reiciendis aliquam corporis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(341, 2, 300, NULL, 'Eum non pariatur.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(342, 2, 298, NULL, 'Distinctio et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(343, 2, 299, NULL, 'Ad molestias ea.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(344, 1, 296, NULL, 'Recusandae eveniet.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(345, 1, 298, NULL, 'Excepturi pariatur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(346, 1, 295, NULL, 'Illo temporibus corrupti.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(347, 2, 297, NULL, 'Itaque deserunt assumenda.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(348, 1, 296, NULL, 'Ullam omnis aut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(349, 2, 296, NULL, 'Hic quasi ipsa.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(350, 1, 300, NULL, 'Dolor et.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(351, 1, 300, NULL, 'Vero incidunt.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(352, 2, 296, NULL, 'Omnis consequatur ut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(353, 1, 299, NULL, 'Rerum nihil.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(354, 2, 300, NULL, 'Ad in ex.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(355, 1, 295, NULL, 'Tempore nostrum distinctio.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(356, 2, 300, NULL, 'Architecto voluptatem temporibus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(357, 2, 299, NULL, 'Inventore eaque.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(358, 2, 299, NULL, 'Quia molestias.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(359, 1, 295, NULL, 'Odio impedit voluptatem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(360, 2, 297, NULL, 'Ut similique.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(361, 1, 300, NULL, 'Amet et.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(362, 1, 296, NULL, 'Quia quia.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(363, 2, 298, NULL, 'Vel sed.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(364, 1, 298, NULL, 'Nihil et ut.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(365, 1, 297, NULL, 'Ea in est.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(366, 2, 297, NULL, 'Non modi.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(367, 1, 298, NULL, 'Velit veritatis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(368, 1, 300, NULL, 'Quae porro.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(369, 2, 298, NULL, 'Nihil est velit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(370, 1, 298, NULL, 'Ea non.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(371, 2, 298, NULL, 'Esse modi est.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(372, 2, 298, NULL, 'Necessitatibus laborum aut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(373, 1, 297, NULL, 'Doloremque qui qui.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(374, 1, 298, NULL, 'Maxime molestiae.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(375, 2, 297, NULL, 'Adipisci totam doloribus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(376, 1, 295, NULL, 'Deserunt autem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(377, 1, 298, NULL, 'Nulla ad.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(378, 1, 296, NULL, 'Perferendis odit.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(379, 1, 296, NULL, 'Dolore ratione et.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(380, 1, 297, NULL, 'Similique nihil.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(381, 2, 297, NULL, 'Ut nam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(382, 1, 299, NULL, 'Omnis doloremque nesciunt.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(383, 1, 296, NULL, 'Fuga voluptatem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(384, 2, 300, NULL, 'Dolor dolor.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(385, 2, 296, NULL, 'Eum qui dolorem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(386, 2, 299, NULL, 'Dolores eius.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(387, 1, 296, NULL, 'Pariatur suscipit doloremque.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(388, 1, 300, NULL, 'Qui sed.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(389, 1, 299, NULL, 'Totam sed.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(390, 1, 300, NULL, 'Id ut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(391, 2, 300, NULL, 'Voluptas provident.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(392, 1, 298, NULL, 'Quisquam repudiandae fuga.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(393, 2, 296, NULL, 'Laudantium est eos.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(394, 1, 299, NULL, 'Amet dolores voluptates.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(395, 2, 299, NULL, 'Quod aperiam est.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(396, 1, 299, NULL, 'Et temporibus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(397, 2, 299, NULL, 'Aspernatur iusto consectetur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(398, 2, 300, NULL, 'Adipisci eligendi.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(399, 2, 299, NULL, 'Voluptas ullam laborum.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(400, 2, 297, NULL, 'Molestiae voluptas.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(401, 1, 299, NULL, 'Architecto rerum ea.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(402, 1, 297, NULL, 'Distinctio non.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(403, 2, 299, NULL, 'Iusto sed.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(404, 1, 300, NULL, 'Adipisci laborum illum.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(405, 2, 296, NULL, 'Rerum voluptatibus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(406, 1, 295, NULL, 'Deserunt nihil.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(407, 1, 295, NULL, 'Ducimus excepturi iusto.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(408, 1, 298, NULL, 'Reiciendis est.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(409, 2, 300, NULL, 'Velit natus voluptas.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(410, 2, 300, NULL, 'Aut occaecati.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(411, 2, 297, NULL, 'Animi quis laudantium.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(412, 1, 300, NULL, 'Voluptas est perspiciatis.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(413, 2, 299, NULL, 'Sunt ut.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(414, 1, 295, NULL, 'Qui voluptate animi.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(415, 1, 300, NULL, 'Illo enim.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(416, 1, 296, NULL, 'Sed debitis fugiat.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(417, 2, 296, NULL, 'Corrupti dolor.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(418, 2, 297, NULL, 'Perferendis voluptas.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(419, 1, 295, NULL, 'Labore ipsum.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(420, 2, 295, NULL, 'Officiis hic.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(421, 1, 296, NULL, 'Voluptates id et.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(422, 2, 295, NULL, 'Debitis tempore.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(423, 1, 299, NULL, 'Ut dolorum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(424, 2, 296, NULL, 'Quos nisi.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(425, 2, 295, NULL, 'Aut repellat architecto.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(426, 2, 295, NULL, 'Nobis neque.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(427, 2, 295, NULL, 'Praesentium hic esse.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(428, 2, 300, NULL, 'Occaecati voluptate eius.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(429, 1, 297, NULL, 'Expedita dignissimos mollitia.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(430, 1, 300, NULL, 'Voluptas maxime.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(431, 2, 299, NULL, 'Qui dolore.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(432, 2, 295, NULL, 'Non iusto.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(433, 1, 298, NULL, 'Sint fugit.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(434, 2, 298, NULL, 'Iure velit laboriosam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(435, 2, 295, NULL, 'Harum vel.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(436, 2, 295, NULL, 'Vero quos architecto.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(437, 1, 295, NULL, 'Ut alias.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(438, 1, 299, NULL, 'Consequatur error.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(439, 1, 296, NULL, 'Tenetur sunt.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(440, 2, 296, NULL, 'Corporis quia.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(441, 1, 297, NULL, 'Amet quisquam ut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(442, 1, 297, NULL, 'In ex ducimus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(443, 2, 299, NULL, 'Unde consequatur.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(444, 1, 297, NULL, 'Est consequuntur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(445, 2, 300, NULL, 'Aut odit.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(446, 1, 298, NULL, 'Voluptatem quam in.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(447, 1, 300, NULL, 'Perspiciatis animi.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(448, 2, 298, NULL, 'Cumque facere.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(449, 1, 300, NULL, 'Quas earum porro.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(450, 1, 295, NULL, 'Neque repellat.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(451, 2, 295, NULL, 'Veritatis nisi earum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(452, 1, 299, NULL, 'Quibusdam fuga voluptates.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(453, 2, 298, NULL, 'Nihil placeat.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(454, 1, 298, NULL, 'Placeat voluptatem voluptatem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(455, 1, 298, NULL, 'Quam ut velit.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(456, 2, 297, NULL, 'Nesciunt adipisci.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(457, 2, 300, NULL, 'Eius ducimus quaerat.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(458, 1, 298, NULL, 'Necessitatibus harum.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(459, 1, 295, NULL, 'Occaecati vero.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(460, 1, 298, NULL, 'Incidunt accusantium fugiat.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(461, 1, 298, NULL, 'Esse accusantium temporibus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(462, 1, 295, NULL, 'Quidem officia officiis.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(463, 1, 299, NULL, 'Accusantium tempora.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(464, 2, 299, NULL, 'Qui odio.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(465, 2, 299, NULL, 'Reprehenderit doloribus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(466, 1, 295, NULL, 'Eum quia ratione.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(467, 1, 297, NULL, 'Similique rerum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(468, 2, 299, NULL, 'Voluptatibus consectetur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(469, 1, 297, NULL, 'Reprehenderit deleniti.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(470, 1, 299, NULL, 'Officia accusantium dolorem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(471, 2, 299, NULL, 'Eaque laborum eveniet.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(472, 1, 299, NULL, 'Non aut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(473, 1, 299, NULL, 'Qui nam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(474, 2, 296, NULL, 'Dolor consectetur.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(475, 2, 299, NULL, 'Dignissimos vero molestiae.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(476, 2, 300, NULL, 'Aut est.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(477, 1, 299, NULL, 'Quibusdam necessitatibus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(478, 2, 298, NULL, 'Facilis ut.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(479, 1, 300, NULL, 'Quia ut.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(480, 2, 295, NULL, 'Molestias nisi quam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(481, 1, 299, NULL, 'Consequatur id ipsam.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(482, 1, 297, NULL, 'Impedit ex qui.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(483, 2, 295, NULL, 'Sapiente non voluptates.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(484, 2, 298, NULL, 'Et eos sed.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(485, 2, 298, NULL, 'Facilis delectus.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(486, 1, 296, NULL, 'Eos aliquam quidem.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(487, 2, 300, NULL, 'In ullam id.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(488, 1, 298, NULL, 'Consectetur veniam.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(489, 1, 296, NULL, 'Consequatur amet.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(490, 1, 299, NULL, 'Rerum fugiat rem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(491, 1, 296, NULL, 'Tenetur accusamus.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(492, 1, 298, NULL, 'Illum exercitationem.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(493, 1, 295, NULL, 'Ut porro.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(494, 2, 299, NULL, 'Quisquam molestiae ipsum.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(495, 2, 297, NULL, 'Eos tempore.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(496, 1, 297, NULL, 'Et aut amet.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(497, 1, 295, NULL, 'Id in ipsa.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(498, 1, 296, NULL, 'Facere est consequatur.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(499, 1, 300, NULL, 'Tempora autem aut.', 0, '2023-01-02 16:10:02', '2023-01-02 16:10:02'),
(500, 2, 297, NULL, 'Aut atque esse.', 1, '2023-01-02 16:10:02', '2023-01-02 16:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_25_183313_create_article_categories_table', 1),
(6, '2022_03_25_183315_create_articles_table', 1),
(7, '2022_03_28_101019_create_comments_table', 1),
(8, '2022_04_02_165232_create_pages_table', 1),
(9, '2022_04_04_111156_create_settings_table', 1),
(10, '2022_12_31_174605_create_roles_table', 1),
(11, '2023_01_01_120457_create_permissions_table', 1),
(12, '2023_01_01_150407_create_roles_permissions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Laudantium dolorem placeat', 'Amet quis tempore qui quidem. Et magni ut sit quo. Iusto et sunt tenetur. Atque sunt sit blanditiis. Quia excepturi dolore ut recusandae voluptates odit. Cumque aut ratione quis facilis repellat. Neque quia eveniet a perspiciatis praesentium tenetur.', '2023-01-02 16:09:58', '2023-01-02 16:09:58'),
(2, 'Aperiam reprehenderit', 'Quia assumenda voluptatem expedita soluta sint omnis libero. Et est asperiores dolore eos adipisci. Fuga sapiente eveniet assumenda cum aliquam ipsa doloremque voluptate. Animi perspiciatis dolorum et. Rerum rerum et consectetur dicta ea.', '2023-01-02 16:09:58', '2023-01-02 16:09:58'),
(3, 'Sunt in ut', 'Reiciendis est aperiam architecto eos laborum similique. Quia asperiores veritatis perferendis repudiandae. Ducimus dolorum nobis quia reprehenderit autem. Velit reprehenderit veritatis omnis beatae impedit quae et voluptatum.', '2023-01-02 16:09:58', '2023-01-02 16:09:58'),
(4, 'Officiis saepe sint', 'Recusandae at mollitia magni iure laboriosam. Impedit eius consequatur voluptas mollitia qui. Quae velit voluptatem quis illum. Nam delectus ut enim aliquid rerum qui. Ut fugit architecto ipsa quos aut ipsum rerum.', '2023-01-02 16:09:58', '2023-01-02 16:09:58'),
(5, 'Nam accusantium', 'Reiciendis tempore magnam quod recusandae cupiditate ducimus culpa. Aut consequatur quia odit cupiditate in ducimus voluptatum. Quam quaerat iusto ex accusamus. Nihil accusantium quidem qui accusantium. Velit et est error accusantium voluptas.', '2023-01-02 16:09:58', '2023-01-02 16:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `slug`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 'view-articles', 'View articles', 'Gives a user the permission to view articles.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(2, 'add-articles', 'Write articles', 'Gives a user the permission to write articles.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(3, 'edit-articles', 'Edit articles', 'Gives a user the permission to edit her/his own articles.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(4, 'delete-articles', 'Delete articles', 'Gives a user the permission to delete her/his own articles.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(5, 'view-categories', 'View categories', 'Gives a user the permission to view the list of categories.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(6, 'add-categories', 'Add categories', 'Gives a user the permission to create article categories.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(7, 'edit-categories', 'Edit categories', 'Gives a user the permission to edit article categories.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(8, 'delete-categories', 'Delete categories', 'Gives a user the permission to delete article categories.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(9, 'view-comments', 'View comments on the dashboard', 'Gives a user the permission to view article comments on the dashboard', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(10, 'delete-comments', 'Delete comments', 'Gives a user the permission to delete article comments', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(11, 'approve-comments', 'Approve comments', 'Gives a user the permission to approve article comments', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(12, 'unapprove-comments', 'Unapprove comments', 'Gives a user the permission to unapprove article comments', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(13, 'view-pages', 'View pages', 'Gives a user the permission to view the pages list (on the dashboard)', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(14, 'add-pages', 'Add pages', 'Gives a user the permission to add pages', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(15, 'edit-pages', 'Edit pages', 'Gives a user the permission to edit pages', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(16, 'delete-pages', 'Delete pages', 'Gives a user the permission to delete pages', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(17, 'edit-settings', 'Edit site settings', 'Gives the super-admin the permission to edit site settings.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(18, 'manage-user-rights', 'Manage user rights', 'Gives the super-admin the permission to manage user rights', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(19, 'ban-users', 'Ban users', 'Gives the super-admin the permission to suspend user accounts', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(20, 'activate-users', 'Activate user accounts', 'Gives the super-admin the permission to activate user accounts', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(21, 'assign-user-roles', 'Assign user roles', 'Gives the super-admin the permission to assign roles to users', '2023-01-02 16:06:11', '2023-01-02 16:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user', 'Basic User', 'The Basic User can view and comment on articles.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(2, 'author', 'Author', 'In addition to being able to do all a Basic User can do, an Author can create articles, and also edit or delete his/her own articles.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(3, 'admin', 'Site Administrator', 'The Admin can view and comment on articles; create and edit article categories; create and edit and delete any articles; create and edit and delete users.', '2023-01-02 16:06:11', '2023-01-02 16:06:11'),
(4, 'super-admin', 'Super-admin', 'The Super-admin can do everything that the Admin can do. Additionally, the Site owner can give/revoke user roles and ban users. The website has only one Super-admin.', '2023-01-02 16:06:11', '2023-01-02 16:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

DROP TABLE IF EXISTS `roles_permissions`;
CREATE TABLE IF NOT EXISTS `roles_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `roles_permissions_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_directory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_cookieconsent` tinyint(1) NOT NULL DEFAULT '1',
  `is_infinitescroll` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `tagline`, `owner_name`, `owner_email`, `twitter`, `facebook`, `instagram`, `theme_directory`, `is_cookieconsent`, `is_infinitescroll`, `created_at`, `updated_at`) VALUES
(1, 'My Blog', 'A simple blog application made with Laravel', 'My Company', 'company@domain.com', 'https://twitter.com', 'https://facebook.com', 'https://instagram.com', 'calvin', 1, 0, '2023-01-02 16:06:11', '2023-05-01 07:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `bio`, `avatar`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 'Razvan', 'Zamfir', 'razvan_zamfir80@yahoo.com', NULL, NULL, '40d6d467f177d83456f4b27b43303e791.jpg', '$2y$10$2smtqYILy/M/hDarQcJwUeAJRF5w5.FMnJqZA6IsNPSB4jhw2WO0u', 1, 'I0S00HUsu3JDB7erUM46JZsf0VLwT4dykjN8W6TKyFh63sPcQhUTgBPa7OsJ', '2023-01-02 16:06:35', '2023-03-05 07:06:55'),
(2, 2, 'Ioana', 'Popa', 'ionpopa@yahoo.com', NULL, NULL, 'default.png', '$2y$10$a5tOVYH9r8SmYbP.ZhjZHuLkEN4k/dWoE6TaJYVl2XBVUBvHbhVvK', 1, '8Wev623OA3eABJRk2XdwcrpzJtWkK8pwkedkkicFadXJRLXXzBiJCsqNtND3', '2023-01-02 16:07:07', '2023-01-02 16:08:16'),
(3, 3, 'Ion', 'Popescu', 'ipopescu@gmail.com', NULL, NULL, 'default.png', '$2y$10$/DpgvTP/emllYLIPwOLKmePnMNqzWKBsRBsVzBMvAsx09BSAu8l9C', 1, NULL, '2023-01-07 09:24:19', '2023-01-07 09:39:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
