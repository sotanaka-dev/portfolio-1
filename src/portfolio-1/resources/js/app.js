import "./bootstrap";

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

/* パスワードの表示切替 */
window.addEventListener("password-toggle", (event) => {
    const el = event.detail.el;
    if (el.parentNode.nextElementSibling.type === "text") {
        el.parentNode.nextElementSibling.type = "password";
        el.className = "fa-solid fa-eye";
        return;
    }
    el.parentNode.nextElementSibling.type = "text";
    el.className = "fa-solid fa-eye-slash";
});
