"use strict";

var gulp = require("gulp"),
    reqDir = require('require-dir');
    reqDir('./gulp', { recurse: true });
    reqDir('./gulp/tasks/', { recurse: true });