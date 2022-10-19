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

/* スクロールアップ */
window.addEventListener("request-scroll-up", (event) => {
    if (event.detail.id) {
        document.getElementById(event.detail.id).scrollIntoView();
    } else {
        window.scrollTo(0, 0);
    }
});

// パスワードの表示切替
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

// お気に入りカウント
document.addEventListener("alpine:init", () => {
    Alpine.store("qtyInFavList", {
        qty: getQty(),

        setQty() {
            this.qty = getQty();
        },
    });

    function getQty() {
        return Object.keys(
            JSON.parse(localStorage.getItem("fav_items") || "{}")
        ).length;
    }
});
