"use strict";

var gulp = require('gulp'),
    cssnano = require('gulp-cssnano'), // сжимает css
    pxtorem = require('gulp-pxtorem'),  // конвертирует px размер щрифтов в rem
    autoprefixer = require('gulp-autoprefixer'), // добавляет префиксы css
    mqpacker = require('css-mqpacker'),  // объединяет медиа запросы
    sass = require('gulp-sass'),  // позволяет работать с sass, scss
    sassUnicode = require('gulp-sass-unicode'),  // устраняет ошибки кодировки
    sourcemaps = require('gulp-sourcemaps'), // создает карту
    fileinclude = require('gulp-file-include'), // объединяет файлы
    uglify = require('gulp-uglify'), // минимизирует js файлы
    concat = require('gulp-concat'), // объединяет js файлы
    del = require('del'), // удаляет указанные файлы и папки
    plumber = require('gulp-plumber'), // возобновляет работу gulp при ошибке компиляции
    rename = require('gulp-rename'),
    changed = require('gulp-changed'), // запускают таски только для изменившихся файлов
    duration = require('gulp-duration'),  // отображает время выполнения тасков.
    debug = require('gulp-debug'), // плагин для откладки
    browserSync = require('browser-sync').create();
