try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}
// window.axios = require('axios');
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('./sedona.js');
// require('./vue-init');