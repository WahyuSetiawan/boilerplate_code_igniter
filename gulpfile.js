const GulpClient = require('gulp');
const { series, src, dest, watch } = require('gulp');

var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
function clean(cb)
{
    return src('./assets/css/style.css')
        .pipe(cleanCSS({ compability: 'ie8' }))
        .pipe(dest('./'));
}

function build(cb)
{
    return src('./assets/sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('./assets/css'));
}

exports.build = build;

exports.default = function ()
{
    watch([
        './assets/sass/*.scss', 
        ], series(build, clean));
};
