/*  
npm install --save-dev gulp gulp-sass gulp-minify-css gulp-uglify gulp-concat colors gulp-notify node-bourbon node-neat
*/

var gulp    = require( 'gulp' ),
    sass    = require( 'gulp-sass' ),
    minify  = require( 'gulp-minify-css' ),
    uglify  = require( 'gulp-uglify' ),
    concat  = require( 'gulp-concat' ),
    colors  = require( 'colors' ),
    notify  = require( 'gulp-notify' ),
    bourbon = require( 'node-bourbon' ),
    neat    = require( 'node-neat' );

var tasks = {

    styles: function() {
        return gulp.src([ 'scss/global.scss' ])
            .pipe(sass({    includePaths: bourbon.includePaths,
                            includePaths: neat.includePaths }))
            .pipe(concat( 'global.css' ))
            .pipe(gulp.dest( 'css' ))
            .pipe(notify( "Compiled styles" ));
    },
    scripts: function() {
        return gulp.src([
                'scripts/lib/_modernizr.js',
                'scripts/plugins/_slick.js',
                'scripts/plugins/_magnific_popup.js',
                'scripts/plugins/_grids.js',
                'scripts/plugins/_smartresize.js',
                'scripts/plugins/_blockui.js',
                'scripts/dev/_theme-scripts.js'
            ])
            .pipe(concat( 'global-min.js' ))
            .pipe(gulp.dest( 'scripts/min' ))
            .pipe(notify( "Congregated scripts" ));
    },
    scripts_lt_ie9: function() {
        return gulp.src([
                'scripts/lib/_respond.js', 
                'scripts/plugins/_jquery.placeholder.js',
                'scripts/dev/_lt-ie9.js'
            ])
            .pipe(concat( 'lt-ie9-min.js' ))
            .pipe(gulp.dest( 'scripts/min' ))
            .pipe(notify( "Congregated scripts_lt_ie9" ));
    }

};

var prod = {

    compressStyles: function() {
        return gulp.src([ 'scss/global.scss' ])
            .pipe(sass({    includePaths: bourbon.includePaths,
                            includePaths: neat.includePaths }))
            .pipe(concat( 'global.css' ))
            .pipe(minify())
            .pipe(gulp.dest( 'css' ));
    },
    compressScripts: function() {
        return gulp.src([
                'scripts/lib/_modernizr.js',
                'scripts/plugins/_slick.js',
                'scripts/plugins/_magnific_popup.js',
                'scripts/plugins/_grids.js',
                'scripts/plugins/_smartresize.js',
                'scripts/plugins/_blockui.js',
                'scripts/dev/_theme-scripts.js'
            ])
            .pipe(concat( 'global-min.js' ))
            .pipe(uglify())
            .pipe(gulp.dest( 'scripts/min' ));
    },
    compressScripts_lt_ie9: function() {
        return gulp.src([
                'scripts/lib/_respond.js', 
                'scripts/plugins/_jquery.placeholder.js',
                'scripts/dev/_lt-ie9.js'
            ])
            .pipe(concat( 'lt-ie9-min.js' ))
            .pipe(uglify())
            .pipe(gulp.dest( 'scripts/min' ));
    }

};

//
// Seperate gulp tasks
gulp.task( 'styles', tasks.styles);
gulp.task( 'scripts', tasks.scripts);
gulp.task( 'scripts_lt_ie9', tasks.scripts_lt_ie9);

gulp.task( 'compress-styles', prod.compressStyles);
gulp.task( 'compress-scripts', prod.compressScripts);
gulp.task( 'compress-scripts_lt_ie9', prod.compressScripts_lt_ie9);

//
// Development task
gulp.task( 'default', function() {

    gulp.start( 'styles', 'scripts', 'scripts_lt_ie9' );

    gulp.watch([ 'scss/*/*.scss', 'scss/*.scss' ], [ 'styles' ] );
    gulp.watch([ 'scripts/*/*.js' ], [ 'scripts', 'scripts_lt_ie9' ] );

});

//
// Build task
gulp.task( 'prod', function() {

    gulp.start( 'compress-styles', 'compress-scripts', 'compress-scripts_lt_ie9', function(){ 

        console.info( '\n24|7 Bereikbaar scripts and styles where compiled for production!\n'.yellow);
        
    });

});