$(function () {
  // 同意のチェックを入れたら新規登録できる
  $("#js-consent").on("change", function () {
    if ($(this).prop("checked")) {
      $("input[type='submit']").removeAttr("disabled");
    } else {
      $("input[type='submit']").attr("disabled", true);
    }
  });
  // toppageの写真入れ替え(4箇所)
  $(".js-list-index").on("mouseover", () => {
    $(".top-wrapper").css({
      backgroundImage: $(".top-wrapper")
        .css("background-image")
        .replace(
          /toppage-men.jpg|toppage-women.jpg|toppage-sale.jpg/g,
          "toppage.jpg"
        ),
    });
  });
  $(".js-list-women").on("mouseover", () => {
    $(".top-wrapper").css({
      backgroundImage: $(".top-wrapper")
        .css("background-image")
        .replace(
          /toppage.jpg|toppage-men.jpg|toppage-sale.jpg/g,
          "toppage-women.jpg"
        ),
    });
  });
  $(".js-list-men").on("mouseover", () => {
    $(".top-wrapper").css({
      backgroundImage: $(".top-wrapper")
        .css("background-image")
        .replace(
          /toppage.jpg|toppage-women.jpg|toppage-sale.jpg/g,
          "toppage-men.jpg"
        ),
    });
  });
  $(".js-list-sale").on("mouseover", () => {
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
