import time
import grovepi
import random
import lcd
import requests
import mote
import json
import fcntl
import socket
import struct
from flask import Flask

#Ports for sensors
redSens = 6
blueSens = 5
#Ports for lights
red = 3
blue = 4

grovepi.pinMode(redSens,"INPUT")
grovepi.pinMode(blueSens,"INPUT")
grovepi.pinMode(red,"OUTPUT")
grovepi.pinMode(blue,"OUTPUT")

gameLength = 10
#Keeps track of what the user has to remember/play back
selectionLog = range(0,gameLength)
readyToPlay = False

lcd.setText("Play Simon!");
lcd.setRGB(128,128,128)

def get_ip_address(ifname):
    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    return socket.inet_ntoa(fcntl.ioctl(
        s.fileno(),
        0x8915,  # SIOCGIFADDR
        struct.pack('256s', ifname[:15])
    )[20:24])


ip = get_ip_address('eth0') + ":5000"

myMote = mote.Mote("Simon", "Dani' Simon", ip)

#Adds listener
url = 'http://andrew.local:1337/add_listener'
header = {'content-type': 'application/json'}
foo = requests.post(url, params=myMote.toDict(), headers=header)
rslt = json.loads( foo.text)
print rslt
id = rslt["response"]["id"]

myMote.id = id
for ob in myMote.capabilities:
    ob.moteId = id

addCapUrl = 'http://192.168.0.101:1337/add_capability'
clist = [ requests.post(addCapUrl, params=ob.toDict(), headers=header) for ob in myMote.capabilities ]

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
    
    return "Success\n"

#Adding capabilities
requests.post("http://andrew.local:1337/add_capability/?moteId=" + id + "&name=led&ioType=" + str(2) + "&port=" + str(red))
requests.post("http://andrew.local:1337/add_capability/?moteId=" + id + "&name=led&ioType=" + str(2) + "&port=" + str(blue))

#Main loop of game
while True:
	lcd.setText("Play Simon!");
	lcd.setRGB(128,128,128)

	readyToPlay = (grovepi.ultrasonicRead(redSens) < 200) or (grovepi.ultrasonicRead(blueSens) < 200)
	if readyToPlay:
		lcd.setText("Let's play!")
		lcd.setRGB(255,0,255)

		#Tells server game is started
		requests.post("http://andrew.local:1337/user_interaction/?id=13371c825290295966131f43f818ecca")
		lost = False
		try:
			#establish light colors
			for item in range(0,gameLength):
				if random.randint(1, 2) == 1:
					selectionLog[item] = 0
				else: 
					selectionLog[item] = 1

			for num in range(0,gameLength):
				#plays lights
				for item in range(0, num):
					if selectionLog[item] == 0:
						grovepi.digitalWrite(red,1)
						grovepi.digitalWrite(blue,0)
						print "red picked"
						requests.post('http://andrew.local:1337/push/?id=1&name=lighting&value=red')
					else:
						grovepi.digitalWrite(blue,1)
						grovepi.digitalWrite(red,0)
						print "blue picked"
						requests.post('http://andrew.local:1337/push/?id=1&name=lighting&value=blue')
					time.sleep(0.5)
					grovepi.digitalWrite(blue,0)
					grovepi.digitalWrite(red,0)
					time.sleep(0.5)
				waiting = True
				outOfTime = False

				#checks user choices
				for item in range(0, num):
					initTime = time.time()
					while(waiting and not lost and not outOfTime):
						outOfTime = (time.time() - initTime) > 10

						if (grovepi.ultrasonicRead(redSens)) < 20:
							if (selectionLog[item] == 0):
								print "Winner!"
								waiting = False
								requests.post('http://andrew.local:1337/push/?id=1&name=lighting&value=red')
								grovepi.digitalWrite(red,1)
								time.sleep(0.5)
								grovepi.digitalWrite(red,0)
								time.sleep(1)
							else:
								print "Loser!"
								waiting = False
								lost = True
								break
								grovepi.digitalWrite(blue,1)
								grovepi.digitalWrite(red,1)
								time.sleep(0.5)
								grovepi.digitalWrite(blue,0)
								grovepi.digitalWrite(red,0)

						if (grovepi.ultrasonicRead(blueSens)) < 20:
							if (selectionLog[item] == 1):
								print "Winner!"
								waiting = False
								requests.post('http://andrew.local:1337/push/?id=1&name=lighting&value=blue')
								grovepi.digitalWrite(blue,1)
								time.sleep(0.5)
								grovepi.digitalWrite(blue,0)
								time.sleep(1)
							else:
								print "Loser!"
								waiting = False
								lost = True
								grovepi.digitalWrite(red,1)
								grovepi.digitalWrite(blue,1)
								time.sleep(0.5)
								grovepi.digitalWrite(red,0)
								grovepi.digitalWrite(blue,0)
								time.sleep(0.5)
			#end of game wrap up
			readyToPlay = False
			if not lost:
				lcd.setText("You won!")
				lcd.setRGB(0,255,0)
				requests.post("http://andrew.local:1337/points/?id=a541dddab6cb3ad680053f55559ad394&points=100")
				requests.post('http://andrew.local:1337/push/?id=1&name=lighting&value=purple')
				for item in range(0,8):
					grovepi.digitalWrite(red,1)
					grovepi.digitalWrite(blue,0)
					time.sleep(0.1)
					grovepi.digitalWrite(red,0)
					grovepi.digitalWrite(blue,1)
					time.sleep(0.1)
			else:
				requests.post("http://andrew.local:1337/points/?id=a541dddab6cb3ad680053f55559ad394&points=-10")
				lcd.setText("Try again next time")
				lcd.setRGB(128,128,128)
				time.sleep(3)
		except TypeError:
				print(TypeError)
		except IOError:
				print(IOError)
