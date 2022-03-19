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
