var server = 'icms2-modern-template', // Название локального сайта. Перед началом запуска проекта, локальный сайт должен быть включен
    template = 'modern'; // название шаблона, в который скидывать файлы

module.exports = {
    server: server,
    path: {
        //Тут мы укажем куда складывать готовые после сборки файлы
        build: {
            js: 'templates/' + template + '/js/',
            style: 'templates/' + template + '/css/',
            styleControllers: 'templates/' + template + '/controllers/',
            img: 'templates/' + template + '/img/',
            fonts: 'templates/' + template + '/fonts/'
        },
        //Пути откуда брать исходники
        src: {
            jsSeparate: 'src/js/separate/*.js',
            jsConcat: [
                'src/js/concat/popper.js',
                'src/js/concat/bootstrap/util.js',
                'src/js/concat/bootstrap/alert.js',
                'src/js/concat/bootstrap/button.js',
                'src/js/concat/bootstrap/carousel.js',
                'src/js/concat/bootstrap/collapse.js',
                'src/js/concat/bootstrap/dropdown.js',
                'src/js/concat/bootstrap/modal.js',
                'src/js/concat/bootstrap/scrollspy.js',
                'src/js/concat/bootstrap/tab.js',
                'src/js/concat/bootstrap/tooltip.js',
                'src/js/concat/bootstrap/popover.js',
                'src/js/concat/setting.js'],
            style: 'src/sass/theme.scss',
            styleSystem: 'src/sass/system.scss', // Библиотеки подключаемые на каждой странице, объединяются в общий файл
            styleVendors:'src/sass/vendors/separate/**/*.*', // Библиотеки подключаемые на определенных страницах, каждая библиотека выводится отдельно
            styleControllers: 'src/sass/controllers/*.+(scss|sass)',
            img: 'src/img/**/*.*',
            fonts: 'src/fonts/**/*.*'
        },
        //Тут мы укажем, за изменением каких файлов мы хотим наблюдать
        watch: {
            js: 'src/js/**/*.js',
            style: [
                'src/sass/ui/**/*.+(scss|sass)',
                'src/sass/pages/**/*.+(scss|sass)',
                'src/sass/widgets/**/*.+(scss|sass)',
                'src/sass/layouts/**/*.+(scss|sass)',
                'src/sass/theme.scss'],
            styleSystem: [
                'src/sass/vendors/system/**/*.+(scss|sass)',
                'src/sass/system.scss'],
            styleVendors: 'src/sass/vendors/separate/**/*.*',
            styleControllers: 'src/sass/controllers/*.+(scss|sass)',
            styleConfig: 'src/sass/config/_variables.scss',
            img: 'src/img/**/*.*',
            fonts: 'src/fonts/**/*.*'
        },
        browser: {
            php: 'templates/' + template + '/**/*.php',
            js: 'templates/' + template + '/js/**/*.js',
            style: 'templates/' + template + '/css/**/*.css',
            styleControllers: 'templates/' + template + '/controllers/**/*.css',
            fonts: 'templates/' + template + '/fonts/**/*.*'
        },
        library_src: {
            bootstrap:   'node_modules/bootstrap/scss/**/*.*'
        },
        library_build: {
            bootstrap: 'src/sass/vendors/system/bootstrap/'
        },
        clean: {
            js: 'templates/' + template + '/js/**/*.*',
            style: 'templates/' + template + '/css/**/*.*',
            styleControllers: 'templates/' + template + '/controllers/**/*.+(css|map)',
            fonts: 'templates/' + template + '/fonts/**/*.*'
        }
    }
};