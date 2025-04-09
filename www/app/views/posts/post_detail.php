    <?php require_once '../app/views/partials/header.php'; ?>

    <main class="post-detail-container">
        <article class="post-detail">
            <div class="post-author">
                <img src="<?= htmlspecialchars($post['author_pfp']) ?>" alt="Auteur" class="author-pfp" />
                <p class="post-meta">
                    <strong><?= htmlspecialchars($post['author_name']) ?></strong> - 
                    <?= date('d M Y H:i', strtotime($post['date_created'])) ?>
                </p>
            </div>

            <h1><?= htmlspecialchars($post['title']) ?></h1>

            <?php if (!empty($post['image'])) : ?>
                <div class="post-image-wrapper">
                    <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image du post" class="post-image-full" />
                </div>
            <?php endif; ?>

            <div class="post-text">
                <?= nl2br(htmlspecialchars($post['text'])) ?>
            </div>
        </article>

        <section class="comments-section">
            <h2>Commentaires</h2>

            <?php if (!empty($comments)) : ?>
                <ul class="comments-list">
                    <?php foreach ($comments as $comment) : ?>
                        <li class="comment">
                            <div class="comment-meta">
                                <img src="<?= htmlspecialchars($comment['commenter_pfp']) ?>" alt="Auteur du commentaire" class="commenter-pfp" />
                                <strong><?= htmlspecialchars($comment['commenter_name']) ?></strong>
                                <span><?= date('d M Y H:i', strtotime($comment['date'])) ?></span>
                            </div>
                            <p><?= nl2br(htmlspecialchars($comment['text'])) ?></p>

                            <?php if (!empty($comment['replies'])) : ?>
                                <ul class="comment-replies">
                                    <?php foreach ($comment['replies'] as $reply) : ?>
                                        <li class="reply">
                                            <div class="comment-meta">
                                                <img src="<?= htmlspecialchars($reply['commenter_pfp']) ?>" alt="Auteur de la réponse" class="commenter-pfp" />
                                                <strong><?= htmlspecialchars($reply['replier_name']) ?></strong>
                                                <span><?= date('d M Y H:i', strtotime($reply['date'])) ?></span>
                                            </div>
                                            <p><?= nl2br(htmlspecialchars($reply['text'])) ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>Aucun commentaire pour l’instant.</p>
            <?php endif; ?>
        </section>
    </main>

    <?php require_once '../app/views/partials/footer.php'; ?>