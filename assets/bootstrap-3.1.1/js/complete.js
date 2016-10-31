$(document).ready(function () {
    $("#cid").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/sgp_cib/medical_certificates/GetCountryName",
            data: {
                keyword: $("#cid").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCid').empty();
                    $('#cid').attr("data-toggle", "dropdown");
                    $('#DropdownCid').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#cid').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCid').append('<li role="presentation" ><a role="menuitem dropdownnameli" class="dropdownlivalue">' + value['name'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtcid').on('click', 'li a', function () {
        $('#cid').val($(this).text());
    });


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


    $("#health").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/sgp_cib/medical_certificates/GetHealthName",
            data: {
                health: $("#health").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownHealth').empty();
                    $('#health').attr("data-toggle", "dropdown");
                    $('#DropdownHealth').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#health').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownHealth').append('<li role="presentation" ><a role="menuitem dropdownnameli" class="dropdownlivalue">' + value['name'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txthealth').on('click', 'li a', function () {
        $('#health').val($(this).text());
    });




});