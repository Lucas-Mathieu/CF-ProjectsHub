-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-cf-projecthub.alwaysdata.net
-- Generation Time: Apr 18, 2025 at 10:53 AM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cf-projecthub_db`
--

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_user`, `title`, `text`, `date_created`, `date_modified`, `like_count`, `is_deleted`) VALUES
(9, 1, 'test avec tags', 'tags web', '2025-04-11 13:09:59', '2025-04-18 10:51:41', 0, 1),
(18, 1, '🚀 RéTudiant : la plateforme qui révolutionne la vie étudiante ! 🎓🔥', '“T’as pas d’argent ? RéTudiant !“\r\n\r\nÊtre étudiant, c’est jongler entre petits budgets, bons plans et galères du quotidien. Trouver un resto abordable, une soirée sympa ou un événement intéressant ?\r\n Ce n’est pas toujours facile… et surtout, il faut fouiller plusieurs plateformes sans garantie de tomber sur LA bonne info.\r\n\r\n🎯 C’est là que RéTudiant intervient !\r\n\r\nNous avons créé une plateforme simple et intuitive qui centralise tous les bons plans étudiants autour de vous. En quelques clics, accédez à :\r\n\r\n✅ Les meilleures offres sur les restaurants, bars et événements étudiants.\r\n📍 Une carte interactive pour repérer en un instant ce qui est proche de vous.\r\n📢 Un feed dynamique pour suivre en temps réel les nouveautés et événements à ne pas manquer.\r\n👥 Une communauté engagée où chacun peut partager ses bons plans et recommandations.\r\n👤 Un profil personnalisé pour interagir, publier des événements et profiter d’une expérience complète.\r\n\r\n💡 Grande nouvelle !\r\nNous lançons la première phase de test de RéTudiant en pré-alpha ! 🎉\r\n\r\n📲 Scannez le QR Code ci-dessous pour télécharger l’APK et tester RéTudiant.\r\n🔗 Retrouvez-nous aussi sur les réseaux : paa.ge/retudiant/fr\r\n\r\n🛠 Vos retours sont essentiels !\r\n\r\nCette version est un premier jet, et nous avons besoin de vous pour améliorer l’application.\r\n Bugs, améliorations, suggestions… chaque retour compte pour la suite du développement ! 🙌\r\n\r\n🚀 Un projet porté par une équipe motivée :\r\n\r\n👨‍💻 Lucas MATHIEU – Développeur\r\n 👩‍💻 Aymeric TANABAL – Développeur\r\n 👨‍💻 Antoine VASLIN – Développeur\r\n 👨‍💻 Yanis KHERFI-DOUAOUI – Développeur\r\n\r\n💬 Testez, explorez et partagez-nous vos impressions en commentaire ou en MP !\r\n Et surtout, parlez-en autour de vous, chaque retour nous aide à construire la meilleure application pour la vie étudiante ! 🚀', '2025-04-18 09:25:27', '2025-04-18 10:20:47', 1, 0),
(19, 1, '🚀 Project Hub – La plateforme de partage de projets et de code pour la Coding Factory', 'Bienvenue sur Project Hub, une plateforme pensée par et pour les étudiants de La Coding Factory.\r\nIci, tu peux partager tes projets, découvrir ceux des autres, et surtout collaborer autour du code.\r\n\r\n💡 Pourquoi Project Hub ?\r\nQuand on est en formation tech, on code, beaucoup. Mais combien de fois tes projets finissent oubliés dans un coin de ton ordi ou sur un vieux repo GitHub sans visibilité ?\r\nProject Hub est là pour donner vie à ces projets, les mettre en avant, et t\'aider à :\r\n\r\n✅ Valoriser ton travail\r\n\r\n🤝 Collaborer avec d\'autres étudiants\r\n\r\n🔍 Trouver de l\'inspiration ou des idées\r\n\r\n🛠️ Partager des outils, des technos, des tips\r\n\r\n🧩 Ce que tu peux faire :\r\nCréer des posts pour présenter un projet (app web, script, maquette, jeu, etc.)\r\n\r\nUploader une image (screenshot, logo, etc.)\r\n\r\nAssocier des tags et des technos (PHP, React, Python, etc.)\r\n\r\nDécouvrir les projets des autres et les commenter\r\n\r\nSi tu es admin : gérer les utilisateurs ou accéder aux archives\r\n\r\n🌍 Pour qui ?\r\nLes étudiants de la Coding Factory (tous niveaux)\r\n\r\nCeux qui veulent montrer ce qu’ils savent faire\r\n\r\nCeux qui veulent s’inspirer, apprendre, et échanger\r\n\r\n🔧 En bref\r\nProject Hub, c’est un mini GitHub local, 100% pensé pour la communauté de la CF.\r\nTu bosses sur un projet cool ? Partage-le. Tu veux voir ce que font les autres ? Explore.\r\nC’est simple, rapide, et ça peut te donner un coup de pouce pour ton portfolio ou pour bosser en groupe.', '2025-04-18 10:48:21', '2025-04-18 10:48:21', 1, 0),
(20, 1, 'Test Collaborateurs Python', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sagittis orci vel nunc venenatis hendrerit eget eget urna. Mauris tincidunt massa a accumsan rhoncus. Nam elit nulla, lacinia vitae magna in, finibus mollis sem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque lacinia dui velit, euismod placerat sapien venenatis a. Aliquam et augue imperdiet orci pretium iaculis et in sapien. Vestibulum aliquet convallis tortor ullamcorper sodales. Praesent commodo fermentum est nec cursus. Duis finibus condimentum semper. Mauris id dignissim neque.\r\n\r\nPraesent pharetra tincidunt lacus, id sodales mi finibus id. Pellentesque eleifend metus dui, vitae feugiat mauris commodo ornare. Phasellus non egestas erat. Vivamus vestibulum sapien sem. In nec lacus sed mauris facilisis gravida a a quam. Sed id ligula et diam interdum pulvinar. Curabitur nec pharetra quam. Duis tristique felis orci. Suspendisse potenti. Nam dignissim tellus eu porttitor tincidunt. Ut ut mauris augue. In bibendum auctor lectus, sed fringilla urna luctus nec.\r\n\r\nVestibulum commodo porttitor augue, at molestie tortor. Nulla id leo quis nisi fringilla tincidunt eget id mi. Aliquam sapien turpis, porttitor vitae sagittis vestibulum, convallis nec nunc. Quisque vel risus non lacus imperdiet pretium vitae at risus. Maecenas tortor ipsum, porta at eros eu, gravida ullamcorper mi. Nullam semper luctus massa quis sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ultricies non nibh eu porttitor. Etiam arcu nibh, ornare convallis dignissim ac, accumsan nec massa. Duis at felis ut nunc ullamcorper tempor vitae eget ex. Proin malesuada volutpat condimentum. Aliquam eleifend arcu id est consectetur interdum.\r\n\r\nPellentesque scelerisque libero nisi, efficitur ullamcorper eros tempus quis. Morbi tempor quam quis urna sagittis faucibus. Mauris euismod sagittis dolor in congue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque scelerisque sem vitae ex iaculis mollis. Donec varius ante non orci molestie vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at risus mi. Donec fermentum eget sapien eget pharetra. Mauris porta sodales turpis, tincidunt imperdiet dui eleifend ut. Duis finibus, ante in interdum sagittis, justo nulla facilisis neque, in ultricies ipsum mi vel libero.\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Nullam vehicula nisi ac elit posuere sodales. Nullam hendrerit, nisi vitae vulputate ullamcorper, mi ex ornare libero, non facilisis mauris tellus ornare est. Curabitur ac nisi iaculis, gravida velit ut, efficitur libero. In ullamcorper tellus id justo scelerisque, eu vestibulum magna ultrices. Sed dignissim nulla ante. Fusce mattis volutpat vehicula.', '2025-04-18 10:49:50', '2025-04-18 10:49:50', 0, 0);

--
-- Dumping data for table `post_archive`
--

INSERT INTO `post_archive` (`id`, `id_post`, `id_user`, `title`, `text`, `date_created`, `date_modified`) VALUES
(2, 18, 1, 'RéTudiant : la plateforme qui ', '“T’as pas d’argent ? RéTudiant !“\r\n\r\nÊtre étudiant, c’est jongler entre petits budgets, bons plans et galères du quotidien. Trouver un resto abordable, une soirée sympa ou un événement intéressant ?\r\n Ce n’est pas toujours facile… et surtout, il faut fouiller plusieurs plateformes sans garantie de tomber sur LA bonne info.\r\n\r\n???? C’est là que RéTudiant intervient !\r\n\r\nNous avons créé une plateforme simple et intuitive qui centralise tous les bons plans étudiants autour de vous. En quelques clics, accédez à :\r\n\r\n✅ Les meilleures offres sur les restaurants, bars et événements étudiants.\r\n???? Une carte interactive pour repérer en un instant ce qui est proche de vous.\r\n???? Un feed dynamique pour suivre en temps réel les nouveautés et événements à ne pas manquer.\r\n???? Une communauté engagée où chacun peut partager ses bons plans et recommandations.\r\n???? Un profil personnalisé pour interagir, publier des événements et profiter d’une expérience complète.\r\n\r\n???? Grande nouvelle !\r\nNous lançons la première phase de test de RéTudiant en pré-alpha ! ????\r\n\r\n???? Scannez le QR Code ci-dessous pour télécharger l’APK et tester RéTudiant.\r\n???? Retrouvez-nous aussi sur les réseaux : paa.ge/retudiant/fr\r\n\r\n???? Vos retours sont essentiels !\r\n\r\nCette version est un premier jet, et nous avons besoin de vous pour améliorer l’application.\r\n Bugs, améliorations, suggestions… chaque retour compte pour la suite du développement ! ????\r\n\r\n???? Un projet porté par une équipe motivée :\r\n\r\n????‍???? Lucas MATHIEU – Développeur\r\n ????‍???? Aymeric TANABAL – Développeur\r\n ????‍???? Antoine VASLIN – Développeur\r\n ????‍???? Yanis KHERFI-DOUAOUI – Développeur\r\n\r\n???? Testez, explorez et partagez-nous vos impressions en commentaire ou en MP !\r\n Et surtout, parlez-en autour de vous, chaque retour nous aide à construire la meilleure application pour la vie étudiante ! ????', '2025-04-18 09:25:27', '2025-04-18 09:25:27'),
(3, 18, 1, 'RéTudiant : la plateforme qui ', '“T’as pas d’argent ? RéTudiant !“\r\n\r\nÊtre étudiant, c’est jongler entre petits budgets, bons plans et galères du quotidien. Trouver un resto abordable, une soirée sympa ou un événement intéressant ?\r\n Ce n’est pas toujours facile… et surtout, il faut fouiller plusieurs plateformes sans garantie de tomber sur LA bonne info.\r\n\r\n???? C’est là que RéTudiant intervient !\r\n\r\nNous avons créé une plateforme simple et intuitive qui centralise tous les bons plans étudiants autour de vous. En quelques clics, accédez à :\r\n\r\n✅ Les meilleures offres sur les restaurants, bars et événements étudiants.\r\n???? Une carte interactive pour repérer en un instant ce qui est proche de vous.\r\n???? Un feed dynamique pour suivre en temps réel les nouveautés et événements à ne pas manquer.\r\n???? Une communauté engagée où chacun peut partager ses bons plans et recommandations.\r\n???? Un profil personnalisé pour interagir, publier des événements et profiter d’une expérience complète.\r\n\r\n???? Grande nouvelle !\r\nNous lançons la première phase de test de RéTudiant en pré-alpha ! ????\r\n\r\n???? Scannez le QR Code ci-dessous pour télécharger l’APK et tester RéTudiant.\r\n???? Retrouvez-nous aussi sur les réseaux : paa.ge/retudiant/fr\r\n\r\n???? Vos retours sont essentiels !\r\n\r\nCette version est un premier jet, et nous avons besoin de vous pour améliorer l’application.\r\n Bugs, améliorations, suggestions… chaque retour compte pour la suite du développement ! ????\r\n\r\n???? Un projet porté par une équipe motivée :\r\n\r\n????‍???? Lucas MATHIEU – Développeur\r\n ????‍???? Aymeric TANABAL – Développeur\r\n ????‍???? Antoine VASLIN – Développeur\r\n ????‍???? Yanis KHERFI-DOUAOUI – Développeur\r\n\r\n???? Testez, explorez et partagez-nous vos impressions en commentaire ou en MP !\r\n Et surtout, parlez-en autour de vous, chaque retour nous aide à construire la meilleure application pour la vie étudiante ! ????', '2025-04-18 09:25:27', '2025-04-18 09:25:49'),
(4, 18, 1, 'RéTudiant : la plateforme qui ', '“T’as pas d’argent ? RéTudiant !“\r\n\r\nÊtre étudiant, c’est jongler entre petits budgets, bons plans et galères du quotidien. Trouver un resto abordable, une soirée sympa ou un événement intéressant ?\r\n Ce n’est pas toujours facile… et surtout, il faut fouiller plusieurs plateformes sans garantie de tomber sur LA bonne info.\r\n\r\n???? C’est là que RéTudiant intervient !\r\n\r\nNous avons créé une plateforme simple et intuitive qui centralise tous les bons plans étudiants autour de vous. En quelques clics, accédez à :\r\n\r\n✅ Les meilleures offres sur les restaurants, bars et événements étudiants.\r\n???? Une carte interactive pour repérer en un instant ce qui est proche de vous.\r\n???? Un feed dynamique pour suivre en temps réel les nouveautés et événements à ne pas manquer.\r\n???? Une communauté engagée où chacun peut partager ses bons plans et recommandations.\r\n???? Un profil personnalisé pour interagir, publier des événements et profiter d’une expérience complète.\r\n\r\n???? Grande nouvelle !\r\nNous lançons la première phase de test de RéTudiant en pré-alpha ! ????\r\n\r\n???? Scannez le QR Code ci-dessous pour télécharger l’APK et tester RéTudiant.\r\n???? Retrouvez-nous aussi sur les réseaux : paa.ge/retudiant/fr\r\n\r\n???? Vos retours sont essentiels !\r\n\r\nCette version est un premier jet, et nous avons besoin de vous pour améliorer l’application.\r\n Bugs, améliorations, suggestions… chaque retour compte pour la suite du développement ! ????\r\n\r\n???? Un projet porté par une équipe motivée :\r\n\r\n????‍???? Lucas MATHIEU – Développeur\r\n ????‍???? Aymeric TANABAL – Développeur\r\n ????‍???? Antoine VASLIN – Développeur\r\n ????‍???? Yanis KHERFI-DOUAOUI – Développeur\r\n\r\n???? Testez, explorez et partagez-nous vos impressions en commentaire ou en MP !\r\n Et surtout, parlez-en autour de vous, chaque retour nous aide à construire la meilleure application pour la vie étudiante ! ????', '2025-04-18 09:25:27', '2025-04-18 09:27:52'),
(5, 18, 1, 'RéTudiant : la plateforme qui révolutionne la vie étudiante !', '“T’as pas d’argent ? RéTudiant !“\r\n\r\nÊtre étudiant, c’est jongler entre petits budgets, bons plans et galères du quotidien. Trouver un resto abordable, une soirée sympa ou un événement intéressant ?\r\n Ce n’est pas toujours facile… et surtout, il faut fouiller plusieurs plateformes sans garantie de tomber sur LA bonne info.\r\n\r\n???? C’est là que RéTudiant intervient !\r\n\r\nNous avons créé une plateforme simple et intuitive qui centralise tous les bons plans étudiants autour de vous. En quelques clics, accédez à :\r\n\r\n✅ Les meilleures offres sur les restaurants, bars et événements étudiants.\r\n???? Une carte interactive pour repérer en un instant ce qui est proche de vous.\r\n???? Un feed dynamique pour suivre en temps réel les nouveautés et événements à ne pas manquer.\r\n???? Une communauté engagée où chacun peut partager ses bons plans et recommandations.\r\n???? Un profil personnalisé pour interagir, publier des événements et profiter d’une expérience complète.\r\n\r\n???? Grande nouvelle !\r\nNous lançons la première phase de test de RéTudiant en pré-alpha ! ????\r\n\r\n???? Scannez le QR Code ci-dessous pour télécharger l’APK et tester RéTudiant.\r\n???? Retrouvez-nous aussi sur les réseaux : paa.ge/retudiant/fr\r\n\r\n???? Vos retours sont essentiels !\r\n\r\nCette version est un premier jet, et nous avons besoin de vous pour améliorer l’application.\r\n Bugs, améliorations, suggestions… chaque retour compte pour la suite du développement ! ????\r\n\r\n???? Un projet porté par une équipe motivée :\r\n\r\n????‍???? Lucas MATHIEU – Développeur\r\n ????‍???? Aymeric TANABAL – Développeur\r\n ????‍???? Antoine VASLIN – Développeur\r\n ????‍???? Yanis KHERFI-DOUAOUI – Développeur\r\n\r\n???? Testez, explorez et partagez-nous vos impressions en commentaire ou en MP !\r\n Et surtout, parlez-en autour de vous, chaque retour nous aide à construire la meilleure application pour la vie étudiante ! ????', '2025-04-18 09:25:27', '2025-04-18 09:38:52'),
(6, 18, 1, 'RéTudiant : la plateforme qui révolutionne la vie étudiante !', '“T’as pas d’argent ? RéTudiant !“\r\n\r\nÊtre étudiant, c’est jongler entre petits budgets, bons plans et galères du quotidien. Trouver un resto abordable, une soirée sympa ou un événement intéressant ?\r\n Ce n’est pas toujours facile… et surtout, il faut fouiller plusieurs plateformes sans garantie de tomber sur LA bonne info.\r\n\r\n???? C’est là que RéTudiant intervient !\r\n\r\nNous avons créé une plateforme simple et intuitive qui centralise tous les bons plans étudiants autour de vous. En quelques clics, accédez à :\r\n\r\n✅ Les meilleures offres sur les restaurants, bars et événements étudiants.\r\n???? Une carte interactive pour repérer en un instant ce qui est proche de vous.\r\n???? Un feed dynamique pour suivre en temps réel les nouveautés et événements à ne pas manquer.\r\n???? Une communauté engagée où chacun peut partager ses bons plans et recommandations.\r\n???? Un profil personnalisé pour interagir, publier des événements et profiter d’une expérience complète.\r\n\r\n???? Grande nouvelle !\r\nNous lançons la première phase de test de RéTudiant en pré-alpha ! ????\r\n\r\n???? Scannez le QR Code ci-dessous pour télécharger l’APK et tester RéTudiant.\r\n???? Retrouvez-nous aussi sur les réseaux : paa.ge/retudiant/fr\r\n\r\n???? Vos retours sont essentiels !\r\n\r\nCette version est un premier jet, et nous avons besoin de vous pour améliorer l’application.\r\n Bugs, améliorations, suggestions… chaque retour compte pour la suite du développement ! ????\r\n\r\n???? Un projet porté par une équipe motivée :\r\n\r\n????‍???? Lucas MATHIEU – Développeur\r\n ????‍???? Aymeric TANABAL – Développeur\r\n ????‍???? Antoine VASLIN – Développeur\r\n ????‍???? Yanis KHERFI-DOUAOUI – Développeur\r\n\r\n???? Testez, explorez et partagez-nous vos impressions en commentaire ou en MP !\r\n Et surtout, parlez-en autour de vous, chaque retour nous aide à construire la meilleure application pour la vie étudiante !', '2025-04-18 09:25:27', '2025-04-18 09:44:23'),
(7, 9, 1, 'test avec tags', 'jsp', '2025-04-11 13:09:59', '2025-04-11 13:09:59');

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`id`, `id_user`, `id_post`, `date`) VALUES
(61, 1, 18, '2025-04-18 10:22:14'),
(63, 1, 19, '2025-04-18 10:50:08');

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `id_tag`, `id_post`) VALUES
(16, 1, 18),
(17, 1, 19),
(18, 4, 20),
(19, 1, 9);

--
-- Dumping data for table `post_tech`
--

INSERT INTO `post_tech` (`id`, `id_tech`, `id_post`) VALUES
(37, 3, 18),
(38, 9, 18),
(39, 1, 19),
(40, 2, 19),
(41, 3, 19),
(42, 4, 19),
(43, 10, 19),
(44, 5, 20),
(45, 1, 9),
(46, 2, 9),
(47, 3, 9),
(48, 4, 9);

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(3, 'Demande d\'aide'),
(2, 'Projets en cours'),
(1, 'Projets terminés'),
(4, 'Recherche de collaborateur');

--
-- Dumping data for table `tech`
--

INSERT INTO `tech` (`id`, `name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'PHP'),
(5, 'Python'),
(6, 'Java'),
(7, 'C#'),
(8, 'React'),
(9, 'React Native'),
(10, 'SQL'),
(11, 'TypeScript');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `is_verified`, `is_admin`, `verification_code`, `reset_code`) VALUES
(1, 'Lucas', 'lucas.mathieu@edu.esiee-it.fr', '$2y$10$gtwWTvlA8ydb8Qq01J/QtOFERuTbjOD3s6J6vi7LB6rU1AGNBWDBK', 1, 1, NULL, '682818');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
