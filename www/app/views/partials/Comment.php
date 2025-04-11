<li class="comment">
    <div class="comment-meta">
        <img src="<?= htmlspecialchars($lastComment['commenter_pfp']) ?>" alt="Auteur du commentaire" class="commenter-pfp" />
        <strong><?= htmlspecialchars($lastComment['commenter_name']) ?></strong>
        <span><?= date('d M Y H:i', strtotime($lastComment['date'])) ?></span>
    </div>
    <p><?= nl2br(htmlspecialchars($lastComment['text'])) ?></p>

    <button class="reply-btn" data-comment-id="<?= $lastComment['id'] ?>">Répondre</button>
    <form class="reply-form" data-comment-id="<?= $lastComment['id'] ?>" style="display: none;">
        <textarea name="text" placeholder="Votre réponse..." required></textarea>
        <input type="hidden" name="comment_id" value="<?= $lastComment['id'] ?>">
        <input type="hidden" name="post_id" value="<?= $lastComment['id_post'] ?>">
        <button type="submit" class="submit-reply-btn">Envoyer</button>
    </form>
</li>

<script src='/assets/js/ajax_comment.js'></script>