'use strict'
$(window).on('load', function () {
    /* user name  and images from onboarding screen */
    if (sessionStorage.getItem('AdminUXuserimg1') != '') {
        $('#userimage').parent().css('background-image', sessionStorage.getItem('AdminUXuserimg1'));
        $('#userphotoonboarding').parent().css('background-image', sessionStorage.getItem('AdminUXuserimg1'));
    }
    if (getCookie('AdminUXusername') != '') {
        $('#usernamedisplay, #usernamedisplay2 span, .username').html(getCookie('AdminUXusername'));
    }


    /* temperature data */
    var cityname = 'London';
    $('#citychange li').on('click', function () {
        if ($(this).text() != '') {
            $('#citychange li').removeClass('active');
            $(this).addClass('active')
            cityname = $(this).text();
            dataload();
        }
    })
    dataload();
    function dataload() {
        fetch('https://api.openweathermap.org/data/2.5/weather?q=' + cityname + '&APPID=ce2008ef871845f77c7f03aafe2d54eb&units=metric')
            /* change app id= "ce2008ef871845f77c7f03aafe2d54eb" with your id create from https://openweathermap.org/api current weather data */
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                appendData(data);
            })
            .catch(function (err) {
                console.log(err);
            });
    }
    function appendData(data) {
        $('#temperature').text(data.main.temp);
        $('#city').text(data.name);
        $('#tempimage').attr('src', 'assets/img/openweather-icon/light/' + data.weather[0].icon + '@2x.png');
    }

    /* search result show */
    var searchglobal = $('#searchglobal');
    var searchresultglobal = $('#searchresultglobal');

    searchglobal.on('keyup', function () {
        if (searchglobal.val() != '') {
            searchresultglobal.addClass('show');
        } else {
            searchresultglobal.removeClass('show');
        }
    });

    $("#searchtoggle").on('click', function () {
        $(".search-header").addClass("active");
    });
    $("#searchclose").on('click', function () {
        $(".search-header").removeClass("active");
    });

    body.on("click", function (e) {
        if (!searchresultglobal.is(e.target) && searchresultglobal.has(e.target).length === 0 && !searchglobal.is(e.target) && searchglobal.has(e.target).length === 0) {
            searchresultglobal.removeClass('show');
        }
    });
    if ($(window).width() >= 1200) {
        $('#searchclose').remove();
    }


    /* notification window calendar */
    $('#notificationdaterange').daterangepicker({
        "singleDatePicker": true,
        "showCustomRangeLabel": false,
        "alwaysShowCalendars": true,
        "parentEl": "#calendardisplay",
        "opens": "center",
        "applyButtonClasses": "btn-theme",
        "cancelClass": "btn-outline-secondary border",
        "locale": {
            "format": "DD/MM/YYYY",
            "applyLabel": "Appliquer",
            "cancelLabel": "Annuler",
            "fromLabel": "De",
            "toLabel": "À",
            "customRangeLabel": "Personnalisé",
            "weekLabel": "S",
            "daysOfWeek": ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
            "monthNames": ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
            "firstDay": 1
        }
    }, function (start, end, label) {

    });
    // $('#notificationdaterange').data('daterangepicker').show();
    $('#notificationdaterange').daterangepicker(); //@todo : solution

    /*chat window open */
    $('.chatwindow').find('.list-group .list-group-item').on('click', function (e) {
        $('.chatboxes').fadeIn();

        setTimeout(function () {
            $('#thefirstchat').click();
        }, 400);
    });
    $('.chat-close').on('click', function () {
        $(this).closest('.chatboxes').fadeOut();
    })

    /* title calendar */
    // $('#titlecalendar,#titlecalendar1').daterangepicker({
    //     "minYear": 1989,
    //     "maxYear": 2025,
    //     ranges: {
    //         'Aujourd\'hui': [moment(), moment()],
    //         'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //         'Les 7 derniers jours': [moment().subtract(6, 'days'), moment()],
    //         'Les 30 derniers jours': [moment().subtract(29, 'days'), moment()],
    //         'Ce mois-ci': [moment().startOf('month'), moment().endOf('month')],
    //         'Le mois dernier': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //     },
    //     "locale": {
    //         "format": "DD/MM/YYYY", // French date format
    //         "applyLabel": "Appliquer",
    //         "cancelLabel": "Annuler",
    //         "fromLabel": "De",
    //         "toLabel": "À",
    //         "customRangeLabel": "Personnalisé",
    //         "weekLabel": "Sem",
    //         "daysOfWeek": ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
    //         "monthNames": ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
    //         "firstDay": 1 // Monday
    //     },
    //     "startDate": "01/11/2024", // French format
    //     "endDate": "30/11/2024", // French format
    //     "opens": "left",
    //     "drops": "down",
    //     "applyButtonClasses": "btn-theme",
    //     "cancelClass": "btn-outline-secondary border",
    // },
    // function (start, end, label) {
    //     console.log('Nouvelle plage de dates sélectionnée : ' + start.format('DD/MM/YYYY') + ' à ' + end.format('DD/MM/YYYY') + ' (plage prédéfinie : ' + label + ')');
    // });

    $('#titlecalandershow').on('click', function () {
        $('#titlecalendar').click()
    });
    $('#titlecalandershow2').on('click', function () {
        $('#titlecalendar1').click()
    });

    /* chosen title filter dd */
    $("#titltfilterlist, #searchfilterlist").chosen({ no_results_text: "Oops, nothing found!", max_selected_options: 1 });
    $("#titltfilterlist, #searchfilterlist").bind("chosen:maxselected", function () {
        $(this).closest('.input-group').next('.invalid-feedback').show()
    });
    $("#titltfilterlist, #searchfilterlist").chosen().change(function () {
        if ($(this).find('option:selected').length < 1) {
            $(this).closest('.input-group').next('.invalid-feedback').hide()
        }
    });

});
