$(function () {

    //---------- Initializing plugins ----------
    //------------------------------------------

    var
        galleryGrid     = $('#gallery-grid'),
        reviews         = $('.reviews'),
        preloader       = $('.preloader'),
        calendar        = $('#calendarContainer'),
        logo            = '',
        $window         = $(window),
        windowWidth     = 0,
        windowHeight    = 0,
        x               = 0,
        phoneFlag       = false,
        emailFlag       = false,
        action = '',
        nonce = '',
        closeMarkup     = '<button title="Закрыть (Esc)" type="button" class="mfp-close">' +
            '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"' +
            'viewBox="0 0 371.23 371.23" style="enable-background:new 0 0 371.23 371.23;" xml:space="preserve">' +
            '<polygon points="371.23,21.213 350.018,0 185.615,164.402 21.213,0 0,21.213 164.402,185.615 0,350.018 21.213,371.23 ' +
            '185.615,206.828 350.018,371.23 371.23,350.018 206.828,185.615 "/>' +
            '</svg>' +
            '</button>',
        arrowMarkup     = '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%">' +
            '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve" width="512px" height="512px">' +
            '<polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 "></polygon>' +
            '</svg>' +
            '</button>';

    //------------------------------------------
    //------------------------------------------


    //---------- Initializing plugins ----------
    //------------------------------------------

    // Page Scroll To ID
    $('.menu a[href*="#"]').mPageScroll2id({
        highlightClass: 'active',
        highlightSelector: '.menu a',
        scrollEasing: 'linear',
        scrollSpeed: 300
    });

    // ImagesLoad and Isotope
    galleryGrid.justifiedGallery({
            'rowHeight': 180,
            'lastRow': 'justify',
            'margins': 10
        })
        .on('jg.complete', function () {
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                closeBtnInside: false,
                closeMarkup: closeMarkup,
                mainClass: 'mfp-fade',
                removalDelay: 300,
                gallery: {
                    enabled: true,
                    arrowMarkup: arrowMarkup,
                    tPrev: 'Назад (стрелка влево)',
                    tNext: 'Вперед (стрелка вправо)',
                    tCounter: '<span class="mfp-counter">%curr% из %total%</span>'
                }
            });
        });

    $('.reviews-gallery').justifiedGallery({
        'rowHeight': 180,
        'lastRow': 'justify',
        'margins': 10,
        'target': '_blank'
    });

    // Magnific Popup YouTube
    $('.popup-youtube').magnificPopup({
        type: 'iframe',
        closeBtnInside: false,
        closeMarkup: closeMarkup,
        mainClass: 'mfp-fade',
        removalDelay: 300
    });

    // Magnific Popup Reviews
    $('.reviews__link').magnificPopup({
        type: 'inline',
        closeBtnInside: false,
        closeMarkup: closeMarkup,
        mainClass: 'mfp-fade',
        removalDelay: 300
    });

    $(":input").inputmask(undefined, {
        oncomplete: function () {
            if (this.id === "phone") phoneFlag = true;
            if (this.id === "email") emailFlag = true;
        },
        onincomplete: function () {
            if (this.id === "phone") phoneFlag = false;
            if (this.id === "email") emailFlag = false;
        },
        onKeyValidation: function (result, opts) {
            if (this.id === "phone" && $(this).inputmask("getmetadata")) {
                console.log($(this).inputmask("getmetadata")["cd"]);
            }
        }
    });

    //------------------------------------------
    //------------------------------------------



    //---------------- Methods -----------------
    //------------------------------------------

    function onResize() {

        windowWidth = $(window).width();
        windowHeight = $(window).height();
        reviews.find('.reviews__content').css('height', 'auto').equivalent();

    }onResize();

    function headerActive() {
        if ($window.scrollTop() > 0)
            $('.header').addClass('active');
        else
            $('.header').removeClass('active');
    }headerActive();

    function arrowRotate() {
        if ($window.scrollTop() > windowHeight / 3) {
            $('.arrow-down svg').css({
                'transform': 'rotate(180deg)'
            });
            $('.arrow-down a').attr('href', '#home');
        }
        else {
            $('.arrow-down svg').css({
                'transform': 'rotate(0)'
            });
            $('.arrow-down a').attr('href', '#about-me');
        }
    }arrowRotate();

    function toast_create(heading, text, icon) {
        return {
            heading: heading,
            text : text,
            showHideTransition : 'fade',
            textColor : '#fff',
            icon: icon,
            hideAfter : 5000,
            stack : 5,
            textAlign : 'left',
            position : 'bottom-right',
            loader: false
        }
    }

    function calendarDataAjax() {
        var responsive = '';

        action = 'kolesnichenko_events_data';
        nonce = calendar.data('nonce');
        $.ajax({
            type: 'post',
            url: admin_ajax.ajaxurl,
            data: 'action=' + action + '&nonce=' + nonce
        }).done(function (data) {
            responsive = $.parseJSON(data);

            console.log(responsive);

            calendarInit(responsive['dataSource']);

            listCategoriesAddItem(responsive['dataCategory']);

        }).fail(function (error) {
            console.log(error);
        });
    }calendarDataAjax();

    function calendarTransformData(calendarData) {
        var
            startDateArray = '',
            endDateArray = '';

        $.each(calendarData, function (i, value) {
            startDateArray = value['startDate'].split('-');
            endDateArray = value['endDate'].split('-');

            value['startDate'] = new Date(startDateArray[0], startDateArray[1] - 1, startDateArray[2]);
            value['endDate'] = new Date(endDateArray[0], endDateArray[1] - 1, endDateArray[2]);
        });

        return calendarData;
    }

    function listCategoriesAddItem(dataCategories) {
        $.each(dataCategories, function (i, value) {
            $('.calendar-legend__list')
                .append('<li class="calendar-legend__item"><span style="background-color: ' + value['color'] + ';" class="calendar-legend__color"></span>' + value['name'] + '</li>')
        })
    }

    function ggpopopverCreateContent(events) {

        var
            title = '',
            text = '',
            content = '',
            time = '',
            startTime = '',
            endTime = '',
            location = '',
            address = '',
            country = '',
            city = '',
            fullAddress = '',
            phone = '',
            meta = '',
            thumbImg = '',
            thumbURL = '',
            arrowcolor = '',
            corporateFlag = '',
            eventsFlag = '',
            weddingsFlag = '',
            ggpopoverTitleClass = '';

        ggpopoverTitleClass = 'ggpopover__title';

        $.each(events, function (i, value) {

            // category flags
            corporateFlag = value['eventCategorySlug'] !== 'corporategraduationanniversaries';
            eventsFlag = value['eventCategorySlug'] !== 'events';
            weddingsFlag = value['eventCategorySlug'] !== 'weddings';

            // thumbnail image
            thumbImg = (value['thumbURL'] !== false) ? '<div class="ggpopover__img" style="background-image: url('+ value['thumbURL'] +');"></div>' : '';

            // text
            text = value['text'] !== '' ? '<p class="ggpopover__text">' + value['text'] + '</p>' : '';

            ggpopoverTitleClass += text === '' ? ' ' + ggpopoverTitleClass+'_only' : '';

            // title
            title = value['title'] !== '' ? '<h3 class="' + ggpopoverTitleClass + '">' + value['title'] + '</h3>' : '';

            // location
            location = (value['location'] !== false) ? '<span><i class="ggpopover__icon icon-building"></i>' + value['location'] + '</span>' : '';

            // fullAddress
            address = (value['address'] !== false) ? value['address'] + ', ' : '';
            city = (value['city'] !== false) ? value['city'] + ', ' : '';
            country = (value['country'] !== false) ? value['country'] + ', ' : '';
            fullAddress = address + city + country;
            fullAddress = fullAddress.substr(0, fullAddress.length - 2); // отсекаем ', ' в конце
            fullAddress = fullAddress !== '' ? '<span><i class="ggpopover__icon icon-location"></i>' + fullAddress + '</span>' : '';

            // phone
            phone = value['phone'] !== '' ? '<span><i class="ggpopover__icon icon-phone"></i>' + value['phone'] + '</span>' : '';

            // time
            startTime = (value['startTime'] !== '' && weddingsFlag && corporateFlag) ? value['startTime'] : '';
            endTime = (value['endTime'] !== '' && weddingsFlag && corporateFlag && eventsFlag) ? ' - ' + value['endTime'] : '';
            time = startTime + endTime;

            time = (time !== '') ? '<span><i class="ggpopover__icon icon-clock"></i>' + time + '</span>' : '';

            // meta data
            meta = location + fullAddress + phone + time;
            meta = (meta !== '') ? '<p class="ggpopover__meta">' + meta +'</p>' : '';

            content = thumbImg + title + text + meta;

            arrowcolor = $(meta).is(':empty') ? '#fff' : '#f7f7f7';
        });

        return {
            content: content,
            arrowcolor: arrowcolor
        };
    }

    function ggpopoverInit(objElement, objData) {
        var args = {
            trigger: 'focus',
            container: 'body',
            html: true,
            placement: 'top'
        };
        $(objElement).ggpopover(Object.assign(args, objData));
    }

    function calendarInit(dataSource) {
        calendar.calendar({
            language: 'ru',
            dataSource: calendarTransformData(dataSource),
            mouseOnDay: function (e) {

                var
                    ggpopoverContentData = {},
                    element = '';

                if (e.events.length > 0) {

                    ggpopoverContentData = ggpopopverCreateContent(e.events);

                    element = $(e.element).find('a.ggpopover__link');

                    ggpopoverInit(element, ggpopoverContentData);

                }
            },
            renderEnd: function () {

                var calendarDate = '';

                $.each($('td.day:not(.old) .day-content'), function (i, value) {
                    calendarDate = $(value)['text']();
                    $(value)
                        .empty()
                        .html('<a class="ggpopover__link" href="#events">' + calendarDate + '</a>');
                });
            }
        });
    }

    //------------------------------------------
    //------------------------------------------



    //---------------- Events ------------------
    //------------------------------------------

    $(".toggle-mnu").click(function () {
        $(this).toggleClass("on");
        $(".nav-menu-mobile").slideToggle();
        return false;
    });

    $window.on('scroll', function () {

        headerActive();

        arrowRotate();

    });
    $window.on('resize', function () {
        onResize();
    });

    $('.content__section').mousemove(function () {
        $('.content__section--home, .content__section--about-me').css({
            'filter': 'grayscale(50%)'
        });
    });

    $('.content__section--home').mousemove(function (e) {

        x = e.pageX;

        if (windowWidth < 768) {
            $(this).css({
                'filter': 'grayscale(50%)'
            });
            return false;
        }

        if (x < windowWidth / 2) {
            $(this).css({
                'filter': 'grayscale(50%)'
            });
        }
        else {
            $(this).css({
                'filter': 'grayscale(0)'
            });
        }
    });

    $('.content__section--about-me').mousemove(function (e) {

        x = e.pageX;

        if (windowWidth < 768) {
            $(this).css({
                'filter': 'grayscale(50%)'
            });
            return false;
        }

        if (x > windowWidth / 2) {
            $(this).css({
                'filter': 'grayscale(50%)'
            });
        }
        else {
            $(this).css({
                'filter': 'grayscale(0)'
            });
        }
    });

    //E-mail Ajax Send
    $('.contact-form__form').submit(function () { //Change
        var
            th = $(this),
            confident = $('#confident');

        action = 'send_mail';
        nonce = th.data("nonce");

        if (!phoneFlag) {
            $.toast(toast_create(
                'Внимание...',
                'Введите корректный номер телефона.',
                'warning'
            ));
            return false;
        }

        if (!emailFlag) {
            $.toast(toast_create(
                'Внимание...',
                'Введите корректный E-mail аддресс.',
                'warning'
            ));
            return false;
        }

        if (!confident.prop('checked')){
            $.toast(toast_create(
                'Внимание...',
                'Отправляя сообщение, Вы должны принять пользовательское соглашение и подтвердить, что ознакомлены и согласны с политикой конфиденциальности данного сайта.',
                'warning'
            ));
            return false;
        }

        $.ajax({
            type: 'post',
            url: admin_ajax.ajaxurl,
            data: th.serialize() + '&action=' + action + '&nonce=' + nonce
        }).done(function (data) {
            data = $.parseJSON(data);
            if (data.status === 'success')
                $.toast(toast_create('Успех...', data.msg, 'success'));
            if (data.status === 'error')
                $.toast(toast_create('Упс...', data.msg, 'error'));
            setTimeout(function () {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        }).fail(function (data) {
            data = $.parseJSON(data);
            $.toast(toast_create('Упс...', data.msg, 'error'));
        });

        return false;
    });

    //------------------------------------------
    //------------------------------------------



    logo = preloader.find('.preloader__logo, .preloader__load');
    setTimeout(function () {
        logo.fadeOut();
        preloader.delay(350).fadeOut('slow');
    }, 1000);

});

$.fn.equivalent = function () {
    var $blocks = $(this),
        maxH    = $blocks.eq(0).height();

    $blocks.each(function () {
        maxH = ( $(this).height() > maxH ) ? $(this).height() : maxH;
    });

    $blocks.height(maxH);
};
