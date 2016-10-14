$(function () {
    FN_App.projects = {
        last_stored_project: -1
    };
    $('.project_form').ajaxForm(function ($data) {
        FN_App.projects.last_stored_project = $data;
        $.get(document.location.origin + "/listings/projects/" + $data.sp_id,
            null,
            function (data) {
                var model = $('#projects-drop-down');
                model.empty();
                model.append("<option value='' selected='selected' disabled='disabled'>Please select a project</option>");
                $.each(data, function (index, element) {
                    model.append("<option value='" + element.id + "'>" + element.name + "</option>");
                });
            });
        $('.project_form')[0].reset();

    });

});

