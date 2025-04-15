$(document).ready(() => {
    let $saveButtonUnassign = $("#fUnassignButton");
    let $confirmUnassign = $("#fUnassignConfirm");
    let $unassignForm = $("#removeTeamFromCompetitionForm");
    let $unassignFormAction = $unassignForm.attr("action");
    function toggleUnassignButton() {
        $saveButtonUnassign.prop("disabled", !$confirmUnassign.prop("checked"));
    }
    $confirmUnassign.on("change", toggleUnassignButton);
    $(".delTeamOpenModal").on("click", function () {
        // console.log($(this).attr("teamID"));
        const teamID = $(this).attr("teamID");
        $unassignForm.attr("action", `${$unassignFormAction}/${teamID}`);
        $confirmUnassign.prop("checked", false);
        toggleUnassignButton();
    });
    toggleUnassignButton();
});
