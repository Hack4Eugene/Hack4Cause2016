var api = {
    postReport(report){
        var apiKey = `Zk!YM7khp6tLzF3eySXv`;
        var url = `http://52.91.167.0/wp-json/wp_red_caps/v1/incident`;
        return fetch(url, {
            method: 'POST',
            headers: {
                'apikey': apiKey,
                'issue_id': '',
                'reporter_id': '3',
                'report_time': Date.now(),
                'impact': '4',
                'lat': '44.049809',
                'lng': '-123.092764',
                'type': 'vagrancy',
                'business_name': 'Sizzle Pie',
                'notes': '',
                'images': '',
                'police_contacted': '0'
            }
        });
    }
};

module.exports = api;