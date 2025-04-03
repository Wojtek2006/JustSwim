const GRADE_MAX_LENGTH = 3;

$(document).ready(() => {
    // add modal constants
    const $nameInputAdd = $("#fAddName");
    const $surnameInputAdd = $("#fAddSurname");
    const $gradeInputAdd = $("#fAddGrade");
    const $gradeHelpAdd = $("#fAddGradeHelp");
    const $genderInputsAdd = $("input.fAdd:radio[name='gender']"); // *  szczerze nie podoba mi się to ale z klasą nie chciało mi działać więc pozoostanie tak :3 - @vvlfn
    const $statusInputsAdd = $("input.fAdd:radio[name='status']"); // *  to też - @vvlfn
    const $saveButtonAdd = $("#fAddSaveButton");
    // del modal constants
    const $checkboxInputDel = $("#fDelConfirm");
    const $saveButtonDel = $("#fDelButton");
    const $openModalDel = $(".delOpenModal");
    const $formDel = $("#deleteUserForm");
    const formActionDel = $formDel.attr("action");
    // edit modal constants
    const $nameInputEdit = $("#fEditName");
    const $surnameInputEdit = $("#fEditSurname");
    const $gradeInputEdit = $("#fEditGrade");
    const $gradeHelpEdit = $("#fEditGradeHelp");
    const $genderInputsEdit = $("input.fEdit:radio[name='gender']");
    const $statusInputsEdit = $("input.fEdit:radio[name='status']");
    const $saveButtonEdit = $("#fEditSaveButton");
    const $openModalEdit = $(".editOpenModal");

    function isContenderFormValid(
        $nameInput,
        $surnameInput,
        $gradeInput,
        $gradeHelp,
        $genderInputs,
        $statusInputs
    ) {
        // Check if all required fields are filled and valid
        const nameValid = $nameInput.val().trim() !== "";
        const surnameValid = $surnameInput.val().trim() !== "";
        const gradeValid =
            $gradeInput.val().trim() !== "" &&
            $gradeInput.val().trim().length <= GRADE_MAX_LENGTH; // klasa 1 - GRADE_MAX_LENGTH znaków
        // const gradeValid = true;
        const genderValid = $genderInputs.is(":checked");
        const statusValid = $statusInputs.filter(":checked").length > 0;

        console.log(
            nameValid,
            surnameValid,
            gradeValid,
            genderValid,
            statusValid
        );

        // Change according to grade validity
        if ($gradeInput.val().trim().length <= GRADE_MAX_LENGTH) {
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

    function toggleSaveButtonAdd() {
        // Check if all required fields are filled and enable/disable the button accordingly
        $saveButtonAdd.prop(
            "disabled",
            !isContenderFormValid(
                $nameInputAdd,
                $surnameInputAdd,
                $gradeInputAdd,
                $gradeHelpAdd,
                $genderInputsAdd,
                $statusInputsAdd
            )
        );
    }
    function toggleSaveButtonEdit() {
        // Check if all required fields are filled and enable/disable the button accordingly
        $saveButtonEdit.prop(
            "disabled",
            !isContenderFormValid(
                $nameInputEdit,
                $surnameInputEdit,
                $gradeInputEdit,
                $gradeHelpEdit,
                $genderInputsEdit,
                $statusInputsEdit
            )
        );
    }
    function toggleDeleteButton() {
        $saveButtonDel.prop("disabled", !$checkboxInputDel.prop("checked"));
    }

    // add modal listeners
    $nameInputAdd.on("input", toggleSaveButtonAdd);
    $surnameInputAdd.on("input", toggleSaveButtonAdd);
    $gradeInputAdd.on("input", toggleSaveButtonAdd);
    $genderInputsAdd.on("change", toggleSaveButtonAdd);
    $statusInputsAdd.on("change", toggleSaveButtonAdd);
    // del modal listeners
    $checkboxInputDel.on("change", toggleDeleteButton);
    // edit modal listeners
    $nameInputEdit.on("input", toggleSaveButtonEdit);
    $surnameInputEdit.on("input", toggleSaveButtonEdit);
    $gradeInputEdit.on("input", toggleSaveButtonEdit);
    $genderInputsEdit.on("change", toggleSaveButtonEdit);
    $statusInputsEdit.on("change", toggleSaveButtonEdit);

    // Initialize button state
    toggleSaveButtonAdd();
    toggleDeleteButton();

    $openModalDel.on("click", function () {
        // set delete route with the correct id (stored in attribute contenderID in DOM)
        let id = $(this).attr("contenderID");
        $formDel.attr("action", `${formActionDel}/${id}`);
        $checkboxInputDel.prop("checked", false);
    });

    $openModalEdit.on("click", function () {
        let id = $(this).attr("contenderID");
        let name = $(this).attr("contenderName");
        let surname = $(this).attr("contenderSurname");
        let grade = $(this).attr("contenderGrade");
        let gender = $(this).attr("contenderGender");
        let status = $(this).attr("contenderStatus");
        console.log([id, name, surname, grade, gender, status]);

        // $formDel.attr("action", ``); // TODO:
        createToast([id, name, surname, grade, gender, status]);

        $nameInputEdit.val(name);
        $surnameInputEdit.val(surname);
        $gradeInputEdit.val(grade);
        $genderInputsEdit.filter(`[value="${gender}"]`).prop("checked", true);
        $statusInputsEdit.filter(`[value="${status}"]`).prop("checked", true);
    });
});
