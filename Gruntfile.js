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
    },

    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: {
          'css/non-responsive.css': 'scss/non-responsive.scss',
          'css/admin/customizer.css': 'scss/admin/customizer.scss',
          'style.css': 'scss/style.scss'
        }
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-sass');
};