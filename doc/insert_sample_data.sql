INSERT INTO `post` (`id`, `id_user`, `title`, `text`, `date_created`, `date_modified`, `like_count`) VALUES
(1, 1, 'Test de post de projet', 'Ceci est un test. je test des trucs.\r\nlolollololololol\r\n\r\nTEST AAAAqfdsgAAgfdgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAqfdgAAAqdfgfdgqAAAAAAAgfdsgdqdAAAAAAqfdgAAAAAAAAAAAAAAAAAAAAAgfdsqdgfqdgAAAfdqdgAAAAAAAqdfgAAAAAAAAAAAAfdqgfqdqgdAAAAAAAAAAAAAAAAAA', '2025-04-07 14:34:02', '2025-04-07 14:34:02', 10),
(2, 3, 'test 2 lol', 'jsp vrm pas quoi mettre AAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAA AAAAAAAA AAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2025-04-09 14:55:37', '2025-04-09 14:55:37', 0);

INSERT INTO `post_comment` (`id`, `id_user`, `id_post`, `text`, `date`) VALUES
(1, 1, 1, '1er commentaire', '2025-04-07 14:35:52');

INSERT INTO `post_like` (`id`, `id_user`, `id_post`, `date`) VALUES
(2, 1, 1, '2025-04-07 14:37:27');

INSERT INTO `post_replies` (`id`, `id_user`, `id_parent`, `text`, `date`) VALUES
(1, 3, 1, '1ère réponse', '2025-04-09 18:29:50');

INSERT INTO `post_tag` (`id`, `id_tag`, `id_post`) VALUES
(1, 1, 1);

INSERT INTO `tag` (`id`, `name`) VALUES
(2, 'Projets en cours'),
(1, 'Projets terminés');

INSERT INTO `user` (`id`, `name`, `email`, `password`, `is_verified`, `is_admin`) VALUES
(1, 'Lucas', 'lucas.mathieu@edu.esiee-it.fr', '$2y$10$gtwWTvlA8ydb8Qq01J/QtOFERuTbjOD3s6J6vi7LB6rU1AGNBWDBK', 1, 1),
(3, 'test', 'test@gmail.com', '$2y$10$58PtNlK1ps91hPke/Glp1utcQLqTEExy.lQh8xQUBlC55PlzZwgZC', 0, 0);
