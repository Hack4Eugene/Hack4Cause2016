import lcd
import requests
import json

while True:
	# pull values from the server to check for updates
	val = requests.get('http://andrew.local:1337/pull/?id=1')
	rslt = json.loads(val.text)
	color = rslt["response"]["sensors"]["lighting"]["value"]
	print color

	if color == "red":
		# if simone's light is red and no characters on screen
		lcd.setRGB(255, 0, 0)
		lcd.setText("")
	elif color == "blue":
		# if simone's light is blue and no characters on screen
		lcd.setRGB(0, 0, 255)
		lcd.setText("")
	elif color == "purple":
		# if simone's light is purple and no characters on screen
		lcd.setRGB(255, 0, 255)
		lcd.setText("")
