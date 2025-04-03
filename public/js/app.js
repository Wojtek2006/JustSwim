function createToast($message) {
    // Create toast with message in its body element and show it on screen
    // * czarna kurwa magia do pokazywania toast w lewym gornym rogu wtf
    const $toastContainer = $("#toastContainer");
    let $toast = $("#toastTemplate").clone();
    $toast.removeAttr("id");
    const btoast = new bootstrap.Toast($toast);
    $toast.find(".toast-body").text($message);
    $toast.appendTo($toastContainer);
    btoast.show();
    setTimeout(function () {
        btoast.hide();
        setTimeout(() => {
            $toast.remove();
        }, 300);
    }, 5000);
}
