"use strict";
var body = $("body");
var bodyParent = $("html");
var windowwidth = $(window).width();

$(document).ready(function () {
    /* page load as iframe */
    if (self !== top) {
        body.addClass("iframe");
    } else {
        body.removeClass("iframe");
    }

    /* ✅ Récupération de l'état du menu depuis localStorage */
    if (localStorage.getItem("menuState") === "open") {
        body.removeClass("menu-close"); // Laisse ouvert si c'était ouvert avant
    } else {
        body.addClass("menu-close"); // Sinon, garde fermé
    }

    // /* menu open close */
    // $(".menu-btn").on("click", function () {
    //     if (body.hasClass("menu-close") === true) {
    //         body.removeClass("menu-close");
    //     } else {
    //         body.addClass("menu-close");
    //     }

    //     return false;
    // });
    // /* menu close on small device */
    // menuclosetablet();

    /* Menu open/close avec sauvegarde d'état */
    $(".menu-btn").on("click", function () {
        if (body.hasClass("menu-close")) {
            body.removeClass("menu-close");
            localStorage.setItem("menuState", "open"); // Sauvegarde état ouvert
        } else {
            body.addClass("menu-close");
            localStorage.setItem("menuState", "closed"); // Sauvegarde état fermé
        }
        return false;
    });

    /* inner sidebar open close */
    function innermenuopen() {
        $(".innersidebar-btn").on("click", function () {
            if (body.hasClass("innermenu-close") === true) {
                body.removeClass("innermenu-close");
            } else {
                body.addClass("innermenu-close");
            }
            return false;
        });
    }

    // function innermenuclose() {
    //     $(".inner-sidebar-content").on("click", function () {
    //         if (body.hasClass("innermenu-close") === true) {
    //             body.removeClass("innermenu-close");
    //         }
    //     });
    // }
    // innermenuopen();

    // if (windowwidth < 1300) {
    //     innermenuclose();
    // }

    function innermenuclose() {
        $('.inner-sidebar-content').on('click', function () {
            if (!body.hasClass('innermenu-close')) {
                body.addClass('innermenu-close');
            }
        });
    }

    /* Initialisation */
    innermenuopen();

    if ($(window).width() < 1300) {
        innermenuclose();
    }

    /* full screen */
    var elem = document.documentElement;
    $("#gofullscreen").on("click", function () {
        if (body.hasClass("isfullscreen") === true) {
            body.removeClass("isfullscreen");
            $(this)
                .attr("data-bs-original-title", "Go Fullscreen")
                .find("i")
                .attr("class", "bi bi-fullscreen");

            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                /* IE11 */
                document.msExitFullscreen();
            }
        } else {
            body.addClass("isfullscreen");
            $(this)
                .attr("data-bs-original-title", "Exit Fullscreen")
                .find("i")
                .attr("class", "bi bi-fullscreen-exit");

            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE11 */
                elem.msRequestFullscreen();
            }
        }
    });

    /* rightbar */
    function rightbaropen() {
        if (body.hasClass("rightbar-open") === true) {
            body.removeClass("rightbar-open");
        } else {
            body.addClass("rightbar-open");
        }
    }

    /* chat and notification open  */
    var chatwindow = $("#chatwindow");
    var notificationwindow = $("#notificationwindow");
    var notificationwindowFaciliti = $("#notificationwindowFaciliti");

    $("#showChat").on("click", function () {
        if (
            body.hasClass("rightbar-open") != true &&
            chatwindow.hasClass("d-none") === true
        ) {
            body.addClass("rightbar-open");
            chatwindow.removeClass("d-none");
            notificationwindow.addClass("d-none");
        } else if (
            body.hasClass("rightbar-open") === true &&
            chatwindow.hasClass("d-none") === true
        ) {
            chatwindow.removeClass("d-none");
            notificationwindow.addClass("d-none");
        } else {
            body.removeClass("rightbar-open");
            setTimeout(function () {
                chatwindow.addClass("d-none");
            }, 500);
        }
    });

    $("#showNotification").on("click", function () {
        if (
            body.hasClass("rightbar-open") != true &&
            notificationwindow.hasClass("d-none") === true
        ) {
            body.addClass("rightbar-open");
            notificationwindow.removeClass("d-none");
            chatwindow.addClass("d-none");
        } else if (
            body.hasClass("rightbar-open") === true &&
            notificationwindow.hasClass("d-none") === true
        ) {
            notificationwindow.removeClass("d-none");
            chatwindow.addClass("d-none");
        } else {
            body.removeClass("rightbar-open");
            setTimeout(function () {
                notificationwindow.addClass("d-none");
            }, 500);
        }
    });

    $("#showNotificationFaciliti").on("click", function () {
        if (
            body.hasClass("rightbar-open") != true &&
            notificationwindowFaciliti.hasClass("d-none") === true
        ) {
            body.addClass("rightbar-open");
            notificationwindowFaciliti.removeClass("d-none");
            notificationwindow.addClass("d-none");
            chatwindow.addClass("d-none");
        } else if (
            body.hasClass("rightbar-open") === true &&
            notificationwindowFaciliti.hasClass("d-none") === true
        ) {
            notificationwindowFaciliti.removeClass("d-none");
            notificationwindow.addClass("d-none");
            chatwindow.addClass("d-none");
        } else {
            body.removeClass("rightbar-open");
            setTimeout(function () {
                notificationwindowFaciliti.addClass("d-none");
            }, 500);
        }
    });
    /* close chat or notification on 'main' content click */
    $(".main").on("click", function (e) {
        body.removeClass("rightbar-open");
        setTimeout(function () {
            notificationwindow.addClass("d-none");
            chatwindow.addClass("d-none");
        }, 500);
    });

    /* menu style switch */
    $("#menu-pushcontent").on("change", function () {
        if ($(this).is(":checked") === true) {
            body.addClass("menu-push-content");
            body.removeClass("menu-overlay");
        }

        return false;
    });

    $("#menu-overlay").on("change", function () {
        if ($(this).is(":checked") === true) {
            body.removeClass("menu-push-content");
            body.addClass("menu-overlay");
        }

        return false;
    });

    /* back page navigation */
    $(".back-btn").on("click", function () {
        window.history.back();
        return false;
    });

    /* scroll y limited container height on page  */
    if (header.length > 0) {
        $(".mainheight").css({
            "min-height": Number(maincontentheight - header.outerHeight()),
            "margin-top": header.outerHeight(),
        });

        if (sidebarwrap.length > 0) {
            sidebarwrap.css("padding-top", header.outerHeight() + 25);
        }
        if (rightbarwrap.length > 0) {
            rightbarwrap.css({ "padding-top": header.outerHeight() + 10 });
        }
    }
    if (footer.length > 0) {
        $(".mainheight").css(
            "min-height",
            Number(maincontentheight - footer.outerHeight())
        );

        if (rightbarwrap.length > 0) {
            rightbarwrap.css({ "padding-bottom": footer.outerHeight() });
        }
    }

    /* column set */
    /*  xs: 0,
        sm: 576px,
        md: 768px,
        lg: 992px,
        xl: 1200px,
        xxl: 1400px  */
    $(".select-column-size > div").on("click", function () {
        var columnselect = $(this);
        var columnwidth = columnselect.attr("data-title");
        var columnset = columnselect.closest(".column-set");
        $(this)
            .closest(".dropdown-item")
            .find(".select-column-size > div")
            .removeClass("active");

        if (windowwidth >= 1400) {
            $(columnset).removeClass(function (index, css) {
                return (css.match(/(^|\s)col-xxl-\S+/g) || []).join(" ");
            });
            columnselect.addClass("active");
            columnset.addClass("col-xxl-" + columnwidth);
        } else if (windowwidth < 1400 && windowwidth >= 1200) {
            $(columnset).removeClass(function (index, css) {
                return (css.match(/(^|\s)col-xl-\S+/g) || []).join(" ");
            });
            columnselect.addClass("active");
            columnset.addClass("col-xl-" + columnwidth);
        } else if (windowwidth < 1200 && windowwidth >= 992) {
            $(columnset).removeClass(function (index, css) {
                return (css.match(/(^|\s)col-lg-\S+/g) || []).join(" ");
            });
            columnselect.addClass("active");
            columnset.addClass("col-lg-" + columnwidth);
        } else if (windowwidth < 992 && windowwidth >= 768) {
            $(columnset).removeClass(function (index, css) {
                return (css.match(/(^|\s)col-md-\S+/g) || []).join(" ");
            });
            columnselect.addClass("active");
            columnset.addClass("col-md-" + columnwidth);
        } else if (windowwidth < 768 && windowwidth >= 576) {
            $(columnset).removeClass(function (index, css) {
                return (css.match(/(^|\s)col-sm-\S+/g) || []).join(" ");
            });
            columnselect.addClass("active");
            columnset.addClass("col-sm-" + columnwidth);
        } else if (windowwidth < 576) {
            $(columnset).removeClass(function (index, css) {
                return (css.match(/(^|\s)col-[0-9]+/g) || []).join(" ");
            });
            columnselect.addClass("active");
            columnset.addClass("col-" + columnwidth);
        }
    });

    /* PWA add to phone Install ap button */
    var btnAdd = document.getElementById("addtohome");
    var defferedPrompt;
    window.addEventListener("beforeinstallprompt", function (event) {
        event.preventDefault();
        defferedPrompt = event;

        btnAdd.addEventListener("click", function (event) {
            defferedPrompt.prompt();

            defferedPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === "accepted") {
                    console.log("User accepted the A2HS prompt");
                } else {
                    console.log("User dismissed the A2HS prompt");
                }
                defferedPrompt = null;
            });
        });
    });
});

