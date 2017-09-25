var gulp = require('gulp');

gulp.task('build', [
    'js:build',
    'jsTheme:build',
    'jsTheme.min:build',
    'style:build',
    'style.min:build',
    'styleSystem:build',
    'styleSystem.min:build',
    'styleControllers:build',
    'styleVendors:build',
    'fonts:build',
    'img:build'
]);