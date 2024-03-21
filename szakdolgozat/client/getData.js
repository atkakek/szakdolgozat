async function getData(url, renderFc) {
    const response = await fetch(url)
    const data = await response.json()
    renderFc(data)
}

async function postData(url, renderFc, configObj) {
    const response = await fetch(url, configObj)
    const data = await response.json()
    renderFc(data)
}