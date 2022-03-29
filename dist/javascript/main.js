// headerのスクロール検知
window.addEventListener("scroll", () => {
  let header = document.querySelector("#js-header");
  header.classList.toggle("opacity-70", scrollY > 40);
});
// パスワード値確認
document.getElementById("js-eye").addEventListener("click", () => {
  let textPass = document.getElementById("password");
  let eye = document.getElementById("js-eye");
  if (textPass.type === "text") {
    textPass.type = "password";
    eye.className = "fa fa-eye";
  } else {
    textPass.type = "text";
    eye.className = "fa fa-eye-slash";
  }
});
// パスワード再確認の値確認
document.getElementById("js-eye-conf").addEventListener("click", () => {
  let textPass = document.getElementById("password-conf");
  let eye = document.getElementById("js-eye-conf");
  if (textPass.type === "text") {
    textPass.type = "password";
    eye.className = "fa fa-eye";
  } else {
    textPass.type = "text";
    eye.className = "fa fa-eye-slash";
  }
});
// zip-code確認
function is_postcode(postcode) {
  if (postcode.match(/^\d{3}[-]?\d{4}$/)) {
    return true;
  } else {
    return false;
  }
}
// 半角 → 全角（カタカナ）
function hankana2Zenkana(str) {
  let kanaMap = {
    ｶﾞ: "ガ",
    ｷﾞ: "ギ",
    ｸﾞ: "グ",
    ｹﾞ: "ゲ",
    ｺﾞ: "ゴ",
    ｻﾞ: "ザ",
    ｼﾞ: "ジ",
    ｽﾞ: "ズ",
    ｾﾞ: "ゼ",
    ｿﾞ: "ゾ",
    ﾀﾞ: "ダ",
    ﾁﾞ: "ヂ",
    ﾂﾞ: "ヅ",
    ﾃﾞ: "デ",
    ﾄﾞ: "ド",
    ﾊﾞ: "バ",
    ﾋﾞ: "ビ",
    ﾌﾞ: "ブ",
    ﾍﾞ: "ベ",
    ﾎﾞ: "ボ",
    ﾊﾟ: "パ",
    ﾋﾟ: "ピ",
    ﾌﾟ: "プ",
    ﾍﾟ: "ペ",
    ﾎﾟ: "ポ",
    ｳﾞ: "ヴ",
    ﾜﾞ: "ヷ",
    ｦﾞ: "ヺ",
    ｱ: "ア",
    ｲ: "イ",
    ｳ: "ウ",
    ｴ: "エ",
    ｵ: "オ",
    ｶ: "カ",
    ｷ: "キ",
    ｸ: "ク",
    ｹ: "ケ",
    ｺ: "コ",
    ｻ: "サ",
    ｼ: "シ",
    ｽ: "ス",
    ｾ: "セ",
    ｿ: "ソ",
    ﾀ: "タ",
    ﾁ: "チ",
    ﾂ: "ツ",
    ﾃ: "テ",
    ﾄ: "ト",
    ﾅ: "ナ",
    ﾆ: "ニ",
    ﾇ: "ヌ",
    ﾈ: "ネ",
    ﾉ: "ノ",
    ﾊ: "ハ",
    ﾋ: "ヒ",
    ﾌ: "フ",
    ﾍ: "ヘ",
    ﾎ: "ホ",
    ﾏ: "マ",
    ﾐ: "ミ",
    ﾑ: "ム",
    ﾒ: "メ",
    ﾓ: "モ",
    ﾔ: "ヤ",
    ﾕ: "ユ",
    ﾖ: "ヨ",
    ﾗ: "ラ",
    ﾘ: "リ",
    ﾙ: "ル",
    ﾚ: "レ",
    ﾛ: "ロ",
    ﾜ: "ワ",
    ｦ: "ヲ",
    ﾝ: "ン",
    ｧ: "ァ",
    ｨ: "ィ",
    ｩ: "ゥ",
    ｪ: "ェ",
    ｫ: "ォ",
    ｯ: "ッ",
    ｬ: "ャ",
    ｭ: "ュ",
    ｮ: "ョ",
    "｡": "。",
    "､": "、",
    ｰ: "ー",
    "｢": "「",
    "｣": "」",
    "･": "・",
  };

  let reg = new RegExp("(" + Object.keys(kanaMap).join("|") + ")", "g");
  return str
    .replace(reg, function (match) {
      return kanaMap[match];
    })
    .replace(/ﾞ/g, "゛")
    .replace(/ﾟ/g, "゜");
}
// パスワードのチェック(半角英数字6文字以上48文字以下)
function checkPassword(str) {
  let reg = new RegExp(/^([a-zA-Z0-9]{6,48})$/);
  let res = reg.test(str);
  return res;
}
