window.translationStorage = {translations};

window.__t = function (phraseOrigin, replacements) {
    function lowerCaseKeys(obj) {
        let result = {}
        for (let key in obj) {
            result[key.toLowerCase()] = obj[key]
        }
        return result
    }

    let phrase = phraseOrigin
    let key = phraseOrigin.toLowerCase()
    let storage = lowerCaseKeys(window.translationStorage)

    if (!storage[key]) {
        fetch('/api/translations/create', {
            method: 'post',
            body: JSON.stringify({phrase}),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-Token': document.querySelector('[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })
            .then(res => res.json())
            .then(res => console.log(res.message))
            .catch(res => console.log('Error added translation'))
    } else {
        phrase = storage[key]
    }

    if (typeof replacements === 'object') {
        for (let k in replacements) {
            phrase = phrase.replace(k, replacements[k])
        }
    }

    return phrase
}

