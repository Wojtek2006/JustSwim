$(document).ready(() => {
    const $teamNameInput = $("#team-add-name");
    const $teamCodeNameInput = $("#team-add-code-name");
    const $saveButton = $("#team-add-save-button");

    function isFormValid() {
        // Check if all required fields are filled and valid
        const isTeamNameValid = $teamNameInput.val().trim() !== "";
        const isTeamCodeNameValid =
            $teamCodeNameInput.val().trim() !== "" &&
            $teamCodeNameInput.val().length <= 5;

        return isTeamNameValid && isTeamCodeNameValid;
    }

    function toggleSaveButton() {
        // Check if all required fields are filled and enable/disable the button accordingly
        $saveButton.prop("disabled", !isFormValid());
    }

    // Attach event listeners to inputs
    $teamNameInput.on("input", toggleSaveButton);
    $teamCodeNameInput.on("input", toggleSaveButton);

    // Initialize button state
    toggleSaveButton();

    $saveButton.on("click", (event) => {
        event.preventDefault();
        // TODO: dodawanie zawodnika do bazy danych
    });
});
