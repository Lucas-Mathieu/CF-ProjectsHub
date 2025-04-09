<?php

require_once __DIR__ . '/../../core/Database.php';

class CommentModel
{
    private $db;

    public function __construct()
    {
        $this->db = database::getConnection();
    }

    public function getCommentsByPostId($postId)
    {
        // Récupérer les commentaires du post
        $stmt = $this->db->prepare("
            SELECT post_comment.*, user.name AS commenter_name, user.id AS commenter_id
            FROM post_comment
            JOIN user ON post_comment.id_user = user.id
            WHERE post_comment.id_post = :postId
            ORDER BY post_comment.date ASC
        ");
        $stmt->execute(['postId' => $postId]);
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Pour chaque commentaire, récupérer l'avatar et les réponses associées
        foreach ($comments as &$comment) {
            // Ajouter l'avatar du commentateur
            $pfpPath = "uploads/pfps/{$comment['commenter_id']}/avatar.jpg";
            if (!file_exists($pfpPath)) {
                $pfpPath = "uploads/pfps/0/avatar.jpg"; // Avatar par défaut
            }
            $comment['commenter_pfp'] = "/{$pfpPath}"; // Chemin complet de l'avatar

            // Récupérer les réponses du commentaire
            $stmtReplies = $this->db->prepare("
                SELECT post_replies.*, user.name AS replier_name, user.id AS replier_id
                FROM post_replies
                JOIN user ON post_replies.id_user = user.id
                WHERE post_replies.id_parent = :commentId
                ORDER BY post_replies.date ASC
            ");
            $stmtReplies->execute(['commentId' => $comment['id']]);
            $replies = $stmtReplies->fetchAll(PDO::FETCH_ASSOC);

            // Ajouter l'avatar à chaque réponse
            foreach ($replies as &$reply) {
                $replyPfpPath = "uploads/pfps/{$reply['replier_id']}/avatar.jpg";
                if (!file_exists($replyPfpPath)) {
                    $replyPfpPath = "uploads/pfps/0/avatar.jpg"; // Avatar par défaut
                }
                $reply['commenter_pfp'] = "/{$replyPfpPath}"; // Chemin complet de l'avatar
            }

            // Ajouter les réponses au commentaire
            $comment['replies'] = $replies;
        }

        return $comments;
    }
}
?>
