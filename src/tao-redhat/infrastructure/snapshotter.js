var AWS = require('aws-sdk'); 
AWS.config.region = 'us-east-1';

// how many snapshots to keep.
var ss_to_keep = 3;

var ec2 = new AWS.EC2();

// we'll make the script work for any instances on the account.
// For that reason we'll get all that are running
ec2.describeInstances({}, function(err, data) {
    // hackathon is not that place for proper error handling
    if (err)
        console.log(err);

    // we need to weed though the verbose sdk output and just get just the root volume IDs for running instances
    var volumes = [];

    // flattening loop with running (state=16) conditionals
    for (var i = 0; i < data.Reservations.length; i++) {
        data.Reservations[i].Instances.forEach(function (item) {
            if (item.State.Code == 16) {
                for (var j = 0; j < item.BlockDeviceMappings.length; j++) {
                    // we just want the root volume
                    if (item.BlockDeviceMappings[j].DeviceName == '/dev/xvda') {
                        volumes.push({
                            'name': item.InstanceId,
                            'rootvol': item.BlockDeviceMappings[j].Ebs.VolumeId
                        });
                    }
                } // end for
            } // end if
        });
    }

    // now loop through the instance IDs and create the snapshots
    for (var i = 0; i < volumes.length; i++) {
        var params = {
            VolumeId: volumes[i].rootvol,
            Description: Date.now()+'_DR backup for instance: '+volumes[i].name
        }
        ec2.createSnapshot(params, function(err, data) {
            if (err)
                console.log(err, err.stack); // an error occurred
            else
                console.log(data);           // successful response
        });
    }
});

// now for cost control we will keep only the last 5 snapshots
params = {
    OwnerIds: [ '799122688199' ]
}
ec2.describeSnapshots(params, function(err, data) {
    if (err)
        console.log(err);

    ss_desc = [];
    for (var i = 0; i < data.Snapshots.length; i++) {
        ss_desc.push({
            'sortField': data.Snapshots[i].Description,
            'ssid': data.Snapshots[i].SnapshotId
        });
    }

    ss_desc = ss_desc.sort(compare).reverse();

    // for we have more snapshots than defined we need to delete the oldest
    if (ss_desc.length > ss_to_keep) {
        for (i = ss_to_keep; i < ss_desc.length; i++) {
            var params = {
                SnapshotId: ss_desc[i].ssid 
            }
            ec2.deleteSnapshot(params, function(err, data) {
                if (err)
                    console.log(err, err.stack); // an error occurred
                else
                    console.log(data);           // successful response
            });
        }
    }
});

// function to sort an array of objects using a string in the object
function compare(a,b) {
    if (a.sortField < b.sortField)
        return -1;
    else if (a.sortField > b.sortField)
        return 1;
    else 
        return 0;
}
