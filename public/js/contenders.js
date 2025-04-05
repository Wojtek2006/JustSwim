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
    const $formEdit = $("#editUserForm");
    const formActionEdit = $formEdit.attr("action");

    const $teamSelectAssign = $("#fTeamSelectAssign");
    const $saveButtonAssign = $("#fAssignSaveButton");
    const $openModalAssign = $(".assignOpenModal");
    const $formAssignToTeam = $("#assignToTeamForm");

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
        const genderValid = $genderInputs.is(":checked");
        const statusValid = $statusInputs.filter(":checked").length > 0;

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
    function toggleAssignButton() {
        // console.log($teamSelectAssign.val());
        if ($teamSelectAssign.val() !== "0") {
            createToast(
                $teamSelectAssign.val() +
                    " - " +
                    $teamSelectAssign
                        .find(`option[value="${$teamSelectAssign.val()}"]`)
                        .text()
            );
        }
        $saveButtonAssign.prop(
            "disabled",
            Boolean($teamSelectAssign.val() == "0")
        );
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
    $teamSelectAssign.val("0");
    // assign team modal
    $teamSelectAssign.on("change", toggleAssignButton);
    toggleSaveButtonAdd();
    toggleDeleteButton();
    toggleAssignButton();

    $openModalDel.on("click", function () {
        // set delete route with the correct id (stored in attribute contenderID in DOM)
        const id = $(this).attr("contenderID");
        $formDel.attr("action", `${formActionDel}/${id}`);
        $checkboxInputDel.prop("checked", false);
    });

    $openModalEdit.on("click", function () {
        const id = $(this).attr("contenderID");
        const name = $(this).attr("contenderName");
        const surname = $(this).attr("contenderSurname");
        const grade = $(this).attr("contenderGrade");
        const gender = $(this).attr("contenderGender");
        const status = $(this).attr("contenderStatus");
        console.log([id, name, surname, grade, gender, status]);

        $formEdit.attr("action", `${formActionEdit}/${id}`);
        createToast([id, name, surname, grade, gender, status]);

        $nameInputEdit.val(name);
        $surnameInputEdit.val(surname);
        $gradeInputEdit.val(grade);
        $genderInputsEdit.filter(`[value="${gender}"]`).prop("checked", true);
        $statusInputsEdit.filter(`[value="${status}"]`).prop("checked", true);
    });

    $openModalAssign.on("click", function () {
        const id = $(this).attr("contenderID");
        const action = `${$formAssignToTeam.attr("action")}/assignTeam/${id}`;
        //  const action = id;
        $formAssignToTeam.attr("action", action);
        createToast(id + " " + action);
    });
});
