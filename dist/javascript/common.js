$(function () {
  // 同意のチェックを入れたら新規登録できる
  $("#js-consent").on("change", function () {
    if ($(this).prop("checked")) {
      $("input[type='submit']").removeAttr("disabled");
    } else {
      $("input[type='submit']").attr("disabled", true);
    }
  });
});
