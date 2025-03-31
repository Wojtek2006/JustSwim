$(document).ready(() => {
    const $nameInput = $("#contender-add-name");
    const $surnameInput = $("#contender-add-surname");
    const $gradeInput = $("#contender-add-grade");
    const $genderRadios = $("input[name='contender-add-gender']");
    const $statusRadios = $("input[name='contender-add-status']");
    const $saveButton = $("#contender-add-save-button");

    function isFormValid() {
        // Check if all required fields are filled and valid
        const nameValid = $nameInput.val().trim() !== "";
        const surnameValid = $surnameInput.val().trim() !== "";
        const gradeValid =
            $gradeInput.val().trim() !== "" && $gradeInput.length <= 3;
        const genderValid = $genderRadios.is(":checked");
        const statusValid = $statusRadios.filter(":checked").length > 0;

        // console.log("Form validation:", {
        //     nameValid,
        //     surnameValid,
        //     genderValid,
        //     statusValid,
        //     gradeValid,
        // }); czarna magia do debugowania

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
    $genderRadios.on("change", toggleSaveButton);
    $statusRadios.on("change", toggleSaveButton);

    // Initialize button state
    toggleSaveButton();
    // console.log("contenders.js loaded");
});
