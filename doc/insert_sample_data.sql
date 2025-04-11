INSERT INTO `post` (`id`, `id_user`, `title`, `text`, `date_created`, `date_modified`, `like_count`) VALUES
(1, 1, 'Test de post de projet', 'Ceci est un test. je test des trucs.\r\nlolollololololol\r\n\r\nTEST AAAAqfdsgAAgfdgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAqfdgAAAqdfgfdgqAAAAAAAgfdsgdqdAAAAAAqfdgAAAAAAAAAAAAAAAAAAAAAgfdsqdgfqdgAAAfdqdgAAAAAAAqdfgAAAAAAAAAAAAfdqgfqdqgdAAAAAAAAAAAAAAAAAA', '2025-04-07 14:34:02', '2025-04-07 14:34:02', 2),
(2, 3, 'test 2 lol', 'jsp vrm pas quoi mettre AAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAA AAAAAAAA AAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2025-04-09 14:55:37', '2025-04-09 14:55:37', 1),
(3, 1, 'test gdfsqdgqdfq', 'qhgdqfhqdqfdqhdqfdhq\r\n\r\ndfhgqdfhqdfhgqqdgqh\r\nfhgdqdfghqqd\r\n\r\n\r\nsfghsfghsghsgh', '2025-04-10 23:58:32', '2025-04-10 23:58:32', 0);

INSERT INTO `post_comment` (`id`, `id_user`, `id_post`, `text`, `date`) VALUES
(1, 1, 1, 'test 1', '2025-04-11 10:37:22'),
(2, 1, 1, 'test 2', '2025-04-11 10:37:33'),
(3, 1, 1, 'test 3', '2025-04-11 10:37:44'),
(4, 1, 1, '<sg', '2025-04-11 10:38:29'),
(5, 1, 3, 'test', '2025-04-11 10:40:42'),
(13, 1, 3, 'test', '2025-04-11 10:49:38'),
(14, 1, 3, 'yio', '2025-04-11 10:50:13'),
(15, 1, 3, '<fd<', '2025-04-11 10:53:19'),
(21, 1, 3, 'qdsdqs', '2025-04-11 11:04:22'),
(22, 1, 3, 'vSDvdsV', '2025-04-11 11:04:50');

INSERT INTO `post_like` (`id`, `id_user`, `id_post`, `date`) VALUES
(22, 3, 1, '2025-04-10 21:20:20'),
(37, 1, 2, '2025-04-10 23:05:52'),
(54, 1, 1, '2025-04-11 09:38:59');

INSERT INTO `post_replies` (`id`, `id_user`, `id_post`, `id_parent`, `text`, `date`) VALUES
(8, 1, 1, 1, 'réponse 1', '2025-04-11 10:37:56'),
(9, 1, 1, 1, 'réponse 1', '2025-04-11 10:38:13'),
(10, 1, 1, 2, 'fzeF', '2025-04-11 10:38:16'),
(11, 1, 1, 2, 'Ezffez', '2025-04-11 10:38:20'),
(12, 1, 1, 3, 'qegr', '2025-04-11 10:38:23'),
(13, 1, 3, 5, '>SFD>F', '2025-04-11 10:53:11'),
(14, 1, 3, 5, '<sdfd<s', '2025-04-11 10:53:13'),
(15, 1, 3, 5, 'dsqdqs', '2025-04-11 11:04:19'),
(16, 1, 3, 5, 'qsdq', '2025-04-11 11:04:24'),
(17, 1, 3, 21, 's<vdSVD', '2025-04-11 11:04:47'),
(18, 1, 3, 22, 'hfqdqfdhqd', '2025-04-11 11:04:53');

INSERT INTO `post_tag` (`id`, `id_tag`, `id_post`) VALUES
(1, 1, 1);

INSERT INTO `tag` (`id`, `name`) VALUES
(2, 'Projets en cours'),
(1, 'Projets terminés');

INSERT INTO `tech` (`id`, `name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'PHP'),
(5, 'Python'),
(6, 'Java'),
(7, 'C#'),
(8, 'React'),
(9, 'React Native');

INSERT INTO `user` (`id`, `name`, `email`, `password`, `is_verified`, `is_admin`) VALUES
(1, 'Lucas', 'lucas.mathieu@edu.esiee-it.fr', '$2y$10$gtwWTvlA8ydb8Qq01J/QtOFERuTbjOD3s6J6vi7LB6rU1AGNBWDBK', 1, 1),
(3, 'test', 'test@gmail.com', '$2y$10$58PtNlK1ps91hPke/Glp1utcQLqTEExy.lQh8xQUBlC55PlzZwgZC', 0, 0);