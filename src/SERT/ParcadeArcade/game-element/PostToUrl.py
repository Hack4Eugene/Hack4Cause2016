# -*- coding: utf-8 -*-
"""
Created on Fri Feb 12 23:26:00 2016

@author: South Eugene Robotics Team
"""
# provides an example of a Game connecting to the Server

import grovepi
import requests
import json
import lcd
import mote
import subprocess

import socket
import fcntl
import struct

def get_ip_address(ifname):
    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    return socket.inet_ntoa(fcntl.ioctl(
        s.fileno(),
        0x8915,  # SIOCGIFADDR
        struct.pack('256s', ifname[:15])
    )[20:24])

print get_ip_address('lo')
print get_ip_address('eth0')

ip = get_ip_address('eth0') + ":5000"

greenLed = 2
grovepi.pinMode( greenLed, "OUTPUT" )
grovepi.digitalWrite( greenLed, 1 )

lcd.setRGB( 128, 0, 0 ) # red

myMote = mote.Mote( "Flasher", "Simple Flasher", ip )

#myMote.addCapability( mote.Capability( "Button 1", 2, 1 ) )
#myMote.addCapability( mote.Capability( "Button 2", 3, 1 ) )
myMote.addCapability( mote.Capability( "Green LED", 2, 2 ) )

url = 'http://andrew.local:1337/add_listener'
header = {'content-type': 'application/json'}
foo = requests.post(url, params=myMote.toDict(), headers=header)
rslt = json.loads( foo.text)
id = rslt["response"]["id"]
myMote.id = id

for ob in myMote.capabilities:
    ob.moteId = id
    

grovepi.digitalWrite( greenLed, 0 )

addCapUrl = 'http://andrew.local:1337/add_capability'
clist = [ requests.post(addCapUrl, params=ob.toDict(), headers=header) for ob in myMote.capabilities ]

print(myMote.id)

from flask import Flask, request
app = Flask(__name__)

@app.route("/", methods=['POST'])
def receive_json():
    content = request.get_json()
    if content is None:
        return "Unable to retrieve JSON\n"
    print(content)
    return "Success\n"

@app.route("/set", methods=['POST'])
def respond():

    port = request.args["port"]
    value = request.args["value"]
    ioType = request.args["ioType"]
    
    print( 'port: ' + port )
    print( 'value: ' + value )
    print( 'ioType: ' + ioType )
    
    grovepi.digitalWrite( int(port), int(value) )
    
#    for ob in myMote.capabilities:
#        print ob.name + " " + ob.port + " " + ob.value
        
#        if int(port) == ob.port and int(ioType) == ob.ioType:     
#            grovepi.digitalWrite( ob.port, ob.value )
#            print "setting port: " + port + "  ioType: " + ioType
#        else:
#            print "port: " + port + "  ioType: " + ioType
    
    return "Success\n"


app.run(host = '0.0.0.0')

