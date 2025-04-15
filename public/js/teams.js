const CODE_MAX_LENGTH = 5;

$(document).ready(() => {
    const $nameInput = $("#fName");
    const $codeNameInput = $("#fCodeName");
    const $codeNameHelp = $("#fCodeNameHelp");
    const $saveButton = $("#fSaveButton");
    
    const $nameInputEdit = $("#fEditName");
    const $codeNameInputEdit = $("#fEditCodeName");

    const $openModalDel = $(".delOpenModal");



    function isFormValid() {
        // Check if all required fields are filled and valid
        const isNameValid = $nameInput.val().trim() !== "";
        const isCodeNameValid =
            $codeNameInput.val().trim() !== "" &&
            $codeNameInput.val().length <= CODE_MAX_LENGTH;

        if ($codeNameInput.val().length <= CODE_MAX_LENGTH) {
            $codeNameInput.removeClass("text-danger");
            $codeNameInput.removeClass("text-decoration-line-through");
            $codeNameHelp.removeClass("text-danger");
            $codeNameHelp.removeClass("fw-bold");
            $codeNameHelp.addClass("text-muted");
        } else {
            $codeNameInput.addClass("text-danger");
            $codeNameInput.addClass("text-decoration-line-through");
            $codeNameHelp.addClass("text-danger");
            $codeNameHelp.addClass("fw-bold");
            $codeNameHelp.removeClass("text-muted");
        }
        return isNameValid && isCodeNameValid;
    }

    function toggleSaveButton() {
        // Check if all required fields are filled and enable/disable the button accordingly
        $saveButton.prop("disabled", !isFormValid());
    }

    // Attach event listeners to inputs
    $nameInput.on("input", toggleSaveButton);
    $codeNameInput.on("input", toggleSaveButton);

    // Initialize button state
    toggleSaveButton();



    $openModalDel.on("click", function () {
        // set delete route with the correct id (stored in attribute contenderID in DOM)
        const id = $(this).attr("contenderID");
        $formDel.attr("action", `${formActionDel}/${id}`);
        $checkboxInputDel.prop("checked", false);
    });
});
