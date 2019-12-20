// var gulp = require('gulp');

// gulp.task('defoult', defaultTask);

// function defaultTask(done) {
//     // place code for your default task here
//     done();
// }

import gulp from 'gulp';

export const hello = (done) => {
    console.log('hello');
    done();
}

export default hello;