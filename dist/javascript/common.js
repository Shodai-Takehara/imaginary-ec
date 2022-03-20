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
    // passwordバリデーション
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
    $(".btn-line").toggleClass("open");
    $(".js-hamburger").toggleClass("hidden");
  });
});
