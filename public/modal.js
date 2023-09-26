function confirmDelete(event, id) {
    event.preventDefault();
    modal.style.display = "flex";
    content.style.filter = "blur(2px)"
    content.style.pointerEvents = "none"

    setTimeout(() => {
        modal.style.opacity = "100%";
        modal.style.transform = "translate(-50%, -50%)";
    }, 100);
    confirmButton.setAttribute("userId", id);
}

function deleteNow(btn) {
    const id = btn.getAttribute("userId");
    const form = document.getElementById(id)
    form.submit();
}

function closeModal() {
    modal.style.opacity = "0%";
    modal.style.transform = "translate(-50%, -44%)";
    content.style.filter = "blur(0px)";
    content.style.pointerEvents = "unset"

    setTimeout(() => {
        modal.style.display = "none"
    }, 500);
    confirmButton.setAttribute("userId", "");
}