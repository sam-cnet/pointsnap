requirejs.config({

    baseUrl: 'lib',
    paths: {

	"app": ".."
    },

    shim:{
         'materialize':{
            deps: ['jquery', 'hammerjs', 'jquery.hammer']
         }
    }
});

requirejs(['backbone']);
requirejs(['moment']);
requirejs(['text']);
requirejs(['app.js']);