var footer = $(".footer");
var header = $(".header > .navbar");
var sidebarwrap = $(".sidebar-wrap");
var rightbarwrap = $(".rightbar-wrap");
var maincontentheight = $(window).height();

$(window).on("load", function () {
    /* loader hider */
    setTimeout(function () {
        $(".loader-wrap").hide();
    }, 100);

    coverimg();

    /* url path on menu */
    var path = window.location.href.split("/").slice(-1); // because the 'href' property of the DOM element is the absolute path
    $(".sidebar-wrap .nav li a").removeClass("active");
    $(".sidebar-wrap .sidebar .nav li a").each(function () {
        var linkitem = $(this);

        if (linkitem.attr("href") == path) {
            linkitem.addClass("active");

            if (linkitem.closest(".dropdown").length > 0) {
                linkitem
                    .closest(".dropdown")
                    .find(".dropdown-toggle")
                    .addClass("show");
                linkitem
                    .closest(".dropdown")
                    .find(".dropdown-menu")
                    .addClass("show");
            }
        }
    });

    /* popover executes */
    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
    /* all tooltip execute */
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    /* hide tooltip after 1000ms once shown */
    document.addEventListener("shown.bs.tooltip", function (e) {
        setTimeout(function () {
            $(e.target).tooltip("hide");
        }, 500);
    });
    /* dropdown close  */
    $(".ddclose").click(function () {
        $(this).parents(".dropdown-menu").prev().dropdown("toggle");
    });

    /* prevent close dropdow on inside click */
    $(".dropdown-dontclose").on("click blur", function (event) {
        $(".dropdown-item")
            .removeClass("show")
            .next(".dropdown-menu")
            .removeClass("show");
        event.stopPropagation();
        $(this).find(".dropdown-item").addClass("show").next().addClass("show");
    });

    // animate value;
    var obj = $(".increamentcount");
    var result = obj.length;
    for (var i = 0; i < result; i++) {
        animateValue(obj[i], 0, obj[i].innerHTML, 2500);
    }

    /* min height  */
    if (header.length > 0 && footer.length > 0) {
        setTimeout(function () {
            $(".mainheight").css({
                "min-height":
                    maincontentheight -
                    header.outerHeight() -
                    footer.outerHeight(),
            });
        }, 100);
    }

    /* scrolled to bottom */
    scrolledtobottom();

    /* scroll from top and add class */
    if ($(document).scrollTop() > "30") {
        $(".header").addClass("active");
    } else {
        $(".header").removeClass("active");
    }

    /* chosen title filter dd */
    if ($(".simplechosen").length > 0) {
        $(".simplechosen").chosen();
    }
});

