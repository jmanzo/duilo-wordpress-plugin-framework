var gulp = require( 'gulp' );
var rename = require( 'gulp-rename' );
var sass = require( 'gulp-sass' );
var styleSrc = './assets/scss/index.scss';
var styleDest = './assets/css/';

gulp.task( 'style', function () {
    gulp.src( styleSrc )
        .pipe( sass( {
            errorLogToConsole: true,
            outputStyle: 'compressed'
        } ) )
        .on( 'error', console.error.bind( console ) )
        .pipe( rename(  { 
            basename: 'admin-style',
            suffix: '.min',
            extname: '.css'
         } ) )
        .pipe( gulp.dest( styleDest ) );
} );