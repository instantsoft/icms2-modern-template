var gulp = require('gulp');
var config = require('../config.js');
var plugin = require('gulp-load-plugins')();

gulp.task('img:build', function () {
    var imagemin = require('gulp-imagemin');
    gulp.src(config.path.src.img)
        .pipe(plugin.changed(config.path.build.img))
        .pipe(plugin.plumber())
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({plugins: [{removeViewBox: true}]})
        ]))
        .pipe(gulp.dest(config.path.build.img))
});