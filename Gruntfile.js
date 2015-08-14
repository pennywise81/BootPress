module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    uglify: {
      my_target: {
        options: {
          sourceMap: true,
          sourceMapName: 'js/min/sticky_footer.min.js.map'
        },
        files: {
          'js/min/sticky_footer.min.js': ['js/sticky_footer.js']
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
};