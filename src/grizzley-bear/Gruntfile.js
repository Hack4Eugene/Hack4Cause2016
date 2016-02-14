module.exports = function(grunt) {
	require('load-grunt-tasks')(grunt);
	grunt.initConfig({
		clean: {
			build: 'build',
			temp: '.tmp',
			optimized: {
				files: [
					{ src: 'build/bower_components' },
					{ src: 'build/js/controllers' },
					{ src: 'build/js/services' },
					{ src: 'build/templates.js' },
					{ src: 'build/views' },
					{ src: 'build/bower.json' }
				]
			}
		},
		copy: {
			files: {
				cwd: 'client',
				src: '**/*',
				dest: 'build',
				expand: true
			},
			fonts: {
				files: [
					{
						cwd: 'client/bower_components/font-awesome',
						src: 'fonts/*',
						dest: 'build',
						expand: true
					},
					{
						cwd: 'client/bower_components/bootstrap',
						src: 'fonts/*',
						dest: 'build',
						expand: true
					}
				]
			}
		},
		'string-replace': {
			min: {
				files: [{
					expand: true,
					cwd: 'build',
					src: 'index.html',
					dest: 'build'
				}],
				options: {
					replacements: [
						{
							pattern: /<\!-- build:js js\/app\.js -->(\s|\S)*<\!-- endapp -->/,
							replacement: '<script src="js/app.js"></script>'
						},
						{
							pattern: /<\!-- build:css styles\/styles\.css -->(\s|\S)*<\!-- endcss -->/,
							replacement: '<link rel="stylesheet" href="styles/styles.css">'
						}
					]
				}
			}
		},
		useminPrepare: {
			html: 'build/index.html',
			options: {
				dest: 'build'
			}
		},
		ngtemplates: {
			fifteenApp: {
				cwd: 'client',
				src: 'views/*.html',
				dest: 'build/templates.js',
				options: {
					usemin: 'js/app.js',
					htmlmin: {
						collapseWhitespace: true,
						removeComments: true
					}
				}
			}
		},
		htmlmin: {
			build: {
				options: {
					collapseWhitespace: true,
					removeComments: true,
					minifyJS: true
				},
				files: {
					'build/index.html': 'build/index.html'
				}
			}
		}
	});
	grunt.registerTask('compress', ['useminPrepare', 'ngtemplates', 'concat', 'uglify', 'cssmin', 'string-replace:min', 'copy:fonts', 'clean:temp', 'clean:optimized', 'htmlmin']);
	grunt.registerTask('copyFiles', ['clean:build', 'copy:files']);
	grunt.registerTask('build', ['copyFiles', 'compress']);
	grunt.registerTask('dev', ['copyFiles']);
	grunt.registerTask('default', ['build']);
};
