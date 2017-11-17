var gulp = require('gulp');
var config = require('../config.js');

gulp.task('watch', function () {
    gulp.watch(config.path.watch.js, ['jsSeparate:build', 'jsConcat:build', 'jsConcat.min:build']);
    gulp.watch(config.path.watch.style, ['style:build', 'style.min:build']);
    gulp.watch(config.path.watch.styleSystem, ['styleSystem:build', 'styleSystem.min:build']);
    gulp.watch(config.path.watch.styleVendors, ['styleVendors:build']);
    gulp.watch(config.path.watch.styleControllers, ['styleControllers:build']);
    gulp.watch(config.path.watch.styleConfig, ['style:build', 'style.min:build', 'styleSystem:build', 'styleSystem.min:build', 'styleControllers:build', 'styleVendors:build']);
    gulp.watch(config.path.watch.img, ['img:build']);
    gulp.watch(config.path.watch.fonts, ['fonts:build']);
});