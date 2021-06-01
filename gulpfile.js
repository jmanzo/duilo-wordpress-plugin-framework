var gulp = require( 'gulp' );
var rename = require( 'gulp-rename' );
var babel = require( 'gulp-babel' );
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var uglify = require( 'gulp-uglify' );
var del = require( 'del' );
var sourcemaps = require( 'gulp-sourcemaps' );

var paths = {
    "style": {
        "src": "assets/scss/**/*.scss",
        "dest": "dist/css/",
    },
    "script": {
        "src": "assets/js/**/*.js",
        "dest": "dist/js/",
    }
};

function clean() {
    return del( [ 'dist' ] );
}

function styles( cb ) {
    return gulp.src( paths.style.src )
        .pipe( sourcemaps.init() )
        .pipe( sass( {
            errorLogToConsole: true,
            outputStyle: 'compressed'
        } ) )
        .on( 'error', console.error.bind( console ) )
        .pipe( autoprefixer() )
        .pipe( rename(  { 
            extname: '.min.css'
         } ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( paths.style.dest ) );
}

function js ( cb ) {
    return gulp.src( paths.script.src )
        .pipe( babel({
            presets: ['@babel/env']
        }) )
        .pipe( uglify() )
        .pipe( sourcemaps.init() )
        .pipe( rename(  { 
            suffix: '.min'
        } ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( paths.script.dest ) );
}

function watchFiles( cb ) {
    gulp.watch( paths.style.src, styles );
    gulp.watch( paths.script.src, js );
}

exports.default = gulp.series( clean, gulp.parallel( styles, js ) );
exports.watch = gulp.series( clean, gulp.parallel( styles, js ), watchFiles );
exports.build = gulp.parallel( styles, js );