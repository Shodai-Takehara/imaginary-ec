$(function () {
  let $like = $(".js-like-btn"),
    likeItemId; //Item ID
  $like.on("click", function (event) {
    event.stopPropagation();
    let $this = $(this);
    //カスタム属性（postid）に格納された投稿ID取得
    likeItemId = $this.parents(".like").data("itemid");
    likeUserId = $this.parents(".like").data("userid");
    $.ajax({
      type: "POST",
      url: "../common/ajaxLike.php", //post送信を受けとるphpファイル
      data: { itemId: likeItemId, userId: likeUserId }, //{キー:各ID}
    })
      .done(function (data) {
        // console.log("Ajax Success");
        if ($this.hasClass("far fa-heart")) {
          // いいね押した時のスタイル
          $this.removeClass("far fa-heart");
          $this.addClass("fas fa-heart already");
        } else {
          // いいね取り消しのスタイル
          $this.removeClass("fas fa-heart already");
          $this.addClass("far fa-heart");
        }
      })
      .fail(function (msg) {
        console.log("Ajax Error");
      });
  });
});
