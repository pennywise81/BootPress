var distpath = 'bootstrap-release';
var version = '0.2.5 (2015-08-23)';

module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    uglify: {
      stickyfooter: {
        options: {
          sourceMap: true,
          sourceMapName: 'js/min/sticky_footer.min.js.map'
        },
        files: {
          'js/min/sticky_footer.min.js': ['js/sticky_footer.js']
        }
      },
      defercss: {
        options: {
          sourceMap: true,
          sourceMapName: 'js/min/defer-css.min.js.map'
        },
        files: {
          'js/min/defer-css.min.js': ['js/defer-css.js']
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
          'css/abovethefold.css': 'scss/abovethefold.scss',
          'style.css': 'scss/style.scss'
        }
      }
    },

    watch: {
      css: {
        files: ['**/*.scss'],
        tasks: ['sass']
      },
      js: {
        files: ['js/*.js'],
        tasks: ['uglify']
      }
    },

    clean: {
      options: {
        force: true
      },
      builddir: ['../' + distpath + '/**/*']
    },

    copy: {
      php: {
        files: [{
          expand: true,
          src: ['**/*.php'],
          dest: '../' + distpath + '/',
          filter: 'isFile'
        }],
        // replacing paths to js files in init_theme.php
        options: {
          process: function (content, srcpath) {
            content = content.replace(
              "/vendor/jquery/dist",
              "/js"
            );

            content = content.replace(
              "/vendor/bootstrap-sass/assets/javascripts",
              "/js"
            );

            content = content.replace(
              "/vendor/enquire/dist",
              "/js"
            );

            content = content.replace(
              /\/js\/min/gi,
              "/js"
            );

            return content;
          },
        },
      },
      css: {
        files: [{
          expand: true,
          src: ['style.css', 'css/*.css'],
          dest: '../' + distpath + '/',
          filter: 'isFile'
        }],
        options: {
          process: function (content, srcpath) {
            content = content.replace(
              "BootPress Development Version",
              "BootPress"
            );

            content = content.replace(
              " <strong>This is the development version.</strong>",
              ""
            );

            content = content.replace(
              /vendor\/bootstrap-sass\/assets\/fonts\/bootstrap\//gi,
              "fonts/"
            );

            return content;
          },
        },
      },
      images: {
        files: [{
          expand: true,
          src: ['screenshot.png', 'img/**'],
          dest: '../' + distpath + '/',
          filter: 'isFile'
        }]
      },
      javascript: {
        files: [{
          expand: true,
          src: [
            'js/min/sticky_footer.min.js',
            'js/min/defer-css.min.js',
            'vendor/jquery/dist/jquery.min.js',
            'vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'vendor/enquire/dist/enquire.min.js',
          ],
          dest: '../' + distpath + '/js/',
          filter: 'isFile',
          flatten: true
        }]
      },
      fonts: {
        files: [{
          expand: true,
          src: ['vendor/bootstrap-sass/assets/fonts/bootstrap/*.*'],
          dest: '../' + distpath + '/fonts/',
          filter: 'isFile',
          flatten: true
        }]
      },
    },

    'string-replace': {
      versionize: {
        files: [{
          expand: true,
          src: ['README.md', 'scss/style.scss'],
          filter: 'isFile'
        }],
        options: {
          replacements: [{
            pattern: /Version: .*/ig,
            replacement: 'Version: ' + version
          }]
        }
      }
    },

  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-string-replace');

  grunt.registerTask('build', ['string-replace:versionize', 'sass', 'clean', 'copy']);
};