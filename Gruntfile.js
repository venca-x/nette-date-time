module.exports = function (grunt) {

    require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});
    grunt.loadNpmTasks('grunt-shell');

    grunt.initConfig({
        shell: {
            test: {
                //command: 'vendor\\bin\\tester.bat -c tests/php.ini tests'
                command: 'vendor\\bin\\tester tests -s -p php -c tests\\php.ini'
            }
        }
    });

    grunt.registerTask('test', ['shell:test']);

};