# Var-Validator

[![NPM](https://nodei.co/npm/var-validator.png?compact=true)](https://nodei.co/npm/var-validator/)

Validate JS variable names


## Install

```
npm install var-validator
```


## Features

* Validate if variable names can safely be used in generated scripts
* Validate if variable is not a reserved keyword
* Support dot-separated variable scope (i.e. object properties). Ex: `foo.bar`
* Handle bracket accessors. Ex: `foo["bar"].buz` or `foo['bar'].buz` or `foo[bar].buz`.
* 100% coverage and use case testing


## Usage

* **isValid** *(String[, Object])* : *{boolean}* - validate that the given string is
a valid variable name. The second argument are options overrides. See
[enable / disable](#enable--disable-features) features for more information.


### Simple Usage

```javascript
var varVal = require('var-validator');

var varName = 'foo.bar["buz"]';

console.log(varVal.isValid(varName));
// true

console.log(varVal.isValid(varName + ' = 123;'));
// false
```


### Enable / Disable features

* **enableScope** : *{Boolean}* - set to `true` to enable handling dot-separated
variable names. (Default `true`)
* **enableBrackets** : *{Boolean}* - set to `true` to enable handling brackets in
variable names. If set to false, will reject any variable with bracket. (Default `false`)
* **allowUpperCase** : *{Boolean}* - set to `true` to allow uppercase characters.
(Default `true`)
* **allowLowerCase** : *{Boolean}* - set to `true` to allow lowercase characters.
(Default `true`)


**Note**: if `allowUpperCase` and `allowLowerCase` are both `false`, then `isValid`
will *always* return false.


```javascript
var varVal = require('var-validator');

varVal.enableScope = false;
varVal.enableBrackets = false;

varVal.isValid('foo.bar');
// false

varVal.isValid('foo.bar', { enableScope: true });
// true
```


## Contribution

All contributions welcome! Every PR **must** be accompanied by their associated
unit tests!


## License

The MIT License (MIT)

Copyright (c) 2014 Mind2Soft <yanick.rochon@mind2soft.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.