var gulp = require( 'gulp' );
var rename = require( 'gulp-rename' );
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var sourcemaps = require( 'gulp-sourcemaps' );

var styleSrc = 'assets/scss/index.scss';
var styleDest = './assets/css/';
var stylesPath = 'assets/scss/**/*.scss';

var scriptSrc = 'assets/js/admin-script.js';
var scriptDest = './assets/js/';
var scriptsPath = 'assets/js/**/*.js';

function styles( cb ) {
    return gulp.src( styleSrc )
        .pipe( sourcemaps.init() )
        .pipe( sass( {
            errorLogToConsole: true,
            outputStyle: 'compressed'
        } ) )
        .on( 'error', console.error.bind( console ) )
        .pipe( autoprefixer() )
        .pipe( rename(  { 
            basename: 'admin-style',
            suffix: '.min',
            extname: '.css'
         } ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( styleDest ) );
}

function js ( cb ) {
    return gulp.src( scriptSrc )
        .pipe( sourcemaps.init() )
        .pipe( rename(  { 
            basename: 'admin-script',
            suffix: '.min',
            extname: '.js'
        } ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( scriptDest ) );
}

function watchFiles( cb ) {
    gulp.watch( stylesPath, styles );
    gulp.watch( scriptsPath, js );
}

exports.default = gulp.parallel( styles, js );
exports.watch = watchFiles;
exports.build = gulp.parallel( styles, js );

// gulp.task( 'default', gulp.parallel( 'style', 'js' ) );

// gulp.task( 'watch', function() {
//     gulp.watch( stylesPath );
//     gulp.watch( scriptsPath );
// } )