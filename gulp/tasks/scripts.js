var gulp = require('gulp');
var config = require('../config.js');
var plugin = require('gulp-load-plugins')();

gulp.task('jsSeparate:build', function () {
    gulp.src(config.path.src.jsSeparate)
        .pipe(plugin.changed(config.path.build.js))
        .pipe(plugin.plumber())
        .pipe(plugin.uglify())
        .pipe(gulp.dest(config.path.build.js));
});

gulp.task('jsConcat:build', function () {
    gulp.src(config.path.src.jsConcat)
        .pipe(plugin.changed(config.path.build.js))
        .pipe(plugin.plumber())
        .pipe(plugin.concat('theme.js'))
        .pipe(gulp.dest(config.path.build.js));
});

gulp.task('jsConcat.min:build', function () {
    gulp.src(config.path.src.jsConcat)
        .pipe(plugin.changed(config.path.build.js))
        .pipe(plugin.plumber())
        .pipe(plugin.concat('theme.min.js'))
        .pipe(plugin.uglify())
        .pipe(gulp.dest(config.path.build.js));
});