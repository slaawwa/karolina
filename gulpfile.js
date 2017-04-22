'use strict';

var gulp = require('gulp'),
    argv = require('yargs').argv,
    $ = require('gulp-load-plugins')({
        rename: {
            'gulp-git-sftp': 'ggs',
        }
    }),
    CNF = $.ggs.cnf(require('./config/cnf.js')),
    // CNF = $.ggs.cnf(cnf),
    FTP = $.ggs.ftp(CNF);

var CONN = () => {
    return FTP.conn({
        user: argv.user || CNF.user,
        pass: argv.pass || CNF.pass,
        host: argv.host || CNF.host,
    });
};

gulp.task('git', function() {
    
    console.log('CNF:', CNF)
    
    var conn = CONN();
 
    $.ggs.git({
        conn: conn,
        basePath: CNF.basePath,
        remotePath: CNF.remotePath,
    }, function(err) {
        if (err) console.log('ERRROR2:', err);
        console.log('Files from git to FTP is deployed!!!')
        return true;
    });
});


gulp.task('fgit', function() {

    var files = argv.f;
        
    if (!files) return;

  	var conn = CONN();  
    
    files = FTP._file2format( files.split(',') );
    console.log('files:', files)
    
    $.ggs.git({
        conn: conn,
        files: files,
        basePath: CNF.basePath,
        remotePath: CNF.remotePath,
    }, function(err) {
        if (err) console.log('ERRROR2:', err);
        console.log('Files from -f to FTP is deployed!!!')
        return true;
    });

});

gulp.task('deploy', function() {

	var conn = CONN();

    console.log('CNF:')
    console.log('CNF:', CNF)
        
    var conn = FTP.conn({
        user: argv.user || CNF.user,
        pass: argv.pass || CNF.pass,
        host: argv.host || CNF.host,
    });
     
    if (!argv.del) {
        return gulp.src( ['./**/*', '!node_modules{,/**}', '!config{,/**}', '!bower{,/**}', '!bower_components{,/**}', '**/.htaccess'], { base: CNF.basePath, buffer: false } )
            .pipe( $.rename(function(fname) {
                console.info('fname:', fname.basename, fname.extname);
            }))
            .pipe( conn.newer( CNF.remotePath || argv.remotePath ) ) // only upload newer files  
            .pipe( conn.dest( CNF.remotePath || argv.remotePath ) );
    } else {
        // conn.delete(CNF.remotePath+'dd', function(e) { 
        return conn.rmdir(CNF.remotePath, function(e) {
            console.log('deleted:', CNF.remotePath);
        });
    }

});
