var gulp = require('gulp'),
    browserSync = require('browser-sync').create(),
    config = require('../config.js'),
    plugin = require('gulp-load-plugins')();

gulp.task('style:build', function () {
    gulp.src(config.path.src.style)
        .pipe(plugin.plumber())
        .pipe(plugin.sourcemaps.init({largeFile: true}))
        .pipe(plugin.sass().on('error', plugin.sass.logError))
        .pipe(plugin.sassUnicode())
        .pipe(plugin.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(plugin.pxtorem())
        .pipe(plugin.sourcemaps.write('../css/maps'))
        .pipe(plugin.debug({title: 'style:build'}))
        .pipe(plugin.duration('style:build time'))
        .pipe(gulp.dest(config.path.build.style));
});

gulp.task('styleSystem:build', function () {
    gulp.src(config.path.src.styleSystem)
        .pipe(plugin.plumber())
        .pipe(plugin.sourcemaps.init({largeFile: true}))
        .pipe(plugin.sass().on('error', plugin.sass.logError))
        .pipe(plugin.sassUnicode())
        .pipe(plugin.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(plugin.pxtorem())
        .pipe(plugin.sourcemaps.write('../css/maps'))
        .pipe(plugin.debug({title: 'style:build'}))
        .pipe(plugin.duration('style:build time'))
        .pipe(gulp.dest(config.path.build.style));
});

gulp.task('style.min:build', function () {
    gulp.src(config.path.src.style)
        .pipe(plugin.plumber())
        .pipe(plugin.sourcemaps.init({largeFile: true}))
        .pipe(plugin.sass().on('error', plugin.sass.logError))
        .pipe(plugin.sassUnicode())
        .pipe(plugin.cssnano({zindex: false}))
        .pipe(plugin.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(plugin.pxtorem())
        .pipe(plugin.rename({suffix: '.min'}))
        .pipe(plugin.debug({title: 'style.min:build'}))
        .pipe(plugin.duration('style.min:build time'))
        .pipe(plugin.sourcemaps.write('../css/maps'))
        .pipe(gulp.dest(config.path.build.style))
});

gulp.task('styleSystem.min:build', function () {
    gulp.src(config.path.src.styleSystem)
        .pipe(plugin.plumber())
        .pipe(plugin.sourcemaps.init({largeFile: true}))
        .pipe(plugin.sass().on('error', plugin.sass.logError))
        .pipe(plugin.sassUnicode())
        .pipe(plugin.cssnano({zindex: false}))
        .pipe(plugin.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(plugin.pxtorem())
        .pipe(plugin.rename({suffix: '.min'}))
        .pipe(plugin.sourcemaps.write('../css/maps'))
        .pipe(plugin.debug({title: 'style.min:build'}))
        .pipe(plugin.duration('style.min:build time'))
        .pipe(gulp.dest(config.path.build.style))
});

gulp.task('styleControllers:build', function () {
    gulp.src(config.path.src.styleControllers)
        .pipe(plugin.plumber())
        .pipe(plugin.sourcemaps.init({largeFile: true}))
        .pipe(plugin.sass().on('error', plugin.sass.logError))
        .pipe(plugin.sassUnicode())
        .pipe(plugin.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(plugin.pxtorem())
        .pipe(plugin.rename(function (path) {
            path.dirname += "/" + path.basename + "";
            path.basename = "styles";
        }))
        .pipe(plugin.sourcemaps.write(''))
        .pipe(plugin.debug({title: 'styleContr:build'}))
        .pipe(plugin.duration('styleContr:build time'))
        .pipe(gulp.dest(config.path.build.styleControllers))
});

gulp.task('styleVendors:build', function () {
    gulp.src(config.path.src.styleVendors)
        .pipe(plugin.plumber())
        .pipe(plugin.sourcemaps.init({largeFile: true}))
        .pipe(plugin.sass().on('error', plugin.sass.logError))
        // .pipe(plugin.cssnano({zindex: false}))
        .pipe(plugin.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(plugin.pxtorem())
        .pipe(plugin.rename(function (path) {
            path.basename = path.dirname;
            path.dirname = "/";
        }))
        .pipe(plugin.sourcemaps.write('/maps'))
        .pipe(gulp.dest(config.path.build.style))
});