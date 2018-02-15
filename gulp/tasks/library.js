var gulp = require('gulp'),
    config = require('../config.js'),
    plugin = require('gulp-load-plugins')();

gulp.task('library:bootstrap', function () {
    gulp.src(config.path.library_src.bootstrap)
        .pipe(plugin.plumber())
        .pipe(plugin.debug({title: 'in:'+ config.path.library_build.bootstrap + '; of:'}))
        .pipe(plugin.duration('library:bootstrap time'))
        .pipe(gulp.dest(config.path.library_build.bootstrap));
});