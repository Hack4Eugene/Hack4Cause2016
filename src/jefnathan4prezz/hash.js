String.prototype.hashCode = function() {
  // Gracefully stolen from the Java language.
  var hash = 0, i, chr, len;
  if (this.length === 0) return hash;
  for (i = 0, len = this.length; i < len; i++) {
    chr   = this.charCodeAt(i);
    hash  = ((hash << 5) - hash) + chr;
    hash |= 0; // Convert to 32bit integer
  }
  return hash;
};

var hashToAdjectives = function(userid) {
	// take a uuid style user ID (TYPE STRING) and use hashCode
  var hashNumber = userid.hashCode;
	// mod by a prime < 1501
  var lineNumber1 = hashNumber % 1499;
  var lineNumber2 = hashNumber % 1451;
	// return the line number to use from that file
  return [lineNumber1, lineNumber2];
}

var useridToAdjectives = function(userid){
  // find the right line number
  var lineNumber = hashToAdjectives(userid);
  // find the adjective
  var adjective
}