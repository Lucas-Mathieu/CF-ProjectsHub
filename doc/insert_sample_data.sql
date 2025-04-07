INSERT INTO `post` (`id`, `id_user`, `title`, `text`, `date_created`, `date_modified`, `like_count`) VALUES
(1, 1, 'Test de post de projet', '...', '2025-04-07 14:34:02', '2025-04-07 14:34:02', 10);

INSERT INTO `post_comment` (`id`, `id_user`, `id_post`, `parent_id`, `text`, `like_count`, `date`) VALUES
(1, 1, 1, NULL, '1er commentaire', 4, '2025-04-07 14:35:52'),
(2, 1, 1, 1, '1ere réponse', 4, '2025-04-07 14:36:31');

INSERT INTO `post_like` (`id`, `id_user`, `id_post`, `date`) VALUES
(2, 1, 1, '2025-04-07 14:37:27');

INSERT INTO `post_tag` (`id`, `id_tag`, `id_post`) VALUES
(1, 1, 1);

INSERT INTO `tag` (`id`, `name`) VALUES
(2, 'Projets en cours'),
(1, 'Projets terminés');

INSERT INTO `user` (`id`, `name`, `email`, `password`, `is_verified`, `is_admin`) VALUES
(1, 'Lucas', 'lucas.mathieu@edu.esiee-it.fr', '$2y$10$gtwWTvlA8ydb8Qq01J/QtOFERuTbjOD3s6J6vi7LB6rU1AGNBWDBK', 1, 1);
