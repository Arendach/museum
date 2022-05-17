export default {
    get(path) {
        return fetch(path)
            .then(res => res.json())
    }
}
