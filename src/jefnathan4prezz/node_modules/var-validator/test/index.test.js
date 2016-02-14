
describe('Varname', function () {

  var varVal = require('../');

  describe('with default options', function () {

    it('should have proper default options set', function () {
      varVal.enableScope.should.be.true;
      varVal.enableBrackets.should.be.false;
      varVal.allowLowerCase.should.be.true;
      varVal.allowUpperCase.should.be.true;
    });

    it('should validate', function () {

      [
        'foo',
        'foo.bar',
        'foo1.bar3',
        'foo_bar',
        'foo_bar1._buz'
      ].forEach(function (validName) {
        varVal.isValid(validName).should.be.true;
      });

    });

    it('should not validate', function () {

      [
        undefined, null, false, true,
        -1, 0, 1,
        {}, [], /./, function () {},

        // reserved keywords
        'while',

        // invalid JS names
        '2',
        '2foo',
        '2_foo.bar',
        'foo[]',
        'foo["bar"].buz',
        'foo[\'bar\'].buz',
        'foo[123]'
      ].forEach(function (invalidName) {
        varVal.isValid(invalidName).should.be.false;
      });

    });

  });


  describe('with enableScope = false', function () {

    beforeEach(function () {
      varVal.enableScope = false;
    });

    after(function () {
      varVal.enableScope = true;
    });

    it('should have proper default options set', function () {
      varVal.enableScope.should.be.false;
      varVal.enableBrackets.should.be.false;
      varVal.allowLowerCase.should.be.true;
      varVal.allowUpperCase.should.be.true;
    });

    it('should validate', function () {

      [
        'foo',
        'foo_bar',
        'foo1',
        'hello_world_with_some_very_long_name'
      ].forEach(function (validName) {
        varVal.isValid(validName).should.be.true;
      });

    });

    it('should not validate', function () {

      [
        undefined, null, false, true,
        -1, 0, 1,
        {}, [], /./, function () {},

        // reserved keywords
        'while',

        // invalid JS names
        '2',
        '2foo',
        '2_foo.bar',
        'foo.bar',
        'foo_bar.buz',
        'foo[]',
        'foo["bar"].buz',
        'foo[\'bar\'].buz',
        'foo[123]'
      ].forEach(function (invalidName) {
        varVal.isValid(invalidName).should.be.false;
      });

    });

  });


  describe('with enableBrackets = true', function () {

    beforeEach(function () {
      varVal.enableBrackets = true;
    });

    after(function () {
      varVal.enableBrackets = false;
    });

    it('should have proper default options set', function () {
      varVal.enableScope.should.be.true;
      varVal.enableBrackets.should.be.true;
      varVal.allowLowerCase.should.be.true;
      varVal.allowUpperCase.should.be.true;
    });

    it('should validate', function () {

      [
        'foo',
        'foo_bar',
        'foo1',
        'hello_world_with_some_very_long_name',
        'foo.bar',
        'foo_bar.buz',
        'foo[]',
        'foo["bar"].buz',
        'foo[\'bar\'].buz',
        'foo[123]'
      ].forEach(function (validName) {
        varVal.isValid(validName).should.be.true;
      });

    });

    it('should not validate', function () {

      [
        undefined, null, false, true,
        -1, 0, 1,
        {}, [], /./, function () {},

        // reserved keywords
        'while',

        // invalid JS names
        '2',
        '2foo',
        '2_foo.bar'
      ].forEach(function (invalidName) {
        varVal.isValid(invalidName).should.be.false;
      });

    });

    it('should properly validate brackets', function () {
      varVal.allowUpperCase = false;

      [
        'foo["BAR"]',
        'foo[\'BAR\']',
        'foo[bar]',
        'foo[123]',
        'foo["123"]',
        'foo[\'123\']'
      ].forEach(function (validName) {
        varVal.isValid(validName).should.be.true;
      });

      varVal.allowUpperCase = true;

    });

    it('should properly invalidate brackets', function () {
      varVal.allowUpperCase = false;

      [
        'foo[BAR]',
        'foo[Bar]',
        'foo[123bar]'
      ].forEach(function (invalidName) {
        varVal.isValid(invalidName).should.be.false;
      });

      varVal.allowUpperCase = true;
    });

  });


  describe('with allowLowerCase = false', function () {

    beforeEach(function () {
      varVal.allowLowerCase = false;
    });

    after(function () {
      varVal.allowLowerCase = true;
    });

    it('should have proper default options set', function () {
      varVal.enableScope.should.be.true;
      varVal.enableBrackets.should.be.false;
      varVal.allowLowerCase.should.be.false;
      varVal.allowUpperCase.should.be.true;
    });

    it('should validate', function () {

      [
        'FOO',
        'FOO_BAR',
        'FOO1',
        'FOO_BAR123.BUZ'
      ].forEach(function (validName) {
        varVal.isValid(validName).should.be.true;
      });

    });

    it('should not validate', function () {

      [
        undefined, null, false, true,
        -1, 0, 1,
        {}, [], /./, function () {},

        // reserved keywords
        'while',

        // invalid JS names
        '2',
        'Foo',
        'FOo_BAR',
        'FOo1',
        'FOO_BaR123.BUZ',
        '2foo',
        '2_foo.bar',
        'foo.bar',
        'foo_bar.buz',
        'foo[]',
        'foo["bar"].buz',
        'foo[\'bar\'].buz',
        'foo[123]'
      ].forEach(function (invalidName) {
        varVal.isValid(invalidName).should.be.false;
      });

    });

  });


  describe('with allowUpperCase = false', function () {

    beforeEach(function () {
      varVal.allowUpperCase = false;
    });

    after(function () {
      varVal.allowUpperCase = true;
    });

    it('should have proper default options set', function () {
      varVal.enableScope.should.be.true;
      varVal.enableBrackets.should.be.false;
      varVal.allowLowerCase.should.be.true;
      varVal.allowUpperCase.should.be.false;
    });

    it('should validate', function () {

      [
        'foo',
        'foo_bar',
        'foo1',
        'foo_bar123.buz'
      ].forEach(function (validName) {
        varVal.isValid(validName).should.be.true;
      });

    });

    it('should not validate', function () {

      [
        undefined, null, false, true,
        -1, 0, 1,
        {}, [], /./, function () {},

        // reserved keywords
        'while',

        // invalid JS names
        '2',
        'FOO',
        'Foo_bar',
        'Foo1',
        'foo_bar123.Buz',
        '2foo',
        '2_foo.bar',
        'fOo.bar',
        'foo[]',
        'foo["bar"].buz',
        'foo[\'bar\'].buz',
        'foo[123]'
      ].forEach(function (invalidName) {
        varVal.isValid(invalidName).should.be.false;
      });

    });

  });


  describe('disabling everything', function () {

    beforeEach(function () {
      varVal.enableScope = false;
      varVal.enableBrackets = false;
      varVal.allowLowerCase = false;
      varVal.allowUpperCase = false;
    });

    after(function () {
      varVal.enableScope = true;
      varVal.enableBrackets = false;
      varVal.allowLowerCase = true;
      varVal.allowUpperCase = true;
    });

    it('should have proper default options set', function () {
      varVal.enableScope.should.be.false;
      varVal.enableBrackets.should.be.false;
      varVal.allowLowerCase.should.be.false;
      varVal.allowUpperCase.should.be.false;
    });

    it('should not validate', function () {

      [
        undefined, null, false, true,
        -1, 0, 1,
        {}, [], /./, function () {},

        // reserved keywords
        'while',

        // invalid JS names
        'foo',
        'foo_bar',
        'foo1',
        'foo_bar123.buz',

        'FOO',
        'FOO_BAR',
        'FOO1',
        'FOO_BAR123.BUZ',

        '2',
        'FOO',
        'Foo_bar',
        'Foo1',
        'foo_bar123.Buz',
        '2foo',
        '2_foo.bar',
        'fOo.bar',
        'foo[]',
        'foo["bar"].buz',
        'foo[\'bar\'].buz',
        'foo[123]'
      ].forEach(function (invalidName) {
        varVal.isValid(invalidName).should.be.false;
      });

    });

  });


  describe('options override', function () {

    beforeEach(function () {
      varVal.enableScope = true;
      varVal.enableBrackets = false;
      varVal.allowLowerCase = true;
      varVal.allowUpperCase = true;
    });

    it('should override enableScope', function () {
      var override = { enableScope: false };

      varVal.enableScope.should.be.true;

      [
        'foo.bar',
        'foo_bar.buz'
      ].forEach(function (name) {
        varVal.isValid(name).should.be.true;
        varVal.isValid(name, override).should.be.false;
      });

    });

    it('should override enableBrackets', function () {
      var override = { enableBrackets: true };

      varVal.enableBrackets.should.be.false;

       [
        'foo[]',
        'foo["bar"].buz',
        'foo[\'bar\'].buz',
        'foo[123]'
      ].forEach(function (name) {
        varVal.isValid(name).should.be.false;
        varVal.isValid(name, override).should.be.true;
      });

    });

    it('should override allowLowerCase', function () {
      var override = { allowLowerCase: false };

      varVal.allowLowerCase.should.be.true;

      [
        'Foo',
        'FOo_BAR',
        'FOo1',
        'FOO_BaR123.BUZ',
        'foo.bar',
        'foo_bar.buz'
      ].forEach(function (name) {
        varVal.isValid(name).should.be.true;
        varVal.isValid(name, override).should.be.false;
      });

    });

    it('should override allowUpperCase', function () {
      var override = { allowUpperCase: false };

      varVal.allowUpperCase.should.be.true;

      [
        'FOO',
        'Foo_bar',
        'Foo1',
        'foo_bar123.Buz',
        'fOo.bar'
      ].forEach(function (name) {
        varVal.isValid(name).should.be.true;
        varVal.isValid(name, override).should.be.false;
      });

    });

  });

});
