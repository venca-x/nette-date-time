module.exports = function (grunt) {

    require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});
    grunt.loadNpmTasks('grunt-shell');

    grunt.initConfig({
        shell: {
            test: {
                command: 'vendor\\bin\\tester tests -s -p php -c tests\\php.ini'
            },
            installNetteCodingStandard: {
                command: 'composer create-project nette/coding-standard nette-coding-standard'
            },
            netteCodingStandard: {
                command: 'php nette-coding-standard\\\\ecs check src tests --config nette-coding-standard\\\\coding-standard-php71.neon'
            },
            netteCodingStandardFIX: {
                command: 'php nette-coding-standard\\\\ecs check src tests --config nette-coding-standard\\\\coding-standard-php71.neon --fix'
            }
        }
    });

    grunt.registerTask('test', ['shell:test']);
    grunt.registerTask('netteCodingStandard', ['shell:netteCodingStandard']);
    grunt.registerTask('netteCodingStandardFIX', ['shell:netteCodingStandardFIX']);

};