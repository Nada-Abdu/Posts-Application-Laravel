function delete_post(event) {
    event.preventDefault();
    swal({
        title: "Are you sure to delete this ?",
        text: "You won't be able to revert this delete.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willCancel) => {
        if (willCancel) {
            document.getElementById("delete-post-form").submit();
        }
    });
}

function delete_comment(event) {
    event.preventDefault();
    swal({
        title: "Are you sure to delete this ?",
        text: "You won't be able to revert this delete.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willCancel) => {
        if (willCancel) {
            document.getElementById("delete-comment-form").submit();
        }
    });
}
