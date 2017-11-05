var server = 'icms2-modern-template', // Название локального сайта. Перед началом запуска проекта, локальный сайт должен быть включен
    template = 'modern'; // название шаблона, в который скидывать файлы

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
            styleSystem: 'src/sass/system.scss', // Библиотеки подключаемые на каждой странице, объединяются в общий файл
            styleVendors:'src/sass/vendors/separate/**/*.*', // Библиотеки подключаемые на определенных страницах, каждая библиотека выводится отдельно
            styleControllers: 'src/sass/controllers/*.scss',
            img: 'src/images/**/*.*',
            fonts: 'src/fonts/**/*.*'
        },
        //Тут мы укажем, за изменением каких файлов мы хотим наблюдать
        watch: {
            js: 'src/js/**/*.js',
            style: [
                'src/sass/ui/**/*.scss',
                'src/sass/pages/**/*.scss',
                'src/sass/widgets/**/*.scss',
                'src/sass/layouts/**/*.scss',
                'src/sass/theme.scss'],
            styleSystem: [
                'src/sass/vendors/system/**/*.scss',
                'src/sass/system.scss'],
            styleVendors: 'src/sass/vendors/separate/**/*.*',
            styleControllers: 'src/sass/controllers/*.scss',
            styleConfig: 'src/sass/config/_variables.scss',
            img: 'src/images/**/*.*',
            fonts: 'src/fonts/**/*.*'
        },
        browser: {
            php: 'templates/' + template + '/**/*.php',
            js: 'templates/' + template + '/js/**/*.js',
            style: 'templates/' + template + '/css/**/*.css',
            styleControllers: 'templates/' + template + '/controllers/**/*.css',
            fonts: 'templates/' + template + '/fonts/**/*.*'
        },
        clean: {
            js: 'templates/' + template + '/js/**/*.*',
            style: 'templates/' + template + '/css/**/*.*',
            styleControllers: 'templates/' + template + '/controllers/**/*.+(css|map)',
            fonts: 'templates/' + template + '/fonts/**/*.*'
        }
    }
};