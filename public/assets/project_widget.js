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
        $('#targets_wrapper').addClass('hidden');
        $('#targets_wrapper>div.form-actions').html('');
        $('.project_form')[0].reset();


    });


    $('#add_target_btn').click(function ($event) {
        $event.preventDefault();
        var $select_val = $('#add_target_slct').val();

        $.get(document.location.origin + "/gateways/listings/" + $select_val,
            null,
            function (data) {
                $('#add_target_slct').prop('selectedIndex', 0);
                var $list = $('#target_handler>div').clone()
                    , $selectName = $select_val.split('-');
                $list.children('select').prop('name', 'targets' + '[' + $select_val + '][]')

                $selectName = $selectName[$selectName.length - 1];
                $list.children('select').append("<option value='' selected='selected' disabled='disabled'>Please select " + $selectName.charAt(0).toUpperCase() + $selectName.slice(1) + "</option>");
                console.log(data);
                $.each(data, function (index, element) {
                    $list.children('select').append("<option value='" + index + "'>" + element + "</option>");
                });
                $("#targets_wrapper").removeClass('hidden');
                $list.appendTo($('#targets_wrapper>div.form-actions'));
            });
    });

});

