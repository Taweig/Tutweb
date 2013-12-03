module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: false
      },
      application: {
        src: ['assets/js/_*.js'],
        dest: 'assets/js/<%= pkg.name %>.js'
      },
      plugins: {
        src: ['assets/js/plugins/*.js'],
        dest: 'assets/js/<%= pkg.name %>.plugins.js'
      }
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      application: {
        src: '<%= concat.application.dest %>',
        dest: 'assets/js/<%= pkg.name %>.min.js'
      },
      plugins: {
        src: '<%= concat.plugins.dest %>',
        dest: 'assets/js/<%= pkg.name %>.plugins.min.js'
      }
    },
/*
    clean: {
      dist: ['dist']
    },
    copy: {
      bootstrap: {
        files: [{expand: true, src: ['bootstrap/**'], dest: 'assets/'}]
      },
      vendor: {
        files: [{expand: true, src: ['js/vendor/*'],  dest: 'assets/js/vendor'}]
      },
      fonts: {
        files: [{expand: true, src: ['fonts/**'],     dest: 'assets/'}]
      },
      images: {
        files: [{expand: true, src: ['images/**'],    dest: 'assets/'}]
      }
    },
*/
    jshint: {
      files: ['Gruntfile.js', 'assets/js/_*.js'],
      options: {
        // options here to override JSHint defaults
        globals: {
          jQuery: true,
          console: true,
          module: true,
          document: true
        }
      }
    },
    
    recess: {
      options: {
        compile: true,
        banner: '<%= banner %>'
      },
      flat: {
        src: ['assets/less/flat-ui.less'],
        dest: 'assets/css/flat-ui.css'
      },
      flat_min: {
        options: {
          compress: true
        },
        src: ['assets/less/flat-ui.less'],
        dest: 'assets/css/flat-ui.min.css'
      },
      theme: {
        src: ['assets/less/theme.less'],
        dest: 'assets/css/<%= pkg.name %>-theme.css'
      },
      theme_min: {
        options: {
          compress: true
        },
        src: ['assets/less/theme.less'],
        dest: 'assets/css/<%= pkg.name %>-theme.min.css'
      }
    },
    
    
    watch: {
      recess: {
        files: 'assets/less/*.less',
        tasks: ['recess']
      },
      jshint: {
        files: ['<%= jshint.files %>'],
        tasks: ['jshint','concat','uglify']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-qunit');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-recess');

  grunt.registerTask('test', ['jshint']);
  
  // JS distribution task.
  grunt.registerTask('dist-js', ['concat', 'uglify']);

  // CSS distribution task.
  grunt.registerTask('dist-css', ['recess']);

  // COPY distribution task.
  /* grunt.registerTask('dist-copy', ['copy']); */
  
  // Full distribution task.
  grunt.registerTask('dist', [ /*'clean', 'copy', */ 'dist-css', 'dist-js']);


  grunt.registerTask('default', ['jshint', 'dist']);

};