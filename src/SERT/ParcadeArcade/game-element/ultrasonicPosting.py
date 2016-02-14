import grovepi
import urllib2
import json
import time
import requests
import lcd

#ports for buttons that will be updating values in the database
sensor1 = 2
sensor2 = 3

button1 = 0
button2 = 0

piID = 2
lcd.setText("Hi, I'm pi number" + str(piID))
while (true):
    if (grovepi.ultrasonicRead(sensor1) <= 10)
        button1 = 1
    if (grovepi.ultrasonicRead(sensor2) <= 10)
        button2 = 1

    #if the value isnt already one, set it to one when the corresponding button's pressed
    if (json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=").read())["response"]["sensors"]["button1"]["value"] == 0):
        requests.post("http://andrew.local:1337/push/?id=" + piID + "&name=button1&value=" + button1)
    if (json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=").read())["response"]["sensors"]["button2"]["value"] == 0):
        requests.post("http://andrew.local:1337/push/?id=" + piID + "&name=button2&value=" + button2)
    time.sleep(.1)
