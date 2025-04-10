<li class="reply">
    <div class="comment-meta">
        <img src="<?= htmlspecialchars($lastReply['commenter_pfp']) ?>" alt="Auteur de la réponse" class="commenter-pfp" />
        <strong><?= htmlspecialchars($lastReply['replier_name']) ?></strong>
        <span><?= date('d M Y H:i', strtotime($lastReply['date'])) ?></span>
    </div>
    <p><?= nl2br(htmlspecialchars($lastReply['text'])) ?></p>
</li>