let gulp = require('gulp');
let autoprefixer = require('gulp-autoprefixer');
let concat = require('gulp-concat');
let plumber = require('gulp-plumber');
let sass = require('gulp-sass');
let sourcemaps = require('gulp-sourcemaps');
let rename = require('gulp-rename');
let cleanCSS = require('gulp-clean-css');
let watch = require('gulp-watch');
var browserSync = require('browser-sync');

let config = {};
config.sass = {
  srcFiles: [
    'scss/*.scss',
  ],
  options: {
    outputStyle: 'compressed'
  }
};

gulp.task('sass', function () {
  gulp.src(config.sass.srcFiles)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass(config.sass.options).on('error', sass.logError))
    .pipe(autoprefixer({ browsers: ['last 2 versions', 'safari 8', 'ie 11'] }))
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest('./css/'))
    .pipe(cleanCSS({}))
    .pipe(rename(function (path) {
      path.basename += ".min";
    }))
    .pipe(gulp.dest('./css/'));
});

gulp.task('browser-sync', function() {
  browserSync.init(["css/*.css", "js/*.js"], {
    proxy: "http://belladonna.lndo.site"
  });
});

gulp.task('watch', function() {
  gulp.watch('scss/*.scss', ['sass']);
  gulp.watch('scss/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'browser-sync', 'watch']);
