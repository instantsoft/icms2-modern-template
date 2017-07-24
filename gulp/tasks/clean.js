var gulp = require('gulp');
var config = require('../config.js');
var del = require('del');
// Удаление собранных файлов
gulp.task('clean', function () {
    return del([
        config.path.clean.js,
        config.path.clean.style,
        config.path.clean.styleControllers,
        config.path.clean.fonts
    ]);
});