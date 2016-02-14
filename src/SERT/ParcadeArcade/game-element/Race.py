from random import shuffle
import math
import urllib2
import json
import time
import requests

order = [0, 1, 2, 3]
shuffle(order)
buttonIDs = [11, 12, 21, 22]  #11 means id=1, button1. 22 means id=2, button2
print order
success = False

print (str(buttonIDs[order]))

initTime = time.time()

#gets stuck until the player hits the time limit or the last button
while ((time.time() - initTime) <= 10 or \
json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=" + \
str(buttonIDs[order[3]])[0]).read())["response"]["sensors"]["button" + str(buttonIDs[order[3]])[-1]]["value"] == 0) :
    continue

#gets all the timestamps for the button presses
times = [json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=1").read())["response"]["sensors"]["button1"]["timestamp"],
            json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=1").read())["response"]["sensors"]["button2"]["timestamp"],
            json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=2").read())["response"]["sensors"]["button1"]["timestamp"],
            json.loads(urllib2.urlopen("http://andrew.local:1337/pull/?id=2").read())["response"]["sensors"]["button2"]["timestamp"]]


#test if the order of presses were correct
if ((times[0] < times[1]) and  (times[1] < times[2]) and (times[2] < times[3]) and (times[3] < times[4])):
    success = True
else:
    success = False

#reset all the button values
requests.post("http://andrew.local:1337/push/?id=1&name=button1&value=0")
requests.post("http://andrew.local:1337/push/?id=1&name=button2&value=0")
requests.post("http://andrew.local:1337/push/?id=2&name=button1&value=0")
requests.post("http://andrew.local:1337/push/?id=2&name=button2&value=0")

if (not success):
    requests.post("http://andrew.loacal:1337/points/?id=a541dddab6cb3ad680053f55559ad394&points=-10")
else:
    requests.post("http://andrew.loacal:1337/points/?id=a541dddab6cb3ad680053f55559ad394&points=100")
