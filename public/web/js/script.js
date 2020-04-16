// JavaScript Document
$('document').ready(function (){
    $('.menu-icon').click(function (){
        jQuery('.mob-nav').animate({'left': '0px'}, 100);
    });

    jQuery('.close-btn').on("click", function(){
        jQuery('.mob-nav').animate({'left': '-100%'}, 100);
    });

    $('.about-menu').hover(function (){
        if($('.sub-ul').is(':hidden')){
            $('.sub-ul').slideDown('slow');
        }else{
            $('.sub-ul').slideUp('slow');
        }
    });

    $('.icon-close').click(function (){
        $('.custom-popup-bg').delay(1500).hide();
        $('.custom-popup').delay(1500).hide();
    });

    $('.user-select').on('click', function(e) {
        $('.form-list-item').toggle();
    });

    $('.resume-edit-icon').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.heading-model').show('100');
        $('.popup-bg-img').show();
    });

    $('.skills-edit-icon').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.key-skills-model').show('100');
        $('.popup-bg-img').show();
    });

    $('.add_employment').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.employment-model').show('100');
        $('.popup-bg-img').show();
    });

    $('.add_education_btn').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.education_model').show('100');
        $('.popup-bg-img').show();
    });

    $('.add_doctorate_btn').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.add_doctorate').show('100');
        $('.popup-bg-img').show();
    });

    $('.add_masters_btn').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.add_Masters').show('100');
        $('.popup-bg-img').show();
    });

    $('.add_twelfth_btn').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.add_twelfth').show('100');
        $('.popup-bg-img').show();
    });

    $('.add_tenth_btn').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.add_tenth').show('100');
        $('.popup-bg-img').show();
    });

    $('.extra_skills').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.extra-skills-model').show('100');
        $('.popup-bg-img').show();
    });

    $('.profile-summery-btn').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.profile-summery-model').show('100');
        $('.popup-bg-img').show();
    });

    $('.desired_career_icon').click(function (){
        $("html").animate({ scrollTop: 0 });
        $('.Desired-Career-Profile').show('100');
        $('.popup-bg-img').show();
    });

    $('.crossLayer').click(function (){
        $('.heading-model').hide('100');
        $('.key-skills-model').hide('100');
        $('.employment-model').hide('100');
        $('.education_model').hide('100');
        $('.add_doctorate').hide('100');
        $('.add_Masters').hide('100');
        $('.add_twelfth').hide('100');
        $('.add_tenth').hide('100');
        $('.extra-skills-model').hide('100');
        $('.profile-summery-model').hide('100');
        $('.Desired-Career-Profile').hide('100');
        $('.popup-bg-img').hide();
    });

     /*$('.resume-edit-icon').click(function (){
        if($(this).find('.navigation li ul').is(':hidden')){
            $(this).find('.navigation li ul').slideDown('slow');
        }else{
            $(this).find('.navigation li ul').slideUp('slow');
        }
    });*/
});