$(window).on("scroll", function () {
    /* scroll from top and add class */
    if ($(document).scrollTop() > "30") {
        $(".header").addClass("active");
    } else {
        $(".header").removeClass("active");
    }

    /* scrolled to bottom */
    scrolledtobottom();
});

$(window).on("resize", function () {
    /* update window width for columns set on resize */
    windowwidth = $(window).width();

    /* scroll y limited container height on page  */
    var maincontentheight = $(window).height();
    if (header.length > 0) {
        maincontentheight = Number(maincontentheight - header.outerHeight());
        $(".mainheight").css({
            "min-height": maincontentheight,
            "margin-top": header.outerHeight(),
        });

        if (sidebarwrap.length > 0) {
            sidebarwrap.css("padding-top", header.outerHeight() + 25);
        }
    }
    if (footer.length > 0) {
        maincontentheight = Number(maincontentheight - footer.outerHeight());
        $(".mainheight").css("min-height", maincontentheight);
    }

    /* menu close on small device */
    menuclosetablet();
});

/* coverimg */
function coverimg() {
    $(".coverimg").each(function () {
        var imgpath = $(this).find("img");
        $(this).css("background-image", "url(" + imgpath.attr("src") + ")");
        imgpath.hide();
    });
}

/* create cookie */
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    let expires = "expires=" + d.toUTCString();
    document.cookie =
        cname +
        "=" +
        cvalue +
        ";" +
        expires +
        ";  path=/; SameSite=None; Secure";
}
function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function removeCookie(cname) {
    document.cookie =
        cname + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}

