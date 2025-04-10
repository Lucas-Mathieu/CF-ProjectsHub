<li class="comment">
    <div class="comment-meta">
        <img src="<?= htmlspecialchars($lastComment['commenter_pfp']) ?>" alt="Auteur du commentaire" class="commenter-pfp" />
        <strong><?= htmlspecialchars($lastComment['commenter_name']) ?></strong>
        <span><?= date('d M Y H:i', strtotime($lastComment['date'])) ?></span>
    </div>
    <p><?= nl2br(htmlspecialchars($lastComment['text'])) ?></p>
</li>
