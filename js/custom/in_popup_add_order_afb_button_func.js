$(function () {
  $("#insert-button").click(function () {
    let name_not = $("#name-not").val();
    let name_yes = $("#name-yes").val();
    let value_order = $("#value").val();
    let unit_name = $("#unit").val();
    let subject_order = $("#subject_order").val();
    let insert_data = "yes";
    let select_data = "yes";
    if (name_not == "" || value_order == "" || unit_name == "") {
      alert("กรุณาใส่ข้อมูลให้ถูกต้อง");
    } else {
      $.ajax({
        type: "GET",
        url: "mspo_display.php?menu=afb_add_afb",
        data: {
          insert_data: insert_data,
          select_data : select_data,
          name_not: name_not,
          name_yes: name_yes,
          value_order: value_order,
          unit_name: unit_name,
          subject_order: subject_order,
        },
      });
      $("#name-not").val("");
      $("#name-yes").val("");
      $("#value").val("");
      $("#unit").val("");
      $("#subject_order").val("");
    }
  });
});
