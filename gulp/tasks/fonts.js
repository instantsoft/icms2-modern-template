var gulp = require('gulp');
var config = require('../config.js');

gulp.task('fonts:build', function () {
    gulp.src(config.path.src.fonts)
        .pipe(gulp.dest(config.path.build.fonts));
});