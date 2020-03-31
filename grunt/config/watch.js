module.exports = {
    sass: {
        files: '_scss/*.scss',
        tasks: ['sass:dist']
    },
    js: {
        files:  ['bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.min.js', '_js/*.js'],
        tasks: ['concat:js']
    },
    copy: {
        files: ['_img/*','_php/*'],
        tasks: ['copy:images','copy:php']
    },
    assemble: {
        files: ['_build/layouts/main.hbs', '_build/pages/*.hbs','_build/components/**/*.hbs'],
        tasks: ['assemble']
    }
};