/* menu close on small device */
function menuclosetablet() {
    if ($(window).width() <= 992) {
        body.addClass("menu-close");
        body.on("click", function (e) {
            if (
                !sidebarwrap.is(e.target) &&
                sidebarwrap.has(e.target).length === 0
            ) {
                body.addClass("menu-close");
            }
        });
    } else {
        body.removeClass("menu-close");
    }
}

/* animate value */
function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        obj.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

/* scroll bottom position and activity */
function scrolledtobottom() {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        $(".chatboxes.bottom-0").removeClass("mb-2").addClass("mb-4 pb-2");
        $(".rightbar-wrap").removeClass("pb-3");
    } else {
        $(".chatboxes.bottom-0").removeClass("mb-4 pb-2").addClass("mb-2");
        $(".rightbar-wrap").addClass("pb-3");
    }
}

/* Switch Light Mode to Dark Mode */
// function toggleTheme() {
//     let htmlElement = document.documentElement;
//     let themeIcon = document.getElementById('theme-icon');
//     let logo = document.getElementById('logo');
//     if (htmlElement.classList.contains('dark-mode')) {
//         // Switch to Light Mode
//         htmlElement.classList.remove('dark-mode');
//         htmlElement.classList.add('light-mode');
//         themeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
//         localStorage.setItem('theme', 'light');
//     } else {
//         // Switch to Dark Mode
//         htmlElement.classList.remove('light-mode');
//         htmlElement.classList.add('dark-mode');
//         themeIcon.classList.replace('bi-sun-fill', 'bi-moon-fill');
//         localStorage.setItem('theme', 'dark');
//     }
// }

//  event listener to button
// document.getElementById('theme-toggle').addEventListener('click', toggleTheme);
  let savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark-mode');
        document.documentElement.classList.remove('light-mode');
    } else {
        document.documentElement.classList.add('light-mode');
        document.documentElement.classList.remove('dark-mode');
    }

    function toggleTheme() {
        let htmlElement = document.documentElement;
        let themeIcon = document.getElementById('theme-icon');
        let logo = document.getElementById('logo');
        if (htmlElement.classList.contains('dark-mode')) {
            // Switch to Light Mode
            htmlElement.classList.remove('dark-mode');
            htmlElement.classList.add('light-mode');
            themeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
            localStorage.setItem('theme', 'light');
        } else {
            // Switch to Dark Mode
            htmlElement.classList.remove('light-mode');
            htmlElement.classList.add('dark-mode');
            themeIcon.classList.replace('bi-sun-fill', 'bi-moon-fill');
            localStorage.setItem('theme', 'dark');
        }
    }

    //  event listener to button
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('theme-toggle').addEventListener('click', toggleTheme);
    });

/* End Switch */


/*
* ===============START================== 
* Set the theme-blue as the default them
* Set the sidebar-icon-only as the default menu style
*/

let theme = localStorage.getItem('theme');
if (true) {
    theme = 'blue';
    localStorage.setItem('theme', theme);
}
document.querySelector("body").classList.add("theme-" + theme);
let menuStyle = localStorage.getItem('menu-style');
if (!menuStyle) {
    menuStyle = 'sidebar-icon-only';
    localStorage.setItem('menu-style', menuStyle);
}
document.querySelector("body").classList.add(menuStyle);

/*
* ===============END================== 
* Set the theme-blue as the default them
* Set the sidebar-icon-only as the default menu style
*/

    let htmlElement = document.documentElement;
    let themeIcon = document.getElementById('theme-icon');
    let logo = document.getElementById('logo');
    // let savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        // Switch to Dark Mode
        htmlElement.classList.remove('light-mode');
        htmlElement.classList.add('dark-mode');
        themeIcon.classList.replace('bi-sun-fill', 'bi-moon-fill');
        localStorage.setItem('theme', 'dark');
    } else {
        // Switch to Light Mode
        htmlElement.classList.remove('dark-mode');
        htmlElement.classList.add('light-mode');
        themeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
        localStorage.setItem('theme', 'blue');
    }