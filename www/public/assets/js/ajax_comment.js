document.getElementById('comment-form')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    
    const response = await fetch('/ajax/add-comment', {
        method: 'POST',
        body: formData
    });

    const result = await response.json();
    if (result.success) {
        const commentList = document.querySelector('.comments-list');
        commentList.innerHTML += result.html;
        form.reset();
    } else {
        alert(result.error);
    }
});

document.querySelectorAll('.reply-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.commentId;
        document.querySelector(`.reply-form[data-comment-id="${id}"]`).style.display = 'block';
    });
});

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
            form.style.display = 'none';
        } else {
            alert(result.error);
        }
    });
});