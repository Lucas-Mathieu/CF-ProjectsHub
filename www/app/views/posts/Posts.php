    <?php require_once '../app/views/partials/header.php'; ?>

    <main class="posts-container">
        <h1 class="posts-title">All Posts</h1>

        <?php if (!empty($posts)) : ?>
            <div class="posts-grid">
                <?php foreach ($posts as $post) : ?>
                    <a href="/post/<?= $post['id'] ?>" class="post-card">
                        <div class="post-author">
                            <img src="<?= htmlspecialchars($post['author_pfp']) ?>" alt="Auteur" class="author-pfp" />
                            <p class="post-meta">
                                <strong><?= htmlspecialchars($post['author_name']) ?></strong>
                                <?= date('d M Y H:i', strtotime($post['date_created'])) ?>
                            </p>
                        </div>

                        <h2><?= htmlspecialchars($post['title']) ?></h2>

                        <?php if (!empty($post['image'])) : ?>
                            <div class="post-image-wrapper">
                                <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image du post" class="post-image" />
                            </div>
                        <?php endif; ?>

                        <?php
                            $limit = !empty($post['image']) ? 150 : 500;
                            $text = $post['text'];
                            $isTruncated = mb_strlen($text) > $limit;

                            if ($isTruncated) {
                                $text = mb_substr($text, 0, $limit) . '... Voir plus';
                            }

                            echo '<p>' . nl2br(htmlspecialchars($text)) . '</p>';
                        ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Pas encore de posts.</p>
        <?php endif; ?>
    </main>

    <?php require_once '../app/views/partials/footer.php'; ?>