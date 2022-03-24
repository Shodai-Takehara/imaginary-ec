$(function () {
  // 同意のチェックを入れたら新規登録できる
  $("#js-consent").on("change", function () {
    if ($(this).prop("checked")) {
      $("#js-input").removeAttr("disabled");
    } else {
      $("#js-input").attr("disabled", true);
    }
  });
  // formバリデーション
  let timer;
  $("form").on("submit", () => {
    // passwordバリデーション(英数字6文字以上48文字以下)
    let val = $("#password").val();
    let text = checkPassword(val);
    if (text !== true) {
      $("#pass-error .pass-error-message").fadeIn(300);
      timer = setTimeout(() => {
        $(".pass-error-message").fadeOut("slow");
      }, 4000);
      $(document).on("click", (event) => {
        if (!$(event.target).closest(".pass-error-message").length) {
          $(".pass-error-message").fadeOut("slow");
        }
        clearTimeout(timer);
      });
      $(".dismiss").on("click", () => {
        $(".pass-error-message").fadeOut("slow");
      });
      return false;
    } else {
      $(".pass-error-message").hide();
      clearTimeout(timer);
      return true;
    }
  });
  // passwordバリデーション(一致しない場合)
  $("form").on("submit", () => {
    if ($("#password").val() != $("#password-conf").val()) {
      $("#pass-error .error-message").fadeIn(300);
      timer = setTimeout(() => {
        $(".error-message").fadeOut("slow");
      }, 4000);
      $(document).on("click", (event) => {
        if (!$(event.target).closest(".error-message").length) {
          $(".error-message").fadeOut("slow");
        }
        clearTimeout(timer);
      });
      $(".dismiss").on("click", () => {
        $(".error-message").fadeOut("slow");
      });
      return false;
    } else {
      $(".error-message").hide();
      clearTimeout(timer);
      return true;
    }
  });
  // zipcodeのハイフン削除
  $('input[name="zip"]').on("paste change", function () {
    let val = $(this).val();
    val = val.replace(/[^\d]+/g, "");
    $(this).val(val);
  });
  // 電話番号のハイフン削除
  $('input[name="phone"]').on("paste change", function () {
    let val = $(this).val();
    val = val.replace(/[^\d]+/g, "");
    $(this).val(val);
  });
  // 半角を全角に置換
  $('input[name="address"]').on("change", function () {
    let val = $(this).val();
    var text = val.replace(/[A-Za-z0-9]/g, function (str) {
      return String.fromCharCode(str.charCodeAt(0) + 65248);
    });
    $(this).val(text);
  });
  // セイメイの半角を全角に置換
  $('input[name="lfuri"], input[name="ffuri"]').on("change", function () {
    let val = $(this).val();
    let text = hankana2Zenkana(val);
    $(this).val(text);
  });
  // formバリデーションここまで

  // toppageの写真入れ替え(4箇所)
  $(".js-list-index").on("mouseover", () => {
    // Link先を対象のLinkに書き換え
    $(".top-wrapper link").attr("href", "#");
    $(".top-wrapper").css({
      backgroundImage: $(".top-wrapper")
        .css("background-image")
        .replace(
          /toppage-men.jpg|toppage-women.jpg|toppage-sale.jpg/g,
          "toppage.jpg"
        ),
    });
  });
  $(".js-list-men").on("mouseover", () => {
    $(".top-wrapper .link").attr("href", "#");
    $(".top-wrapper").css({
      backgroundImage: $(".top-wrapper")
        .css("background-image")
        .replace(
          /toppage.jpg|toppage-women.jpg|toppage-sale.jpg/g,
          "toppage-men.jpg"
        ),
    });
  });
  $(".js-list-women").on("mouseover", () => {
    $(".top-wrapper .link").attr("href", "#");
    $(".top-wrapper").css({
      backgroundImage: $(".top-wrapper")
        .css("background-image")
        .replace(
          /toppage.jpg|toppage-men.jpg|toppage-sale.jpg/g,
          "toppage-women.jpg"
        ),
    });
  });
  $(".js-list-sale").on("mouseover", () => {
    $(".top-wrapper .link").attr("href", "#");
    $(".top-wrapper").css({
      backgroundImage: $(".top-wrapper")
        .css("background-image")
        .replace(
          /toppage.jpg|toppage-men.jpg|toppage-women.jpg/g,
          "toppage-sale.jpg"
        ),
    });
  });
  // hamburgerメニュー
  $(".hamburger").on("click", () => {
    $(".button-line").toggleClass("open");
    $(".js-hamburger").toggleClass("hidden");
  });
});
