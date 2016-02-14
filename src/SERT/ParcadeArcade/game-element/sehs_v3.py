
import time
import grovepi
import lcd

# Connect the Grove Button to digital port D2
button = 2
       

# Connect the Grove Buzzer to digital port D8
buzzer = 8

grovepi.pinMode(button,"INPUT")
grovepi.pinMode(buzzer,"OUTPUT")

# Light Control Functions

lev = range(128) #generate a list 0-128 to allow control of light level

def fade(level,color,sleep_time):
	if color=="red":
		for l in level:
			lcd.setRGB(level[l],0,0)
			time.sleep(sleep_time) #long enough to notice color change
	elif color=="green":
		for l in level:
			lcd.setRGB(0,level[l],0)
			time.sleep(sleep_time) #long enough to notice color change
	elif color=="blue":
		for l in level:
			lcd.setRGB(0,0,level[l])
			time.sleep(sleep_time) #long enough to notice color change
	elif color=="yellow":
		for l in level:
			lcd.setRGB(level[l],level[l],0)
			time.sleep(sleep_time) #long enough to notice color change
	elif color=="bluegreen":
		for l in level:
			lcd.setRGB(0,level[l],level[l])
			time.sleep(sleep_time) #long enough to notice color change
	elif color=="purple":
		for l in level:
			lcd.setRGB(level[l],0,level[l])
			time.sleep(sleep_time) #long enough to notice color change
	elif color=="white":
		for l in level:
			lcd.setRGB(level[l],level[l],level[l])
			time.sleep(sleep_time) #long enough to notice color change

def cycle(sleep_time):
	fade(lev,"red",sleep_time)
	fade(lev,"yellow",sleep_time)
	fade(lev,"green",sleep_time)
	fade(lev,"bluegreen",sleep_time)
	fade(lev,"blue",sleep_time)
	fade(lev,"purple",sleep_time)
	fade(lev,"white",sleep_time)

def buttonflag ():			
	button_flag = True
	while button_flag:
		try:
			value = grovepi.digitalRead(button)
			print( "Button Sensor = " + str(value))
			if value==1:
				button_flag=False
			
			# Read the button value.
			# If it is pressed, then stop the loop and move on.
			
			time.sleep(.5)
		except TypeError:
			print(TypeError)
		except IOError:
			print(IOError)
			
	print('Got button press')

def init_light():
	lcd.setRGB(128,0,0) #set the light to red initially
	
def quit_light():
	lcd.setRGB(128,0,128) #purple
	time.sleep(2)

def buzz():
	grovepi.digitalWrite(buzzer,1) # write 1 means start buzzing
	time.sleep(0.25)
	grovepi.digitalWrite(buzzer,0) # write 0 means stop buzzing
	
def end_message():
	print( 'shutting down' )

# Now... Lights camera action

init_light()	
buttonflag()	
cycle(0.01)
buzz()
quit_light()
end_message()
