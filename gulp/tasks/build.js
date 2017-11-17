var gulp = require('gulp');

gulp.task('build', [
    'jsSeparate:build',
    'jsConcat:build',
    'jsConcat.min:build',
    'style:build',
    'style.min:build',
    'styleSystem:build',
    'styleSystem.min:build',
    'styleControllers:build',
    'styleVendors:build',
    'fonts:build',
    'img:build'
]);