/**
 * Main BAKD Javascript Lib
 * Version: 0.1
 *
 * Main entry point for most BAKD libraries, third party plugins,
 * and misc. config.
 */

// TODO: Go through these themeforest lib includes and either completely
// remove them, or add their npm counterpart lib instead.
require('./bootstrap');
require('./lib/flatpickr.min');
require('./lib/jquery.mCustomScrollbar');
require('./lib/jquery.range-min');
require('./lib/slick/slick.min');

jQuery = $ = require('jquery');
window.Vue = require('vue');

// Basic vue app instance, to be expanded upon in future versions
// of the app.
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// const app = new Vue({
//     el: '#app'
// });

// Use bootstrap tooltips
$('[data-toggle="tooltip"]').tooltip();

var $slideout = $('#mobile-menu');

$(document).on('click', function (event) {
    if ($(this).hasClass('stay-open')) return;
    else hideSlideout();
});

$('.mCustomScrollbar').mCustomScrollbar();

$(document).on('ready', function (event) {
    handleCounters();
});

var seenStats = false;
$(window).on('resize scroll load', function() {
   handleCounters();
});

function handleCounters() {
    if (($(window).scrollTop() + $(window).height() > $(document).height() - 100) && (!seenStats)) {
       triggerStatCounters();
       seenStats = true;
   }
}

function triggerStatCounters() {
    $('.counter').each(function() {
        var $this = $(this);
        var count = $this.attr('data-count');
        var postfix = $this.attr('data-postfix') || '';
        $({ countNum: $this.text() }).animate({ countNum: count }, {
            duration: 4000,
            easing:'linear',
            step: function() {
                var num = Math.floor(this.countNum);
                if (isNaN(num)) num = 0;
                $this.text(num.toLocaleString() + postfix);
            },
            complete: function() {
                $this.text(this.countNum.toLocaleString() + postfix);
            }
        });  
    });
}

function showSlideout() {
    var $slideout = $('#mobile-menu');
    $slideout.addClass('in');
    $slideout.animate({ right: 0 }, 400);
}

function hideSlideout() {
    var $slideout = $('#mobile-menu');
    $slideout.removeClass('in');
    $slideout.animate({ right: '-' + ($slideout.outerWidth() + 100) }, 400);
}

$('#mobile-menu-btn').on('click', function (event) {
    if ($slideout.hasClass('in')) {
        console.log('Hiding mobile menu...');
        hideSlideout();
    } else {
        console.log('Showing mobile menu...');
        showSlideout();
    }        
});

$('#deleteModal').on('show.bs.modal', function (event) {
    let $modal = $(this),
        $element = $(event.relatedTarget)
        resourceDeleteLink = $element.data('resource-delete-link'),
        resourceTitle = $element.data('resource-title') || 'resource';

    $modal.find('.delete-resource-title').html(resourceTitle);
    $modal.find('#delete-modal-confirm').attr('data-delete-link', resourceDeleteLink + '?resource=' + encodeURIComponent(resourceTitle));

    if (typeof resourceDeleteLink === 'undefined') {
        console.log('Can\'t delete resource without a delete link.');
        return;
    }

    $('#delete-modal-confirm').click(function (event) {
        let deleteUrl = $(this).data('delete-link');
        if (typeof deleteUrl !== 'undefined') {
            window.location.href = deleteUrl;
        }
    });
});




// TODO: Refactor this cheap hack into vue components
// $(window).on('hashchange', function() {
//     if (window.location.hash) {
//         var page = window.location.hash.replace('#', '');
//         if (page == Number.NaN || page <= 0) {
//             return false;
//         } else {
//             getPaginatedData(page);
//         }
//     }
// });

// $(document).ready(function (event) {
//     $(document).on('click', '.pagination a', function (event) {
//         event.preventDefault();
//         var $this = $(this);
//         // $('li').removeClass('active');
//         // $this.parent('li').addClass('active');
//         var pageNum = $this.attr('href').split('page=')[1];
//         getPaginatedData(pageNum);
//     });

// });

// function getPaginatedData(pageNum) {
//     $.ajax({
//         url: '?page=' + encodeURIComponent(pageNum),
//         type: 'GET',
//         datatype: 'html'
//     }).done(function(response) {
//         $("#ajax-pagination-container").fadeOut(200, function (event) {
//             // console.log(response);
//             $(this).empty().html(response).fadeIn(200);
//         });
//         location.hash = pageNum;
//     }).fail(function(jqXHR, ajaxOptions, err) {
//         // TODO: Implement js notifications
//         console.log('Error making request. Please contact an administrator if the problem persists.');
//     });
// }



// --------------------------
// TODO: REFACTOR ME ASAP
// --------------------------

