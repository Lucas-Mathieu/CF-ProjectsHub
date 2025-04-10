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

            <div class="post-tags-techs">
                <?php if (!empty($post['tags'])): ?>
                    <div class="tags">
                        <?php foreach ($post['tags'] as $tag): ?>
                            <span class="tag-badge"><?= htmlspecialchars($tag['name']) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($post['techs'])): ?>
                    <div class="techs">
                        <?php foreach ($post['techs'] as $tech): ?>
                            <span class="tech-badge"><?= htmlspecialchars($tech['name']) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($post['image'])) : ?>
                <div class="post-image-wrapper">
                    <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image du post" class="post-image-full" />
                </div>
            <?php endif; ?>

            <div class="post-text">
                <?= nl2br(htmlspecialchars($post['text'])) ?>
            </div>

            <button class="like-btn" data-post-id="<?= $post['id'] ?>" aria-label="Like post">
                <i class="fa <?= $post['liked'] ? 'fa-heart' : 'fa-heart-o' ?>" style="color: <?= $post['liked'] ? 'red' : 'gray' ?>"></i>
                <span class="like-count"><?= $post['like_count'] ?? 0 ?></span>
            </button>

        </article>

        <section class="comments-section">
            <h2>Commentaires</h2>

            <?php if (!empty($_SESSION['user']) && $_SESSION['user']['is_verified']) : ?>
                <button id="toggle-comment-btn">Commenter</button>
                <form id="comment-form" class="comment-form" style="display: none;">
                    <textarea name="text" placeholder="Écrire un commentaire..." required></textarea>
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <button type="submit" id="submit-comment-btn">Envoyer</button>
                </form>
            <?php endif; ?>

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

                            <?php if (!empty($_SESSION['user']) && $_SESSION['user']['is_verified']) : ?>
                                <button class="reply-btn" data-comment-id="<?= $comment['id'] ?>">Répondre</button>
                                <form class="reply-form" data-comment-id="<?= $comment['id'] ?>" style="display: none;">
                                    <textarea name="text" placeholder="Votre réponse..." required></textarea>
                                    <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                                    <button type="submit" class="submit-reply-btn">Envoyer</button>
                                </form>
                            <?php endif; ?>

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

    <script src='/assets/js/ajax_comment.js'></script>
    <script src='/assets/js/ajax_like.js'></script>

    <?php require_once '../app/views/partials/footer.php'; ?>