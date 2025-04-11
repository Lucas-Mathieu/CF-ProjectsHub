    <?php require_once '../app/views/partials/header.php'; ?>

    <main class="posts-container">
    <?php if (isset($_SESSION['user']) && $_SESSION['user']['is_verified']) : ?>
        <a href="/create-post" class="create-post-btn">Créer un post</a>
    <?php else : ?>
        <h1 class="posts-title">Tous les posts</h1>
    <?php endif; ?>

        <?php if (!empty($posts)) : ?>
            <div class="posts-grid">
                <?php foreach ($posts as $post) : ?>
                    <div class="post-card" data-href="/post/<?= $post['id'] ?>">
                        <div class="post-author">
                            <img src="<?= htmlspecialchars($post['author_pfp']) ?>" alt="Auteur" class="author-pfp" />
                            <p class="post-meta">
                                <strong><?= htmlspecialchars($post['author_name']) ?></strong>
                                <?= date('d M Y H:i', strtotime($post['date_created'])) ?>
                            </p>
                        </div>

                        <h2><?= htmlspecialchars($post['title']) ?></h2>

                        <?php if (!empty($post['tags'])): ?>
                            <div class="post-tags">
                                <?php foreach ($post['tags'] as $tag): ?>
                                    <span class="tag"><?= htmlspecialchars($tag['name']) ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($post['image'])) : ?>
                            <div class="post-image-wrapper">
                                <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image du post" class="post-image" />
                            </div>
                        <?php endif; ?>

                        <?php
                            $limit = !empty($post['image']) ? 150 : 800;
                            $text = $post['text'];
                            $isTruncated = mb_strlen($text) > $limit;

                            if ($isTruncated) {
                                $text = mb_substr($text, 0, $limit) . '... Voir plus';
                            }
                            echo '<p>' . nl2br(htmlspecialchars($text)) . '</p>';
                        ?>

                        <button class="like-btn" data-post-id="<?= $post['id'] ?>" aria-label="Like post">
                            <i class="fa <?= $post['liked'] ? 'fa-heart' : 'fa-heart-o' ?>" style="color: <?= $post['liked'] ? 'red' : 'gray' ?>"></i>
                            <span class="like-count"><?= $post['like_count'] ?? 0 ?></span>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Pas encore de posts.</p>
        <?php endif; ?>
    </main>

    <script src='/assets/js/ajax_like.js'></script>

    <?php require_once '../app/views/partials/footer.php'; ?>