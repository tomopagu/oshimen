'use strict';

var gulp = require('gulp');

var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');

var webpack = require('gulp-webpack');

// Run styles
gulp.task('styles', function() {
    var processors = [
        autoprefixer({browsers: ['last 1 version']}),
        cssnano
    ];
    
    return gulp.src('./resources/assets/sass/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss(processors))
        .pipe(gulp.dest('./public/styles'));
});

// Run JS
gulp.task('javascript', function() {
    return gulp.src('./resources/assets/js/app.js')
        .pipe(webpack({
            output: {
                filename: 'app.js'
            }
        }))
        .pipe(gulp.dest('./public/js'));
});

gulp.task('watch', function() {
   gulp.watch('./resources/assets/sass/app.scss', ['styles']);
   gulp.watch('./resources/assets/js/app.js', ['javascript']);
});

gulp.task('default', function() {
   gulp.run(['styles', 'javascript']);
});