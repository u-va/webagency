module.exports = function(grunt) {
   grunt.initConfig({
      sass: {
         options: {
            includePaths: ['bower_components/foundation/scss', 'bower_components/font-awesome/scss']
         },
         dist: {
            options: {
               outputStyle: 'compressed',
               sourceMap: true,
            },
            files: {
               'css/app.css': 'scss/app.scss'
            }
         }
      },
      watch: {
         grunt: {
            options: {
               reload: true
            },
            files: ['Gruntfile.js']
         },
         sass: {
            files: 'scss/**/*.scss',
            tasks: ['sass']
         }
      }
   });

   grunt.loadNpmTasks('grunt-sass');
   grunt.loadNpmTasks('grunt-contrib-watch');

   grunt.registerTask('build', ['sass']);
   grunt.registerTask('default', ['build','watch']);
}