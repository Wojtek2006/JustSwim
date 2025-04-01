const GRADE_MAX_LENGTH = 3;

$(document).ready(() => {
    const $nameInput = $("#fName");
    const $surnameInput = $("#fSurname");
    const $gradeInput = $("#fGrade");
    const $gradeHelp = $("#fGradeHelp");
    const $genderInputs = $("input:radio[name='gender']"); // * szczerze nie podoba mi się to ale z klasą nie chciało mi działać więc pozoostanie tak :3
    const $statusInputs = $("input:radio[name='status']"); // * to też
    const $saveButton = $("#fSaveButton");

    function isFormValid() {
        // Check if all required fields are filled and valid
        const nameValid = $nameInput.val().trim() !== "";
        const surnameValid = $surnameInput.val().trim() !== "";
        const gradeValid =
            $gradeInput.val().trim() !== "" &&
            $gradeInput.length <= GRADE_MAX_LENGTH;
        const genderValid = $genderInputs.is(":checked");
        const statusValid = $statusInputs.filter(":checked").length > 0;

        // Change according to grade validity
        if ($gradeInput.val().length <= GRADE_MAX_LENGTH) {
            $gradeInput.removeClass("text-danger");
            $gradeInput.removeClass("text-decoration-line-through");
            $gradeHelp.removeClass("text-danger");
            $gradeHelp.removeClass("fw-bold");
            $gradeHelp.addClass("text-muted");
        } else {
            $gradeInput.addClass("text-danger");
            $gradeInput.addClass("text-decoration-line-through");
            $gradeHelp.addClass("text-danger");
            $gradeHelp.addClass("fw-bold");
            $gradeHelp.removeClass("text-muted");
        }

        return (
            nameValid &&
            surnameValid &&
            genderValid &&
            statusValid &&
            gradeValid
        );
    }

    function toggleSaveButton() {
        // Check if all required fields are filled and enable/disable the button accordingly
        $saveButton.prop("disabled", !isFormValid());
    }

    // Attach event listeners to inputs and radio buttons
    $nameInput.on("input", toggleSaveButton);
    $surnameInput.on("input", toggleSaveButton);
    $gradeInput.on("input", toggleSaveButton);
    $genderInputs.on("change", toggleSaveButton);
    $statusInputs.on("change", toggleSaveButton);

    // Initialize button state
    toggleSaveButton();
});
