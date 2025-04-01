$(document).ready(() => {
    const $compNameInput = $("#fName");
    const $compDateInput = $("#fDate");
    const $compStartTimeInput = $("#fStartTime");
    const $saveButton = $("#fSaveButton");

    function isFormValid() {
        // Check if all required fields are filled and valid
        // // * debug magic
        // // console.log(
        // //     $compNameInput.val(),
        // //     $compDateInput.val(),
        // //     $compStartTimeInput.val()
        // // );

        const isCompNameValid = $compNameInput.val().trim() !== "";
        const isCompDateValid = isDateInFuture($compDateInput.val().trim());
        const isCompStartTimeValid = $compStartTimeInput.val().trim() !== "";

        if (isCompDateValid) {
            $compDateInput.removeClass("text-danger");
            $compDateInput.removeClass("text-decoration-line-through");
        } else {
            $compDateInput.addClass("text-danger");
            $compDateInput.addClass("text-decoration-line-through");
        }

        // // * debug magic
        //// console.log(isCompNameValid, isCompDateValid, isCompStartTimeValid);

        return isCompNameValid && isCompDateValid && isCompStartTimeValid;
    }

    function toggleSaveButton() {
        // Check if all required fields are filled and enable/disable the button accordingly
        $saveButton.prop("disabled", !isFormValid());
        console.log("Button state:", isFormValid());
    }

    // Attach event listeners to inputs
    $compNameInput.on("input", toggleSaveButton);
    $compDateInput.on("input", toggleSaveButton);
    $compStartTimeInput.on("input", toggleSaveButton);

    // Initialize button state
    toggleSaveButton();
});

function isDateInFuture(dateString) {
    const inputDate = new Date(dateString);
    const currentDate = new Date();

    // Set the time of the current date to 00:00:00 to compare only the date part
    currentDate.setHours(0, 0, 0, 0);

    return inputDate > currentDate;
}
