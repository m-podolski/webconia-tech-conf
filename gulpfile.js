const { src, dest, series, parallel, watch } = require("gulp");

const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const browserSync = require("browser-sync").create();
const del = require("del");
const flatMap = require("flat-map").default;
const path = require("path");
const postcss = require("gulp-postcss");
const scaleImages = require("gulp-scale-images");
const sass = require("gulp-dart-sass");
const sourcemaps = require("gulp-sourcemaps");
const webpack = require("webpack-stream");

const source = "./src/";
const dist = "./dist/";

async function clean(cb) {
  await del(dist + "css");
  await del(dist + "js");
  await del(dist + "vendor");

  cb();
}

function css(cb) {
  src(source + "scss/*.scss")
    .pipe(sourcemaps.init())
    .pipe(sass.sync({ sourcemap: false, outputStyle: "expanded" }))
    .on("error", (err) => {
      return console.log("Error!", err.message);
    })
    .pipe(sourcemaps.write())
    .pipe(dest(dist + "css"));

  cb();
}

function cssProd(cb) {
  src(source + "scss/*.scss")
    .pipe(sass.sync({ sourcemap: false, outputStyle: "compressed" }))
    .on("error", (err) => {
      return console.log("Error!", err.message);
    })
    .pipe(
      postcss([
        autoprefixer({ overrideBrowserslist: ["last 1 version"] }),
        cssnano(),
      ])
    )
    .pipe(dest(dist + "css"));

  cb();
}

function js(cb) {
  src(source + "js/*.js").pipe(dest(dist + "js"));

  cb();
}

function jsProd(cb) {
  src(source + "js/*.js")
    .pipe(
      webpack({
        mode: "production",
        entry: {
          ui: source + "js/ui.js",
        },
        output: {
          filename: "[name].js",
        },
      })
    )
    .pipe(dest(dist + "js"));

  cb();
}

function images(cb) {
  cb();
}

function imagesProd(cb) {
  src(source + "images/*.{jpeg,jpg,png,gif}")
    .pipe(
      flatMap((file, cb) => {
        const webpFile = file.clone();
        webpFile.scale = {
          maxWidth: 1500,
          maxHeight: 1500,
          fit: "inside",
          format: "webp",
          metadata: false,
        };
        cb(null, [webpFile]);
      })
    )
    .pipe(
      scaleImages((output, scale, cb) => {
        const fileName = [
          path.basename(output.path, output.extname), // strip extension
          scale.format || output.extname,
        ].join(".");
        cb(null, fileName);
      })
    )
    .pipe(dest(dist + "images"));
  cb();
}

function watcher(cb) {
  watch("index.php").on("change", browserSync.reload);
  watch(source + "**/*.php").on("change", browserSync.reload);
  watch(source + "**/*.scss").on("change", series(css, browserSync.reload));
  watch(source + "**/*.js").on("change", series(js, browserSync.reload));

  cb();
}

function watcherNoSync(cb) {
  watch(source + "**/*.scss").on("change", series(css));
  watch(source + "**/*.js").on("change", series(js));

  cb();
}

function sync(cb) {
  browserSync.init({
    proxy: "http://localhost/webconia",
    port: 3000,
    injectChanges: true,
    notify: false,
    open: true,
    browser: ["google chrome", "firefox"],
    ghostMode: {
      clicks: true,
      scroll: true,
      forms: false,
    },
  });

  cb();
}

exports.default = series(clean, parallel(images, css, js), sync, watcher);
exports.nosync = series(clean, parallel(images, css, js), watcherNoSync);
exports.prod = series(clean, parallel(imagesProd, cssProd, jsProd));
