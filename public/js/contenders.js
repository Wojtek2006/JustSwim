$(document).ready(() => {
    const $nameInput = $("#contender-add-name");
    const $surnameInput = $("#contender-add-surname");
    const $gradeInput = $("#contender-add-grade");
    const $genderRadios = $("input[name='contender-add-gender']");
    const $statusRadios = $("input[name='contender-add-status']");
    const $saveButton = $("#contender-add-save-button");

    function isFormValid() {
        const nameValid = $nameInput.val().trim() !== "";
        const surnameValid = $surnameInput.val().trim() !== "";
        const genderValid = $genderRadios.is(":checked");
        const statusValid = $statusRadios.is(":checked");
        const gradeValid = $gradeInput.val().trim() !== "";

        return (
            nameValid &&
            surnameValid &&
            genderValid &&
            statusValid &&
            gradeValid
        );
    }

    function toggleSaveButton() {
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
    console.log("contenders.js loaded");

    $saveButton.on("click", (event) => {
        event.preventDefault(); // Prevent default form submission
        // i teraz tutaj mozna po prostu wysłać POST do aplikacji np. view contenders/add i tam będzie dodawanie
        $.ajax({
            url: "<URL>", // Zmienić na odpowiedni URL
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify(contenderData),
            success: (response) => {
                console.log("Dodano:", response);
                alert("Dodano zawodnika");
                // restart wartości
                $nameInput.val("");
                $surnameInput.val("");
                $gradeInput.val("");
                $genderRadios.prop("checked", false);
                $statusRadios.prop("checked", false);
                toggleSaveButton();
            },
            error: (xhr, status, error) => {
                console.error("Error:", error);
                alert("Error podczas dodawania zawodnika");
            },
        });
    });
});
