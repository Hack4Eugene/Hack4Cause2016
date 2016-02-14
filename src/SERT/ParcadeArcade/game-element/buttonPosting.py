import grovepi
import urllib2
import json
import time
import requests
import lcd

#ports for buttons that will be updating values in the database
button1 = 2
button2 = 3

piID = 1
lcd.setText("Hi, I'm pi number" + str(piID))
while (true):
    #if the value isnt already one, set it to one when the corresponding button's pressed
    if (json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=").read())["response"]["sensors"]["button1"]["value"] == 0):
        requests.post("http://andrew.local:1337/push/?id=" + piID + "&name=button1&value=" + \
        grovepi.digitalRead(button1))
    if (json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=").read())["response"]["sensors"]["button2"]["value"] == 0):
        requests.post("http://andrew.local:1337/push/?id=" + piID + "&name=button2&value=" + \
        grovepi.digitalRead(button2))
    time.sleep(.1)
