function createToast($message) {
    // * czarna kurwa magia do pokazywania toast w lewym gornym rogu wtf
    const $toastContainer = $("#toastContainer");
    let $toast = $("#toastTemplate").clone();
    $toast.removeAttr("id");
    btoast = new bootstrap.Toast($toast);
    $toast.find(".toast-body").text($message);
    $toast.appendTo($toastContainer);
    // $toast.addClass("show");
    btoast.show();
    setTimeout(function () {
        // $toast.removeClass("show");
        btoast.hide();
        // console.log("shown");
        setTimeout(() => {
            $toast.remove();
            // console.log("removed");
        }, 300);
    }, 5000);
}
