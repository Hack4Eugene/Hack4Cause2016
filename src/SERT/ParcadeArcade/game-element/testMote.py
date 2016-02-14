# -*- coding: utf-8 -*-
"""
Created on Sun Feb 14 07:33:42 2016

@author: joe_b
"""


import mote


myMote = mote.Mote( "Foo", "My new Simon", "10.0.0.1" )

#myMote.addCapability( mote.Capability( "Button 1", 2, 1 ) )
#myMote.addCapability( mote.Capability( "Button 2", 3, 1 ) )
#myMote.addCapability( mote.Capability( "Green LED", 2, 2 ) )

#myMote.saveConfig()

myMote.loadConfig()

print myMote.name