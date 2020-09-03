//ユーザーの現在の位置情報を取得
const get_location = () => {
    return new Promise((resolve, reject) => {
        navigator.geolocation.getCurrentPosition(position => {
            resolve ({
                status: 0,
                lat: position.coords.latitude,
                lng: position.coords.longitude
            })
        }, e => {
            reject( {
                status: e.code
            })
        })
    })
}

export default () => {
    return get_location();
}
