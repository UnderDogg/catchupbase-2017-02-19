'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var gutil = require('gulp-util');

gulp.task('copy', function () {
    return gulp.src([
            './node_modules/jquery/dist/jquery.min.js',
            './node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            './node_modules/pace/pace.js',
            './node_modules/slug/slug.js'
        ])
        .pipe(gulp.dest('./js/libs/'));
});

gulp.task('sass', function () {
    return gulp.src('./sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .on('end', function(){ gutil.log('Compiling Sass, please wait..'); })
        .pipe(gulp.dest('./css'))
        .on('end', function(){ gutil.log('Done compiling Sass..'); });
});

gulp.task('sass:watch', ['sass'], function () {
    return gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('build', ['copy', 'sass']);

gulp.task('default', ['sass:watch']);
