call(number);
say('This is an automated call from Fifteenth Night');
say('on behalf of');
say(reply.split('').join(' '))
say('Message follows.');
wait(750);
say(msg);
ask('If you would like to be connected to the sender, say connect. Otherwise, you may hang up.', {
	choices: 'connect'
});
say('Connecting you now.')
transfer(reply, {
	playvalue: 'http://www.phono.com/audio/holdmusic.mp3'
});