// TODO: Misc junk below is from the themeforest base template. It needs to be
// thoroughly reviewed and refactored.
$(window).on("load", function () {
    $('.rn-slider').jRange({
        from: 0,
        to: 100,
        step: 1,
        scale: [],
        format: '%s',
        width: 300,
        showLabels: true,
        isRange: true
    });
})

$(window).on("load", function () {
    $('.rn-slider').jRange({
        from: 0,
        to: 100,
        step: 1,
        scale: [],
        format: '%s',
        width: 300,
        showLabels: true,
        isRange: true
    });
})

$(window).on("load", function () {
    $(".chat-hist, .messages-line").mCustomScrollbar();
    axis: "yx"
});

$(window).on("load", function () {
    "use strict";

    //  ============= POST PROJECT POPUP FUNCTION =========

    $(".post_project").on("click", function () {
        $(".post-popup.pst-pj").addClass("active");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".post-project > a").on("click", function () {
        $(".post-popup.pst-pj").removeClass("active");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= POST JOB POPUP FUNCTION =========

    $(".post-jb").on("click", function () {
        $(".post-popup.job_post").addClass("active");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".post-project > a").on("click", function () {
        $(".post-popup.job_post").removeClass("active");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= SIGNIN CONTROL FUNCTION =========

    $('.sign-control li').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.sign-control li').removeClass('current');
        $('.sign_in_sec').removeClass('current');
        $(this).addClass('current animated fadeIn');
        $("#" + tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= SIGNIN TAB FUNCTIONALITY =========

    $('.signup-tab ul li').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.signup-tab ul li').removeClass('current');
        $('.dff-tab').removeClass('current');
        $(this).addClass('current animated fadeIn');
        $("#" + tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= SIGNIN SWITCH TAB FUNCTIONALITY =========

    $('.tab-feed ul li').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.tab-feed ul li').removeClass('active');
        $('.product-feed-tab').removeClass('current');
        $(this).addClass('active animated fadeIn');
        $("#" + tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= COVER GAP FUNCTION =========

    var gap = $(".container").offset().left;
    $(".cover-sec > a, .chatbox-list").css({
        "right": gap
    });

    //  ============= OVERVIEW EDIT FUNCTION =========

    $(".overview-open").on("click", function () {
        $("#overview-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#overview-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EXPERIENCE EDIT FUNCTION =========

    $(".exp-bx-open").on("click", function () {
        $("#experience-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#experience-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EDUCATION EDIT FUNCTION =========

    $(".ed-box-open").on("click", function () {
        $("#education-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#education-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= LOCATION EDIT FUNCTION =========

    $(".lct-box-open").on("click", function () {
        $("#location-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#location-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= SKILLS EDIT FUNCTION =========

    $(".skills-open").on("click", function () {
        $("#skills-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#skills-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= ESTABLISH EDIT FUNCTION =========

    $(".esp-bx-open").on("click", function () {
        $("#establish-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#establish-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= CREATE PORTFOLIO FUNCTION =========

    $(".gallery_pt > a").on("click", function () {
        $("#create-portfolio").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#create-portfolio").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EMPLOYEE EDIT FUNCTION =========

    $(".emp-open").on("click", function () {
        $("#total-employes").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#total-employes").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  =============== Ask a Question Popup ============

    $(".ask-question").on("click", function () {
        $("#question-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#question-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });


    //  ============== ChatBox ==============


    $(".chat-mg").on("click", function () {
        $(this).next(".conversation-box").toggleClass("active");
        return false;
    });
    $(".close-chat").on("click", function () {
        $(".conversation-box").removeClass("active");
        return false;
    });

    //  ================== Edit Options Function =================


    $(".ed-opts-open").on("click", function () {
        $(this).next(".ed-options").toggleClass("active");
        return false;
    });


    // ============== Menu Script =============

    $(".menu-btn > a").on("click", function () {
        $("nav").toggleClass("active");
        return false;
    });


    //  ============ Notifications Open =============

    $(".not-box-open").on("click", function () {
        $(this).next(".notification-box").toggleClass("active");
    });

    // ============= User Account Setting Open ===========

    $(".user-info").on("click", function () {
        $(this).next(".user-account-settingss").toggleClass("active");
    });

    //  ============= FORUM LINKS MOBILE MENU FUNCTION =========

    $(".forum-links-btn > a").on("click", function () {
        $(".forum-links").toggleClass("active");
        return false;
    });
    $("html").on("click", function () {
        $(".forum-links").removeClass("active");
    });
    // $(".forum-links-btn > a, .forum-links").on("click", function (e) {
    //     e.stopPropagation();
    // });

    //  ============= PORTFOLIO SLIDER FUNCTION =========

    $('.profiles-slider').slick({
        slidesToShow: 3,
        slck: true,
        slidesToScroll: 1,
        prevArrow: '<span class="slick-previous"></span>',
        nextArrow: '<span class="slick-nexti"></span>',
        autoplay: true,
        dots: false,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });

});
