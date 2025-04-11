// Hide / show comment form
const toggleCommentBtn = document.getElementById('toggle-comment-btn');
const commentForm = document.getElementById('comment-form');

if (toggleCommentBtn && commentForm) {
    toggleCommentBtn.addEventListener('click', () => {
        commentForm.style.display = commentForm.style.display === 'none' ? 'block' : 'none';
    });
}

// Send comment
document.querySelectorAll('.comment-form').forEach(commentForm => {
    commentForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        try {
            const response = await fetch('/ajax/add-comment', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                console.log('Résultat de l\'ajout du commentaire:', result);

                // Check if the comment section exists
                const commentsSection = document.querySelector('.comments-section');
                if (!commentsSection) {
                    console.error('Erreur : La section des commentaires n\'a pas été trouvée.');
                    return;
                }

                // Check if the comment list exists, if not create it
                let commentList = commentsSection.querySelector('.comments-list');
                if (!commentList) {
                    console.log('Création d\'une nouvelle liste de commentaires');
                    commentList = document.createElement('ul');
                    commentList.classList.add('comments-list');

                    // Delete the "No comments yet" message if it exists
                    const noCommentMsg = commentsSection.querySelector('p');
                    if (noCommentMsg) {
                        noCommentMsg.remove(); // Enlever le message d'absence de commentaires
                    }

                    commentsSection.appendChild(commentList);
                }

                // Add the new comment to the list
                commentList.innerHTML += result.html;

                // Reset the form and hide it
                form.reset();
                form.style.display = 'none';
            } else {
                alert(result.error);
            }
        } catch (error) {
            console.error('Erreur lors de l\'ajout du commentaire:', error);
        }
    });
});

// Hide / show reply forms
document.querySelectorAll('.reply-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.commentId;
        const replyForm = document.querySelector(`.reply-form[data-comment-id="${id}"]`);
        replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
    });
});

// Send reply
document.querySelectorAll('.reply-form').forEach(form => {
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(form);

        const response = await fetch('/ajax/add-reply', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            const replyList = form.closest('.comment').querySelector('.comment-replies');
            if (replyList) {
                replyList.innerHTML += result.html;
            } else {
                const newList = document.createElement('ul');
                newList.className = 'comment-replies';
                newList.innerHTML = result.html;
                form.closest('.comment').appendChild(newList);
            }
            form.reset();
            form.style.display = 'none'; // Masquer après envoi
        } else {
            alert(result.error);
        }
    });
});