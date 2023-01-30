$(function () {
 $("#butt_add_order").click(function () {
    var name_not_order_afb = $("#name_not_order_afb").val();
    var name_yes_order_afb = $("#name_yes_order_afb").val();
    var value_order_afb = $("#value_order_afb").val();
    var unit_order_afb = $("#unit_order_afb").val();
    var subject_order = $("#subject_order").val();
    if (name_not_order_afb == "") {
      $("#bg_pop_alert").show();
      setTimeout(hide_pop_wrong_alert, 3000);
      $("#name_not_order_afb").focus();
      return;
    }
    if (value_order_afb == "") {
      $("#bg_pop_alert").show();
      setTimeout(hide_pop_wrong_alert, 3000);
      $("#value_order_afb").focus();
      return;
    }
    $.ajax({
      type: "GET",
      url: "component/content/afb_menu/function/add_order_afb_to_db_func.php",
      data: {
        name_not_order_afb: name_not_order_afb,
        name_yes_order_afb: name_yes_order_afb,
        value_order_afb: value_order_afb,
        unit_order_afb: unit_order_afb,
        subject_order: subject_order,
      }
    });
  });

});

function hide_pop_wrong_alert() {
  $("#bg_pop_alert").hide();
}

function hide_pop_succ_alert() {
  $("#bg_pop_alert_succ").hide();
}
