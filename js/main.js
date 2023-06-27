// dark mode

function darkMode() {
    document.body.classList.toggle("dark");
}

// navbar
function navFunction() {
    let nav = document.getElementById("nav-list");
    let arrow = document.getElementById("arrow-icon");
    if (nav.style.display === "block") {
        nav.style.display = "none";
        arrow.innerHTML = '<i class="fa-solid fa-bars"></i>';
    } else {
        nav.style.display = "block";
        arrow.innerHTML = '<i class="fa-solid fa-x"></i>';
    }
}

// export excel

function exportExcel() {
    let table = document.querySelector("#table");
    let html = table.outerHTML.replace(/>\s*</g, "><");
    let url =
        "data:application/vnd.ms-excel;charset=utf-8," +
        encodeURIComponent(
            '<html xmlns:x="urn:schemas-microsoft-com:office:excel"><head><meta charset="UTF-8"><meta http-equiv="Content-Language" content="ar"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>تقرير</title></head><body>' +
                html +
                "</body></html>"
        );
    let downloadLink = document.createElement("a");
    downloadLink.href = url;
    downloadLink.download = "table.xls";
    downloadLink.click();
}

let upSpan = document.querySelector(".up");

window.onscroll = function () {
    // console.log(this.scrollY);
    // if (this.scrollY >= 1000) {
    //   upSpan.classList.add("show");
    // } else {
    //   upSpan.classList.remove("show");
    // }
    this.scrollY >= 400
        ? upSpan.classList.add("show")
        : upSpan.classList.remove("show");
};

upSpan.onclick = function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
};

// category

function categoryFunction() {
    let box = document.getElementById("add-category");
    if (box.style.display === "block") {
        box.style.display = "none";
    } else {
        box.style.display = "block";
    }
}
