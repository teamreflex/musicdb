import Asset from './asset';

export default {
    install(vue, options) {
        vue.prototype.$asset = new Asset(vue);
    }
}
