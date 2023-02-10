/* SESSION INPUT LOGS FORM ใบขอซื้อ */
$(function () {
    $('#num_afb').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });

    $('#num_book_afb').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });
    $('#afb_group_id').on("mouseleave change", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });
    $('#create_afb_date').on("mouseleave change", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });

    $('#work_for').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });
    $('#name_afb_ark').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
            }

        });
    });
    $('#name_afb_ark_conf').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });
});

$(function () {
    /* SESSION INPUT LOGS FORM รายการขอซื้อ */
    $('#name_not_order_afb').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });

    $('#name_yes_order_afb').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });

    $('#value_order_afb').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });

    $('#unit_order_afb').on("mouseleave change", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });

    $('#subject_order').on("keyup", function () {
        var num_afb = $('#num_afb').val();
        var num_book_afb = $('#num_book_afb').val();
        var create_afb_date = $('#create_afb_date').val();
        var work_for = $('#work_for').val();
        var name_not_order_afb = $('#name_not_order_afb').val();
        var name_yes_order_afb = $('#name_yes_order_afb').val();
        var value_order_afb = $('#value_order_afb').val();
        var unit_order_afb = $('#unit_order_afb').val();
        var subject_order = $('#subject_order').val();
        var name_afb_ark = $('#name_afb_ark').val();
        var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var name_afb_ark_conf = $('#name_afb_ark_conf').val();
       var afb_group_id = $('#afb_group_id').val();
        $.ajax({
            type: "GET",
            url: "logs_session.php",
            data: {
                num_afb: num_afb,
                num_book_afb: num_book_afb,
                create_afb_date: create_afb_date,
                work_for: work_for,
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
                name_afb_ark: name_afb_ark,
                name_afb_ark_conf:name_afb_ark_conf,
                afb_group_id: afb_group_id,
            }

        });
    });
   
});