# -*- coding: utf-8 -*-
"""
Created on Sat Feb 13 19:41:47 2016

@author: South Eugene Robotics Team
"""
# encapsulates the concept of a Game Mote
# each Raspberry Pi in the Game declares itself to the server.
# The capabilities of the device are provided to the Server.
#The server will be able to trigger behaviors of Game pieces remotely.

import ConfigParser

DigitalIn = 1
DigitalOut = 2
AnalogIn = 3
AnalogOut = 4
I2C = 5
RPISER = 6
SERIAL = 7

class Capability(dict):
    id = 0
    moteId = 0
    name = "button"
    port = 0
    ioType = 1
    def __init__(self, name, port, ioType):
        self.name = name 
        self.port = port
        self.ioType = ioType
        
    def toDict(self):
        x = { "name" : self.name, "port" : self.port, "ioType" : self.ioType, "moteId" : self.moteId}
        return x
    
class Mote:
    id = 0
    name = "Simon"
    description = "Simon Game in Main Hall"
    ip = "127.0.0.1"
    capabilities = []
    def __init__(self, name, description, ip, capabilities=[]):
        self.name = name
        self.ip = ip
        self.description = description
    
    def addCapability( self, capability ):
        self.capabilities.append( capability )
    
    def clearCapabilities( self ):
        self.capabilities = []
        
#    def to_JSON(self):
#        json_string = json.dumps([ob.__dict__ for ob in myMote.capabilities])
#        return json.dumps(self, default=lambda o: o.__dict__, 
#            sort_keys=True, indent=4)
    
    def toDict(self):
        x = { "name": self.name, "description" : self.description, "ip" : self.ip }
        #clist = [ ob.toDict() for ob in myMote.capabilities ]
        #x["capabilities"] = clist
        return x
        
    # these routines failed us.
    # the goal would be to create a single JSON representation of the mote object
    # this was not making it to the server intact
    def to_JSON(self):        
        myStr = '"name": "' + self.name +'", '
        myStr += '"description": "' + self.description +'", ' 
        myStr += '"id": ' + str(self.id) +', '
        myStr += '"capabilities": ' + json.dumps([ob.__dict__ for ob in myMote.capabilities])
        #myStr += '}'
        myStr = myStr.replace('\n', ' ').replace('\r', '').replace( '\t', '' )
        return myStr
            
    def to_JSON2(self):
        json_string = ',"capabilities": ' + json.dumps([ob.__dict__ for ob in myMote.capabilities])
        self_string = json.dumps(self.__dict__, sort_keys=True, indent=4)
        q1 = self_string.find('[')
        q2 = self_string.find(']')
        p1 = self_string[:q1]
        p3 = self_string[q2+1:]
        mystring = (p1+json_string + "}").replace('\n', ' ').replace('\r', '').replace( '\t', '' )
        return mystring
            
    def saveConfig( self ):
        # lets create that config file...
        cfgfile = open("config.ini",'w')
        
        # add the settings to the structure of the file, and lets write it out...
        Config = ConfigParser.ConfigParser()
        Config.add_section('mote')
        Config.set('mote','name',self.name)
        Config.set('mote','description', self.description)
        
        Config.add_section('capabilities')
        Config.set('capabilities','numCapabilities',len(self.capabilities))
        
        # iterate through the capabilities and store 
        i = 1
        for ob in self.capabilities:
            sec = 'capability'+str(i)
            print "section: " + sec
            Config.add_section(sec)
            i = i + 1
            Config.set(sec,'name',ob.name)
            Config.set(sec,'port',ob.port)
            Config.set(sec,'ioType',ob.ioType)
        
        Config.write(cfgfile)
        cfgfile.close()           
        
        
    def loadConfig( self ):
        # load the config file if it exists
        Config = ConfigParser.ConfigParser()
        Config.read("config.ini")
        
        # get the mote's identity
        self.name = Config.get( 'mote', 'name' )
        self.description = Config.get( 'mote', 'description' )
        
        self.clearCapabilities()
        numCapabilities = Config.getint( 'capabilities','numCapabilities' )
        for i in range( 1, numCapabilities ):
            capName = Config.get( 'capability'+str(i), 'name' )
            port = Config.getint( 'capability'+str(i), 'port' )
            ioType = Config.getint( 'capability'+str(i), 'ioType' )
            
            cap = Capability( capName, port, ioType )
            self.addCapability( cap )