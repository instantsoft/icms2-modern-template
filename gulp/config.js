var server ='icms2-modern-template', // название локального сайта
    template ='modern'; // название шаблона. в который скидывать файлы

module.exports = {
    server: server,
    path: {
        //Тут мы укажем куда складывать готовые после сборки файлы
        build: {
            js: 'templates/' + template + '/js/',
            jsTheme: 'templates/' + template + '/js/theme.js',
            style: 'templates/' + template + '/css/',
            styleControllers: 'templates/' + template + '/controllers/',
            img: 'templates/' + template + '/img/',
            fonts: 'templates/' + template + '/fonts/'
        },
        //Пути откуда брать исходники
        src: {
            js: 'src/js/*.js',
            jsTheme: [
                'bower_components/popper.js/dist/umd/popper.js',
                'bower_components/bootstrap/js/dist/util.js',
                'bower_components/bootstrap/js/dist/alert.js',
                'bower_components/bootstrap/js/dist/button.js',
                'bower_components/bootstrap/js/dist/carousel.js',
                'bower_components/bootstrap/js/dist/collapse.js',
                'bower_components/bootstrap/js/dist/dropdown.js',
                'bower_components/bootstrap/js/dist/modal.js',
                'bower_components/bootstrap/js/dist/scrollspy.js',
                'bower_components/bootstrap/js/dist/tab.js',
                'bower_components/bootstrap/js/dist/tooltip.js',
                'bower_components/bootstrap/js/dist/popover.js'],
            style: 'src/sass/theme.scss',
            styleSystem: 'src/sass/system.scss',
            styleVendors: 'src/sass/vendors/*.scss',
            styleControllers: 'src/sass/controllers/*.scss',
            img: 'src/images/**/*.*',
            fonts: 'src/fonts/**/*.*'
        },
        //Тут мы укажем, за изменением каких файлов мы хотим наблюдать
        watch: {
            js: 'src/js/**/*.js',
            style: ['src/sass/theme/**/*.scss', 'src/sass/theme.scss'],
            styleSystem: ['src/sass/vendors/**/*.scss', 'src/sass/system.scss'],
            styleControllers: 'src/src/sass/controllers/*.scss',
            styleConfig: 'src/sass/config/_variables.scss',
            img: 'src/images/**/*.*',
            fonts: 'src/fonts/**/*.*'
        },
        browser: {
            php: 'src/' + template + '/**/*.php',
            js: 'src/' + template + '/js/**/*.js',
            style: 'src/' + template + '/css/**/*.css',
            styleControllers: 'src/' + template + '/controllers/**/*.css',
            fonts: 'src/' + template + '/fonts/**/*.*'
        },
        clean: {
            js: 'templates/' + template + '/js/**/*.*',
            style: 'templates/' + template + '/css/**/*.*',
            styleControllers: 'templates/' + template + '/controllers/**/*.+(css|map)',
            fonts: 'templates/' + template + '/fonts/**/*.*'
        }
    }
};