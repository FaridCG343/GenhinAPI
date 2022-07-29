function checkUpdate(value) {
    if (value != '0') {
        switch (value) {
            case 'characters':
                url = 'https://genshin-app-api.herokuapp.com/api/characters?infoDataSize=minimal'
                break
            case 'weapons':
                url = 'https://genshin-app-api.herokuapp.com/api/weapons?infoDataSize=minimal'
                break
            case 'enemies':
                url = 'https://genshin-app-api.herokuapp.com/api/enemies'
                break
        }
        fetch(url)
            .then(res => res.json())
            .then(data => {
                cant_opts = data['payload'][value].length + 1
                document.form1.nombre.length = cant_opts
                document.form1.nombre.options[0].value = '-'
                document.form1.nombre.options[0].text = '-'
                for (i = 1; i < cant_opts; i++) {
                    document.form1.nombre.options[i].value = data['payload'][value][i - 1]['name']
                    document.form1.nombre.options[i].text = data['payload'][value][i - 1]['name']
                }
            })
            .catch(err => console.log(err))
    } else {
        document.form1.nombre.length = 1
        document.form1.nombre.options[0].value = '-'
        document.form1.nombre.options[0].text = '-'
    }
}

function mostrar(value) {
    if (value != '-') {
        const aplication = document.querySelector('.container')
        aplication.innerHTML = ''
        cosa = document.form1.tipo[document.form1.tipo.selectedIndex].value
        url = 'https://genshin-app-api.herokuapp.com/api/' + cosa + '/info/' + value

        fetch(url)
            .then(res => res.json())
            .then(data => {
                img = document.createElement('img')
                switch (cosa) {
                    case 'characters':
                        img.setAttribute('src', data['payload']['character']['cardImageURL'])
                        break
                    case 'weapons':
                        img.setAttribute('src', data['payload']['weapon']['iconUrl'])
                        break
                    case 'enemies':
                        img.setAttribute('src', data['payload']['enemy']['iconUrl'])
                        break
                }
                img.setAttribute('width', 200)
                aplication.appendChild(img)
            })
            .catch(err => console.log(err))
    }
}