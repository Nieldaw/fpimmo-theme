import { src, dest, watch, series, parallel } from "gulp";

import autoprefixer from "autoprefixer";
import concat from "gulp-concat";
import csso from "gulp-csso";
import del from "del";
import cleanCss from "gulp-clean-css";
import gulpif from "gulp-if";
import imagemin from "gulp-imagemin";
import postcss from "gulp-postcss";
import rename from "gulp-rename";
import sass from "gulp-sass";
import sourcemaps from "gulp-sourcemaps";
import webpack from "webpack-stream";
import wpPot from "gulp-wp-pot";
import yargs from "yargs";

const PRODUCTION = yargs.argv.prod;

export const clean = () => del(["dist"]);

export const copy = () => {
  return src([
    "src/**/*",
    "!src/{images,js,scss}",
    "!src/{images,js,scss}/**/*",
  ]).pipe(dest("dist"));
};

export const images = () => {
  return src("src/images/**/*.{jpg,jpeg,png,svg,gif}")
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest("dist/images"));
};

export const pot = () => {
  return src("**/*.php")
    .pipe(
      wpPot({
        domain: "app",
        package: "VNV",
      })
    )
    .pipe(dest(`languages/app.pot`));
};

export const scripts = () => {
  return src("src/js/main.js")
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: [],
                },
              },
            },
          ],
        },
        mode: PRODUCTION ? "production" : "development",
        devtool: !PRODUCTION ? "inline-source-map" : false,
        output: {
          filename: "main.js",
        },
      })
    )
    .pipe(dest("dist/js"));
};

export const styles = () => {
  return src("src/scss/main.scss")
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on("error", sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
    .pipe(gulpif(PRODUCTION, cleanCss({ compatibility: "ie8" })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(gulpif(PRODUCTION, csso()))
    .pipe(dest("dist/css"));
};
export const admin_styles = () => {
  return src("src/scss/admin.scss")
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on("error", sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
    .pipe(gulpif(PRODUCTION, cleanCss({ compatibility: "ie8" })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(gulpif(PRODUCTION, csso()))
    .pipe(dest("dist/css"));
};

export const watchForChanges = () => {
  watch("./**/*.scss", styles);
  watch("./**/*.scss", admin_styles);
  watch("src/js/**/*.js", scripts);
  watch("**/*.php", pot);
  watch("src/images/**/*.{jpg,jpeg,png,svg,gif}", images);
  watch(
    ["src/**/*", "!src/{images,js,scss}", "!src/{images,js,scss}/**/*"],
    copy
  );
};

export const dev = series(
  clean,
  parallel(styles, images, copy, scripts),
  watchForChanges
);
export const build = series(
  clean,
  parallel(styles, images, copy, scripts),
  pot
);
export default dev;
