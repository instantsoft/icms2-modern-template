var gulp = require('gulp');
var config = require('../config.js');
var plugin = require('gulp-load-plugins')();

gulp.task('js:build', function () {
    gulp.src(config.path.src.js)
        .pipe(plugin.changed(config.path.build.js))
        .pipe(plugin.plumber())
        .pipe(plugin.concat('theme.js'))
        .pipe(plugin.uglify())
        .pipe(gulp.dest(config.path.build.js));
});