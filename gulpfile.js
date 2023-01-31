'use strict';

const {src, dest, watch, series} = require('gulp');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps')
const uglify = require('gulp-uglify');

// SCSS related
const styleSRC =  "./assets/src/scss/petizan.scss";
const styleDIST = "./assets/dist/css/";
const styleWATCH  = "./assets/src/scss/**/*.scss";


const sass = require('gulp-sass')(require('sass'));
const autoPrefixer = require('gulp-autoprefixer');


// JS related
const jsSRC =  "petizan.js";
const jsFOLDER =  "./assets/src/js/";
const jsDIST = "./assets/dist/js/";
const jsWATCH  = "./assets/src/js/**/*.js";
const jsFILES = [jsSRC];

const browserify = require( 'browserify' );
const babelify = require( 'babelify' );
const source = require( 'vinyl-source-stream' );
const buffer = require( 'vinyl-buffer' );


function buildStyle(){
 
    return src(styleSRC)
        .pipe( sourcemaps.init() )
        .pipe( sass({
            errorLogToConsole:true,
            outputStyle: 'compressed'
        }) )
        .on( 'error', console.error.bind( console ))
        .pipe( autoPrefixer( { 
            overrideBrowserslist: ['last 3 versions'], 
            cascade: false 
        } ))
        .pipe( rename( { suffix: '.min' } ))
        .pipe( sourcemaps.write( './' ) )
        .pipe( dest( styleDIST ) );

}


function buildScript(cb)
{
    
    jsFILES.map(function(entry){

        return browserify( {
            entries: [jsFOLDER + entry]
        })
        .transform( babelify, { presets: ['env'] })
        .bundle()
        .pipe( source( entry ) )
        .pipe( rename( { extname: '.min.js'} ) )
        .pipe( buffer() )
        .pipe( sourcemaps.init( {loadMaps: true} ))
        .pipe( uglify() )
        .pipe ( sourcemaps.write( './' ) )
        .pipe ( dest(jsDIST) )
    });
    

    cb();
}


function watchTask()
{
    watch(styleWATCH, buildStyle);
    watch(jsWATCH, buildScript);
}


exports.default = series(buildStyle, buildScript, watchTask)


