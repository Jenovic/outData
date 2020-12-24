// Packages
const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const imagemin = require('gulp-imagemin');
const autoprefixer = require('gulp-autoprefixer');
const cssnano = require('gulp-cssnano');
const babel = require('gulp-babel');
const browserSync = require('browser-sync');
const plumber = require('gulp-plumber');

// Browser-sync URL (Needs to be set up in MAMP)
const localURL = 'www.localurl.test';

// SRC Paths
const styleSource = 'src/styles/style.scss';
const imageSource = 'src/assets/**';
const scriptSource = 'src/scripts/*.js';

// Destination Paths
const stylePath = 'dist/styles';
const imagePath = 'dist/assets';
const scriptPath = 'dist/scripts';

// browser-sync
gulp.task('browser-sync', ['styles', 'scripts'], () => {
  browserSync.init({
    proxy: localURL,
  });

  gulp.watch('src/styles/**/**/*.scss', ['styles']);
  gulp.watch('src/scripts/**.js', ['scripts']);
  gulp.watch('src/assets/**', ['assets']);
  gulp.watch('**.php').on('change', browserSync.reload);
});

// styles
gulp.task('styles', () => {
  gulp.src(styleSource)
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 4 versions'],
      cascade: true,
    }))
    .pipe(cssnano())
    .pipe(gulp.dest(stylePath))
    .pipe(browserSync.stream());
});

// images
gulp.task('assets', () => {
  gulp.src(imageSource)
    .pipe(plumber())
    .pipe(
      imagemin([
        imagemin.svgo({
          plugins: [
            { removeViewBox: false },
         ]
       })
      ]))
    .pipe(gulp.dest(imagePath));
});

gulp.task('fonts', () => {
  gulp.src(fontsSource)
    .pipe(gulp.dest(fontsPath));
});

// Watch
gulp.task('watch', () => {
  gulp.watch('src/styles/**/*.scss', ['styles']);
  gulp.watch('src/scripts/**/*.js', ['scripts']);
  gulp.watch('src/assets/*', ['assets']);
});

// scripts
gulp.task('scripts', () => {
  gulp.src([scriptSource])
    .pipe(plumber())
    .pipe(concat('scripts.js'))
    .pipe(babel({ presets: ['babel-preset-es2015'] }))
    .pipe(uglify({ mangle: false }))
    .pipe(gulp.dest(scriptPath))
    .pipe(browserSync.stream());
});

gulp.task('default', ['styles', 'assets', 'scripts']);
