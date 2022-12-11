let nav = document.getElementById("mySidenav");
function openNav() {
    if (nav.style.width === "250px") {
        nav.style.width = "0";
    } else {
        nav.style.width = "250px";
    }

    /*document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)"; */
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    /* document.getElementById("main").style.marginLeft = "0";
  document.body.style.backgroundColor = "white"; */
}

function setFocus(on) {
    var element = document.activeElement;
    if (on) {
        setTimeout(function () {
            element.parentNode.classList.add("focus");
        });
    } else {
        let box = document.querySelector(".input-box");
        box.classList.remove("focus");
        $("input").each(function () {
            var $input = $(this);
            var $parent = $input.closest(".input-box");
            if ($input.val()) $parent.addClass("focus");
            else $parent.removeClass("focus");
        });
    }
}

document.addEventListener("click", function handleClickOutsideBox(event) {
    const box = document.getElementById("sideNav");
    const boxIn = document.getElementById("mySidenav");
    if (!box.contains(event.target)) {
        boxIn.style.width = "0px";
    }
});

window.addEventListener("load", function () {
    let loader = document.getElementById("waveLoader");
    loader.style.display = "none";
});
