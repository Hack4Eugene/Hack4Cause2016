/**
 * Node.js back-end server for ParcadeArcade.
 *
 * Created by the South Eugene Robotics Team
 */

var express = require('express');
var app = express();
var md5 = require('md5');
var fs = require('fs');
var request = require('request');
var bodyParser = require('body-parser');
var handlebars = require('handlebars');
var mongo = require('mongodb');

var port = process.env.PORT || 1337;
var mongoCredentials = {
    'username': 'admin',
    'password': '4dm1n_u53r',
    'database': 'ds061385.mongolab.com:61385/parcade-arcade'
};
/*var mongoCredentials = {
    'username': 'ADMIN',
    'password': 'ADMIN PASSWORD',
    'database': 'dsXXXXXX.mongolab.com:XXXXX/database'
};*/

var handle = handlebars.compile(fs.readFileSync('./html/table.html', 'utf8'));

mongo.connect('mongodb://' + mongoCredentials.username + ':' + mongoCredentials.password + '@' + mongoCredentials.database, function(err, db) {
    app.get('/', function(req, res) {
        var cursor = db.collection('listeners').find();

        var info = [];

        cursor.each(function(err, doc) {
            if (doc !== null) {
                var capability = [];

                console.log(doc.capabilities[0])
                doc.capabilities.forEach(function(capa) {
                    capability.push(capa.name);
                });
                info.push({
                    'name': doc.name,
                    'capabilities': capability.join(', '),
                    'time': Math.floor(Date.now() / 1000) - doc.last_interaction + ' seconds ago'
                });
            } else {
                res.end(handle({
                    info: info
                }));
            }
        });
    });

    /**
     * On a POST request to /points, add points to the user with a specific
     * userId.
     *
     * POST http://127.0.0.1/points/?id=13371c825290295966131f43f818ecca&points=5
     * ...
     * {
     *   "success": true,
     *   "points": 25
     * }
     *
     */
    app.post('/points', function(req, res) {
        var query = req.query;

        if (query.id && query.points) {
            var cursor = db.collection('users').find({
                'id': query.id
            });

            res.setHeader('Content-Type', 'application/json');

            cursor.each(function(err, doc) {
                if (doc !== null) {
                    db.collection('users').update({
                        'id': query.id
                    }, {
                        'id': query.id,
                        'points': parseInt(doc.points) + parseInt(query.points)
                    });

                    res.end(JSON.stringify({
                        'success': true,
                        'points': parseInt(doc.points) + parseInt(query.points)
                    }));
                } else {
                    res.end(JSON.stringify({
                        'success': false,
                        'error': 'No users document with id: ' + query.id
                    }));
                }
            });
        } else {
            res.end(JSON.stringify({
                'success': false,
                'error': 'Missing parameters'
            }));
        }
    });

    /**
     * On a POST request to /create_user, add a user to our MongoDB server
     * using the md5 hash of the user's remote IP address as their userId.
     *
     * POST http://127.0.0.1/create_user
     * ...
     * {
     *   "success": true,
     *   "id": "13371c825290295966131f43f818ecca"
     * }
     *
     */
    app.post('/create_user', function(req, res) {
        var userId = md5(req.headers['x-forwarded-for'] || req.connection.remoteAddress);

        res.setHeader('Content-Type', 'application/json');

        db.collection('users').insert({
            'id': userId,
            'points': 0
        });

        res.end(JSON.stringify({
            'success': true,
            'id': userId
        }));
    });

    /**
     * On a POST request to /push, replace the database's sensor value with the
     * specified id to the specified value.
     *
     * POST http://127.0.0.1/push/?name=ultrasonic&id=1&value=123
     * ...
     * {
     *   "success": true,
     *   "response": {
     *     "name": "ultrasonic",
     *     "sensors": {
     *       "1": "123"
     *     }
     *   }
     * }
     *
     */
    app.post('/push', function(req, res) {
        var query = req.query;

        res.setHeader('Content-Type', 'application/json');

        var cursor = db.collection('sensors').find({
            'id': query.id
        });

        cursor.count(function(err, count) {
            var time = Math.floor(Date.now() / 1000);

            if (count > 0) {
                cursor.each(function(err, doc) {
                    if (doc !== null) {
                        var sensors = doc.sensors;

                        if (!doc.sensors) {
                            sensors = {};
                        }

                        sensors[query.name] = {
                            'value': query.value,
                            'timestamp': time
                        }

                        db.collection('sensors').update({
                            'id': query.id
                        }, {
                            'id': query.id,
                            'sensors': sensors,
                            'timestamp': time
                        });

                        res.end(JSON.stringify({
                            'success': true,
                            'response': {
                                'id': query.id,
                                'sensors': sensors
                            }
                        }));
                    }
                });
            } else {
                var sensors = {};

                sensors[query.name] = {
                    'value': query.value,
                    'timestamp': time
                }

                db.collection('sensors').insert({
                    'id': query.id,
                    'sensors': sensors
                });

                res.end(JSON.stringify({
                    'success': true,
                    'response': {
                        'id': query.id,
                        'sensors': sensors
                    }
                }));
            }
        });
    });

    /**
     * On a POST request to /add_listener, update or insert the database's
     * values for the listener with the specified id.
     *
     * POST http://127.0.0.1/add_listener/?id=1&capabilities={ CAPABILITIES-JSON }
     * ...
     * {
     *   "success": true,
     *   "response": {
     *     "ip": "127.0.0.1",
     *     "id": "1",
     *     "capabilities": { CAPABILITIES-JSON }
     *   }
     * }
     *
     */
    app.post('/add_listener', function(req, res) {
        var query = req.query;
        var time = Math.floor(Date.now() / 1000);

        console.log(query);

        if (query.name && query.description) {
            var cursor = db.collection('listeners').find({
                'ip': query.ip
            });

            res.setHeader('Content-Type', 'application/json');

            cursor.count(function(err, count) {
                if (count > 0) {
                    db.collection('listeners').update({
                        'ip': query.ip
                    }, {
                        'ip': query.ip,
                        'id': md5(query.ip),
                        'name': query.name,
                        'description': query.description,
                        'capabilities': [],
                        'timestamp': time,
                        'last_interaction': time
                    });
                } else {
                    db.collection('listeners').insert({
                        'ip': query.ip,
                        'id': md5(query.ip),
                        'name': query.name,
                        'description': query.description,
                        'capabilities': [],
                        'timestamp': time,
                        'last_interaction': time
                    });
                }

                res.end(JSON.stringify({
                    'success': true,
                    'response': {
                        'ip': query.ip,
                        'id': md5(query.ip),
                        'timestamp': time
                    }
                }));
            });
        } else {
            res.end(JSON.stringify({
                'success': false,
                'error': 'Missing parameters'
            }));
        }
    });

    /**
     * On a POST request to /add_capability, add a capability to the listener
     * with the specified id (as moteId).
     *
     * POST http://127.0.0.1/add_capability/?moteId=13371c825290295966131f43f818ecca&name=led&ioType=2&port=1
     * ...
     * {
     *   "success": true
     * }
     *
     */
    app.post('/add_capability', function(req, res) {
        var query = req.query;

        console.log(query);

        if (query.moteId && query.name && query.ioType && query.port) {
            var cursor = db.collection('listeners').find({
                'id': query.moteId
            });

            cursor.count(function(err, count) {
                if (count > 0) {
                    cursor.each(function(err, doc) {
                        if (doc !== null) {
                            var capabilities = doc.capabilities;

                            capabilities.push({
                                'name': query.name,
                                'ioType': query.ioType,
                                'port': query.port
                            });

                            db.collection('listeners').update({
                                'id': query.moteId
                            }, {
                                'ip': doc.ip,
                                'id': query.moteId,
                                'name': doc.name,
                                'description': doc.description,
                                'capabilities': capabilities,
                                'timestamp': doc.timestamp,
                                'last_interaction': doc.last_interaction
                            });
                        } else {
                            res.end(JSON.stringify({
                                'success': false,
                                'error': 'Specified id does not exist'
                            }));
                        }
                    });
                }

                res.end(JSON.stringify({
                    'success': true
                }));
            });
        } else {
            res.end(JSON.stringify({
                'success': false,
                'error': 'Missing parameters'
            }));
        }
    });

    /**
     * On a POST request to /user_interaction, update the database with the
     * current unix time stamp. This will be called by the listeners whenever
     * a user interacts with them.
     *
     * POST http://127.0.0.1/user_interaction/?id=13371c825290295966131f43f818ecca
     * ...
     * {
     *   "success": true
     * }
     *
     */
    app.post('/user_interaction', function(req, res) {
        var query = req.query;
        var time = Math.floor(Date.now() / 1000);

        if (query.id) {
            var cursor = db.collection('listeners').find({
                'id': query.id
            });

            cursor.each(function(err, doc) {
                if (doc !== null) {
                    db.collection('listeners').update({
                        'id': query.id
                    }, {
                        'ip': doc.ip,
                        'id': doc.id,
                        'name': doc.name,
                        'description': doc.description,
                        'capabilities': doc.capabilities,
                        'timestamp': doc.timestamp,
                        'last_interaction': time
                    });
                } else {
                    res.end(JSON.stringify({
                        'success': false,
                        'error': 'Could not get document with id: ' + query.id
                    }));
                }
            });

            res.end(JSON.stringify({
                'success': true
            }));
        } else {
            res.end(JSON.stringify({
                'success': false,
                'error': 'Missing parameters'
            }));
        }
    });

    /**
     * On a GET request to /pull, retrieve information from the database with
     * the specified name and id.
     *
     * GET http://127.0.0.1/pull/?name=ultrasonic&id=1
     * ...
     * {
     *   "success": true,
     *   "response": {
     *     "name": "ultrasonic",
     *     "id": "1",
     *     "value": "123"
     *   }
     * }
     *
     */
    app.get('/pull', function(req, res) {
        var query = req.query;

        res.setHeader('Content-Type', 'application/json');

        var cursor = db.collection('sensors').find({
            'id': query.id
        });

        cursor.each(function(err, doc) {
            if (doc !== null) {
                var sensors = doc.sensors;

                if (!doc.sensors) {
                    sensors = {};
                }

                res.end(JSON.stringify({
                    'success': true,
                    'response': {
                        'id': query.id,
                        'sensors': sensors
                    }
                }));
            } else {
                res.end(JSON.stringify({
                    'success': false,
                    'error': 'Could not find id: ' + query.id
                }));
            }
        });
    });

    /**
     * On a get request to /get_points, check the number of points the provided
     * user currently has.
     *
     * GET http://127.0.0.1/get_points/?id=13371c825290295966131f43f818ecca
     * ...
     * {
     *   "success": true,
     *   "id": "13371c825290295966131f43f818ecca"
     *   "points": 25
     * }
     *
     */
    app.get('/get_points', function(req, res) {
        var query = req.query;

        if (query.id) {
            var cursor = db.collection('users').find({
                'id': query.id
            });

            res.setHeader('Content-Type', 'application/json');

            cursor.each(function(err, doc) {
                if (doc !== null) {
                    res.end(JSON.stringify({
                        'success': true,
                        'id': query.id,
                        'points': doc.points
                    }));
                } else {
                    res.end(JSON.stringify({
                        'success': false,
                        'error': 'No users document with id: ' + query.id
                    }));
                }
            });
        } else {
            res.end(JSON.stringify({
                'success': false,
                'error': 'Missing parameters'
            }));
        }
    });

    /**
     * Send a message to all connected listener pi's every 5 seconds
     */
    var state = 0;

    setInterval(function() {
        var cursor = db.collection('listeners').find();

        state = state ? 0 : 1;

        cursor.each(function(err, doc) {
            if (doc !== null) {
                if (doc.capabilities) {
                    if (doc.capabilities[0]) {
                        request.post('http://' + doc.ip + '/set?ioType=' + doc.capabilities[0].ioType + '&port=' + doc.capabilities[0].ioType + '&value=' + state, function(err, response, body) {
                            if (err) {
                                console.log(err);

                                /*db.collection('listeners').remove({
                                    'ip': doc.ip
                                });*/
                            } else if (response.statusCode !== 200) {
                                console.log(response.statusCode);
                            }
                        });
                    }
                }
            }
        });
    }, 5000);

    /**
     * Start listening on the specified port.
     */
    app.listen(port, function() {
        console.log('Listening at port', port);
    });
});

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));

app.use(express.static(__dirname + '/public'));
