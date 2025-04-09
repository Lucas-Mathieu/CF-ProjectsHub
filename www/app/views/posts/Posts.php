    <?php require_once '../app/views/partials/header.php'; ?>

    <main class="auth-container">
        <h1 class="auth-title">All Posts</h1>

        <?php if (!empty($posts)) : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="post-card">
                    <h2><?= htmlspecialchars($post['title']) ?></h2>
                    <p><?= nl2br(htmlspecialchars(substr($post['text'], 0, 150))) ?>...</p>
                    <p>
                        Posted by <strong><?= htmlspecialchars($post['author_name']) ?></strong> on 
                        <?= date('d M Y H:i', strtotime($post['date_created'])) ?>
                    </p>
                    <a href="/post/<?= $post['id'] ?>" class="btn btn-primary">Read More</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No posts available yet.</p>
        <?php endif; ?>
    </main>

    <?php require_once '../app/views/partials/footer.php'; ?>