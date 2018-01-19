var gulp = require('gulp');
var config = require('./config.js');
var plugin = require('gulp-load-plugins')();
// Данный таск предназначен для копирования файлов из папки node_modules.
// Таск запускается на старте проекта

var vendorList = {
    bootstrap: {
        './node_modules/bootstrap/js/dist/*.js':    './src/js/concat/bootstrap',
        './node_modules/bootstrap/scss/**':         './src/sass/vendors/system/bootstrap'
    },
    popper: {
        'node_modules/popper.js/dist/umd/popper.js': './src/js/concat/'
    },
    // enquire: {
    //     './node_modules/enquire.js/dist/enquire.js': './src/js/concat/'
    // }
};

gulp.task('start', function () {
    for (var vendorName in vendorList) {
        var vendorItem = vendorList[vendorName];
        for (var vendorPath in vendorItem) {
            // console.log(vendorName, 'src: ' + vendorPath, 'dest: ' + vendorItem[vendorPath]);
            gulp.src(vendorPath)
                .pipe(plugin.changed(vendorItem[vendorPath]))
                .pipe(plugin.debug({title: 'start:' + vendorName}))
                .pipe(gulp.dest(vendorItem[vendorPath]));
        }
    }
});