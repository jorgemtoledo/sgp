$(document).ready(function () {
    $("#doctor").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/sgp_cib/medical_certificates/GetDoctorName",
            data: {
                doctor: $("#doctor").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownDoctor').empty();
                    $('#doctor').attr("data-toggle", "dropdown");
                    $('#DropdownDoctor').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#doctor').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownDoctor').append('<li role="presentation" ><a role="menuitem dropdownnameli" class="dropdownlivalue">' + value['name'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtdoctor').on('click', 'li a', function () {
        $('#doctor').val($(this).text());
    });
});