$(document).ready(function () {
    var options =
    {
        tab: 'left',
        className: 'checkmark',
        slideImageIndexPage: 1,
        slideImageIndexPageHome: 1,
        showMenuSlider: true,
        showMenuAtStart: false,
        startPage: 'menu'
    };

    var audio =
        [
            {mp3: '/page/music.mp3'}
        ];

    var page =
    {
        'about': {tab: 'left', className: 'checkmark', slideImageIndexPage: 1},
        'services': {tab: 'right', className: 'features', slideImageIndexPage: 2},
        'portfolio': {tab: 'left', className: 'image', slideImageIndexPage: 3},
        'blog': {tab: 'right', className: 'info', slideImageIndexPage: 4},
        'contact': {tab: 'left', className: 'mail', slideImageIndexPage: 5},
        'basement': {tab: 'right', className: 'info', slideImageIndexPage: 6}
    };

    $('#nostalgia').nostalgia(options, page, slide, audio, config, configDefault);

    $(".social-wechat").on('click', function () {
        $(".qrcode-wrapper").toggleClass('show');
    });
});