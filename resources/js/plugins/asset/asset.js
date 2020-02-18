export default class Asset {
    constructor(vue) {
        this.vue = vue;
    }

    url(path, fallback = null) {
        if (! path) path = fallback;
        if (! window.ASSET_URL) return path;
        if (! path.startsWith('/')) path = '/' + path;

        return window.ASSET_URL + path;
    }
}
