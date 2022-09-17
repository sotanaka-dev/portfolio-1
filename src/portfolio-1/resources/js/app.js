import "./bootstrap";
// import "../css/destyle.css";
// import "../css/app.css";

/* ヘッダー */
const header = document.getElementById("header");
const header_height = header.offsetHeight;
let scroll_point = 0;
let last_point = 0;

window.addEventListener("scroll", (event) => {
    scroll_point = window.scrollY;

    if (scroll_point > last_point && scroll_point > header_height) {
        header.classList.add("header--hide");
    } else {
        header.classList.remove("header--hide");
    }
    last_point = scroll_point;
});

/* 商品ページ */
window.addEventListener("page_switching", (event) => {
    window.scrollTo(0, 0);
});

window.addEventListener("sort_by", (event) => {
    document.getElementById("sort_sidebar_check").checked = false;
});

/* バリデーション前 */
window.addEventListener("before_validation", (event) => {
    window.scrollTo(0, 0);
});

/* パスワードマスク */
function passwordMaskSwitch(text_box_id, eye_icon_id) {
    const text_box = document.getElementById(text_box_id);
    const eye_icon = document.getElementById(eye_icon_id);
    if (text_box.type === "text") {
        text_box.type = "password";
        eye_icon.className = "fa-solid fa-eye";
    } else {
        text_box.type = "text";
        eye_icon.className = "fa-solid fa-eye-slash";
    }
}
