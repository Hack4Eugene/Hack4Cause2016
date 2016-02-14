# -*- coding: utf-8 -*-
"""
Created on Sun Feb 14 08:28:34 2016

@author: South Eugene Robotics Team

ParcadeArcade gameElement
This is intended to encapsulate the general case of a game element.
"""


import grovepi
import lcd
import requests
import json
import mote
import socket
import fcntl
import struct
from flask import Flask, request

# create a mote object to track the device specific bit
mote = mote.Mote( "Name", "Description", "10.0.0.1" )
myId = configure()

# create the device specific I/O
greenLed = 2
grovepi.pinMode( greenLed, "OUTPUT" )

button1 = 3
grovepi.pinMode( button1, "INPUT" )

# call game()

# create a web listener hook 
app = Flask(__name__)

app.run(host = '0.0.0.0')

# configure this device by reading its config.ini
def configure( self ):    
    self.mote.loadConfig()

    url = 'http://andrew.local:1337/add_listener'
    header = {'content-type': 'application/json'}
    foo = requests.post(url, params=self.mote.toDict(), headers=header)
    rslt = json.loads( foo.text)
    id = rslt["response"]["id"]
    self.mote.id = id
    
    for ob in self.mote.capabilities:
        ob.moteId = id
        
    # send a test signal
    #grovepi.digitalWrite( greenLed, 0 )
    
    addCapUrl = 'http://andrew.local:1337/add_capability'
    clist = [ requests.post(addCapUrl, params=ob.toDict(), headers=header) for ob in self.mote.capabilities ]
    
    print(self.mote.id)
    print(self.mote.name)
    print(self.mote.description)
    
    lcd.settext( self.mote.name )

    return id


@app.route("/set", methods=['POST'])
def respond():

    port = request.args["port"]
    value = request.args["value"]
    ioType = request.args["ioType"]
    
    print( 'port: ' + port )
    print( 'value: ' + value )
    print( 'ioType: ' + ioType )
    
    grovepi.digitalWrite( int(port), int(value) )

    # ToDo: validate that this capability exists    

    return "Success\n"


# hack to get this device's ip address
def get_ip_address(ifname):
    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    return socket.inet_ntoa(fcntl.ioctl(
        s.fileno(),
        0x8915,  # SIOCGIFADDR
        struct.pack('256s', ifname[:15])
    )[20:24])