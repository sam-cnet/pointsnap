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

requirejs(['picker.date']);
requirejs(['picker.time']);
requirejs(['backbone']);
requirejs(['text']);
requirejs(['app.js']);

