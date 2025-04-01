$(document).ready(() => {
    const $nameInput = $("#fName");
    const $dateInput = $("#fDate");
    const $startTimeInput = $("#fStartTime");
    const $saveButton = $("#fSaveButton");

    function isFormValid() {
        // Check if all required fields are filled and valid

        const isNameValid = $nameInput.val().trim() !== "";
        const isDateValid = isDateInFuture($dateInput.val().trim());
        const isStartTimeValid = $startTimeInput.val().trim() !== "";

        if (isDateValid) {
            $dateInput.removeClass("text-danger");
            $dateInput.removeClass("text-decoration-line-through");
        } else {
            $dateInput.addClass("text-danger");
            $dateInput.addClass("text-decoration-line-through");
        }

        return isNameValid && isDateValid && isStartTimeValid;
    }

    function toggleSaveButton() {
        // Check if all required fields are filled and enable/disable the button accordingly
        $saveButton.prop("disabled", !isFormValid());
        console.log("Button state:", isFormValid());
    }

    // Attach event listeners to inputs
    $nameInput.on("input", toggleSaveButton);
    $dateInput.on("input", toggleSaveButton);
    $startTimeInput.on("input", toggleSaveButton);

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
