import Analytics from 'analytics'
import googleAnalytics from '@analytics/google-analytics'

const analytics = Analytics({
    app: 'awesome-app',
    plugins: [
        googleAnalytics({
            trackingId: 'UA-168799050-1'
        })
    ]
});

export default () => {
    return analytics.page();
}
