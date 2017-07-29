var
		gulp         	= require('gulp'),
		sass         	= require('gulp-sass'),
		autoprefixer 	= require('gulp-autoprefixer'),
		cleanCSS    	= require('gulp-clean-css'),
		rename       	= require('gulp-rename'),
		browserSync  	= require('browser-sync').create(),
		concat       	= require('gulp-concat'),
		uglify       	= require('gulp-uglify'),
    	imagemin		= require('gulp-imagemin'),
    	imageResize 	= require('gulp-image-resize'),
		cache 			= require('gulp-cache');

// gulp.task('browser-sync', [
//     'styles',
//     'scriptsLibsIndex',
//     'scriptsLibsAgreement',
//     'scriptsIndex',
//     'scriptsAgreement'
// ], function () {
//     browserSync.init({
//         server: {
//             baseDir: "./src"
//         },
//         notify: false
//     });
// });

gulp.task('styles', function () {
	return gulp.src('src/sass/**/*.sass')
	.pipe(sass({
	includePaths: require('node-bourbon').includePaths
	}).on('error', sass.logError))
	.pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(autoprefixer({browsers: ['last 15 versions'], cascade: false}))
	.pipe(cleanCSS())
	.pipe(gulp.dest('assets/css/'))
	.pipe(browserSync.stream());
});

gulp.task('scriptsLibsIndex', function() {
	return gulp.src([
		'src/libs/jquery/dist/jquery.js',
		'src/libs/page-scroll-to-id/jquery.malihu.PageScroll2id.js',
		'src/libs/justifiedGallery/dist/js/jquery.justifiedGallery.js',
		'src/libs/magnific-popup/dist/jquery.magnific-popup.js',
		'src/libs/bootstrap-year-calendar/js/bootstrap-year-calendar.js',
        'src/libs/bootstrap-year-calendar/js/languages/bootstrap-year-calendar.ru.js',
        'src/libs/ggpopover/assets/js/ggpopover.js',
        'src/libs/jquery-toast-plugin/src/jquery.toast.js',
        'src/libs/inputmask/dist/jquery.inputmask.bundle.js',
        'src/libs/inputmask/dist/inputmask/phone-codes/phone.js'
		])
		.pipe(concat('libsIndex.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('assets/js/'));
});

gulp.task('scriptsLibsAgreement', function() {
    return gulp.src([
        'src/libs/jquery/dist/jquery.js'
    ])
        .pipe(concat('libsAgreement.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/'));
});

gulp.task('scriptsIndex', function() {
    return gulp.src([
        'src/js/index.js'
    ])
        .pipe(rename({suffix: '.min', prefix : ''}))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/'));
});

gulp.task('scriptsAgreement', function() {
    return gulp.src([
        'src/js/agreement.js'
    ])
        .pipe(rename({suffix: '.min', prefix : ''}))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/'));
});

gulp.task('watch', ['styles', 'scriptsLibsIndex', 'scriptsLibsAgreement', 'scriptsIndex', 'scriptsAgreement'], function () {
	gulp.watch('src/sass/**/*.sass', ['styles']);
	gulp.watch('src/libs/**/*.js', ['scriptsLibsIndex', 'scriptsLibsAgreement']);
	gulp.watch('src/js/*.js', ['scriptsIndex', 'scriptsAgreement']);
});

gulp.task('default', ['watch']);

gulp.task('clearcache', function () { return cache.clearAll(); });

var
    srcGalleryImg 			= 'src/img/gallery/**',
    srcVideoImg 			= 'src/img/video/**',
	srcEventsImg 			= 'src/img/events/**',
	srcReviewsImg 			= 'src/img/reviews/**',
    distEventsImg 			= 'assets/img/events/',
    distVideoImg 	        = 'assets/img/video/',
    distGalleryImg 			= 'assets/img/gallery/',
	distReviewsImg 			= 'assets/img/reviews/';

gulp.task('imageGallery', function () {
    return gulp.src(srcGalleryImg)
        .pipe(imageResize({
            width: 1200,
            height: 800,
            crop: true,
            upscale: true
        }))
        .pipe(cache(imagemin()))
        .pipe(gulp.dest(distGalleryImg));
});

gulp.task('imageVideo', function () {
    return gulp.src(srcVideoImg)
        .pipe(imageResize({
            width: 600,
            height: 400,
            crop: true,
            upscale: true
        }))
        .pipe(cache(imagemin()))
        .pipe(gulp.dest(distVideoImg));
});

gulp.task('imageEvents', function () {
    return gulp.src(srcEventsImg)
        .pipe(imageResize({
            width: 600,
            height: 400,
            crop: true,
            upscale: true
        }))
        .pipe(cache(imagemin()))
        .pipe(gulp.dest(distEventsImg));
});

gulp.task('imageReviews', function () {
    return gulp.src(srcReviewsImg)
        .pipe(cache(imagemin()))
        .pipe(gulp.dest(distReviewsImg));
});
