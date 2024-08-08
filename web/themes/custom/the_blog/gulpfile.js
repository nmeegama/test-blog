const { src, dest, task, series, watch } = require("gulp");

// Import Gulp plugins.
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const plumber = require('gulp-plumber');
const uglify = require('gulp-uglify');
const run = require('gulp-run');

// Transpile JavaScripts
const js = () => {
  return src('./_src/js/**/*.js')
    // Init source maps
    // Stop the process if an error is thrown.
    .pipe(plumber())
    // Transpile the JS code using Babel's preset-env.
    .pipe(babel({
      presets: [
        ['@babel/env', {
          modules: false
        }]
      ]
    }))
    // Save each component as a separate file in dist.
    .pipe(uglify())
    .pipe(dest('./assets/js'))
};


// Compile SCSS
const scss = () => {
  sass.compiler = require('sass');
  return src('./_src/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded',
      includePaths: ['./node_modules']
    }).on('error', sass.logError))
    .pipe(autoprefixer('last 2 version', 'ie 11'))
    .pipe(sourcemaps.write('./sourcemap/'))
    .pipe(dest('./assets/css'));
};

// Define tasks
const build = gulp.series(scss, gulp.parallel(js))
task('scss', scss);
task('js', js);
exports.default = build
